<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JetArena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Stylesheets !-->
        <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/parallax-slider/parallax-slider.css"/>
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="fontawesome4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Scripts !-->
        <script type="text/javascript" src="js/hover-dropdown.js"></script>
        <script src="js/jquery-1.12.3.js" type="text/javascript"></script>
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script src="js/link-hover.js"></script>
        <script src="js/modernizr-1.6.min.js" type="text/javascript"></script>
        <script src="js/wow.min.js"></script>
        <script src="bootstrap3/js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script type="text/javascript">
            $(function () {
                $('input[name="bookdate"]').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    "singleDatePicker": true,
                    "opens": "center"
                },
                        function (start, end, label) {
                            var years = moment().diff(start, 'years');
                        });
            });
        </script>
    </head>
    <body>
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $now = date("Y-m-d");
            include 'menu.php';
            ?>
        </header>
        <!-- end of header-->
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
        <h2> Host a Game </h2> (<a href="gameListing.php" role="button">view drafts</a>)
        <p> Fill in all the game rules, location, details, etc. </p>
        
        <form>

	<div class="form-group"> <!-- title field -->
		<label class="control-label " for="title">Title</label>
		<input class="form-control" id="name" name="title" type="text"/>
	</div>
	
	<div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input type="text" class="form-control datepicker" name="bookdate" value="<?php echo $now; ?>" required="required"/>
        </div>
	
	<div class="form-group"> <!-- Subject field -->
		<label class="control-label requiredField" for="location">Location</label>
		<input class="form-control" id="subject" name="location" type="text"/>
	</div>
        
        <div class="form-group"> <!-- Subject field -->
                <label class="control-label requiredField" for="min">Min. Attendance</label>
                <input type="number" min="2" max="20" step="2" />
                
                <label class="control-label requiredField" for="max"> Max. Attendance</label>
                <input type="number" min="2" max="20" step="2" />
        </div>
	
	<div class="form-group"> <!-- Message field -->
		<label class="control-label " for="desc">Description</label>
		<textarea class="form-control" cols="40" id="message" name="desc" rows="10"></textarea>
	</div>
            
        <div class="form-group">
                <label class="control-label">Attachment</label>
                <input type="file" class="form-control-file" id="attachment">
        </div>
            
	<div class="form-group">
		<button class="btn btn-primary " name="submit" type="submit">Submit</button>
	</div>
	
        </form>								

                </div>
            </div>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
