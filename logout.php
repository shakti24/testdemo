<?php
	session_start();
	session_destroy();
	
	require_once 'googleplus/src/Google_Client.php';
	require_once 'googleplus/src/contrib/Google_Oauth2Service.php';

	$client = new Google_Client();
	if(@$_SESSION['token'])
	{
		unset($_SESSION['token']);
		$client->revokeToken();
	}

	echo 'success';
	exit;
?>

