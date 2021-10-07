<?php

$con = open_connection();
$search = $_GET['search'];
$image = "";
$firstname = "";
$lastname = "";
$ingamename = "";
$fblink = "";
$ur_id = "";
$bio = "";

$showuser = getUserbyIGN($con, $search);

if($showuser != null){
foreach($showuser as $userinfo){
    $ur_id = $userinfo['ur_id'];
    $image = $userinfo['picture'];
    $firstname = $userinfo['first_name'];
    $lastname = $userinfo['last_name'];
    $ingamename = $userinfo['in_game_name'];
    $fblink = $userinfo['link'];
    $bio = $userinfo['bio'];
     }


?>
<div class="container profile">
            <div class="row user-menu-container square">
                <div class="col-md-15 user-details">
                    <div class="row">
                        <div class="col-md-4 no-pad">
                            <div class="user-image">
                                <img src="<?= $image ?>" class="img-circle img-responsive" style="width: 200px;"> 
                            </div>
                        </div>
                        
                        <div class="col-md-4 no-pad">
                            <div class="user-pad">
                                <h3><?= $firstname." ".$lastname; ?></h3>
                                <h4><?= $ingamename ?></h4>
                                <h5> Joined on <?= callUserDate($ur_id); ?> </h5>
                                <?php if($userData['ur_id']==$ur_id){
                                    echo "<a href='edituserprofile.php' class='btn btn-labeled btn-info' role='button'><i class='fa fa-pencil'></i> Edit Profile</a>";
                                }
                                ?>
                            </div>
                        </div>
                        
                        <div class="col-md-4 no-pad">
                            <div class="panel panel-default socialmedia panel-transparent">
                                <div class="panel-heading">Connect</div>
                                    <div class="panel-body">
                                        <a href="<?= $fblink ?>" class="fa fa-facebook fa-2x"></a>
                                        <?php 
                                        $twitter = getSocialTw($con, $ur_id);
                                        $tw = "";
                                        $twlink = "";
                                        
                                        foreach($twitter as $twitterData ){
                                        $tw = $twitterData['social_media_type'];
                                        $twlink = $twitterData['social_media_url'];
                                        }
                                        
                                        if($tw == 'Twitter' && $twlink != 'http://twitter.com/' && $twlink != null){
                                            echo '<a href="'.$twlink.'" class="fa fa-twitter fa-2x"></a>';
                                            }
                                            
                                        $instagram = getSocialIg($con, $ur_id);
                                        $ig = "";
                                        $iglink = "";
                                        
                                        foreach($instagram as $instagramData){
                                        $ig = $instagramData['social_media_type'];
                                        $iglink = $instagramData['social_media_url'];
                                        }
                                        
                                        if($ig == 'Instagram' && $iglink != 'http://instagram.com/' && $iglink != null ){
                                            echo '<a href="'.$iglink.'" class="fa fa-instagram fa-2x"></a>';
                                            }    
                                            ?>
                                    </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-6 user-pad text-center">
                            <h4>WINS</h4>
                            <h5>2,784</h5>
                        </div>
                        <div class="col-md-6 user-pad text-center">
                            <h4>LOSE</h4>
                            <h5>456</h5>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="panel panel-default panel-transparent">
                            <div class="panel-heading">Biography</div>
                                <div class="panel-body">
                                    <?= $bio ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
<?php 
}else{
    echo "<h1> user not found </h1>";
}
?>