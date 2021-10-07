<?php

require_once 'dbAttendance.php';
require_once 'dbGames.php';

function getWins($con, $ur_id, $ga_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetWins($con, $ur_id, $ga_id);
    }

    return $userList;
}

function getAttendingNumber($con, $ga_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAttendingNumber($con, $ga_id);
    }

    return $userList;
}

function getNewAttendance($con,$gt_id,$status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetNewAttendance($con,$gt_id,$status);
    }

    return $userList;
}

function getAttendance($con,$ga_id,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAttendance($con,$ga_id,$ur_id);
    }

    return $userList;
}

function createNewAttendance($con,$ga_id,$attendance_status,$session_urid,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewAttendance($con,$ga_id,$attendance_status,$session_urid,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateAttendance($con,$gt_id,$wins,$attendance_status,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateAttendance($con,$gt_id,$wins,$attendance_status,$updatedAt);
    }

    return $userList;
}

function deleteAttendance($con,$ga_id,$ur_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteAttendance($con,$ga_id,$ur_id);
        close_connection($con);
    }

    return $userList;
}

function kickMember($con,$ga_id,$ur_id){
    
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbkickMember($con,$ga_id,$ur_id);
        close_connection($con);
    }

    return $userList;
    
}


function updateAttendanceStatus($con,$attendance_status,$ga_id,$ur_id,$updatedAt){ //new
    
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbUpdateAttendanceStatus($con,$attendance_status,$ga_id,$ur_id,$updatedAt);
        close_connection($con);
    }

    return $userList;
    
}     
?>