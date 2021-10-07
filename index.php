<!DOCTYPE html>

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
        
    </head>
    
    <body>
        <?php
        require_once '/includes/db/guildCtrl.php';
        require_once '/includes/db/userCtrl.php';
                    
        $con = open_connection();
        $newUsers = getNewUser($con,0);
        $getguild = getAllGuild($con, 0)
        
        ?>
        
        <!-- Navigation Bar !-->
        <header class="head-section">
            <?php
            $home = 'home';
            include 'menu.php';
            ?>
        </header>
        <!-- end of header-->
        
        <?php 
        //Slider
            include 'SliderContentHome.php';
        //Slider end 
        
        //MVP + Latest User
            include 'mvpLatestUserNotLogged.php';
        //end
        
        //Footer
            include 'footer.php';
        //Footer end
        ?>

    </body>
    
    <!-- Slider Scripts !-->
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/parallax-slider/jquery.cslider.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/parallax-slider/modernizr.custom.28468.js"></script>
    
    <script type="text/javascript">
            $(function () {

                $('#da-slider').cslider({
                    autoplay: true,
                    bgincrement: 100
                });

            });
     </script>
        
    <!--common script for all pages-->
        <script src="js/common-scripts.js">
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function () {


                $('.bxslider1').bxSlider({
                    minSlides: 5,
                    maxSlides: 6,
                    slideWidth: 360,
                    slideMargin: 2,
                    moveSlides: 1,
                    responsive: true,
                    nextSelector: '#slider-next',
                    prevSelector: '#slider-prev',
                    nextText: 'Onward →',
                    prevText: '← Go back'
                });

            });


        </script>


        <script>
            $('a.info').tooltip();

            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });

            $(document).ready(function () {

                $("#owl-demo").owlCarousel({
                    items: 4

                });

            });

            jQuery(document).ready(function () {
                jQuery('ul.superfish').superfish();
            });

            new WOW().init();


        </script>
      
