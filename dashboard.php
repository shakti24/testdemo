<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function logout()
{
	$.ajax({
		url  : 'logout.php',
		success: function(data)
		{
			if(data=='success')
				window.location.replace('default.php');
			else
				alert('Try again.');
		}
	});
	return true;	
}
</script>
</head>
<body>
<div id='logout' onClick='return logout()'><button>Logout</button></div>


<?php

/* Google authentication */
require_once 'googleplus/src/Google_Client.php';
require_once 'googleplus/src/contrib/Google_Oauth2Service.php';

$client = new Google_Client();
$client->setApplicationName("Hello Demo");
$authUrl = $client->createAuthUrl();
$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  //$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];  
  //header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  //return;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if ($client->getAccessToken()) {
    $user = $oauth2->userinfo->get();
    $username = $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
    $fname = filter_var($user['given_name'], FILTER_SANITIZE_EMAIL);
    $lname = filter_var($user['family_name'], FILTER_SANITIZE_EMAIL);
    $gender = filter_var($user['gender'], FILTER_SANITIZE_EMAIL);
    //$img = filter_var($user['picture'], FILTER_VALIDATE_URL);
    $content = $user;
    $token = $client->getAccessToken();
	echo "Email : $username </br>";
	echo "Name : $fname $lname </br>";
	echo "Gender : $gender </br>";
	echo 'Profile Pic : <img src="'.$user['picture'].'">';
} 
else {
  $authUrl = $client->createAuthUrl();
}

?>
</body>

<footer>
	<marquee>
		Note: <i>This site is only for educational purpose. Please send your queries, feedbacks to rectify approach, to fix any issue or to any modification needed. Please write us at </i>
	</marquee>
</footer>

