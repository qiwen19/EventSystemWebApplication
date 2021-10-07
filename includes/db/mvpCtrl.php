<?php

require_once 'dbMVP.php';

function getMvp($con, $mvp_id, $status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetMvp($con, $mvp_id, $status);
    }

    return $userList;
}

function createNewMvp($con,$ur_id,$mvp_description,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewMvp($con,$ur_id,$mvp_description,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateMvp($con,$mvp_id,$ur_id,$mvp_description,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateMvp($con,$mvp_id,$ur_id,$mvp_description,$updatedAt);
    }

    return $userList;
}

function deleteMvp($con,$status,$mvp_id,$updatedAt){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteMvp($con,$status,$mvp_id,$updatedAt);
        close_connection($con);
    }

    return $userList;
}

?>