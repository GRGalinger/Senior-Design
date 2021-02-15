<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST["edit"])) {
        header("location: ../edituserinfo.php");
        exit();

    } elseif (isset($_POST["pwd"])) {
        header("location: ../edituserpwd.php");
        exit();
    }

} else {
    header("location: ../login.php");
    exit();
}



        


    

   