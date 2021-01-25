<?php

require_once __DIR__.'/vendor/autoload.php';

if (!file_exists("client_id.json")) exit("Client secret file not found");
$client = new Google_Client();
$client->setAuthConfig('client_id.json');
//$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope("https://www.googleapis.com/auth/drive");

if (file_exists("credentials.json")) {
	$access_token = (file_get_contents("credentials.json"));
  $client->setAccessToken($access_token);

	//Refresh the token if it's expired.
	if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
		file_put_contents("credentials.json", json_encode($client->getAccessToken()));
  }

  // This is where we upload the files //
  // The Google_Service_Drive class is not being recognized

	$drive_service = new Google_Service_Drive($client);
	$files_list = $drive_service->files->listFiles(array())->getFiles(); //http://stackoverflow.com/questions/37975479/call-to-undefined-method-google-service-drive-filelistgetitems
  echo json_encode($files_list);
    

} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/oauth2callback.inc.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}