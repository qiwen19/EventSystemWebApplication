<?php

require_once '../includes/db/checkLoginStatus.php';

echo"<pre>";
print_r($userData);
echo"</pre>";

require_once '../includes/db/dbFooter.php';
$allFooterArr = getAllFooter();
echo"<pre>";
print_r($allFooterArr);
echo"</pre>";

require_once '../includes/db/dbGameAttendances.php';
$allGameAttendanceArr = getAllGameAttendance();
echo"<pre>";
print_r($allGameAttendanceArr);
echo"</pre>";

require_once '../includes/db/dbAdmin.php';
$allAdminArr = getAllAdmin();
echo"<pre>";
print_r($allAdminArr);
echo"</pre>";

require_once '../includes/db/dbGames.php';
$allGamesArr = getAttendingGame();
echo"<pre>";
print_r($allGamesArr);
echo"</pre>";

require_once '../includes/db/dbGuild.php';
$allGuildArr = getAllGuild();
echo"<pre>";
print_r($allGuildArr);
echo"</pre>";

require_once '../includes/db/dbSlider.php';
$allSliderArr = getAllSlider();
echo"<pre>";
print_r($allSliderArr);
echo"</pre>";

require_once '../includes/db/dbSocial.php';
$allSocialArr = getAllSocial();
echo"<pre>";
print_r($allSocialArr);
echo"</pre>";

require_once '../includes/db/dbHost.php';
$allHostArr = getAllHost();
echo"<pre>";
print_r($allHostArr);
echo"</pre>";


   // echo $allHostArr[in_game_name];



?>