<?php require_once '../includes/db/checkloginstatusadmin.php';
require '../includes/db/footerCtrl.php';
require '../includes/db/sliderCtrl.php';
?>
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
        <?php 
        include 'adminnavbar.php';
        ?>

        <div class="container">
                    <div class="panel-heading">    
                        <h3><span class="fa fa-cog"></span> Manage Site </h3>
                    </div>
                
                 <table class="table table-transparent table-bordered">
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Last Modified</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        <tr>
                        <td>Slider</td>
                        <td><?php echo callSliderDate();?></td>
                        <td><a href="editSlider.php" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        
                        <tr>
                        <td>Admin Console</td>
                        <td><?php echo callAdminDate();?></td>
                        <td><a href="editAdmin.php" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        
                        <tr>
                        <td>Footer</td>
                        <td><?php echo callFooterDate();?></td>
                        <td><a href="editfooter.php" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                    </tbody>
                </table>

        </div>

    </body>
            <?php
        //Footer
            include 'adminfooter.php';
        //Footer end
        ?>
</html>
