<?php

require_once 'dbConnection.php';

function dbGetNewUser($con,$status,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM users ".
              "WHERE status='{$status}'".
              "ORDER BY createdAt DESC ".
              "LIMIT 10";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetUser($con,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM users ".
            "ORDER BY createdAt DESC ";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetUserbyID($con,$ur_id,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM users ".
              "WHERE ur_id = '{$ur_id}'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetUserbyIGN($con,$in_game_name,$debug=false){

    $sqlStr = "SELECT * ".
              "FROM users ".
              "WHERE in_game_name = '{$in_game_name}' AND status = '0'";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbCreateNewUser($con,$in_game_name,$createdAt,$updatedAt,$debug=false){

    $sqlStr = "INSERT INTO users (in_game_name,createdAt,updatedAt) ".
              "VALUES ('{$in_game_name}','{$createdAt}','{$updatedAt}')";

    if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbUpdateProfile($con,$in_game_name,$bio,$ur_id,$debug=false){

    $sqlStr = "UPDATE users ".
              "SET in_game_name = '{$in_game_name}',bio = '{$bio}'".
              "WHERE ur_id = '{$ur_id}'";

  if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbBanUser($con,$status,$updatedAt,$ur_id,$debug=false){

    $sqlStr = "UPDATE users ".
              "SET status = '{$status}', updatedAt = '{$updatedAt}'".
              "WHERE ur_id = '{$ur_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbUnBanUser($con,$status,$updatedAt,$ur_id,$debug=false){

    $sqlStr = "UPDATE users ".
              "SET status = '{$status}', updatedAt = '{$updatedAt}'".
              "WHERE ur_id = '{$ur_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}


?>