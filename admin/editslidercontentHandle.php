<?php
require_once '../includes/db/sliderCtrl.php';

$con = open_connection();
$sl_id = $_POST['sl_id'];
$slider_filename = $_POST['image'];
$slider_title= $_POST['title'];
$slider_description = $_POST['desc'];
$updatedAt = $_POST['updatedAt'];


$updateSlider = updateSlider($con, $sl_id, $slider_filename, $slider_title, $slider_description, $updatedAt);

?>