<!DOCTYPE html>
<html>
    <head>
        <title>JetArena</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
        <link href="../fontawesome4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/parallax-slider/parallax-slider.css"/>
        <link rel="stylesheet" href="../css/bootstrap-social.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fontawesome4.6.3/css/font-awesome.css">


        <!--script src="../js/agency.min.js"></script-->
        <script type="text/javascript" src="../js/hover-dropdown.js"></script>
        <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
        <script defer src="../js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="../js/jquery.parallax-1.1.3.js"></script>
        <script src="../js/link-hover.js"></script>
        <script src="../js/modernizr-1.6.min.js" type="text/javascript"></script>
        <script src="../js/wow.min.js"></script>

        <script src="../bootstrap3/js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.easing.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script type="text/javascript" src="../js/parallax-slider/jquery.cslider.js"></script>
        <script type="text/javascript" src="../js/parallax-slider/modernizr.custom.28468.js">
        </script>
        <script src="../js/script.js"></script>
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
            <div class="row">
                <div class="col-lg-9">
                    <h2>Update Guild Information</h2>
                    <!--<a href="edithome.php"class="btn btn-info" role="button">Cancel</a><br/><hr/><br/>-->
                    <?php
                    if (isset($_GET['id']) && $_GET['id'] !== '') {
                        $guildNumber = $_GET['id'];
                        require_once '../includes/db/guildCtrl.php';
                        $con = open_connection();
                        $guildInfo = getUsersGuild($con, 0, $guildNumber);

                        foreach ($guildInfo as $guildInfoArr) {
                            $guild_name = $guildInfoArr['gu_name'];
                            $description = $guildInfoArr['description'];
                        }
                    }
                    ?>
                    <form class="form-horizontal"  action="../includes/db/editGuildHandle.php" enctype="multipart/form-data" method="post">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group"> <!-- title field -->
                                <label class="control-label " for="title">Guild Name</label>
                                <input class="form-control" id="guild-name" name="guild" type="text" value="<?=$guild_name?>">                               
                            </div>

                            <div class="form-group">
                                <label class="control-label " for="desc">Description:</label>
                                <textarea class="form-control" cols="40" id="description-message" name="desc" rows="10"><?=$description?></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <img id='img-upload' /> <br/>
                                <label>Upload Guild Logo (image size not more than 1.3MB)</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="myFile">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <button type = "submit" class = "btn btn-default">Update Guild</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </body>
</html>