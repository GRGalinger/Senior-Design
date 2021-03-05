<?php
($config = include __DIR__ . '/onedrive.config.php') or die('Configuration file not found');
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
require_once 'functions.inc.php';
require_once 'dbh.inc.php';

use Krizalys\Onedrive\Onedrive;
session_start();

// Check if we have an acces token already
// $userId = $_SESSION['userid'];
// $row = getUserCredentials($conn, $userId, "onedrive_credentials");
// var_dump($row);
// if ($row != false) {

//     $client = Onedrive::client($config['ONEDRIVE_CLIENT_ID']);
//     $state = $client->getState();
//     var_dump($state);
//     exit();

// }


// Instantiates a OneDrive client bound to your OneDrive application.
$client = Onedrive::client($config['ONEDRIVE_CLIENT_ID']);

// Gets a log in URL with sufficient privileges from the OneDrive API.
$url = $client->getLogInUrl([
    'files.read',
    'files.read.all',
    'files.readwrite',
    'files.readwrite.all',
    'offline_access',
], $config['ONEDRIVE_REDIRECT_URI']);

// var_dump($client);
// exit();

// Persist the OneDrive client' state for next API requests.
$_SESSION['onedrive.client.state'] = $client->getState();




// Redirect the user to the log in URL.
header('HTTP/1.1 302 Found', true, 302);
header("Location: $url");