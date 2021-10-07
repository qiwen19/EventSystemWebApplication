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
        <script>
            function Ban(){
            return confirm('Are you sure you want to Ban?');
        }
             function UnBan(){
            return confirm('Are you sure you want to UnBan?');
        }
        </script>
    </head>
    <body>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            include 'adminnavbar.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container"> 
            <h2>Dashboard</h2> 

            
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>In Game Name</th>
                    <th>Last Login</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../includes/db/userCtrl.php';
                    $user = getUser($con);

                    foreach($user as $userdata){
                        $ur_id = $userdata['ur_id'];
                        $firstname = $userdata['first_name'];
                        $lastname = $userdata['last_name'];
                        $ign = $userdata['in_game_name'];
                        $status = $userdata['status'];

                        if($status == '0'){
                        echo "<tr><td>".$firstname.' '.$lastname."</td>";
                        echo "<td><a href='showUserProfile.php?urid={$ur_id}'>".$ign."</a></td><td>";
                        echo callUserDateDash($ur_id);
                        echo "</td><td><a href='banuser.php?urid={$ur_id}' onclick='return Ban()' class='btn btn-danger btn-xs'>Ban User</a></td>";
                    }else{
                        echo "<tr><td>".$firstname.' '.$lastname."</td>";
                        echo "<td><a href='showUserProfile.php?urid={$ur_id}'>".$ign."</a></td><td>";
                        echo callUserDateDash($ur_id);
                        echo "</td><td><a href='unbanuser.php?urid={$ur_id}' onclick='return UnBan()' class='btn btn-success btn-xs'>UnBan User</a></td>";
                    }
                        }
                ?>
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
