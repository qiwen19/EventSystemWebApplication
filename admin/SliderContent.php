        <?php
        require_once '../includes/db/sliderCtrl.php';

           $con = open_connection();
            
           $slider = getSlider($con, 0);
            
           
           foreach($slider as $sliderinfo){
            echo "<div class='col-lg-12'>";
            echo "<b>Title:</b> {$sliderinfo['slider_title']}<br/>";
            echo "<b>Description:</b> {$sliderinfo['slider_description']}<br/>";
            echo "<b>Image:</b> <img src='../img/".$sliderinfo['slider_filename']."' width='10%'></div>";
            echo "<div class='col-lg-12'>";
            echo "<div class='btn-group' role='group' aria-label='...'>";
            echo "<a href='editslidercontent.php?slid={$sliderinfo['sl_id']}'  class='btn btn-success' role='button'>Edit</a>";
            echo "<a href='sliderImage.php?slid={$sliderinfo['sl_id']}'  class='btn btn-primary' role='button'>Change Image</a>";
            echo "<a href='deleteslidercontent.php?slid={$sliderinfo['sl_id']}'  class='btn btn-danger' role='button'>Delete</a>";
            echo "</div><hr/></div>";
            
           }
     
        ?>