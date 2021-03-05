<?php 
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';


// The first three statements are for the "connect" buttons on the homepage
if (isset($_POST['googledriveconnect'])){
    require_once 'google_drive_oauth.inc.php';
}

if (isset($_POST['onedriveconnect'])){
    require_once 'onedrive_oauth.inc.php';
}

if (isset($_POST['dropboxconnect'])){
    
}


if (isset($_POST["submit"])) {
    // The last three statements are for the checkboxes on the uploads page
    if (isset($_POST["cbgoogledrive"])) {
        require_once 'google_drive_oauth.inc.php';
    
    } 

    if (isset($_POST["cbdropbox"])) {
        require_once 'dropbox_oauth.inc.php';
        $authUrl = $authHelper->getAuthUrl($callbackUrl);
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    } 

    if (isset($_POST["cbonedrive"])) {
        require_once 'onedrive_oauth.inc.php';
    } 

    // // Redirect back to uploads.php and display success/error messages TODO: Create success message/display
} 

// header("location: ../results.php?error=none");
