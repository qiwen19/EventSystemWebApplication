<?php
require_once '../includes/db/socialCtrl.php';
require_once '../includes/db/checkLoginStatus.php';

$con = open_connection();
$ur_id = $userData['ur_id'];
$in_game_name = $_POST['in_game_name'];
$bio = $_POST['bio'];
$twitter = "http://twitter.com/".$_POST['twitter'];
$instagram = "http://instagram.com/".$_POST['instagram'];
$createdAt = date("Y-m-d H:i:s");
$updatedAt = date("Y-m-d H:i:s");
$tw = getSocialTw($con, $ur_id);
$ig = getSocialIg($con, $ur_id);
$twur_id = "";
$igur_id = "";
                      

foreach($tw as $twitterData ){
    $twur_id = $twitterData['ur_id'];
    }
                                        
foreach($ig as $instagramData){
    $igur_id = $instagramData['ur_id'];
    }
                 
$updateprofile = updateProfile($con, $in_game_name, $bio, $ur_id);

//loop to see if twitter is already keyed
if($ur_id == $twur_id){
    $updatetwitter = updateSocialTw($con, 'Twitter', $twitter, $ur_id, $updatedAt);
}elseif($ur_id != $twur_id){
    $createtwitter = createNewSocialTw($con, $ur_id, 'Twitter', $twitter, $createdAt, $updatedAt);
}

//loop to see if instagram is already keyed
if($ur_id == $twur_id){
    $updateinstagram = updateSocialIg($con, 'Instagram', $instagram, $ur_id, $updatedAt);
}elseif($ur_id != $twur_id){
    $createinstagram = createNewSocialIg($con, $ur_id, 'Instagram', $instagram, $createdAt, $updatedAt);
}

 header("Location: showUserProfile.php?urid=$ur_id");


?>