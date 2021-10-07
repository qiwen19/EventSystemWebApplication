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
            $guilds = 'guilds';
            include 'menu.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container"> 
            <h2>Guild</h2> 

            <h3>Current Guilds</h3> 
            <?php
            require_once 'includes/db/guildCtrl.php';
            $con = open_connection();
            $allGuildArr = getCurrentGuild($con, 0, 4)
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Guild</th>
                        <th>Leader</th>
                        <th>No. of Members</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($allGuildArr) > 0) {

                        $guild_id = array();
//                            $guild_leader = array();
                        foreach ($allGuildArr as $guildInfoArr) {
//                                $guild_leader = $guildInfoArr['gu_name'];
                            $guild_id = $guildInfoArr['gu_id'];
                            echo "<tr><td><a href='userListGuildInfo.php?id=$guild_id'>" . $guildInfoArr['gu_name'] . "</a></td>";
                            echo "<td><a href='showUserProfile.php?urid=" . $guildInfoArr['ur_id'] . "'>" . $guildInfoArr['in_game_name'] . "</td>";
                            $attending = countMember($con, $guild_id);
                            $attendingNo = "";
                            foreach ($attending as $data) {
                                $attendingNo = $data['no_attendance'];
                            }
                            echo "<td>" . $attendingNo . "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>-No Record-</td>"
                        . "<td>-No Record-</td>"
                        . "<td>-No Record-</td>";
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
