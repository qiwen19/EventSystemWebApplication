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
<script type='text/javascript'>
            function join_game() {
                return confirm("Are you sure you want to participate in this game?");
            }
            function quit_game() {
                return confirm("Are you sure you want to quit the game?");
            }
        </script>
    </head>
    <body>
        <?php
        require_once '../includes/db/checkLoginStatus.php';
        require_once '../includes/db/gameCtrl.php';
        require_once '../includes/db/attendanceCtrl.php';

        $con = open_connection();
        $ur_id = $userData['ur_id'];
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
            <form method="post" action="../includes/db/gameInfoHandle.php">
                <h2>JetArena Games</h2>          
                <a href="userhostGame.php" class="btn btn-success" role="button">+ Host a Game</a>
                <a href="usergameListing.php" class="btn btn-primary" role="button"><i class="fa fa-list" aria-hidden="true"></i> Games Listing</a>

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
                        //include 'attendingGamesTable.php'; 
//                        echo"<pre>";
//                        print_r($ur_id);
//                        echo"</pre>";
                        
                        $attendingGames = getAttendingGames($con, $ur_id);

                        $current_time = date("Y-m-d H:i:s"); //current time not accurate, need to plus 7hrs +7 outside the bracket??
                        
                        $attendGame_id = array();
                        $i = 0; //this is to freaking loop the attend ga_id
                        foreach ($attendingGames as $attendingGamesData) {
                            $attendGame_id[$i] = $attendingGamesData['ga_id'];
                            $i++;
                            $game_id = $attendingGamesData['ga_id'];
                            $attendingName = $attendingGamesData['ga_name'];
                            $attendingDate = $attendingGamesData['datetime']; //need confirm again, changed manually
                            $attendingHost = $attendingGamesData['in_game_name'];
                            $attendingRules = $attendingGamesData['rules_pdf'];
                            $attending = getAttendingNumber($con, $game_id);
                            $attendingNo = "";

                            if ($attendingDate >= $current_time) {
                                foreach ($attending as $data) {
                                    $attendingNo = $data['no_attendance'];
                                }
                                echo"<tr>";
                                echo "<td>" . $attendingName . "</td>";
                                echo "<td>" . $attendingDate . "</td>";
                                echo "<td>" . $attendingHost . "</td>";
                                echo"<td>" . $attendingNo . "</td>";
                                echo "<td><button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$game_id-$ur_id' name ='quit'>QUIT GAME</button</td>";
                                echo "</tr>";
                            } else {
                                echo"<tr>";
                                echo "<td>-No record-</td>";
                                echo "<td>-No record-</td>";
                                echo "<td>-No record-</td>";
                                echo "<td>-No record-</td>";
                                echo "<td>-No record-</td>";
                                echo"<tr>";
                            }
                        }
                        //echo $attendGame_id;
                        ?>
                    </tbody>
                </table>
                <h3>Current Games</h3> 
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
                        
                        $currentGames = gamesDisplay($con, 0);
                        $i = 0;
                        foreach ($currentGames as $currentGamesData) {
                            if ($currentGamesData['datetime'] >= $current_time) {
                            $game_id = $currentGamesData['ga_id'];
                            $attendingName = $currentGamesData['ga_name'];
                            $attendingDate = $currentGamesData['datetime'];
                            $attendingHost = $currentGamesData['in_game_name'];
                            $attendingRules = $currentGamesData['rules_pdf'];
                            $attending = getAttendingNumber($con, $game_id);
                            $attendingNo = "";
                            foreach ($attending as $data) {
                                $attendingNo = $data['no_attendance'];
                            }
                            echo "<tr><td>" . $attendingName . "</td>";
                            echo "<td>" . $attendingDate . "</td>";
                            echo "<td>" . $attendingHost . "</td>";
                            echo"<td>" . $attendingNo . "</td>";
                            
                            $attendGame_id =array();
                            foreach ($attendingGames as $attendingGamesData) {
                            $attendGame_id = $attendingGamesData['ga_id'];
                            }
                             echo $attendGame_id;
                            if ($attendGame_id != $game_id) {
                                echo"<pre>";
                        print_r($ur_id);
                        print_r($game_id);
                        echo"</pre>";
                                echo "<td><button type='submit' onclick='return join_game();' class='btn btn-success btn-xs value='$game_id-$ur_id' name ='join'>JOIN GAME</button></td></tr>";
                            } else {
                                echo"<pre>";
                        print_r($ur_id);
                        print_r($game_id);
                        echo"</pre>";
                                echo "<td><button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$game_id-$ur_id' name ='quit'>QUIT GAME</button</td></tr>";
                            }
                            $i++;
                        }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>

        <?php
        include 'userfooter.php';
        ?>
    </body>
</html>
