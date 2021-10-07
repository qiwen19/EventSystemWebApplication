<?php

require_once 'dbFooter.php';
   
function getFooter($con, $ft_id,$status ){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbGetFooter($con, $ft_id,$status);
    }

    return $userList;
}

function updateFooter($con,$ft_id,$adm_id,$address,$of_contact_no,$of_country_no,$hp_contact_no,$hp_country_no,$facebook_url,$youtube_url,$instagram_url,$updatedAt){
    $userList = [];

    $con = open_connection();

    if($con){
        $userList = dbUpdateFooter($con,$ft_id,$adm_id,$address,$of_contact_no,$of_country_no,$hp_contact_no,$hp_country_no,$facebook_url,$youtube_url,$instagram_url,$updatedAt);
    }

    return $userList;
}

function callFooterDate() {
        $con = open_connection();
        $footer =  getFooter($con,1,0);
        
        
        
        foreach($footer as $eachfooter) {
            $newtime = $eachfooter["updatedAt"];
            $user_tz = 'Asia/Singapore';


            $schedule_date = new DateTime($newtime, new DateTimeZone($user_tz) );
            $schedule_date->setTimeZone(new DateTimeZone('GMT+15'));
            $newtime =  $schedule_date->format('H:i  d/m/Y');

            echo $newtime;
            
            }
}


?>