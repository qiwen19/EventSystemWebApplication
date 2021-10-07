<?php
require_once '../includes/db/adminCtrl.php';

$con=  open_connection();
$email = $_POST['email'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$cfmnewpassword = $_POST['cfmnewpassword'];
$updatedAt = date("Y-m-d H:i:s");
$message = "error changing password";


if($newpassword==$cfmnewpassword && $newpassword != $oldpassword){
$ChangePw = changePassword($con,$email,$oldpassword,$newpassword,$updatedAt);
}else{
    echo "<script type='text/javascript'>alert('$message');"
                  . "window.location ='ChangePassword.php'</script>";
}


?>
