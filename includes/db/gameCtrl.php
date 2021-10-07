<?php

require_once 'dbGames.php';

function getGamesById($con,$ga_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetGamesById($con,$ga_id);
    }

    return $userList;
}

function getNewGames($con){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetNewGames($con);
    }

    return $userList;
}

function getPastGames($con,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetPastGames($con,$ur_id);
    }

    return $userList;
}

function getDraftGames($con,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetDraftGames($con,$ur_id);
    }

    return $userList;
}

function getAttendingGames($con,$ur_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAttendingGames($con,$ur_id);
    }

    return $userList;
}

function updateGamesStatus($con,$ga_status,$updatedAt,$ga_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateGamesStatus($con,$ga_status,$updatedAt,$ga_id);
    }

    return $userList;
}

function gamesDisplay($con,$ga_status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGamesDisplay($con,$ga_status);
    }

    return $userList;
}

function userGamesDisplay($con,$ga_id, $ga_status){ //new
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUserGameDisplay($con,$ga_id,$ga_status);
    }

    return $userList;
}

function createNewGames($con,$host_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$session_urid,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewGames($con,$host_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$session_urid,$createdAt,$updatedAt);
    }

    return $userList;
}
//newwwwwwwww
function createAsDraft($con,$host_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$session_urid,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateAsDraft($con,$host_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$session_urid,$createdAt,$updatedAt);
    }

    return $userList;
}
//changed
function updateGamesInfo($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateGamesInfo($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt);
    }

    return $userList;
}
//changed
function updateGamesInfoNoPdf($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateGamesInfoNoPdf($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$updatedAt);
    }

    return $userList;
}

function updateGamesInfoDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateGamesInfoDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt);
    }

    return $userList;
}
//changed
function updateGamesInfoNoPdfDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$session_urid,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateGamesInfoNoPdfDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$session_urid,$updatedAt);
    }

    return $userList;
}

function deleteGames($con,$ga_status,$updatedAt,$ga_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteGames($con,$ga_status,$updatedAt,$ga_id);
        close_connection($con);
    }

    return $userList;
}

function deleteAllAttendance($con,$ga_id){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteAllAttendance($con,$ga_id);
        close_connection($con);
    }

    return $userList;
}

function getGameMembers($con,$ga_id,$ga_status){  //new
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbGameMember($con,$ga_id,$ga_status);
        close_connection($con);
    }

    return $userList;
}

function currentTime() {

        $newtime = date('Y-m-d H:i:s');

            $user_tz = 'Asia/Singapore';
            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('H:i:s');

         echo $newtime;
}

function currentDate() {

        $newtime = date('Y-m-d H:i:s');

            $user_tz = 'Asia/Singapore';
            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('Y-m-d');
            


}

function currentDateTime() {

        $newtime = date('Y-m-d H:i:s');

            $user_tz = 'Asia/Singapore';
            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('Y-m-d H:i:s');
            
            return $newtime;

}

?>