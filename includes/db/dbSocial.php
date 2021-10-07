<?php

require_once 'dbConnection.php';

function dbGetSocial($con, $ur_id, $debug=false){

    $sqlStr = "SELECT users.in_game_name,users.picture,social_medias.social_media_type,social_medias.social_media_url ".
              "FROM social_medias ".
              "INNER JOIN users ".
              "ON social_medias.ur_id = users.ur_id ".
              "WHERE users.ur_id = '{$ur_id}'";
              
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetSocialIg($con, $ur_id, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM social_medias ".
              "WHERE ur_id = '{$ur_id}' AND social_media_type = 'Instagram' ";
              
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetSocialTw($con, $ur_id, $debug=false){

    $sqlStr = "SELECT * ".
              "FROM social_medias ".
              "WHERE ur_id = '{$ur_id}' AND social_media_type = 'Twitter' ";
              
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
} 

function dbCreateNewSocialTw($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt, $debug=false){

    $sqlStr = "INSERT INTO social_medias (ur_id,social_media_type,social_media_url,createdAt,updatedAt) ".
              "VALUES ('{$ur_id}','{$social_media_type}','{$social_media_url}','{$createdAt}','{$updatedAt}')";

    if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbUpdateSocialTw($con,$social_media_type,$social_media_url,$ur_id,$updatedAt, $debug=false){

    $sqlStr = "UPDATE social_medias ".
              "SET social_media_url = '{$social_media_url}' ,updatedAt = '{$updatedAt}'".
              "WHERE ur_id = '{$ur_id}' and social_media_type = '{$social_media_type}'";

  if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbCreateNewSocialIg($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt, $debug=false){

    $sqlStr = "INSERT INTO social_medias (ur_id,social_media_type,social_media_url,createdAt,updatedAt) ".
              "VALUES ('{$ur_id}','{$social_media_type}','{$social_media_url}','{$createdAt}','{$updatedAt}')";

    if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbUpdateSocialIg($con,$social_media_type,$social_media_url,$ur_id,$updatedAt, $debug=false){

    $sqlStr = "UPDATE social_medias ".
              "SET social_media_url = '{$social_media_url}' ,updatedAt = '{$updatedAt}'".
              "WHERE ur_id = '{$ur_id}' and social_media_type = '{$social_media_type}'";

  if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbDeleteSocial($con,$status,$sm_id,$updatedAt, $debug=false){

    $sqlStr = "UPDATE social_medias ".
              "SET status = '{$status}' ,updatedAt = '{$updatedAt}'".
              "WHERE sm_id = '{$sm_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

?>