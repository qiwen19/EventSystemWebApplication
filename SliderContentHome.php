        <div id="da-slider" class="da-slider">

<?php
        require_once 'includes/db/sliderCtrl.php';

           $con = open_connection();
            
           $slider = getSlider($con, 0);
            
           
           foreach($slider as $sliderinfo){
               
               
           echo '<div class="da-slide">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <i>'.$sliderinfo['slider_title'] .'</i>
                                <BR/>
                            </h2>
                            <p>'.$sliderinfo['slider_description'].'
                            </p>
                            <div class="da-img">
                                <img src="img/'.$sliderinfo['slider_filename'].'" style="height: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            
           }
     
        ?> 


            <nav class="da-arrows">
                <span class="da-arrows-prev">
                </span>
                <span class="da-arrows-next">
                </span>
            </nav>
        </div>