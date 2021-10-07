<?php
require_once '../includes/db/sliderCtrl.php';
$con = open_connection();
        $sl_id = $_POST['sl_id'];
        $updatedAt = $_POST['updatedAt'];

        if ($_FILES["newimage"]["error"] == 0) {
            global $slider_filename;
            $uploadFile = uploadFileHandle($_FILES["newimage"], "../img",$sl_id);
            $slider_filename = $uploadFile;
        }
       
$updateImage = updateImage($con, $sl_id, $slider_filename,$updatedAt);

        
        ?>