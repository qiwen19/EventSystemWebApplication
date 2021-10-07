<?php
require_once '../includes/db/sliderCtrl.php';

$con = open_connection();
session_start();

$adm_id = "";
foreach($_SESSION as $userinfo){
foreach($userinfo as $adminfo){
$adm_id = $adminfo["adm_id"];
}}

if ($_FILES["newimage"]["error"] == 0) {
    global $slider_filename;
    $uploadFile = uploadFileHandle($_FILES["newimage"], "../img");
    $slider_filename = $uploadFile;
        }

$slider_title = isset($_POST['title']) ? $_POST['title'] : "";
$slider_description = isset($_POST['description']) ? $_POST['description'] : "";
$createdAt = date("Y-m-d H:i:s");
$updatedAt = date("Y-m-d H:i:s");

$NewLider = createNewSlider($con,$adm_id,$slider_filename,$slider_title,$slider_description,$createdAt,$updatedAt);


?>