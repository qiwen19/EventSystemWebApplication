<?php
require_once '../includes/db/checkLoginStatus.php';
require_once '../includes/db/gameCtrl.php';
require_once '../includes/db/attendanceCtrl.php';


$currentGames = gamesDisplay($con,1);
$attendingGames = getAttendingGames($con,$session_urid);

//$game_id = "";
//$createdAt = "";
//$updatedAt = "";
//$now = date("Y-m-d H:i:s");
echo"<pre>";
print_r($currentGames);
echo"</pre>";
foreach($currentGames as $currentGamesData){
    foreach($attendingGames as $abc){

    if($abc['ga_id'] != $game_id){
    $game_id = $currentGamesData['ga_id'];
    $attendingName = $currentGamesData['ga_name'];
    $attendingDate= $currentGamesData['datetime'];
    $attendingHost = $currentGamesData['in_game_name'];
    $attendingRules = $currentGamesData['rules_pdf'];
    $attending = getAttendingNumber($con, $game_id);
    
    
    echo "<tr><td>".$attendingName."</td>";
    echo "<td>".$attendingDate."</td>";
    echo "<td>".$attendingHost."</td>";
   // echo"<td>".$attendingNo."</td>";
    
    $attendingNo = "";
    if($attendingDate >= date("Y-m-d H:i:s")){
    foreach($attending as $data){
    //$attendingNo = $data['no_attendance'];
    }
    
    echo "<td><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#myModal".array_values($currentGamesData)[0]."'>Join</button></td></tr>";
    
    }
    
//    echo "<div class='modal fade' id='myModal".array_values($currentGamesData)[0]."' role='dialog' style='color : black'>"
//    . "<div class='modal-dialog'>"
//    . "  <div class='modal-content'>"
//    . "    <div class='modal-header'>"
//    . "      <button type='button' class='close' data-dismiss='modal'>&times;</button>"
//    . "      <h4 class='modal-title'>Game Name: ".$attendingName."</h4>"
//    . "    </div>"
//    . "    <div class='modal-body'>"
//    . "      <p>Date and Time: ".$attendingDate."</p><p>Host: ".$attendingHost."</p><p>Number of Attendees: ".$attendingNo."</p>Rules: </br><img src='".$attendingRules."' alt='rules_pdf' style='width: 100%;' />"
//    . "    </div>"
//    . "    <div class='modal-footer'>";
//    
//    echo "<button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$game_id-$session_urid' name ='quit'>QUIT GAME</button>";
//    echo "<button type='submit' class='btn btn-warning btn-xs' value='$game_id-$session_urid' name ='join_game'>JOIN GAME</button>";
//    
//    echo "     </div>"
//    . "    </div>"
//    . "</div></div>";
    } else {
        echo "<tr><td>".$attendingName."</td>";
    echo "<td>".$attendingDate."</td>";
    echo "<td>".$attendingHost."</td>";
    echo"<td>".$attendingNo."</td>";
    
    $attendingNo = "";
    if($attendingDate >= date("Y-m-d H:i:s")){
    foreach($attending as $data){
    $attendingNo = $data['no_attendance'];
    }
    
    echo "<td><button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal".array_values($currentGamesData)[0]."'>Quit</button></td></tr>";

//    echo "<div class='modal fade' id='myModal".array_values($currentGamesData)[0]."' role='dialog' style='color : black'>"
//    . "<div class='modal-dialog'>"
//    . "  <div class='modal-content'>"
//    . "    <div class='modal-header'>"
//    . "      <button type='button' class='close' data-dismiss='modal'>&times;</button>"
//    . "      <h4 class='modal-title'>Game Name: ".$attendingName."</h4>"
//    . "    </div>"
//    . "    <div class='modal-body'>"
//    . "      <p>Date and Time: ".$attendingDate."</p><p>Host: ".$attendingHost."</p><p>Number of Attendees: ".$attendingNo."</p>Rules: </br><img src='".$attendingRules."' alt='rules_pdf' style='width: 100%;' />"
//    . "    </div>"
//    . "    <div class='modal-footer'>";
//    
//    echo "<button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$game_id-$session_urid' name ='quit'>QUIT GAME</button>";
//    echo "<button type='submit' class='btn btn-warning btn-xs' value='$game_id-$session_urid' name ='join_game'>JOIN GAME</button>";
//    
//    echo "     </div>"
//    . "    </div>"
//    . "</div></div>";
    
    }    
    }
    }
}
?>