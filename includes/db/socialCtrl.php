<?php

require_once 'dbSocial.php';

function getSocial($con, $ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSocial($con, $ur_id);
    }

    return $userList;
}

function getSocialIg($con, $ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSocialIg($con, $ur_id);
    }

    return $userList;
}

function getSocialTw($con, $ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetSocialTw($con, $ur_id);
    }

    return $userList;
}

function createNewSocialTw($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewSocialTw($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateSocialTw($con,$social_media_type,$social_media_url,$ur_id,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateSocialTw($con,$social_media_type,$social_media_url,$ur_id,$updatedAt);
    }

    return $userList;
}

function createNewSocialIg($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewSocialIg($con, $ur_id,$social_media_type,$social_media_url,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateSocialIg($con,$social_media_type,$social_media_url,$ur_id,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateSocialIg($con,$social_media_type,$social_media_url,$ur_id,$updatedAt);
    }

    return $userList;
}

function deleteSocial($con,$status,$updatedAt,$ga_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteSocial($con,$status,$updatedAt,$ga_id);
        close_connection($con);
    }

    return $userList;
}

?>