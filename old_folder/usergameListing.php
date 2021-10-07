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
    require_once '../includes/db/gameCtrl.php';
    require_once '../includes/db/attendanceCtrl.php';
    
    $con = open_connection();
    ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $games = 'games';
            include 'userheadermenu.php';
            ?>
        </header>
        <!-- end of header-->
        
        <div class="container">
            <h2>JetArena Games</h2>          
            <a href="usergames.php" class="btn btn-danger" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            <h3>Drafts</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $draftGames = getDraftGames($con,2,$session_urid);

                    foreach($draftGames as $draftGamesData){
                        $draftName = $draftGamesData['ga_name'];
                        $draftDate= $draftGamesData['date'];
                        echo "<tr><td>".$draftName."</td>";
                        echo "<td>".$draftDate."</td>";
                        echo "<td><a href='testingForm.php' class='btn btn-success btn-xs'>Edit</a></td></tr>";
                    }
                ?>
            </tbody>
            </table>
            
            <h3>Attending Games</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Host</th>
                    <th>No. of People</th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                        include 'attendingGamesTable.php'; 
                    ?>
            </tbody>
            </table>
            
            <h3>Past Games</h3> 
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game Name</th>
                    <th>Date & Time</th>
                    <th>Host</th>
                    <th>No. of People</th>
                    <th>Win/Lose</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        include 'pastGamesTable.php';
                ?>
            </tbody>
            </table>
        </div>
        
        <?php
            include 'userfooter.php';
        ?>
    </body>
</html>
