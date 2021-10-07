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
        <link rel="stylesheet" href="../css/styleCreateGame.css">
        <link href="../fontawesome4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" />
        <!-- Scripts !--> 
        <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
        <script defer src="../js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="../js/jquery.parallax-1.1.3.js"></script>
        <script src="../js/link-hover.js"></script>
        <script src="../js/modernizr-1.6.min.js" type="text/javascript"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../bootstrap3/js/bootstrap.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script type="text/javascript" src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
        <script src="../js/script.js"></script>
        <script type="text/javascript">
            var dateToday = new Date();
            $(function () {
                $('input[name="datetime"]').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    "singleDatePicker": true,
                    "opens": "center",
                    "minDate": dateToday
                           
                },
                        function (start, end, label) {
                            var years = moment().diff(start, 'years');
                        });
            });
        </script>
    </head>
    <body>
        <?php
        //require_once '../includes/db/editGameHandle.php';
        require_once '../includes/db/gameCtrl.php';
        require_once '../includes/db/checkLoginStatus.php';
        
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $gameNumber = $_GET['id'];
        }
        
        $con = open_connection();
        
        $getGamesById = getGamesById($con, $gameNumber);
        
        $ga_name = "";
        $ga_type = "";
        $date = "";
        $start = "";
        $end = "";
        $location = "";
        $min_attendance = "";
        $description = "";
        $rules_pdf = "";
        $updatedAt = date("Y-m-d H:i:s");
        
        foreach ($getGamesById as $getGamesByIdData){
            $ga_name = $getGamesByIdData['ga_name'];
            $ga_type = $getGamesByIdData['ga_type'];
            $date = $getGamesByIdData['date'];
            $start = $getGamesByIdData['start'];
            $end = $getGamesByIdData['end'];
            $location = $getGamesByIdData['location'];
            $min_attendance = $getGamesByIdData['min_attendance'];
            $description = $getGamesByIdData['description'];
            $rules_pdf = $getGamesByIdData['rules_pdf'];
            $updatedAt = date("Y-m-d H:i:s");
        }
        ?>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $now = date("Y-m-d");
            $time = time("H:i:s");
            include 'userheadermenu.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="white"> Edit </h2>

                    <form action="../includes/db/editDraftHandle.php" class="form-horizontal" onsubmit="return checkall();" method="post" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <div class="form-group"> <!-- title field -->
                                <label class="control-label white" for="title">Title</label>
                                <input class="form-control" id="name" name="title" value="<?php echo $ga_name; ?>" type="text"/>
                            </div>
                         </div>
                        
                        <div class="col-md-9">
                            <div class="form-group"> <!-- title field -->
                                <label class="control-label white" for="date">Date</label>
                                <div class='input-group date'>
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                <input type="text" class="form-control datepicker" name="datetime" id="datetime" value="<?php echo $date; ?>" required="required"/>
                                </div>
                            </div>
                         </div>
                        
                        <div class='col-xs-4'>
                            <div class="form-group">
                                <label class="control-label white" for="date">Start Time</label>
                                <div class='input-group date' id='startTime1'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    <input type='text' class="form-control" name="start" id="start" value="<?php echo $start; ?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-xs-1'>
                        </div>
                        
                        <div class='col-xs-4'>
                            <div class="form-group">
                                <label class="control-label white" for="date">End Time</label>
                                <div class='input-group date' id='endTime1'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <input type='text' class="form-control" name="end" id="end" value="<?php echo $end; ?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="form-group"> <!-- Subject field -->
                                <label class="control-label white requiredField" for="location">Game Type:</label>
                                <input class="form-control" id="subject" name="ga_type" type="text" value="<?php echo $ga_type; ?>"/>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="form-group"> <!-- Subject field -->
                                <label class="control-label white requiredField" for="location">Location</label>
                                <input class="form-control" id="subject" name="location" type="text" value="<?php echo $location; ?>"/>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="form-group"> <!-- Subject field -->
                                <label class="control-label white requiredField" for="min">Min. Attendance</label>
                                <input type="number" min="2" max="20" step="1" name="min" style="color: black" value="<?php echo $min_attendance; ?>"/>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="form-group"> <!-- Message field -->
                                <label class="control-label white" for="desc">Description</label>
                                <textarea class="form-control" cols="40" id="message" name="desc" rows="10"><?php echo $description; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="white">Upload Game Rules (image size not more than 1.3MB)</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="myRules">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                    <input type="hidden" value="<?=$gameNumber?>" name="game_id">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary " id="submit" name="post">Post Game</button>
                                <button class="btn btn-primary " id="submit" name="save">Save</button>
                            </div>
                        </div>
                    </form>								

                </div>
            </div>
        </div>
            <?php
            include 'userfooter.php';
            ?>
        
        <script type="text/javascript">
            var $startTime1 = $('#startTime1');
            var $endTime1 = $('#endTime1');

            $startTime1.datetimepicker({
                format: 'LT',
                stepping: 15,
                minDate: moment().startOf('day'),
                maxDate: moment().endOf('day')
            });

            $endTime1.datetimepicker({
                format: 'LT',
                useCurrent: false,
                stepping: 15,
                minDate: moment().startOf('day'),
                maxDate: moment().endOf('day')
            });

            $startTime1.on("dp.change", function(e) {
                $endTime1.data("DateTimePicker").minDate(e.date);
            });

            $endTime1.on("dp.change", function(e) {
                $startTime1.data("DateTimePicker").maxDate(e.date);
            });

            $endTime1.on("dp.show", function(e) {
                if (!$endTime1.data("DateTimePicker").date()) {
                    var defaultDate = $startTime1.data("DateTimePicker").date().add(1, 'hours');
                    $endTime1.data("DateTimePicker").defaultDate(defaultDate);
                }
            });
        </script>
       
            <?php
            include 'userfooter.php';
            ?>
    </body>
</html>
