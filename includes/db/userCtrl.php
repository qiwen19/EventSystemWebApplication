<?php

require_once 'dbUser.php';

function getNewUser($con,$status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetNewUser($con,$status);
    }

    return $userList;
}

function getUser($con){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetUser($con);
    }

    return $userList;
}


function getUserbyID($con,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetUserbyID($con,$ur_id);
    }

    return $userList;
}

function getUserbyIGN($con,$in_game_name){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetUserbyIGN($con,$in_game_name);
    }

    return $userList;
}

function createNewUser($con,$in_game_name,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewUser($con,$in_game_name,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateProfile($con,$in_game_name,$bio,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateProfile($con,$in_game_name,$bio,$ur_id);
    }

    return $userList;
}

function BanUser($con,$status,$updatedAt,$ur_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbBanUser($con,$status,$updatedAt,$ur_id);
        close_connection($con);
    }

    return $userList;
}

function UnBanUser($con,$status,$updatedAt,$ur_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbUnBanUser($con,$status,$updatedAt,$ur_id);
        close_connection($con);
    }

    return $userList;
}

function random_ign( $length = 20 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $name = substr( str_shuffle( $chars ), 0, $length );
    return $name;
}


function callUserDate($ur_id) {
        $con = open_connection();
        $user = getUserbyID($con,$ur_id);
        
        
        
        foreach($user as $eachuser) {
            $newtime = $eachuser["createdAt"];
            $user_tz = 'Asia/Singapore';


            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('d/m/Y');

            echo $newtime;
            
            }
}

function callUserDateDash($ur_id) {
        $con = open_connection();
        $user = getUserbyID($con,$ur_id);
        
        
        
        foreach($user as $eachuser) {
            $newtime = $eachuser["createdAt"];
            $user_tz = 'Asia/Singapore';


            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('H:i d/m/Y');

            echo $newtime;
            
            }
}

?>