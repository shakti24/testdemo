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
session_start();
print_r($_SESSION);
?>
</body>

<footer>
	<marquee>
		Note: <i>This site is only for educational purpose. Please send your queries, feedbacks to rectify approach, to fix any issue or to any modification needed. Please write us at </i>
	</marquee>
</footer>