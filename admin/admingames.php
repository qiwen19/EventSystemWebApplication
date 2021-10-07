<!DOCTYPE html>
<?php require_once '../includes/db/checkloginstatusadmin.php' ;
require '../includes/db/footerCtrl.php';?>
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

        <!--
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../assets/bxslider/jquery.bxslider.js"></script>
        <script src="../assets/owlcarousel/owl.carousel.js"></script>
        <script src="../js/superfish.js"></script>-->
        <script type="text/javascript" src="../js/parallax-slider/jquery.cslider.js"></script>
        <script type="text/javascript" src="../js/parallax-slider/modernizr.custom.28468.js">
        </script>
    </head>
    <body>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $games = 'games';
            include 'adminnavbar.php';
            ?>
        </header>
        <!-- end of header-->
        
        <div class="container">
            <h2>JetArena Games</h2>          

            <h3>Current Games</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Host</th>
                    <th>No. of People</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                    <td><button type="button" class="btn btn-success btn-xs">Join</button></td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                    <td>john@example.com</td>
                    <td><button type="button" class="btn btn-success btn-xs">Join</button></td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                    <td>john@example.com</td>
                    <td><button type="button" class="btn btn-success btn-xs">Join</button></td>
                </tr>
            </tbody>
            </table>
        </div>
        
        <?php
        //Footer
            include 'adminfooter.php';
        //Footer end
        ?>
    </body>
</html>
