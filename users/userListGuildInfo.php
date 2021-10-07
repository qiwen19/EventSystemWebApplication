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
            function promo_CoLeader() {
                return confirm("Are you sure to set him/her as Co-Leader? Co-Leader can accept/deny other users join request");
            }
            function promo_Leader() {
                return confirm("Are you sure to set him/her as Leader?");
            }
            function kick_member() {
                return confirm("Are you sure to remove him/her from the guild?");
            }
            function remove_guild() {
                return confirm("Are you sure to delete guild? (Guild will be removed)");
            }
            function accept_people() {
                return confirm("Accept join request?");
            }
            function decline_people() {
                return confirm("Deny join request?");
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
            include 'userheadermenu.php';
            ?>
        </header>
        <div class="container">
            <form id="guildForm" name="guildForm" action="../includes/db/guildInfoHandle.php" method="post">
                <div class="row">
                    <div class="guild">
                        <?php
                        if (isset($_GET['id']) && $_GET['id'] !== '') {
                            $guildNumber = $_GET['id'];
                        }
                        require_once '../includes/db/guildCtrl.php';
                        $con = open_connection();
                        $getAllUsersGuild = getAllUsersGuild($con, 0, $guildNumber);
                        $guild_id = array();
                        foreach ($getAllUsersGuild as $allUsersGuildArr) {
                            $guild_id = $allUsersGuildArr['gu_id'];
                            echo "<img src='../img/" . $allUsersGuildArr['gu_profile_filename'] . "' style='width: 200px; height: 200px;' ><br/>";
                            echo "<h3>" . $allUsersGuildArr['gu_name'] . "</h3>";
                            echo "<div class='col-md-18'><div class='panel panel-default panel-transparent'><div class='panel-body'>";
                            echo $allUsersGuildArr['description'];
                            $countGuildLeader = countGuildLeader($con, $guild_id);
                            $numberOfLeader = "";
                            foreach ($countGuildLeader as $data) {
                                $numberOfLeader = $data['no_of_guildLeader'];
                            }
                            echo "</div></div></div></div></div>";
                        }
                        ?>

                        <?php
                        if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] != '1')) {
                            echo "<td><button type='submit' onclick='return quit_guild();' class='btn btn-warning btn-xs' value='$guild_id-$numberOfLeader' name ='quit'>QUIT GUILD</button>";
                            if ($userData['gu_status'] == '4') {
                                echo "<td><button type='submit' onclick='return remove_guild();' class='btn btn-danger btn-xs' value='$guild_id' name ='delete'>DELETE GUILD</button>";
                                echo "<td><a href='editGuild.php?id=$guild_id' class='btn btn-primary btn-xs'>EDIT INFORMATION</a></td>";
                            }
                        } else if ($userData['gu_id'] == $guild_id && $userData['gu_status'] == '1') {
                            echo "<td><button type='submit' onclick='return cancel_pending();' class='btn btn-warning btn-xs' name ='pending'>PENDING REQUEST</button></td>";
                        } else if ($userData['gu_id'] != $guild_id) {
                            echo "<td><button type='submit' onclick='return join_guild();' class='btn btn-success btn-xs' value='$guild_id' name ='join'>JOIN GUILD</button></td>";
                        }
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
                                                        <th>#NO</th>
                                                        <th>Name</th>
                                                        <th width="30%">Position</th>
                                                        <?php
                                                        if ($userData['gu_id'] == $guild_id && $userData['gu_status'] == '4') {
                                                            echo "<th width='20%'>Action</th>";
                                                        }
                                                        ?>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    //For guild leader, co-leader
                                                    $getGuildMember = getGuildMember($con, 0, $guild_id);
                                                    $i = 1;

                                                    foreach ($getGuildMember as $GuildMemberArr) {
                                                        $ur_id = $GuildMemberArr['ur_id']; //individual user id in that guild
                                                        $guild_id = $GuildMemberArr['gu_id'];
                                                        $gu_status = $GuildMemberArr['gu_status'];

                                                        echo "<tr height='10px'><td>" . $i . "</td>";
                                                        echo "<td><a href='showUserProfile.php?urid=".$ur_id."'>" . $GuildMemberArr['in_game_name'] . "</a></td>";
                                                        switch ($gu_status) {
                                                            case "4":
                                                                echo "<td><i class='fa fa-star'></i>Leader</td>";
                                                                break;
                                                            case "3":
                                                                echo "<td>Co-leader</td>";
                                                                break;
                                                            case "2":
                                                                echo "<td>Member</td>";
                                                                break;
                                                        }
                                                        if ($userData['gu_id'] == $guild_id && $userData['gu_status'] == '4') {
                                                            if ($userData['gu_id'] == $guild_id && $gu_status == '4' && $gu_status != $userData['gu_status']) {
                                                                echo "<td><div class='btn-group'><button type='submit' onclick='return quit_guild();' value='$guild_id-$numberOfLeader' name ='quit'>QUIT GUILD</button</div></td>"; //leader
                                                            } else if ($userData['gu_id'] == $guild_id && $gu_status == '3') {
                                                                echo "<td><div class='btn-group'><button type='submit' onclick='return promo_Leader();' class='btn btn-success btn-xs' value='$ur_id-$guild_id-$numberOfLeader' name ='promoLeader'>Promote as leader</button><button type='submit' onclick='return kick_member();' class='btn btn-danger btn-xs' value='$ur_id-$guild_id' name ='kickMember'>kick</button></div></td>"; //co-leader
                                                            } else if ($userData['gu_id'] == $guild_id && $gu_status == '2') {
                                                                echo "<td><div class='btn-group'><button type='submit' onclick='return promo_CoLeader();' class='btn btn-success btn-xs' value='$ur_id-$guild_id' name ='promoCoLeader'>Promote as Co-Leader</button><button type='submit' onclick='return kick_member();' class='btn btn-danger btn-xs' value='$ur_id-$guild_id' name ='kickMember'>Kick</button></div></td>"; //member
                                                            } else {
                                                                echo "<td></td>";
                                                            }
                                                        }
                                                        echo "</tr>";
                                                        $i ++;
                                                    }
                                                    "<input type='hidden' value='" . $guild_id . "' name='gu_id'/>";
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($userData['gu_id'] == $guild_id && ($userData['gu_status'] == '4' or $userData['gu_status'] == '3')) {
                                    ?>
                                    <div class="col-md-4 no-pad">
                                        <div class="panel panel-default panel-transparent">
                                            <div class="panel-heading">
                                                <span class="panel-title">Pending Members</span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th width="20%"></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $displayPendingReq = displayPendingReq($con, 0, $guild_id);

                                                        if (count($displayPendingReq) > 0) {
                                                            foreach ($displayPendingReq as $displayPendingReqArr) {
                                                                $pendingReqUser = $displayPendingReqArr['ur_id'];
                                                                echo "<tr height='10px'>";
                                                                echo "<td>" . $displayPendingReqArr['in_game_name'] . "</td>";
                                                                echo "<td><button type='submit' onclick='return accept_people();' value='$pendingReqUser-$guild_id' name ='accepted' class='fa fa-check'></button><button type='submit' onclick='return decline_people();' value='$pendingReqUser-$guild_id' name ='declined' class='fa fa-times'></button></td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr height='10px'>";
                                                            echo "<td>-NO PENDING MEMBER</td>";
                                                            echo "<td></td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
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