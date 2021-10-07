<?php

include_once 'checkLoginStatus.php';
$session_urid = $userData['ur_id'];
$updatedAt = date("Y-m-d H:i:s");
//added guildID value in userListGuildInfo.php

require_once 'guildCtrl.php';
$con = open_connection();

if (isset($_POST['join'])) {
    if ($userData['gu_id'] == "") {
        $guild_id_join = $_POST['join'];
        joinGuild($con, 0, $guild_id_join, $session_urid);
    } else {
        $message = "You can only join one guild at a time. Please quit existing guild before proceeding";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>setTimeout(\"location.href = '../../users/userguilds.php';\",0);</script>";
        return false;
    }
} else if (isset($_POST['pending'])) {
    cancelPending($con, 0, $session_urid);
} else if (isset($_POST['quit'])) {
    list($guid_quit,$numOfLeader_quit) = explode('-', $_POST['quit']);
    if(($numOfLeader_quit<2) && ($userData['gu_status'] == '4')){
        $message = "Please assign another leader before leaving the guild!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>setTimeout(\"location.href = '../../users/userListGuildInfo.php?id=$guid_quit';\",0);</script>";
        return false;  
    }else{
        quitGuild($con, $status);
    }
} else if (isset($_POST['promoLeader'])) {
    list($urid_leader,$guid_leader) = explode('-', $_POST['promoLeader']);
    promoLeader($con, 0, $urid_leader, $guid_leader);
} else if (isset($_POST['promoCoLeader'])) {
    list($urid_coLeader,$guid_coLeader) = explode('-', $_POST['promoCoLeader']);
    promoCoLeader($con, 0, $urid_coLeader, $guid_coLeader);
} else if (isset($_POST['kickMember'])) {
    list($urid_kick,$guid_kick) = explode('-', $_POST['kickMember']);
    kickMember($con, 0, $urid_kick, $guid_kick);
} else if (isset($_POST['delete'])){
    $guild_id_delete = $_POST['delete'];
    deleteGuild($con, 1, $guild_id_delete, $updatedAt);
} else if (isset($_POST['accepted'])){
    list($urid_accepted,$guid_accepted) = explode('-', $_POST['accepted']);
    echo $urid_accepted;
    echo $guid_accepted;
    acceptPendingReq($con, 0, $urid_accepted, $guid_accepted);
} else if (isset($_POST['declined'])){
    list($urid_declined,$guid_declined) = explode('-', $_POST['declined']);
    echo $urid_declined;
    echo $guid_declined;
    kickMember($con, 0, $urid_declined, $guid_declined);
}
?>
