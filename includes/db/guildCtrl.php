<?php

require_once 'dbGuild.php';
//$session_urid = $userData['ur_id'];

function getUserGuild($con, $status, $session_urid) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetUserGuild($con, $status, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function getAllUsersGuild($con, $status, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetAllUsersGuild($con, $status, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function updateUser($con, $gu_id, $session_urid) {
    //global $session_urid;
    
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbUpdateUser($con, $gu_id, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function getJoinedGuild($con, $status, $ur_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbJoinedGuild($con, $status, $ur_id);
        close_connection($con);
    }

    return $userList;
}

function joinedGuildLeader($con, $gu_id, $gu_status) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbJoinedGuildLeader($con, $gu_id, $gu_status);
        close_connection($con);
    }

    return $userList;
}

function getCurrentGuild($con, $status, $gu_status) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetCurrentGuilds($con, $status, $gu_status);
        close_connection($con);
    }

    return $userList;
}

function countMember($con, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbcountMember($con, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function getGuildMember($con, $status, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGuildMember($con, $status, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function displayUserGuild($con, $status, $session_urid) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbDisplayUserGuild($con, $status, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function getGuild($con, $status) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetGuild($con, $status);
        close_connection($con);
    }

    return $userList;
}

function getUsersGuild($con, $status, $gu_id){
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetUsersGuild($con, $status, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function createNewGuild($con, $gu_name, $description, $gu_profile_filename, $session_urid, $createdAt, $updatedAt) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbCreateNewGuild($con, $gu_name, $description, $gu_profile_filename, $session_urid, $createdAt, $updatedAt);
        close_connection($con);
    }

    return $userList;
}

function updateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbUpdateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt);
        close_connection($con);
    }

    return $userList;
}

function adminUpdateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbAdminUpdateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt);
        close_connection($con);
    }

    return $userList;
}

//for guildInfoHandle
function joinGuild($con, $status, $gu_id, $session_urid) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbJoinGuild($con, $status, $gu_id, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function cancelPending($con, $status, $session_urid) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbCancelPending($con, $status, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function countGuildLeader($con, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbcountLeader($con, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function displayPendingReq($con, $status, $gu_id){
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbDisplayPendingReq($con, $status, $gu_id);
        close_connection($con);
    } 

    return $userList;
}

function quitGuild($con, $status, $session_urid) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbQuitGuild($con, $status, $session_urid);
        close_connection($con);
    }

    return $userList;
}

function promoLeader($con, $status, $ur_id, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbPromoLeader($con, $status, $ur_id, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function promoCoLeader($con, $status, $ur_id, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbPromoCoLeader($con, $status, $ur_id, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function kickMember($con, $status, $ur_id, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbKickMember($con, $status, $ur_id, $gu_id);
        close_connection($con);
    }

    return $userList;
}

function deleteGuild($con, $status, $gu_id, $updatedAt) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbDeleteGuild($con, $status, $gu_id, $updatedAt);
        close_connection($con);
    }

    return $userList;
}

function adminDeleteGuild($con, $status, $gu_id, $updatedAt) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbAdminDeleteGuild($con, $status, $gu_id, $updatedAt);
        close_connection($con);
    }

    return $userList;
}

function acceptPendingReq($con, $status, $ur_id, $gu_id) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbAcceptPendingReq($con, $status, $ur_id, $gu_id);
        close_connection($con);
    }

    return $userList;
}

//new start
function getAllGuild($con, $status) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetAllGuild($con, $status);
        close_connection($con);
    }

    return $userList;
}

function getGuildByName($con, $gu_name) {
    $userList = [];

    $con = open_connection();

    if ($con) {
        $userList = dbGetGuildByName($con, $gu_name);
        close_connection($con);
    }

    return $userList;
}
//end

?>