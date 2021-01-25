<?php
require_once __DIR__.'/vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfigFile('client_id.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/oauth2callback.inc.php');
//$client->addScope(Google_Service_Drive::DRIVE); //::DRIVE_METADATA_READONLY
$client->addScope("https://www.googleapis.com/auth/drive");
$client->setAccessType('offline');  // this allowed for refresh tokens to be used

if (! isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  //$_SESSION['access_token'] = $client->getAccessToken();
  $access_token = $client->getAccessToken();
  //$access_token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  file_put_contents("credentials.json", json_encode($access_token));
   
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/upload.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}