<?php
session_start();
require_once 'vendor/autoload.php';
  
// init configuration
$clientID = '';
$clientSecret = '';
$redirectUri = 'http://localhost/myquiz/login.php';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  
  $_SESSION['name']=$name;
  $_SESSION['email']=$email;
  //exit($name);
  header('Location:dashboard.php'); 
  
  // now you can use this profile info to create account in your website and make user logged in.
} else { ?>

<body>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>myQuiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once 'includes/styles.php' ?>
</head>

<div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-2">
     
    </div>
    
	
	<div class="col-sm-8 text-center"> 
      <h1>Login to myQuiz</h1>
      <p>Google OAuth Login</p>
	  <a class="btn btn-success" href="<?php echo $client->createAuthUrl()?>">Google Login</a>
    </div>
	
    <div class="col-sm-2">
  
    </div>
  </div>
</div>





<?php require_once 'includes/script.php' ?>

</body>
</html>


<?php }
?>


