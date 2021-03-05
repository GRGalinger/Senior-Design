<?php 
($config = include __DIR__ . '/onedrive.config.php') or die('Configuration file not found');
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
require_once 'functions.inc.php';
require_once 'dbh.inc.php';

session_start();

use Krizalys\Onedrive\Onedrive;

// If we don't have a code in the query string (meaning that the user did not
// log in successfully or did not grant privileges requested), we cannot proceed
// in obtaining an access token.
if (!array_key_exists('code', $_GET)) {
    throw new \Exception('code undefined in $_GET');
}



// Attempt to load the OneDrive client' state persisted from the previous
// request.
if (!array_key_exists('onedrive.client.state', $_SESSION)) {
    throw new \Exception('onedrive.client.state undefined in $_SESSION');
}

$client = Onedrive::client(
    $config['ONEDRIVE_CLIENT_ID'],
    [
        // Restore the previous state while instantiating this client to proceed
        // in obtaining an access token.
        'state' => $_SESSION['onedrive.client.state'],
    ]
);

// Obtain the token using the code received by the OneDrive API.
$client->obtainAccessToken($config['ONEDRIVE_CLIENT_SECRET'], $_GET['code']);
$state = $client->getState();
// var_dump($state);
// exit();

// echo $state->token->data->access_token;
// echo "    ";
// echo $state->token->data->expires_in;
// echo "    ";
// echo $state->token->data->scope;
// echo "    ";
// echo $state->token->data->token_type;
// echo "    ";
// echo $state->token->data->refresh_token;
// exit();

$created = time();

// Insert token data
$userId = $_SESSION['userid'];
insertOneDriveCredentials($conn, $userId, 
    $state->token->data->access_token,
    $state->token->data->expires_in,
    $state->token->data->scope,
    $state->token->data->token_type,
    $created,
    $state->token->data->refresh_token,
    "OneDrive"
);

 
// Persist the OneDrive client' state for next API requests.
$_SESSION['onedrive.client.state'] = $client->getState();
var_dump($_SESSION['onedrive.client.state']);
exit();

$file = $client->getRoot()->upload('hello.txt', 'Hello World!');