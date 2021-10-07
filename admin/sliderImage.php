<?php require_once '../includes/db/checkloginstatusadmin.php';
require '../includes/db/footerCtrl.php';?>
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
        require_once '../includes/db/sliderCtrl.php';
        
        $sl_id=$_GET['slid'];
        $updatedAt = date("Y-m-d H:i:s");
        ?>
        
        <div class="container">
            <div class="row">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title pull-left"> Change Image</span>
                        <a href="editSlider.php" class="btn btn-default pull-right" role="button">Cancel</a>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="panel-body">
                    <div class="col-lg-24">
                        <form class="form-horizontal" action="sliderImageHandle.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="contact-name" class="control-label">Upload Image:</label>
                                    <input class="form-control" type="file" name="newimage"/>
                                </div>
                            </div>
                            
                            <input type="hidden" name="sl_id"  value="<?= $sl_id ?>">
                            <input type="hidden" name="updatedAt"  value="<?=$updatedAt?>">
                            
                            
                            <button type = "submit" class = "btn btn-default">Change Image</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
         </div>
        <?php
        //Footer
            include 'adminfooter.php';
        //Footer end
        ?>
    </body>
</html>
