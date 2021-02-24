<?php

require_once 'functions.inc.php';
require_once 'dbh.inc.php';
session_start();

require_once dirname(__DIR__, 1) .'/vendor/autoload.php';
use Krizalys\Onedrive\Onedrive;

if (!file_exists("client_id_onedrive.json")) exit("Client secret file not found");
$data = file_get_contents("client_id_onedrive.json");
$data_json = json_decode($data, true);
$onedriveId = $data_json['ONEDRIVE_CLIENT_ID'];
$onedriveSecret =$data_json['ONEDRIVE_CLIENT_SECRET'];


// Instantiates a OneDrive client bound to your OneDrive application.
$client = Onedrive::client($onedriveId);