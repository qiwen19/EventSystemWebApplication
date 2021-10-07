<?php

require_once '../includes/db/guildCtrl.php';
$con = open_connection();

if(isset($_POST['guild'])){
    $guild = $_POST['guild'];
    
    $checkdata = "SELECT gu_name FROM guilds WHERE gu_name = '$guild'";
    $query = mysqli_fetch_array(mysqli_query($con,$checkdata));

 if(count($query)>0){
  echo '<p style="color: red; font-weight: bold;">Guild Name Already Exist</p>';
 }else{
  echo '<p style="color: #7CFC00; font-weight: bold;">Guild Name can be assigned</p>';
 }
 exit();
}
 
?>
