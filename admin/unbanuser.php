<?php
require_once '../includes/db/userCtrl.php';

$con=  open_connection();
$ur_id = $_GET['urid'];
$updatedAt = date("Y-m-d H:i:s");

$banuser = UnBanUser($con, 0, $updatedAt, $ur_id);

    echo "<script type='text/javascript'>"
                  . "window.location ='dashboard.php'</script>";


?>
