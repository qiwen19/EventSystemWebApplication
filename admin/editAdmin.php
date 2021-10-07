<!DOCTYPE html>
<?php require_once '../includes/db/checkloginstatusadmin.php';
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
        <?php  include 'adminnavbar.php'; ?>
        
        <div class="container">
            <div class="row">
                <div class="panel panel-default panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title pull-left"> Admin Console</span>
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a href="newadmin.php" class="btn btn-default" role="button">New Admin</a>
                            <a href="changepassword.php"  class="btn btn-default" role="button">Change Password</a>
                            <a href="editweb.php"class="btn btn-danger" role="button">Cancel</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="panel-body"> 
                        <?php
                        $adm_id = "";
                        foreach($_SESSION as $userinfo){
                            foreach($userinfo as $adminfo){ 
                                $adm_id = $adminfo["adm_id"];
                            }
                        }
                        
                        $adm_name = "";
                        $email = "";
                        $password = "";
                        $countrytno = "";
                        $contactno = "";
                        $updatedAt = date("Y-m-d H:i:s");
          
                        $admin = getAdminbyID($con, $adm_id);
            
                        foreach ($admin as $adminInfo){
                            $adm_name = $adminInfo['adm_name'];
                            $email = $adminInfo['email'];
                            $password = $adminInfo['password'];
                            $contactno = $adminInfo['contact_no'];
                            $countryno = $adminInfo['country_no'];
                        }
                        ?>
                        
                    <div class="col-lg-24">
                        <form class="form-horizontal" action="editAdminHandle.php" method="post">
                            <div class="form-group">
                                <div class="col-lg-6">
                                <label for="contact-name" class="control-label">Name:</label>
                                <input class="form-control" type="text" name="adm_name" size="50" value="<?= $adm_name ?>" />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="contact-name" class="control-label">Email:</label>
                                    <input class="form-control" type="email" name="email" size="50" value="<?= $email ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="contact-name" class="control-label">Country Code:</label>
                                    <input class="form-control" type="text" name="country_no" size="50" value="<?= $countryno ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="contact-name" class="control-label">Contact No:</label>
                                    <input class="form-control" type="text" name="contact_no" size="50" value="<?= $contactno ?>" />
                                </div>
                            </div>              
                
                            <input type="hidden" name="adm_id"  value="<?= $adm_id ?>">
                            <input type="hidden" name="updatedAt"  value="<?=$updatedAt?>">

                            <button type = "submit" class = "btn btn-success">Update Infomation</button>
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
