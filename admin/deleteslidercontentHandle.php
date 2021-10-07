<?php
require_once '../includes/db/sliderCtrl.php';

$con = open_connection();
$sl_id = $_POST['sl_id'];
$updatedAt = $_POST['updatedAt'];

$DeleteSlider = deleteSlider($con, 1 , $sl_id, $updatedAt);


?>
