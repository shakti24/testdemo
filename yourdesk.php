<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function saveform() 
{	
	$.ajax({
		type : 'POST',
		url  : 'saveform.php',
		data : $('#yourdesk').serialize(),
		success: function(data)
		{
			if(data=='success')
				alert('Thank you writing us.');
			else
				alert('Try submitting again.');
		}
	});
}
</script>
</head>

<body>

<form id='yourdesk' action='javascript:void(0)' method='post'>
	<textarea id='formarea' name='formarea' rows="6" cols="80" placeholder='Please share your concern'></textarea></br>
	<div onclick='saveform()'><button>submit</input></div>
</form>
</body>




