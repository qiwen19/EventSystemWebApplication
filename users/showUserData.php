<?php
$con = open_connection();
$ur_id = $_GET['urid'];
$user = getUserbyID($con, $ur_id);
$image = "";
$firstname = "";
$lastname = "";
$ingamename = "";
$fblink = "";
$bio = "";

foreach ($user as $userinfo) {
    $image = $userinfo['picture'];
    $firstname = $userinfo['first_name'];
    $lastname = $userinfo['last_name'];
    $ingamename = $userinfo['in_game_name'];
    $fblink = $userinfo['link'];
    $bio = $userinfo['bio'];
    $user_gu_id = $userinfo['gu_id'];
//       $ur_id = $userinfo['ur_id'];
}

require_once '../includes/db/guildCtrl.php';
$usersGuild = getUsersGuild($con, 0, $user_gu_id);
$allJoinedGuildArr = getJoinedGuild($con, 0, $ur_id);

foreach ($usersGuild as $usersGuildInfo) {
    $gu_name = $usersGuildInfo['gu_name'];
    $gu_pic = $usersGuildInfo['gu_profile_filename'];
}
?>

<br/>
<br/>
<div class="container profile">
    <div class="row user-menu-container square">
        <div class="col-md-15 user-details">
            <div class="row">
                <div class="col-md-4 no-pad">
                    <div class="user-image">
                        <img src="<?= $image ?>" class="img-circle img-responsive" style="width: 200px;"> 
                    </div>
                </div>

                <div class="col-md-4 no-pad">
                    <div class="user-pad">
                        <h3><?= $firstname . " " . $lastname; ?></h3>
                        <h4><?= $ingamename ?></h4>
                        <?php
                        foreach($allJoinedGuildArr as $allJoinedGuild){
                        $gu_status = $allJoinedGuild['gu_status'];
                        }
                        if (count($allJoinedGuildArr) > 0 && $gu_status != '1') {
                            ?>
                            <a href='userListGuildInfo.php?id=<?= $user_gu_id ?>' class='white'><img src="../img/<?= $gu_pic ?>" class="img-circle" style="width: 25px;"><span>     <?= $gu_name ?></span></a>
                            <?php
                        }
                        ?>
                        <h5> Joined on <?= callUserDate($ur_id); ?> </h5>
                        <?php
                        if ($userData['ur_id'] == $ur_id) {
                            echo "<a href='edituserprofile.php' class='btn btn-labeled btn-info' role='button'><i class='fa fa-pencil'></i> Edit Profile</a>";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-4 no-pad">
                    <div class="panel panel-default socialmedia panel-transparent">
                        <div class="panel-heading">Connect</div>
                        <div class="panel-body">
                            <a href="<?= $fblink ?>" class="fa fa-facebook fa-2x"></a>
                            <?php
                            $twitter = getSocialTw($con, $ur_id);
                            $tw = "";
                            $twlink = "";

                            foreach ($twitter as $twitterData) {
                                $tw = $twitterData['social_media_type'];
                                $twlink = $twitterData['social_media_url'];
                            }

                            if ($tw == 'Twitter' && $twlink != 'http://twitter.com/' && $twlink != null) {
                                echo '<a href="' . $twlink . '" class="fa fa-twitter fa-2x"></a>';
                            }

                            $instagram = getSocialIg($con, $ur_id);
                            $ig = "";
                            $iglink = "";

                            foreach ($instagram as $instagramData) {
                                $ig = $instagramData['social_media_type'];
                                $iglink = $instagramData['social_media_url'];
                            }

                            if ($ig == 'Instagram' && $iglink != 'http://instagram.com/' && $iglink != null) {
                                echo '<a href="' . $iglink . '" class="fa fa-instagram fa-2x"></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>

            <div class="row">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading">Biography</div>
                    <div class="panel-body">
<?= $bio ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>