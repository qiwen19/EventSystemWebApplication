<?php

require_once 'dbConnection.php';
require_once 'attendanceCtrl.php';

function dbGetGamesById($con,$ga_id,$debug=false){

    $sqlStr =   "SELECT * ".
                "FROM games ".
                "WHERE ga_id={$ga_id} ";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetNewGames($con,$debug=false){

    $sqlStr =   "SELECT * ".
                "FROM games ".
                "WHERE datetime >= NOW() ";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetPastGames($con,$ur_id,$debug=false){

    $sqlStr =   "SELECT DISTINCT games.*, users.in_game_name ".
                "FROM games ".
                "INNER JOIN ".
                "game_attendances ".
                "ON games.ga_id=game_attendances.ga_id ".
                "INNER JOIN ".
                "users ".
                "ON games.host_id=users.ur_id ".
                "WHERE (game_attendances.ur_id='{$ur_id}') OR (games.host_id='{$ur_id}')".
                "ORDER BY createdAt DESC ";
              
    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

//new
function dbGetDraftGames($con,$ur_id,$debug=false){

    $sqlStr =   "SELECT games.*, users.in_game_name ".
                "FROM games ".
                "INNER JOIN ".
                "users ".
                "ON games.host_id=users.ur_id ".
                "WHERE games.draft='1' AND users.ur_id='{$ur_id}'".
                "ORDER BY createdAt DESC ";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbGetAttendingGames($con,$ur_id,$debug=false){
    $sqlStr =   "SELECT games.*, users.in_game_name ".
                "FROM games ".
                "INNER JOIN ".
                "game_attendances ".
                "ON games.ga_id=game_attendances.ga_id ".
                "INNER JOIN ".
                "users ".
                "ON games.host_id=users.ur_id ".
                "WHERE game_attendances.ur_id='{$ur_id}'".
                "ORDER BY createdAt DESC ";

    $resultArray = getBySql($con, $sqlStr, $debug);

    return $resultArray;
}

function dbUpdateGamesStatus($con,$ga_status,$updatedAt,$ga_id,$debug=false){

    $sqlStr = "UPDATE games ".
              "SET status = '{$ga_status}', updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

      if (query($con, $sqlStr, $debug)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbCreateNewGames($con,$session_urid,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$createdAt,$updatedAt,$debug=false){

    $gameName = mysqli_real_escape_string($con, $ga_name);

    $sqlStr = "INSERT INTO games (host_id,ga_name,ga_type,date,start,end,location,description,min_attendance,rules_pdf,createdAt,updatedAt) ".
              "VALUES ('{$session_urid}','{$gameName}','{$ga_type}','{$date}','{$start}','{$end}','{$location}','{$description}',"
              . "'{$min_attendance}','{$rules_pdf}','{$createdAt}','{$updatedAt}')";

              $result = mysqli_query($con, $sqlStr);
              
              if($result){
                  $last_id = mysqli_insert_id($con);
                  createNewAttendance($con, $last_id, $session_urid, 0, 1);
              } 
}
//changed
function dbUpdateGamesInfo($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt,$debug=false){

    $sqlStr = "UPDATE games ".
              "SET ga_name = '{$ga_name}', ga_type = '{$ga_type}', date = '{$date}', start = '{$start}', end = '{$end}', location = '{$location}', description = '{$description}', min_attendance = '{$min_attendance}'".
              ", rules_pdf = '{$rules_pdf}', updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

              $result = mysqli_query($con, $sqlStr);
              if($result){
                header('Location: ../../users/usergames.php');
              } 
}

function dbUpdateGamesInfoDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt,$debug=false){

    $sqlStr = "UPDATE games ".
              "SET ga_name = '{$ga_name}', ga_type = '{$ga_type}', date = '{$date}', start = '{$start}', end = '{$end}', location = '{$location}', description = '{$description}', min_attendance = '{$min_attendance}'".
              ", rules_pdf = '{$rules_pdf}',draft = '0', updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

              $result = mysqli_query($con, $sqlStr);
              
              if($result){
                  $last_id = mysqli_insert_id($con);
                  createNewAttendance($con, $last_id, $session_urid, 0, 1);
              } 
}

function dbUpdateGamesInfoNoPdf($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$updatedAt,$debug=false){

    $sqlStr = "UPDATE games ".
              "SET ga_name = '{$ga_name}', ga_type = '{$ga_type}', date = '{$date}', start = '{$start}', end = '{$end}', location = '{$location}', description = '{$description}', min_attendance = '{$min_attendance}'".
              ", updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

              $result = mysqli_query($con, $sqlStr);
              
              if($result){
                header('Location: ../../users/usergames.php');
              } 
}
function dbUpdateGamesInfoNoPdfDraft($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$session_urid,$updatedAt,$debug=false){

    $sqlStr = "UPDATE games ".
              "SET ga_name = '{$ga_name}', ga_type = '{$ga_type}', date = '{$date}', start = '{$start}', end = '{$end}', location = '{$location}', description = '{$description}', min_attendance = '{$min_attendance}'".
              ",draft = '0' ,updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

              $result = mysqli_query($con, $sqlStr);
              
              if($result){
                  createNewAttendance($con, $ga_id, $session_urid, 0, 1);
              } 
}

function dbCreateAsDraft($con,$session_urid,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$createdAt,$updatedAt,$debug=false){

    $gameName = mysqli_real_escape_string($con, $ga_name);

    $sqlStr = "INSERT INTO games (host_id,ga_name,ga_type,date,start,end,location,description,min_attendance,rules_pdf,draft,createdAt,updatedAt) ".
              "VALUES ('{$session_urid}','{$gameName}','{$ga_type}','{$date}','{$start}','{$end}','{$location}','{$description}',"
              . "'{$min_attendance}','{$rules_pdf}','1','{$createdAt}','{$updatedAt}')";

              $result = mysqli_query($con, $sqlStr);
              
              if($result){
                header('Location: ../../users/usergames.php');
              } 
}

function dbDeleteGames($con,$ga_status,$updatedAt,$ga_id,$debug=false){ //new

    $sqlStr = "UPDATE games ".
              "SET status = '{$ga_status}', updatedAt = '{$updatedAt}'".
              "WHERE ga_id = '{$ga_id}'";

      if (query($con, $sqlStr, $debug)) {
          deleteAllAttendance($con,$ga_id);
        //return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function dbDeleteAllAttendance($con,$ga_id,$debug=false){ //new

    $sqlStr = "DELETE FROM game_attendances ".
              "WHERE ga_id = '{$ga_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../users/usergames.php');
    } 
}

function dbGamesDisplay($con,$ga_status,$debug=false){ //edited

    $sqlStr = "SELECT games.*,users.in_game_name,users.ur_id ".
              "FROM games ".
              "INNER JOIN ".
              "users ".
              "ON host_id=ur_id WHERE games.status = '{$ga_status}'";
            
    $resultArray = getBySql($con, $sqlStr, $debug);
    return $resultArray;
}

function dbUserGameDisplay($con,$ga_id,$ga_status,$debug=false){ 

    $sqlStr = "SELECT games.*,users.in_game_name,users.ur_id FROM games INNER JOIN users ON host_id=ur_id where ga_id = '{$ga_id}' AND games.status = '{$ga_status}'";
            
    $resultArray = getBySql($con, $sqlStr, $debug);
    
    return $resultArray;
}

function dbGameMember($con,$ga_id,$ga_status,$debug=false){

    $sqlStr = "SELECT * FROM games, users, game_attendances where games.ga_id = game_attendances.ga_id AND game_attendances.ur_id = users.ur_id AND games.ga_id = '{$ga_id}'";
   
    $resultArray = getBySql($con, $sqlStr, $debug);
    
    return $resultArray;
}

?>