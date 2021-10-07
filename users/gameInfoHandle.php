<?php

include_once '../includes/db/checkLoginStatus.php';
$user_id = $userData['ur_id'];
$updatedAt = date("Y-m-d H:i:s");
$createdAt = date("Y-m-d H:i:s");
//added guildID value in userListGuildInfo.php
require_once '../includes/db/attendanceCtrl.php';
require_once '../includes/db/gameCtrl.php';

$con = open_connection();
//$value = $_GET['value'];
//print_r($value);
if (isset($_POST['join'])) {
    $game_id_join = $_POST['join'];
    createNewAttendance($con, $game_id_join, $user_id, 0, 0, $createdAt, $updatedAt);
} else if (isset($_POST['quit'])) {
    list($game_id_quit, $host_quit) = explode('-', $_POST['quit']);
//    echo $host_quit;
//    echo $userData['in_game_name'];
    if ($host_quit == $userData['in_game_name']) {
        $message = "Host cannot quit game";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>setTimeout(\"location.href = '../users/userListGameInfo.php?id=$game_id_quit';\",0);</script>";
        return false;
    } else {
        echo"yayy";
        deleteAttendance($con,$game_id_quit,$user_id);
    }
} else if (isset($_POST['kickMember'])) { 
    list($game_id_kick, $current_urid_kick) = explode('-', $_POST['kickMember']);
    kickMember($con, $game_id_kick, $current_urid_kick);
    //echo $game_id_kick. $current_urid_kick;
} else if (isset($_POST['deleteGame'])) {
    $game_id_delete = $_POST['deleteGame'];
    deleteGames($con,1,$updatedAt,$game_id_delete);
} else if (isset($_POST['present'])){
    list($game_id_present, $current_urid_absent) = explode('-', $_POST['present']);
    updateAttendanceStatus($con,1,$game_id_present,$current_urid_absent,$updatedAt);
} else if (isset($_POST['absent'])){
    list($game_id_absent, $current_urid_absent) = explode('-', $_POST['absent']);
    updateAttendanceStatus($con,0,$game_id_absent,$current_urid_absent,$updatedAt);
}
?>
