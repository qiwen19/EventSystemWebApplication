<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JetArena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Stylesheets !-->
        <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/parallax-slider/parallax-slider.css"/>
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="fontawesome4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Scripts !-->
        <script type="text/javascript" src="js/hover-dropdown.js"></script>
        <script src="js/jquery-1.12.3.js" type="text/javascript"></script>
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script src="js/link-hover.js"></script>
        <script src="js/modernizr-1.6.min.js" type="text/javascript"></script>
        <script src="js/wow.min.js"></script>
        <script src="bootstrap3/js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        
    </head>
    <body>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $games = 'games';
            include 'menu.php';
            ?>
        </header>
        <!-- end of header-->
        
        <div class="container">
            <h3>Current Games</h3> 
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
                        require_once 'includes/db/gameCtrl.php';
                        require_once 'includes/db/attendanceCtrl.php';
                        
                        $con = open_connection();
                        $current_time = date("Y-m-d H:i:s"); //current time not accurate, need to plus 7hrs +7 outside the bracket??
                        
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
                            
                            $i++;
                        } 
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
