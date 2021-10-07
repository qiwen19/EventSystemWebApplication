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
        <!-- end of header-->
        
         <div class="container">
            <div class="row">
                <div class="panel panel-default panel-transparent">
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
        
        <?php
            include 'userfooter.php';
        ?>
    </body>
</html>
