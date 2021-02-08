<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpEZdriveDB";

$serverName = "localhost";
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Conncection failed: " . mysqli_connect_error());
}