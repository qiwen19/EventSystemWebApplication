<nav id="mainNav" class="navbar navbar-inverse navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php"><img src="img/logo.png" alt="logo" class="navlogo"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="<?php echo ($home == 'home') ? "active" : ""; ?>"><a href = "index.php">Home</a></li>
                <li class="<?php echo ($games == 'games') ? "active" : ""; ?>"><a href = "games.php">Games</a></li>
                <li class="<?php echo ($guilds == 'guilds'
                        ) ? "active" : ""; ?>"><a href = "guilds.php">Guilds</a></li>
                <li><a href="users/userlogin.php">Sign In / Register</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>