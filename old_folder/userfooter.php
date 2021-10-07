<?php
include '../includes/db/footerCtrl.php';
require_once '../footerData.php';

   ;?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <footer>
     <div class="container">
       <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="contact">
                         <span>SiteMap</span>    
                         <li>
                            <a href="#">Home</a>
                          </li>
                               
                          <li>
                             <a href="#">Games</a>
                          </li>
                               
                          <li>
                            <a href="#">Guilds</a>
                          </li>
                               
                          <li>
                             <a href="#">Profile </a>
                          </li>
 
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="adress">
                         <span>Address</span>    
                         <li>
                            <p><?=$address?></p>
                          </li>
                               
                          <li>
                            <p>Office: <?=$of_country_no.' '.$of_contact_no?></p>
                          </li>
                               
                          <li>
                            <p>HP: <?=$hp_country_no.' '.$hp_contact_no?></p>
                          </li>
                     </ul>
                </div>
           
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <ul class="social">
                              <span>Social</span>    
                               <li>
                                    <a href="<?=$facebook_url?>"><i class="fa fa-facebook fa-2x"></i></a>
                               </li>
                              
                               <li>
                                    <a href="<?=$instagram_url?>"><i class="fa fa-instagram fa-2x"></i></a>
                               </li>
                                
                               <li>
                                    <a href="<?=$youtube_url?>"><i class="fa fa-youtube fa-2x"></i></a>
                               </li>
                               
                              
                     </ul>
               </div>
           
           
           </div> 
        </div>
    </footer>
