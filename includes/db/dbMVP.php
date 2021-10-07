<?php

require_once 'dbConnection.php';

function dbGetMvp($con, $mvp_id, $status, $debug=false){

    $sqlStr = "SELECT users.in_game_name,users.picture,mvps.mvp_description ".
              "FROM mvps ".
              "INNER JOIN users ".
              "ON mvps.ur_id = users.ur_id ".
              "WHERE mvp_id = '{$mvp_id}' AND mvps.status='{$status}'";
              
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbCreateNewMvp($con,$ur_id,$mvp_description,$createdAt,$updatedAt, $debug=false){

    $sqlStr = "INSERT INTO mvps (ur_id,mvp_description,createdAt,updatedAt) ".
              "VALUES ('{$ur_id}','{$mvp_description}','{$createdAt}','{$updatedAt}')";

    if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbUpdateMvp($con,$mvp_id,$ur_id,$mvp_description,$updatedAt, $debug=false){

    $sqlStr = "UPDATE mvps ".
              "SET ur_id = '{$ur_id}', mvp_description = '{$mvp_description}',updatedAt = '{$updatedAt}' ".
              "WHERE mvp_id = '{$mvp_id}'";

  if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbDeleteMvp($con,$status,$mvp_id,$updatedAt, $debug=false){

    $sqlStr = "UPDATE mvps ".
              "SET status = '{$status}',updatedAt = '{$updatedAt}' ".
              "WHERE mvp_id = '{$mvp_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

?>