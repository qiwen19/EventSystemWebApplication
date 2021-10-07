<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>JetArena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets !-->
    <link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/parallax-slider/parallax-slider.css"/>
    <link rel="stylesheet" href="../css/bootstrap-social.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../fontawesome4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Scripts !-->
    <script type="text/javascript" src="../js/hover-dropdown.js"></script>
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <script defer src="../js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="../js/jquery.parallax-1.1.3.js"></script>
    <script src="../js/link-hover.js"></script>
    <script src="../js/modernizr-1.6.min.js" type="text/javascript"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../bootstrap3/js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        
    </head>
    <body>
    <?php
    require_once '../includes/db/checkLoginStatus.php';
    require_once '../includes/db/gameCtrl.php';
    require_once '../includes/db/attendanceCtrl.php';
    
    $con = open_connection();
    $ur_id = $userData['ur_id'];
    $current_time = currentDateTime(); //current time not accurate, need to plus 7hrs +7 outside the bracket??
    ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $games = 'games';
            include 'userheadermenu.php';
            ?>
        </header>
        <!-- end of header-->
        
        <div class="container">
            <h2>JetArena Games</h2>          
            <a href="usergames.php" class="btn btn-danger" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            <h3>Drafts</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $draftGames = getDraftGames($con,$ur_id);
                    
                    if(count($draftGames)>0){
                    foreach($draftGames as $draftGamesData){
                        $gameid = $draftGamesData['ga_id'];
                        $draftName = $draftGamesData['ga_name'];
                        $draftDate= $draftGamesData['date']." ".$draftGamesData['start'];
                        echo "<tr><td>".$draftName."</td>";
                        echo "<td>".$draftDate."</td>";
                        echo "<td><a href='userdraftgame.php?id={$gameid}' class='btn btn-success btn-xs'>Edit</a></td></tr>";
                    }
                    } else{
                        echo "<tr><td>-No record-</td>";
                        echo "<td>-No record-</td>";
                        echo "<td>-No action-</td></tr>";
                    }
                ?>
            </tbody>
            </table>
            
            <h3>Attending Games</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Host</th>
                    <th>No. of People</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $attendingGames = getAttendingGames($con, $ur_id);

                        
                        
                        $attendGame_id = "";
                        $i = 0; //this is to freaking loop the attend ga_id
                        foreach ($attendingGames as $attendingGamesData) {
                            $attendGame_id[$i] = $attendingGamesData['ga_id'];
                            $i++;
                            $game_id = $attendingGamesData['ga_id'];
                            $hostid = $attendingGamesData['host_id'];
                            $attendingName = $attendingGamesData['ga_name'];
                            $attendingDate = $attendingGamesData['date']." ".$attendingGamesData['start'];//need confirm again, changed manually
                            $attendingHost = $attendingGamesData['in_game_name'];
                            $attendingRules = $attendingGamesData['rules_pdf'];
                            $attending = getAttendingNumber($con, $game_id);
                            $attendingNo = "";

                            if ($attendingDate >= $current_time) {
                                foreach ($attending as $data) {
                                    $attendingNo = $data['no_attendance'];
                                }
                                echo"<tr>";
                                echo "<td><a href = 'userListGameInfo.php?id={$game_id}'>" . $attendingName . "</a></td>";
                                echo "<td>" . $attendingDate . "</td>";
                                echo "<td><a href='showUserProfile.php?urid={$hostid}'>" . $attendingHost . "</a></td>";
                                echo"<td>" . $attendingNo . "</td>";
                                
                                echo "<td><a href='gameInfoHandle.php?gaid={$game_id}&value=quit' onclick='return quit_game();'  class='btn btn-danger btn-xs' role='button'>QUIT GAME</a></td>";
                                //echo "<td><button type='submit'  class='btn btn-danger btn-xs' value='$game_id' name ='quit'>QUIT GAME</button</td>";
                                echo "</tr>";
                            } 
                        }
                ?>
            </tbody>
            </table>
            
            <h3>Past Games</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Host</th>
                    <th>No. of People</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $pastGames = getPastGames($con,$ur_id);
                        
                        foreach($pastGames as $pastGamesData){
                            $game_id = $pastGamesData['ga_id'];
                            $hostid = $pastGamesData['host_id'];
                            $pastName = $pastGamesData['ga_name'];
                            $pastDate= $pastGamesData['date']." ".$pastGamesData['start'];
                            if ($pastDate <= $current_time) {
                            $pastHost = $pastGamesData['in_game_name'];
                            $attending = getAttendingNumber($con, $game_id);
                            $attendingNo = "";
                            foreach($attending as $data){
                                $attendingNo = $data['no_attendance'];
                            }
                            echo "<tr><td>".$pastName."</td>";
                            echo "<td>".$pastDate."</td>";
                            echo "<td><a href='showUserProfile.php?urid={$hostid}'>".$pastHost."</a></td>";
                            echo"<td>".$attendingNo."</td>";
                            }
                        }
                ?>
            </tbody>
            </table>
        </div>
        
        <?php
            include 'userfooter.php';
        ?>
    </body>
</html>
