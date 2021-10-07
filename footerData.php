<?php

   $con = open_connection();
   $footer = getFooter($con,1,0);
   $ft_id = "";
   $adm_id = "";
   $address = "";
   $hp_country_no = "";
   $hp_contact_no = "";
   $of_contact_no = "";
   $of_country_no = "";
   $facebook_url = "";
   $youtube_url = "";
   $instagram_url = "";
   $updatedAt = date("Y-m-d H:i:s");
           
        foreach($footer as $eachfooter){
        $ft_id = $eachfooter["ft_id"];
        $adm_id = $eachfooter["adm_id"];
        $address = $eachfooter["address"];
        $of_contact_no = $eachfooter["of_contact_no"];    
        $hp_contact_no = $eachfooter["hp_contact_no"];   
        $of_country_no = $eachfooter["of_country_no"];   
        $hp_country_no = $eachfooter["hp_country_no"];  
        $facebook_url = $eachfooter["facebook_url"]; 
        $youtube_url = $eachfooter["youtube_url"]; 
        $instagram_url = $eachfooter["instagram_url"]; 
            }
    
?>