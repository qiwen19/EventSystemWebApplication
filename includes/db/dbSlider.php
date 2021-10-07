<?php

require_once 'dbConnection.php';

function dbGetSlider($con, $status, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM sliders ".
              "WHERE status='{$status}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbCreateNewSlider($con, $adm_id,$slider_filename,$slider_title,$slider_description,$createdAt,$updatedAt, $debug=false){

    $message1= "New Slider Added ";
    $message2= "No Change Occurred.";
    
    $sqlStr = "INSERT INTO sliders (adm_id,slider_filename,slider_title,slider_description,createdAt,updatedAt) ".
              "VALUES ('{$adm_id}','{$slider_filename}','{$slider_title}','{$slider_description}','{$createdAt}','{$updatedAt}')";

  $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editSlider.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editSlider.php'</script>";  
 
}
}

function dbUpdateSlider($con,$sl_id,$slider_filename,$slider_title,$slider_description,$updatedAt,$debug=false){
    
    $message1= "Slider Updated ";
    $message2= "No Change Occurred.";

    $sqlStr = "UPDATE sliders ".
              "SET slider_filename = '{$slider_filename}',slider_title = '{$slider_title}',slider_description = '{$slider_description}',".
              "updatedAt = '{$updatedAt}' ".
              "WHERE sl_id = '{$sl_id}'";

  $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editSlider.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editSlider.php'</script>";  
 
}
    
}

function dbDeleteSlider($con,$status,$sl_id,$updatedAt, $debug=false){
    
    $message1= "Slider Deleted ";
    $message2= "No Change Occurred.";

    $sqlStr = "UPDATE sliders ".
              "SET status = '{$status}',updatedAt = '{$updatedAt}' ".
              "WHERE sl_id = '{$sl_id}'";

  $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editSlider.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editSlider.php'</script>";  
 
}
}
function dbGetSliderbyID($con,$sl_id, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM sliders ".
              "WHERE sl_id='{$sl_id}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbUpdateImage($con,$sl_id,$slider_filename,$updatedAt,$debug=false){
    
    $message1= "Slider Image Updated ";
    $message2= "No Change Occurred.";

    $sqlStr = "UPDATE sliders ".
              "SET slider_filename = '{$slider_filename}',".
              "updatedAt = '{$updatedAt}' ".
              "WHERE sl_id = '{$sl_id}'";

  $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editSlider.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editSlider.php'</script>";  
 
}
    
}

function dbGetSliderTime($con,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM sliders ".
              "ORDER BY updatedAT DESC LIMIT 1";
              

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}
?>