<?php
require_once '../includes/db/adminCtrl.php';
$con = open_connection();

$adm_id= $_POST['adm_id'];
$adm_name= $_POST['adm_name'];
$email = $_POST['email'];
$countrytno = $_POST['country_no'];
$contactno = $_POST['contact_no'];
$adm_id = $_POST['adm_id'];
$updatedAt = $_POST['updatedAt'];


$updateAccount = updateAdmin($con,$adm_id,$adm_name,$email,$contactno,$countrytno,$updatedAt);


?>