<?php
$pastGames = getPastGames($con,$session_urid);

foreach($pastGames as $pastGamesData){
    $game_id = $pastGamesData['ga_id'];
    $pastName = $pastGamesData['ga_name'];
    $pastDate= $pastGamesData['date'];
    $pastHost = $pastGamesData['in_game_name'];
    $attending = getAttendingNumber($con, $game_id);
    $attendingNo = "";
    if($pastDate < date("Y-m-d H:i:s")){
    foreach($attending as $data){
        $attendingNo = $data['no_attendance'];
    }
    $wins = getWins($con, $session_urid, $game_id);
    $winsNo = "";
    foreach($wins as $data){
        $winsNo = $data['wins'];
    }
    echo "<tr><td>".$pastName."</td>";
    echo "<td>".$pastDate."</td>";
    echo "<td>".$pastHost."</td>";
    echo"<td>".$attendingNo."</td>";
    if ($winsNo == 1){
        echo "<td><button type='button' class='btn btn-success btn-xs'>Win</button></td></tr>";
    }else {
        echo "<td><button type='button' class='btn btn-danger btn-xs'>Lose</button></td></tr>";
    }

}
}