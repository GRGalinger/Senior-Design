<?php
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();

$client = new Google_Client();
$client->setAuthConfigFile('client_id.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/oauth2callback.inc.php');
//$client->addScope(Google_Service_Drive::DRIVE); //::DRIVE_METADATA_READONLY
$client->addScope("https://www.googleapis.com/auth/drive");
$client->setAccessType('offline');  // this allowed for refresh tokens to be used

if (!isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $access_token = $client->getAccessToken();
  //$access_token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  file_put_contents("credentials.json", json_encode($access_token));


  // Credentials file was just created -- User is logged in at this point -- We can add info to database
  $credentials = (file_get_contents("credentials.json"));
  $credentials = json_decode($credentials, TRUE);
  //var_dump($credentials);
  
  $usersId = $_SESSION['userid'];
  $accessToken = $credentials['access_token'];
  $expires = $credentials['expires_in'];
  $scope = $credentials['scope'];
  $tokenType = $credentials['token_type'];
  $created = $credentials['created'];
  $refreshToken = $credentials['refresh_token'];

  insertCredentials($conn, $usersId, $accessToken, $expires, $scope, $tokenType, $created, $refreshToken);

  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/upload.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}