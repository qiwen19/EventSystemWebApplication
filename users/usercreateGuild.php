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
        <script src="../js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    <body>
        <style>
            .red{
                color: red;
            }

        </style>
        <script>
            //function to check username availability  
            function checkGuild() {
                var guildname = document.getElementById("guild-name").value;
                if (guildname) {
                    $.ajax({
                        type: 'post',
                        url: 'checkGuildName.php',
                        data: {
                            guild: guildname,
                        }, success: function (response) {
                            $('#guild_status').html(response);
                            if (response == "OK") {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    });
                } else {
                    $('#guild_status').html("");
                    return false;
                }
            }
//            <p style="color: #7CFC00; font-weight: bold;">
            function checkall() {
                var guild = document.getElementById("guild_status").innerHTML;
                if ((guild) == '<p style="color: #7CFC00; font-weight: bold;">Guild Name can be assigned</p>') {
                    alert("Success");
                    return true;
                } else if((guild) == '<p style="color: red; font-weight: bold;">Guild Name Already Exist</p>') {
                    alert("Please choose another guild name");
                    return false;
                }
            }
        </script>
        <?php
        require_once '../includes/db/checkLoginStatus.php';
        ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            include 'userheadermenu.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> Create your Guild </h2>
                    <p> Fill in all the guild info, logo, etc. </p>

                    <form class="form-horizontal" action="../includes/db/createGuildHandle.php" method="post" onsubmit="return checkall();" enctype="multipart/form-data"><!-- action="../includes/db/createGuildHandle.php" method="post" -->
                        <div class="col-md-5">
                            <div class="form-group"> <!-- title field -->
                                <label class="control-label " for="title">Guild Name</label>
                                <input class="form-control" id="guild-name" name="guild" type="text" onkeyup="checkGuild();">
                                <span id="guild_status"></span>
                                <p id="nameError" class="red"></p> <!--validate name-->
                            </div>

                            <div class="form-group"> <!-- Message field -->
                                <label class="control-label " for="desc">Description</label>
                                <textarea class="form-control" cols="40" id="description-message" name="desc" rows="10" required></textarea>
                                <p id="descriptionError" class="red"></p> <!--validate description-->
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-md-5">
                                <img id='img-upload'/> <br/>
                                <label>Upload Guild Logo (image size not more than 1.3MB)</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="myFile">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                    <p id="imgError" class="red"></p> <!--validate description-->

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary " onclick="return validateGuildForm()" id="submit">Submit</button>
                            </div>
                        </div>
                    </form>								
                </div>
            </div>
        </div>
        <?php
        include 'userfooter.php';
        ?>
    </body>
</html>