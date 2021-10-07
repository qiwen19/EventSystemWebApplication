<?php
require_once '../includes/db/adminCtrl.php';

$userid = isset($_POST['userid']) ? $_POST['userid'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";


$adminAccount = getLoginAccount($con,$userid, $password);


if ($adminAccount) {
    session_start();
    $_SESSION['admin'] = $adminAccount;
    
    header('Location: adminHome.php');
} else {
    header('Location: index.php?error=1');
}
?>