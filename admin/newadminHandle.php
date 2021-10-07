<?php
require_once '../includes/db/adminCtrl.php';

$con = open_connection();
$name = isset($_POST['name']) ? $_POST['name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$countryno = $_POST['country_no'];
$contactno = $_POST['contact_no'];
$createdAt = date("Y-m-d H:i:s");
$updatedAt = date("Y-m-d H:i:s");

$newadmin = createNewAdmin($con, $name, $email, $password, $contactno, $countryno, $createdAt, $updatedAt)


?>
