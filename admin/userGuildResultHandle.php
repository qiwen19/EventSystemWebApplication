<?php
        require_once '../includes/db/guildCtrl.php'; 
        
$con = open_connection();
$search = $_GET['search'];


$showguild = getGuildByName($con, $search);

if($showguild != null){
foreach($showguild as $guildinfo){
    $gu_id = $guildinfo['gu_id'];
header("Location: ../users/userListGuildInfo.php?id= {$gu_id}");
     }

}else{
    echo "<script type='text/javascript'>alert('Guild Not Found');"
                  . "window.location ='../admin/adminhomepage.php'</script>";
}


?>