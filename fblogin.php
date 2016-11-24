<?php
if(@$_POST['userdetail']){    
    $userDetail = json_decode($_POST['userdetail'], true);
    if (@$userDetail['id']) {
        //$username = $email = filter_var(@$userDetail['email'], FILTER_SANITIZE_EMAIL);
        //$name = explode(' ', @$userDetail['name']);
        //$firstName = filter_var(@$name[0], FILTER_SANITIZE_EMAIL);
        //$lastName = filter_var(@$name[1], FILTER_SANITIZE_EMAIL);
        //$gender = filter_var($user['gender'], FILTER_SANITIZE_EMAIL);
        //$img = filter_var($user['picture'], FILTER_VALIDATE_URL);
		session_start();
		$_SESSION['userDetail'] = $userDetail;
		echo 'success';
	}
}
else
{
    echo 'failure';
}
exit;

?>

