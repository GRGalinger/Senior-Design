<?php
require_once dirname(__DIR__, 1) .'/vendor/autoload.php';


if (isset($_POST["submit"])) {

    

    if (isset($_POST["cbgoogledrive"])) {
        require_once 'googledriveoauth.inc.php';
        // Eventually show success/error message here
        // list files that were uploaded
    
    } 

    if (isset($_POST["cbdropbox"])) {
    
    
    } 

    if (isset($_POST["cbonedrive"])) {
    
    
    } 
} 