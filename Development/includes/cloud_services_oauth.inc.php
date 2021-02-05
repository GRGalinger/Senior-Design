<?php
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';


if (isset($_POST["submit"])) {

    

    if (isset($_POST["cbgoogledrive"])) {
        require_once 'google_drive_oauth.inc.php';
        // Eventually show success/error message here
        // list files that were uploaded
    
    } 

    if (isset($_POST["cbdropbox"])) {
        require_once 'dropbox_oauth.inc.php';
        $authUrl = $authHelper->getAuthUrl($callbackUrl);
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));



        
    
    } 

    if (isset($_POST["cbonedrive"])) {
        
    
    } 

    header("location: ../results.php"); 


   

    // // Redirect back to uploads.php and display success/error messages TODO: Create success message/display
    // header("location: ../upload.php?error=none");

} else {
   
}