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
            <form id="gameForm" name="gameForm" action="gameInfoHandle.php" method="post">
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
                            $ga_name = $getAllGamesArr['ga_name'];
                            $date = $getAllGamesArr['date'];
                            $start = $getAllGamesArr['start'];
                            $end = $getAllGamesArr['end'];
                            $min_attendance = $getAllGamesArr['min_attendance'];
                            $location = $getAllGamesArr['location'];
                            $pdf = $getAllGamesArr['rules_pdf'];
                            $des = $getAllGamesArr['description'];
                        }
                        ?>
                        <div class="panel-heading">
                            <span class="panel-title pull-left"><?= $ga_name ?></span>
                            <?php
                            $attendGame_id = "";
                            $attendance = getAttendance($con, $gameNumber, $ur_id);
                            foreach ($attendance as $attendingGamesData) {
                                $attendGame_id = $attendingGamesData['ga_id'];
                            }
                            //echo "<br/>".$attendingHost;
                            if ($attendGame_id != $gameNumber) {
                                echo "<td><button type='submit' onclick='return join_game();' class='btn btn-success pull-right' value='$gameNumber' name ='join'>JOIN GAME</button></td></tr>";
                            } else {
                                echo "<td><button type='submit' onclick='return quit_game();' class='btn btn-danger pull-right' value='$gameNumber-$attendingHost' name ='quit'>QUIT GAME</button></td></tr>";
                            }
                            //echo $attendingHost;
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-9">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Host:</td>
                                            <td><?=$attendingHost?></td>
                                        </tr>
                                        <tr>
                                            <td>Date:</td>
                                            <td><?= $date ?></td>
                                        </tr>

                                        <tr>
                                            <td>Time:</td>
                                            <td><?= $start . " - " . $end ?></td>
                                        </tr>

                                        <tr>
                                            <td>Min Attendance:</td>
                                            <td><?= $min_attendance ?></td>
                                        </tr>

                                        <tr>
                                            <td>Location:</td>
                                            <td><?= $location ?></td>
                                        </tr>

                                        <tr>
                                            <td>Rules:</td>
                                            <td><a href="../rules/addsthin.pdf">fd</a></td>
                                        </tr>

                                        <tr>
                                            <td>Description:</td>
                                            <td><?= $des ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-lg-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Participants</th>
                                            <th>Role</th>
                                            <?php
                                            $currentGames = userGamesDisplay($con, $gameNumber, 0);

                                            //$attendingHost = array();
                                            foreach ($currentGames as $currentGamesData) {
                                                $attendingHost = $currentGamesData['in_game_name'];
                                            }
                                            //echo $attendingHost;
                                            if ($attendingHost == $userData['in_game_name']) {
                                                echo "<th width='30%'>Action</th>";
                                                echo "<th width='30%'>Attendance</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $getGameMember = getGameMembers($con, $gameNumber, 0);
                                        $i = 1;

                                        foreach ($getGameMember as $GameMemberArr) {
                                            $currentUserId = $GameMemberArr['ur_id'];
                                            $gameAttendanceStatus = $GameMemberArr['attendance_status'];
                                            echo "<tr height='10px'><td>" . $i . "</td>";
                                            echo "<td><a href='showUserProfile.php?urid=" . $currentUserId . "'>" . $GameMemberArr['in_game_name'] . "</a></td>";
                                            if ($attendingHost == $userData['in_game_name']) {
                                                if ($userData['in_game_name'] != $GameMemberArr['in_game_name']) {
                                                    echo "<td>Member</td>";
                                                    echo "<td><button type='submit' class='btn btn-warning btn-xs' onclick='return kick_member();' value='$gameNumber-$currentUserId' name ='kickMember'>KICK</button></td>";

                                                    if ($gameAttendanceStatus == '0') {
                                                        echo "<td><button type='submit' value='$gameNumber-$currentUserId' name ='present' class='fa fa-check'></button></td>";
                                                    } else if ($gameAttendanceStatus == '1') {
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
                        </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <?php
        include 'userfooter.php';
        ?>
    </body>
</html>