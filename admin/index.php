<!DOCTYPE html>
<?php 
require '../includes/db/footerCtrl.php';
?>
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
        <nav id="mainNav" class="navbar navbar-inverse navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                 <a class="navbar-brand page-scroll" href="adminhome.php"><img src="../img/logo.png" class="navlogo" alt="logo" /></a>
                </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                    </ul>
                </div>
        <!-- /.navbar-collapse -->
            </div>
    <!-- /.container-fluid -->
        </nav>
        
        <div class="container">
            <div class="col-lg-6">
                <img src="../img/loginpic.jpg" style="width: 100%">
            </div>
            <div class="col-lg-6 pull-right">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title pull-left"><h3>Administrator Login Page</h3></span>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="panel-body">
                    <div class="col-lg-12">
                        <form class="form-horizontal" action="LoginHandle.php" method="post">
                            <div class="form-group">
                                <div class="col-lg-8">
                                    <label for="contact-name" class="control-label">Login ID:</label>
                                    <input class="form-control" type="text" name="userid" size="50" />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-lg-8">
                                    <label for="contact-name" class="control-label">Password:</label>
                                    <input class="form-control" type="password" name="password" size="50" />
                                </div>
                            </div>
                            
                            <?php
                            if (isset($_GET['error'])) {
                                switch ($_GET['error']) {
                                    case "1" : echo "Login failed. Please try again. <br />";
                                    break;
                                    case "2" : echo "Please login. <br />";
                                    break;
                                }
                            }
                            ?>
                             <button type = "submit" class = "btn btn-default">Login</button>
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
