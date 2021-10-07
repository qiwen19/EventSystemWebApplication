<?php

require_once 'dbConnection.php';

function dbGetFooter($con, $ft_id,$status, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM footers ".
              "WHERE ft_id = '{$ft_id}' AND status = '{$status}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}


//function dbUpdateFooter($con,$ft_id,$adm_id,$address,$of_contact_no,$of_country_no,$hp_contact_no,$hp_country_no,$facebook_url,$youtube_url,$instagram_url,$updatedAt,$debug=false){
//
//    $sqlStr = "UPDATE footers ".
//              "SET adm_id = '{$adm_id}' , address = '{$address}' , of_contact_no = '{$of_contact_no}' , of_country_no = '{$of_country_no}',".
//              "hp_contact_no = '{$hp_contact_no}' , hp_country_no = '{$hp_country_no}',facebook_url = '{$facebook_url}',".
//              "youtube_url = '{$youtube_url}',instagram_url = '{$instagram_url}',updatedAt = '{$updatedAt}'".
//              "WHERE ft_id = '{$ft_id}'";
//
//  if (query($con, $sqlStr, $debug)) {
//        return mysqli_insert_id($con);
//    } else {
//        return false;
//    }
//}

function dbUpdateFooter($con,$ft_id,$adm_id,$address,$of_contact_no,$of_country_no,$hp_contact_no,$hp_country_no,$facebook_url,$youtube_url,$instagram_url,$updatedAt,$debug=false){

$message1= "Footer Updated ";
$message2= "No Change Occurred.";

    $sqlStr = "UPDATE footers ".
              "SET adm_id = '{$adm_id}' , address = '{$address}' , of_contact_no = '{$of_contact_no}' , of_country_no = '{$of_country_no}',".
              "hp_contact_no = '{$hp_contact_no}' , hp_country_no = '{$hp_country_no}',facebook_url = '{$facebook_url}',".
              "youtube_url = '{$youtube_url}',instagram_url = '{$instagram_url}',updatedAt = '{$updatedAt}'".
              "WHERE ft_id = '{$ft_id}'";
           
  $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editweb.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editweb.php'</script>";  
 
}
}


?>