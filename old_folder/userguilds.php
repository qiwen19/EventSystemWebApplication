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
            function cancel_pending() {
                return confirm("Are you sure you want to cancel pending request?");
            }
            function join_guild() {
                return confirm("Are you sure you want to join this guild?");
            }
            function quit_guild() {
                return confirm("Are you sure you want to quit guild?");
            }
        </script>
    </head>
    <body>
        <?php
        require_once '../includes/db/checkLoginStatus.php';
        
        ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $guilds = 'guilds';
            include 'userheadermenu.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container"> 
            <h2>Guild</h2> 
            <a href="usercreateGuild.php" class="btn btn-success" role="button">+ Create a Guild</a> 

            <h3>Joined Guild</h3> 
            <?php
            require_once '../includes/db/guildCtrl.php';
            $con = open_connection();
            $allJoinedGuildArr = getJoinedGuild($con, 0, $userData['ur_id']);
            $user_id = $userData['ur_id'];
            ?>

            <form method="post" action="../includes/db/guildInfoHandle.php">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Guild</th>
                            <th>Leader</th>
                            <th>No. of Members</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($allJoinedGuildArr) > 0) {

                            $guild_id = array();
                            foreach ($allJoinedGuildArr as $joinedGuildArr) {
                                $guild_id = $joinedGuildArr['gu_id'];
                                echo "<tr><td><a href='userListGuildInfo.php?id=$guild_id'>" . $joinedGuildArr['gu_name'] . "</a></td>";
                                $joinedGuildLeader = joinedGuildLeader($con, $guild_id, 4);
                                $Leader = "";
                                foreach ($joinedGuildLeader as $guildLeader) {
                                    $Leader = $guildLeader['in_game_name'];
                                }
                                echo "<td>" . $Leader . "</td>";
                                $attending = countMember($con, $guild_id);
                                $attendingNo = "";
                                foreach ($attending as $data) {
                                    $attendingNo = $data['no_attendance'];
                                }
                                $countGuildLeader = countGuildLeader($con, $guild_id);
                                $numberOfLeader = "";
                                foreach ($countGuildLeader as $data) {
                                    $numberOfLeader = $data['no_of_guildLeader'];
                                }
                                echo "<td>" . $attendingNo . "</td>";
                                if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] != '1')) {
                                    echo "<td><button type='submit' onclick='return quit_guild();' class='btn btn-danger btn-xs' value='$guild_id-$numberOfLeader' name ='quit'>QUIT GUILD</button</td>";
                                } else if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] == '1')) {
                                    echo "<td><button type='submit' onclick='return cancel_pending();' class='btn btn-warning btn-xs' name ='pending'>PENDING REQUEST</button></td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td>-No Record-</td>"
                            . "<td>-No Record-</td>"
                            . "<td>-No Record-</td>"
                            . "<td>-No Action-</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>


                <h3>Current Guilds</h3> 
                <?php
                require_once '../includes/db/guildCtrl.php';
                $allGuildArr = getCurrentGuild($con, 0, 4)
                ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Guild</th>
                            <th>Leader</th>
                            <th>No. of Members</th>
                            <th>Action</th>
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
                                echo "<td><a href='showUserProfile.php?urid=".$guildInfoArr['ur_id']."'>" . $guildInfoArr['in_game_name'] . "</td>";
                                $attending = countMember($con, $guild_id);
                                $attendingNo = "";
                                foreach ($attending as $data) {
                                    $attendingNo = $data['no_attendance'];
                                }
                                echo "<td>" . $attendingNo . "</td>";
                                if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] != '1')) {
                                    echo "<td><button type='submit' onclick='return quit_guild();' class='btn btn-danger btn-xs' value='$guild_id-$numberOfLeader' name ='quit'>QUIT GUILD</button></td>";
                                } else if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] = '1')) {
                                    echo "<td><button type='submit' onclick='return cancel_pending();' class='btn btn-warning btn-xs' name ='pending'>PENDING REQUEST</button></td>";
                                } else if ($userData['gu_id'] !== $guild_id) {
                                    echo "<td><button type='submit' onclick='return join_guild();' class='btn btn-success btn-xs' value='$guild_id' name ='join'>JOIN GUILD</button></td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td>-No Record-</td>"
                            . "<td>-No Record-</td>"
                            . "<td>-No Record-</td>"
                            . "<td>-No Action-</td></tr>";
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
