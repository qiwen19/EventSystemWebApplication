<?php

require_once 'dbSlider.php';

function getSlider($con, $status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSlider($con, $status);
    }

    return $userList;
}
function getSliderbyID($con, $sl_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSliderbyID($con, $sl_id);
    }

    return $userList;
}

function createNewSlider($con, $adm_id,$slider_filename,$slider_title,$slider_description,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewSlider($con, $adm_id,$slider_filename,$slider_title,$slider_description,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateSlider($con,$sl_id,$slider_filename,$slider_title,$slider_description,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateSlider($con,$sl_id,$slider_filename,$slider_title,$slider_description,$updatedAt);
    }

    return $userList;
}

function deleteSlider($con,$status,$sl_id,$updatedAt){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteSlider($con,$status,$sl_id,$updatedAt);
        close_connection($con);
    }

    return $userList;
}
function uploadFileHandle($currFile = null, $distDir = null,$sl_id="") {
    
    global $connection;

    if ($currFile["error"] > 0) {
        return false;
    } else {
        
        // now processes the file
        $allowedExts = ["jpg", "jpeg", "gif", "png"];
        $filenameStrArr = explode(".", $currFile["name"]);
        $extension = strtolower(end($filenameStrArr));
          
        $allowedTypes = ["image/gif", "image/jpeg", "image/png", "image/pjpeg"];
        $fileType = $currFile["type"];
            
        $sizeLimit = 500;
        $fileSize = $currFile["size"] / 1024;
            
        if (in_array($extension, $allowedExts) && in_array($fileType, $allowedTypes) && $fileSize <= $sizeLimit) {
                
            
            //$distFilename = $currFile["name"];
            $distFilename =  time() . ".{$extension}";
            
            if ($distDir != null) {
                $distFinal = $distDir . "/" . $distFilename;
            } else {
                $distFinal = $distFilename;
            }
                
            move_uploaded_file($currFile["tmp_name"], $distFinal);
            
                
            //echo "The filename uploaded is {$distFilename} <br />";
            return $distFilename;
            
            
        } else {
            echo "Invalid file.";
        }
    }       
}

function updateImage($con,$sl_id,$slider_filename,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateImage($con,$sl_id,$slider_filename,$updatedAt);
    }

    return $userList;
}

function getSliderTime($con){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSliderTime($con);
    }

    return $userList;
}

function callSliderDate() {
        $con = open_connection();
        $slider =  getSliderTime($con);
        
        
        
        foreach($slider as $eachslider) {
            $newtime = $eachslider["updatedAt"];
            $user_tz = 'Asia/Singapore';


            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('H:i  d/m/Y');

            echo $newtime;
            
            }
}
?>