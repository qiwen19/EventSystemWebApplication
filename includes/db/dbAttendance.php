<?php
require_once 'dbConnection.php';
//include_once 'checkLoginStatus.php';
//$session_urid = $userData['ur_id'];

function dbGetWins($con, $ur_id, $ga_id,$debug=false){
    $sqlStr = "SELECT wins "
              . "FROM game_attendances "
              . "WHERE ur_id='{$ur_id}' AND ga_id='{$ga_id}'";
    
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetAttendingNumber($con, $ga_id,$debug=false){
    $sqlStr =   "SELECT COUNT(ga_id) "
                . "AS no_attendance "
                . "FROM game_attendances "
                . "WHERE ga_id = '{$ga_id}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetNewAttendance($con,$gt_id,$status,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM game_attendances ".
              "WHERE gt_id = '{$gt_id}' AND status='{$status}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetAttendance($con,$ga_id,$ur_id,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM game_attendances ".
              "WHERE ga_id = {$ga_id} AND ur_id = '{$ur_id}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}


function dbCreateNewAttendance($con,$ga_id,$ur_id,$wins,$attendance_status,$createdAt,$updatedAt,$debug=false){

    $sqlStr = "INSERT INTO game_attendances (ga_id,ur_id,wins,attendance_status,createdAt,updatedAt) ".
              "VALUES ('{$ga_id}','{$ur_id}','{$wins}','{$attendance_status}','{$createdAt}','{$updatedAt}')";


    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        //header('Location: usergames.php');
        header('Location: ../users/userListGameInfo.php?id='.$ga_id);
    }
}

function dbUpdateAttendance($con,$gt_id,$wins,$attendance_status,$updatedAt,$debug=false){

    $sqlStr = "UPDATE game_attendances ".
              "SET wins = '{$wins}',attendance_status = '{$attendance_status}', updatedAt = '{$updatedAt}'".
              "WHERE gt_id = '{$gt_id}'";

  if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbDeleteAttendance($con,$ga_id,$ur_id,$debug=false){

    $sqlStr = "DELETE FROM game_attendances ".
              "WHERE ga_id = '{$ga_id}' AND ur_id = '{$ur_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        //header('Location: usergames.php');
        header('Location: ../users/usergames.php');
    } 
}


function dbkickMember($con,$ga_id,$ur_id,$debug=false){

    $sqlStr = "DELETE FROM game_attendances ".
              "WHERE ga_id = '{$ga_id}' AND ur_id = '{$ur_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        //header('Location: usergames.php');
        header('Location: ../users/userListGameInfo.php?id='.$ga_id);
    } 
}

function dbUpdateAttendanceStatus($con,$attendance_status,$ga_id,$ur_id,$updatedAt,$debug=false){ //new

    $sqlStr = "UPDATE game_attendances ".
              "SET attendance_status = '{$attendance_status}', updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}' AND ur_id = '{$ur_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        //header('Location: usergames.php');
        header('Location: ../users/userListGameInfo.php?id='.$ga_id);
    } 
}
?>