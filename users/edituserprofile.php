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
        <script src="../js/script.js"></script>
    </head>
    <body>
        <?php
        require_once '../includes/db/checkLoginStatus.php';
        require '../includes/db/socialCtrl.php';
        ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            include 'userheadermenu.php';
            
            $con = open_connection();
            $ur_id = $userData['ur_id'];
            $twitter = getSocialTw($con, $ur_id);
            $tw = "";
            $twlink = "";
            $instagram = getSocialIg($con, $ur_id);
            $ig = "";
            $iglink = "";
                                        
            foreach($twitter as $twitterData ){
            $tw = $twitterData['social_media_type'];
            $newtwlink = $twitterData['social_media_url'];
            $twlink = substr($newtwlink, 19);
                }
                                        
            foreach($instagram as $instagramData){
            $ig = $instagramData['social_media_type'];
            $newiglink = $instagramData['social_media_url'];
            $iglink = substr($newiglink, 21);
                }
            
            
            ?>
        </header>
        <!-- end of header-->
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2> Edit Your Profile</h2>
                    <a href="showUserProfile.php?urid=<?=$ur_id?>" class="btn btn-default" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>

                    <form action="edituserprofileHandle.php" method="post">
                        <div class="form-group"> <!-- ign field -->
                            <label class="control-label " for="title">In Game Name:</label>
                            <input class="form-control" id="name" name="in_game_name" type="text" placeholder="In Game Name" value="<?= $userData['in_game_name']; ?>"/>
                            <p id="success"></p>
                            <p id="error"></p>
                        </div>

                        <div class="form-group"> <!-- bio field -->
                            <label class="control-label " for="desc">Biography:</label>
                            <textarea class="form-control" cols="40" id="bio" name="bio" rows="10" placeholder="insert bio"><?= $userData['bio']; ?></textarea>
                        </div>
                        
                        <div class="form-group">
                        <!-- twitter field -->
                        <label class="control-label " for="twitter">Twitter Username:</label>
                        <div class="input-group">
                          <span class="input-group-addon" id="sizing-addon1">@</span>
                          <input type="text" class="form-control" value="<?= $twlink ?>" placeholder="Username" name="twitter" aria-describedby="sizing-addon1">
                        </div>
                        
                        <!-- instagram field -->
                        <label class="control-label " for="twitter">Instagram Username:</label>
                        <div class="input-group">
                          <span class="input-group-addon" id="sizing-addon1">@</span>
                          <input type="text" class="form-control" value="<?= $iglink ?>" placeholder="Username" name="instagram" aria-describedby="sizing-addon1">
                        </div>
                        </div>
                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                    </form>	
                </div>
            </div>
        </div>
        
            <?php
            include 'userfooter.php';
            include '../footerData.php';
            ?>
    </body>
</html>
