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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

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

    </head>

    <body>
        <?php
        require_once '../includes/db/fbconfig.php';
        require_once '../includes/db/dbUserData.php';
        // Get login url
        $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
        ?>

        <!-- Navigation Bar !-->
        <header class="head-section">
            <nav id="mainNav" class="navbar navbar-inverse navbar-custom navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header navbar-inverse page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll" href="../home.php"><img src="../img/logo.png" alt="logo" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li><a href = "../home.php">Home</a></li>
                            <li><a href = "../games.php">Games</a></li>
                            <li><a href = "../guilds.php">Guilds</a></li>
                            <li class="active"><a href="userlogin.php">Sign In / Register</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- end of header-->


        <div id="status"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default" style="padding:100px; margin-top: 100px;">
                        <a href=<?= htmlspecialchars($loginURL) ?> id="fbLink" class="btn btn-block btn-social btn-facebook">
                            <span class="fa fa-facebook"></span> Sign in with Facebook.
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        require_once '../includes/db/footerCtrl.php';
        require_once '../footerData.php';
        ?>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="contact">
                            <span>SiteMap</span>    
                                <li><a href="home.php">Home</a></li>
                                <li><a href="games.php">Games</a></li>
                                <li><a href="guilds.php">Guilds</a></li>
                                <li><a href="users/userlogin.php">Sign Up/Register</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="adress">
                            <span>Address</span>    
                                <li><p><?=$address?></p></li>
                                <li><p>Office: <?=$of_country_no.' '.$of_contact_no?></p></li>
                                <li><p>HP: <?=$hp_country_no.' '.$hp_contact_no?></p></li>
                        </ul>
                    </div>
           
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <ul class="social">
                            <span>Social</span>    
                               <li><a href="<?=$facebook_url?>"><i class="fa fa-facebook fa-2x"></i></a></li>
                               <li><a href="<?=$instagram_url?>"><i class="fa fa-instagram fa-2x"></i></a></li>
                               <li><a href="<?=$youtube_url?>"><i class="fa fa-youtube fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </footer>
    </body>
</html>
