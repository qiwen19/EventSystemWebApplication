<?php
//require_once 'checkLoginStatus.php';
// Get logout url
//$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL . '/../userlogoutHandle.php');
?>
        <link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
        <!--<link rel="stylesheet" type="text/css" href="../css/parallax-slider/parallax-slider.css"/>-->
        <link rel="stylesheet" href="../css/bootstrap-social.css">
        <link rel="stylesheet" href="../css/style.css">
<nav id="mainNav" class="navbar navbar-inverse navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="userhomepage.php"><img src="../img/logo.png" alt="logo" class="navlogo" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">s
                    <a href="#page-top"></a>
                </li>
                <li class="<?php echo ($home == 'home') ? "active" : ""; ?>"><a href = "#">Home</a></li>
                <li class="<?php echo ($games == 'games') ? "active" : ""; ?>"><a href = "#">Games</a></li>
                <li class="<?php echo ($guilds == 'guilds') ? "active" : ""; ?>"><a href = "#">Guilds</a></li>
                <!-- /dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
                        <img src="" class="img-circle" width="30" >  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href=""><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp Sign-out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>