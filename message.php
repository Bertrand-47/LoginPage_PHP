<html>
<head>
<title> Redirect</title>
<style type="text/css">
	body
	{
		background-image: url('Images/loading.gif');
		background-color: black;
		background-repeat: no-repeat;
	}
</style>
</head>
<body>
<?php
echo '<p style="color:white;  border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>This Page Will Redirect You To Login Page In 5 second!</p>';	
header("refresh:5; url=index.php");
?>
</body>
</html>