<?php
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once __DIR__ . '/Facebook/autoload.php';

// Include required libraries
//use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Configuration and setup Facebook SDK
 */
$appId         = '119948338800904'; //Facebook App ID
$appSecret     = 'bf53fede44b94fce150f2e1aa2680961'; //Facebook App Secret
$redirectURL   = "http://localhost/eventSystem/users/index.php"; //Callback URL
$fbPermissions = array('email');  //Optional permissions

$fb = new Facebook\Facebook([
  'app_id' => '119948338800904',
  'app_secret' => 'bf53fede44b94fce150f2e1aa2680961',
  'default_graph_version' => 'v2.2',
  ]);

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}

?>