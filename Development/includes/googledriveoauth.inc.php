<?php

require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start(); 

if (!file_exists("client_id.json")) exit("Client secret file not found");
$client = new Google_Client();
$client->setAuthConfig('client_id.json');
//$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope("https://www.googleapis.com/auth/drive");

if (file_exists("credentials.json")) {
// This is where im at -- credentials.json does exists --  we need to check db to see if we have a match with userid and accesstoken
// get userid from session and check to see if the row with that id has the accesstoken within the credentials.json file

  $usersId = $_SESSION['userid'];
  $accessToken = $_SESSION['access_token'];
  $row = verifyCredentials($conn, $usersId, $accessToken['access_token']);

  // If the a row is returned, the credentials.json file belongs to the current user
  if ($row){
    $access_token = (file_get_contents("credentials.json"));
    $client->setAccessToken($access_token);
  
    //Refresh the access token if it's expired. I need my own function to check for expiration
    

    if (isAccessTokenExpired($conn, $usersId)) {
      $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
      file_put_contents("credentials.json", json_encode($client->getAccessToken()));

      // Update access token in db once it has been refreshed
      // ya29.A0AfH6SMAgzXXjWLtSnkpXw94MujtWM-fzckQ2nFiNvcPmqDTV6bvktO2WPypiRDXoKGaV05iCu6DsbLqNhretctbWRrEchi59oo6h8IjTpd7eciRymlGbAJqcgi5sQ9KwtmM1CxklqwhK2Zy_ufajiH9KGBln
      $accessToken = $client->getAccessToken();
      var_dump($accessToken);
      echo $accessToken['access_token'];
      updateAccessToken($conn, $usersId, $accessToken['access_token']);
      exit();
    }
  
    //$drive_service = new Google_Service_Drive($client);
    // $files_list = $drive_service->files->listFiles(array())->getFiles(); //http://stackoverflow.com/questions/37975479/call-to-undefined-method-google-service-drive-filelistgetitems
    // echo json_encode($files_list);
  
    $drive_service = new Google_Service_Drive($client);
    $file = new Google_Service_Drive_DriveFile();
    $file->setDescription('A test document');
    $file->setMimeType('image/jpeg');

    // This is where we upload the files //

    $dir = new DirectoryIterator('../uploads/');
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            //echo $fileinfo->getFilename();
            $data = file_get_contents('../uploads/' . $fileinfo->getFilename());
            $file->setName($fileinfo->getFilename());
            try {
  
              // Cases for different file types //
              // Automatic detection of file extension //
  
              $createdFile = $drive_service->files->create($file, array(
                'data' => $data,
                'mimeType' => 'image/jpeg',
                'uploadType' => 'multipart'
              ));
  
              // Redirect back to uploads.php and display success/error messages
              echo "Sucessful upload of " . $file['name'];
  
            } catch (Exception $exc) {
              echo $exc->getMessage() . "\n";
            }
        }
    }
  } else {
    // The current user does not align with the credentials.json file -- delete credentials.json and create a new one ?
    clearCredentialsJson();
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/oauth2callback.inc.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  }
} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/Projects/SeniorDesign/Development/includes/oauth2callback.inc.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}