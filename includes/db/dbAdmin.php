<?php

require_once 'dbConnection.php';

function dbGetAdmin($con, $adm_id, $status, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM admins ".
              "WHERE adm_id = '{$adm_id}' AND status='{$status}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}
function dbGetAdminbyID($con,$adm_id, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM admins ".
              "WHERE adm_id='{$adm_id}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetLoginAccount($con, $email, $password, $debug=false) {

    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $sqlStr = "SELECT * ".
            "FROM admins ".
            "WHERE email='{$email}' AND " .
            //for encryption
            "password=AES_ENCRYPT('{$password}','". DB_SALT . "')";
            //"password='{$password}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbCreateNewAdmin($con, $adm_name,$email,$password,$contact_no,$country_no,$createdAt,$updatedAt,$debug=false){

    $message1= "Admin Added ";
    $message2= "No Change Occurred.";
    
    $sqlStr = "INSERT INTO admins (adm_name,email,password,contact_no,country_no,createdAt,updatedAt) ".
              "VALUES ('{$adm_name}','{$email}',"."AES_ENCRYPT('{$password}','".DB_SALT."')".
               ",'{$contact_no}','{$country_no}','{$createdAt}','{$updatedAt}')";

    $result = mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editweb.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editweb.php'</script>";  
 
}
}

function dbUpdateAdmin($con,$adm_id,$adm_name,$email,$contact_no,$country_no,$updatedAt,$debug=false){

    $message1= "Admin Updated ";
    $message2= "No Change Occurred.";

    $sqlStr = "UPDATE admins ".
              "SET adm_name = '{$adm_name}',email = '{$email}' , contact_no = '{$contact_no}' , country_no = '{$country_no}',".
              "updatedAt = '{$updatedAt}'".
              "WHERE adm_id = '{$adm_id}'";
              
$result=mysqli_query($con, $sqlStr);

if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
                  . "window.location ='../admin/editweb.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2');"
              . "window.location ='../admin/editweb.php'</script>";  
 
}  
}

function dbDeleteAdmin($con,$status,$adm_id,$updatedAt,$debug=false){

    $sqlStr = "UPDATE admins ".
              "SET status = '{$status}' ,updatedAt = '{$updatedAt}'".
              "WHERE adm_id = '{$adm_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbchangePassword($con,$email,$oldpassword,$newpassword,$updatedAt){
    
$message1= "Password Changed ! )";
$message2= "Password wasnt changed.";

 $sqlStr = "UPDATE admins SET email='$email',password= AES_ENCRYPT('$newpassword', '" . DB_SALT . "'),updatedAt = '{$updatedAt}'" .
            " WHERE email='$email' and password= AES_ENCRYPT('$oldpassword', '" . DB_SALT . "')";
           
                 
$result=mysqli_query($con, $sqlStr);
  
  if (mysqli_affected_rows($con) > 0) {
      echo "<script type='text/javascript'>alert('$message1');"
              . "window.location ='logoutHandle.php'</script>";

  }else{
          echo "<script type='text/javascript'>alert('$message2.');"
              . "window.location ='editweb.php'</script>";  
 
}
}


function dbGetAdminTime($con,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM admins ".
              "ORDER BY updatedAT DESC LIMIT 1";
              

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

?>