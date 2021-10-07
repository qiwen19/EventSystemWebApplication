<?php
require_once 'dbfunction.php';
require_once 'dbGames.php';
include_once 'checkLoginStatus.php';

$allAttendGameArr = getAttendingGame();
foreach($allAttendGameArr as $attGameArr){
    $hostID = $attGameArr['host_id'];
}

$session_urid = $userData['ur_id'];

//attending game - host name
function getSpecificHost(){
    global $connection;
    global $session_urid;
    global $hostID;
    
    $resultArr = [];
    $sqlStr = "SELECT u.in_game_name FROM users u, games ga WHERE u.ur_id = ga.host_id AND ga.host_id = '{$hostID}';";

        $result = mysqli_query($connection, $sqlStr);
    
    if($result){
        while($currentRecord = mysqli_fetch_array($result)){
            $resultArr[] = $currentRecord;
        }
    }   
    return $resultArr;
}

//current games host name
function getAllHost(){
    global $connection;

    
    $resultArr = [];
    $sqlStr = "SELECT u.in_game_name FROM users u, games ga WHERE u.ur_id = ga.host_id;";

        $result = mysqli_query($connection, $sqlStr);
    
    if($result){
        while($currentRecord = mysqli_fetch_array($result)){
            $resultArr[] = $currentRecord;
        }
    }   
    return $resultArr;
}

?>