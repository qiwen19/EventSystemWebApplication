<?php require_once'../includes/db/adminCtrl.php';
$con = open_connection();
?>
<nav id="mainNav" class="navbar navbar-inverse navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="adminhome.php"><img src="../img/logo.png" class="navlogo" alt="logo" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">s
                    <a href="#page-top"></a>
                </li>
                <li class="<?php echo ($home == 'home') ? "active" : ""; ?>"><a href = "adminhome.php">Home</a></li>
                <li class="<?php echo ($games == 'games') ? "active" : ""; ?>"><a href = "admingames.php">Games</a></li>
                <li class="<?php echo ($guilds == 'guilds') ? "active" : ""; ?>"><a href = "adminguilds.php">Guilds</a></li>
                <!-- /dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
                         <?php echo callAdminName(); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="editweb.php"><span class="fa fa-pencil"></span>&nbsp Manage Site</a></li>
                        <li class="divider"></li>
                        <li><a href="dashboard.php"><span class="fa fa-cog"></span>&nbsp DashBoard</a></li>
                        <li class="divider"></li>
                        <li><a href="logoutHandle.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp Sign-out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>