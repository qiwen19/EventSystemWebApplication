<?php

require_once 'dbAdmin.php';

function getAdmin($con, $adm_id, $status){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAdmin($con, $adm_id, $status);
    }

    return $userList;
}

function getAdminbyID($con, $adm_id){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAdminbyID($con, $adm_id);
    }

    return $userList;
}

function getLoginAccount($con,$email,$password){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbGetLoginAccount($con,$email,$password);
    }
    return $userList;
}

function createNewAdmin($con, $adm_name,$email,$password,$contact_no,$country_no,$createdAt,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbCreateNewAdmin($con, $adm_name,$email,$password,$contact_no,$country_no,$createdAt,$updatedAt);
    }

    return $userList;
}

function updateAdmin($con,$adm_id,$adm_name,$email,$contact_no,$country_no,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateAdmin($con,$adm_id,$adm_name,$email,$contact_no,$country_no,$updatedAt);
    }

    return $userList;
}

function deleteAdmin($con,$status,$adm_id,$updatedAt){
    $userList = [];
    
    $con = open_connection();

    if($con){
        $userList = dbDeleteAdmin($con,$status,$adm_id,$updatedAt);
        close_connection($con);
    }

    return $userList;
}

function callAdminName() {
        $name = "";
        foreach($_SESSION as $userinfo){
            foreach($userinfo as $adminfo){
            $name = $adminfo["adm_name"];
            echo $name;
        }
        }
}
function callAdminid() {
        $adminid = "";
        foreach($_SESSION as $userinfo){
            foreach($userinfo as $adminfo){
            $adminid = $adminfo["adm_id"];
           echo $adminid;
        }
        }
}

function changePassword($con,$email,$oldpassword,$newpassword,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbchangePassword($con,$email,$oldpassword,$newpassword,$updatedAt);
    }

    return $userList;
}

function getAdminTime($con){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetAdminTime($con);
    }

    return $userList;
}

function callAdminDate() {
        $con = open_connection();
        $admin = getAdminTime($con);
        
        
        
        foreach($admin as $eachadmin) {
            $newtime = $eachadmin["updatedAt"];
            $user_tz = 'Asia/Singapore';


            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('H:i  d/m/Y');

            echo $newtime;
            
            }
}

?>