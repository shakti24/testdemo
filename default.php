<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/layout.css">

<script src="js/facebook.js"></script>

</head>


<body>

<div id='content'>

<div>
<?php 


require_once 'googleplus/src/Google_Client.php';
require_once 'googleplus/src/contrib/Google_Oauth2Service.php';

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$oauth2 = new Google_Oauth2Service($client);
$authUrl = $client->createAuthUrl();

echo "<a>Login Functionality through: </a></br>";
?>



<a href="<?php echo $authUrl;?>" ><img src="images/icon-googleplus.jpg"></a>&nbsp;</br>
<a href="javascript:void(0);" id="fb-login"><img src="images/icon-fb.jpg"></a>
</div>

<div

 id='footer'>
<a>Note: This site is only for educational purpose. Please send your queries, feedbacks to rectify approach, 
to fix any issue or to any modification needed.</a>
<a><marquee> Please write us at <i>shakti@hellodemo.pe.hu</i></marquee>
</a>&nbsp;</br>

<a> Refereal Link: (added by admin) </a>&nbsp;</br>
<a href="http://api.hostinger.in/redir/20244519" target="_blank"><img src="http://www.hostinger.in/banners/en/hostinger-728x90-1.gif" alt="Free Hosting" border="0" width="728" height="90"></a>

</div>
</body>
</html>







