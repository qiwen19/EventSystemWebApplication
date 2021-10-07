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
            function kick_member() {
                return confirm("Are you sure you want to kick him/her out of the game?");
            }
            function delete_game() {
                return confirm("Are you sure you want to delete delete? (All member will be removed from the game)");
            }
        </script>
    </head>
    <body>
        <?php
        require_once '../includes/db/checkLoginStatus.php';
        $ur_id = $userData['ur_id'];
        ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            include 'userheadermenu.php';
            ?>
        </header>
        
        <div class="container">
            <div class="row">
                <div class="panel panel-default panel-transparent">
                    <?php
                        if (isset($_GET['id']) && $_GET['id'] !== '') {
                            $gameNumber = $_GET['id'];
                        }
                        require_once '../includes/db/gameCtrl.php';
                        require_once '../includes/db/attendanceCtrl.php';

                        $con = open_connection();
                        $getAllGames = getGamesById($con, $gameNumber);
                        $currentGames = userGamesDisplay($con, $gameNumber, 0);

                        //$attendingHost = array();
                        foreach ($currentGames as $currentGamesData) {
                            $attendingHost = $currentGamesData['in_game_name'];
                        }
                        //echo $attendingHost;
                        foreach ($getAllGames as $getAllGamesArr) {
                            echo "<h3>" . $getAllGamesArr['ga_name'] . "</h3>";
                            echo "Date: " . $getAllGamesArr['date'];
                            echo "Time: " . $getAllGamesArr['start'] . " - " . $getAllGamesArr['end'];
                            echo "Min Attendance: " . $getAllGamesArr['min_attendance'];
                            echo "Description: " . $getAllGamesArr['description'];
                            echo "<a href= '../rules/".$getAllGamesArr['rules_pdf']."'>CLICK HERE FOR RULES PDF</a>";
                            echo "Location: " . $getAllGamesArr['location'];
                        }
                        $attendGame_id = "";
                        $attendance = getAttendance($con, $gameNumber, $ur_id);
                        foreach ($attendance as $attendingGamesData) {
//                            echo"<pre>";
//                            print_r($attendingGamesData);
//                            echo"</pre>";
                            $attendGame_id = $attendingGamesData['ga_id'];
                        }
                        //echo "<br/>".$attendingHost;
                        if ($attendGame_id != $gameNumber) {
                            echo "<td><button type='submit' onclick='return join_game();' class='btn btn-success btn-xs' value='$gameNumber' name ='join'>JOIN GAME</button></td></tr>";
                        } else {
                            echo "<td><button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$gameNumber-$attendingHost' name ='quit'>QUIT GAME</button></td></tr>";
                        }
                        ?>
                    
                    <div class="panel-heading">
                        <span class="panel-title pull-left">GAME TITLE HERE BLEH</span>
                        <button class="btn btn-success pull-right">Join Game</button>
                        <div class="clearfix"></div>
                    </div>
                        <div class="panel-body">
                                    Enter your biography here.
                        </div>
                </div>
            </div>
         </div>
        
        <div class="container">
            <form id="gameForm" name="gameForm" action="gameInfoHandle.php" method="post">
                <div class="row">
                    <div class="game">
                        <?php
                        if (isset($_GET['id']) && $_GET['id'] !== '') {
                            $gameNumber = $_GET['id'];
                        }
                        require_once '../includes/db/gameCtrl.php';
                        require_once '../includes/db/attendanceCtrl.php';

                        $con = open_connection();
                        $getAllGames = getGamesById($con, $gameNumber);
                        $currentGames = userGamesDisplay($con, $gameNumber, 0);

                        //$attendingHost = array();
                        foreach ($currentGames as $currentGamesData) {
                            $attendingHost = $currentGamesData['in_game_name'];
                        }
                        //echo $attendingHost;
                        foreach ($getAllGames as $getAllGamesArr) {
                            echo "<h3>" . $getAllGamesArr['ga_name'] . "</h3>";
                            echo "Date: " . $getAllGamesArr['date'];
                            echo "Time: " . $getAllGamesArr['start'] . " - " . $getAllGamesArr['end'];
                            echo "Min Attendance: " . $getAllGamesArr['min_attendance'];
                            echo "Description: " . $getAllGamesArr['description'];
                            echo "<a href= '../rules/".$getAllGamesArr['rules_pdf']."'>CLICK HERE FOR RULES PDF</a>";
                            echo "Location: " . $getAllGamesArr['location'];
                        }
                        $attendGame_id = "";
                        $attendance = getAttendance($con, $gameNumber, $ur_id);
                        foreach ($attendance as $attendingGamesData) {
//                            echo"<pre>";
//                            print_r($attendingGamesData);
//                            echo"</pre>";
                            $attendGame_id = $attendingGamesData['ga_id'];
                        }
                        //echo "<br/>".$attendingHost;
                        if ($attendGame_id != $gameNumber) {
                            echo "<td><button type='submit' onclick='return join_game();' class='btn btn-success btn-xs' value='$gameNumber' name ='join'>JOIN GAME</button></td></tr>";
                        } else {
                            echo "<td><button type='submit' onclick='return quit_game();' class='btn btn-danger btn-xs' value='$gameNumber-$attendingHost' name ='quit'>QUIT GAME</button></td></tr>";
                        }
                        //echo $attendingHost;
                        ?>

                        <div class="row">
                            <div class="col-md-15 user-details">
                                <div class="col-md-8 no-pad">
                                    <div class="panel panel-default panel-transparent">
                                        <div class="panel-heading">
                                            <span class="panel-title pull-left">Members</span>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Participants</th>
                                                        <th width="30%">Role</th>
                                                        <?php
                                                        $currentGames = userGamesDisplay($con, $gameNumber, 0);

                                                        //$attendingHost = array();
                                                        foreach ($currentGames as $currentGamesData) {
                                                            $attendingHost = $currentGamesData['in_game_name'];
                                                        }
                                                        //echo $attendingHost;
                                                        if ($attendingHost == $userData['in_game_name']) {
                                                            echo "<th width='20%'>Action</th>";
                                                            echo "<th width='20%'>Attendance</th>";
                                                        }
                                                        echo "</tr></thead><tbody>";

                                                        //For guild leader, co-leader
                                                        $getGameMember = getGameMembers($con, $gameNumber, 0);
                                                        $i = 1;

                                                        foreach ($getGameMember as $GameMemberArr) {
                                                            $currentUserId = $GameMemberArr['ur_id'];
                                                            $gameAttendanceStatus = $GameMemberArr['attendance_status'];
                                                            echo "<tr height='10px'><td>" . $i . "</td>";
                                                            echo "<td><a href='showUserProfile.php?urid=" . $currentUserId . "'>" . $GameMemberArr['in_game_name'] . "</a></td>";
                                                            if ($attendingHost == $userData['in_game_name']) {
                                                                if ($userData['in_game_name'] != $GameMemberArr['in_game_name']) {
                                                                    echo "<td>Participant</td>";
                                                                    echo "<td><button type='submit' class='btn btn-warning btn-xs' onclick='return kick_member();' value='$gameNumber-$currentUserId' name ='kickMember'>KICK</button></td>";
                                                                    
                                                                    if($gameAttendanceStatus == '0'){
                                                                        echo "<td><button type='submit' value='$gameNumber-$currentUserId' name ='present' class='fa fa-check'></button></td>";
                                                                    } else if($gameAttendanceStatus == '1'){
                                                                        echo "<td><button type='submit' value='$gameNumber-$currentUserId' name ='absent' class='fa fa-times'></button></td>";
                                                                    }
                                                                    
                                                                } else {
                                                                    echo "<td>Host</td>";
                                                                    echo "<td><a href='usereditGames.php?id=$gameNumber' class='btn btn-primary btn-xs'>EDIT GAME INFORMATION</a>"
                                                                            . "<button type='submit' class='btn btn-danger btn-xs' onclick='return delete_game();' value='$gameNumber' name ='deleteGame'>DELETE GAME</button></td>";
                                                                }
                                                            } else {
                                                                echo "<td>Member</td>";
                                                            }
                                                            $i++;
                                                        }
                                                        "<input type='hidden' value='" . $gameNumber . "' name='ga_id'/>";
                                                        ?>
                                                        </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <?php
        include 'userfooter.php';
        ?>
    </body>
</html>