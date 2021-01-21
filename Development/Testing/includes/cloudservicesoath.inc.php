<?php

if (isset($_POST["submit"])) {
    echo "hi there fella";

    if (isset($_POST["cbgoogledrive"])) {
        echo "Authorize Google Drive";
    
    
    } 

    if (isset($_POST["cbdropbox"])) {
        echo "Authorize DropBox";
    
    
    } 

    if (isset($_POST["cbonedrive"])) {
        echo "Authorize OneDrive";
    
    
    } 
} 