<?php
require_once '../includes/db/footerCtrl.php';
$con = open_connection();
session_start();

$adm_id = "";
foreach($_SESSION as $userinfo){
foreach($userinfo as $adminfo){
$adm_id = $adminfo["adm_id"];
}}

$ft_id = $_POST['ft_id'];
$address = $_POST['address'];
$of_contact_no = $_POST['of_contact_no'];
$of_country_no = $_POST['of_country_no'];
$hp_contact_no = $_POST['hp_contact_no'];
$hp_country_no = $_POST['hp_country_no'];
$facebook_url = $_POST['facebook_url'];
$youtube_url = $_POST['youtube_url'];
$instagram_url = $_POST['instagram_url'];
$updatedAt = $_POST['updatedAt'];

$updateFooter = updateFooter($con,$ft_id,$adm_id,$address,$of_contact_no,$of_country_no,$hp_contact_no,$hp_country_no,$facebook_url,$youtube_url,$instagram_url,$updatedAt);


?>