<?php

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';

session_start();
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];



$client = new Google_Client();
$client->setClientId('820857131028-oudtepk60ufqot8mn5absf09c5949evn.apps.googleusercontent.com');
$client->setClientSecret('Qzy6NVEnuXPsD8zIeDaQvD0Q');
$client->setRedirectUri($url);  
$client->setScopes(array('https://www.googleapis.com/auth/drive'));

if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);
    exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate(); 
}