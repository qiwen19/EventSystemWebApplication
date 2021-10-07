<?php
require_once '../includes/db/checkLoginStatus.php';
require_once '../includes/db/gameCtrl.php';
require_once '../includes/db/attendanceCtrl.php';

$attendingGames = getAttendingGames($con,$session_urid);

$current_time = date("Y-m-d H:i:s"); //current time not accurate, need to plus 7hrs

foreach($attendingGames as $attendingGamesData){
    echo"<pre>";
print_r($attendingGamesData);
echo"</pre>";
    $game_id = $attendingGamesData['ga_id'];
    $attendingName = $attendingGamesData['ga_name'];
    $attendingDate= $attendingGamesData['datetime']; //need confirm again, changed manually
    $attendingHost = $attendingGamesData['in_game_name'];
    $attendingRules = $attendingGamesData['rules_pdf'];
    $attending = getAttendingNumber($con, $game_id);
    $attendingNo = "";
    
    if($attendingDate >= $current_time){
    foreach($attending as $data){
        $attendingNo = $data['no_attendance'];
    }
    echo"<tr>";
    echo "<td>".$attendingName."</td>";
    echo "<td>".$attendingDate."</td>";
    echo "<td>".$attendingHost."</td>";
    echo"<td>".$attendingNo."</td>";
    echo "<td><button type='button' class='btn btn-danger btn-xs'>QUIT GAME</td>";
    echo "</tr>";
//    echo "<td>"
//    . "<button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal".array_values($attendingGamesData)[0]."'>Join</button>"
//    . "<div class='modal fade' id='myModal".array_values($attendingGamesData)[0]."' role='dialog' style='color : black'>"
//    . "<div class='modal-dialog'>"
//    . "  <div class='modal-content'>"
//    . "    <div class='modal-header'>"
//    . "      <button type='button' class='close' data-dismiss='modal'>&times;</button>"
//    . "      <h4 class='modal-title'>Game Name: ".$attendingName."</h4>"
//    . "    </div>"
//    . "    <div class='modal-body'>"
//    . "      <p>Date and Time: ".$attendingDate."</p><p>Host: ".$attendingHost."</p><p>Number of Attendees: ".$attendingNo."</p>Rules: </br><img src='".$attendingRules."' alt='rules_pdf' style='width: 100%;' />"
//    . "    </div>"
//    . "    <div class='modal-footer'>"
//    . "      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>"
//    . "    </div>"
//    . "  </div>"
//    . "</div></div></td>";
} else{
    echo"<tr>";
    echo "<td>-No record-</td>";
    echo "<td>-No record-</td>";
    echo "<td>-No record-</td>";
    echo "<td>-No record-</td>";
    echo "<td>-No record-</td>";
    echo"<tr>";
}
}

