<?php 
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();

$client = new Google_Client();
$client->setAuthConfigFile('client_id_google_drive.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/google_drive_oauthcallback.inc.php');
$client->addScope(Google_Service_Drive::DRIVE); 
$client->setAccessType('offline');  // this allowed for refresh tokens to be used

if (!isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  echo $auth_url;
  exit();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));

} else {
  $client->authenticate($_GET['code']);
  $credentials = $client->getAccessToken();  // This function returns an array of credential information
  

  // Now, we can add the credentials to the db
  $userId = $_SESSION['userid'];
  insertGoogleCredentials($conn, $userId, 
        $credentials['access_token'], 
        $credentials['expires_in'], 
        $credentials['scope'], 
        $credentials['token_type'], 
        $credentials['created'], 
        $credentials['refresh_token'],
        "GoogleDrive"
  );

  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/google_drive_oauth.inc.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}