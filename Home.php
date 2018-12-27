<html>
<head>
<title> Home Page</title>
<style type="text/css">
	body
	{
		font-family: 'Cambria';
		font-size:14px;
	}
	#username
	{
		font-family:'Trebuchet MS';
		font-size: 18px;
		color: blue;
		border:1px double green;
	}
	#logout
	{
		background-color: #d13623;
		height:60px;
		width: 250px;
		font-weight: bold;
		font-family: 'Cambria';
		font-size: 18px;
		border-radius: 20px;
		padding: 20px;
		
	}
	#icon
	{
		margin-left:-240px;
		margin-top: 10px;
	}
</style>
</head>
<body>
	<?php
	session_start();
	if(isset($_SESSION['username']))
	{
	echo $_SESSION['entered'];
}
		else
		{
			echo '<p style="color:black; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">You are not Logged in</p>';
			header("location:index.php");
		}
	?>
	<br/>
	<div id="username">
	<?php echo "Welcome Mr".$_SESSION['username'];?>
	</div>
	<form method="post">
		<br/>
		<input type="submit" name="logout" value="Take Me Out Of Here" id="logout"><span><img src="Images/exit.png" height="30px" id="icon"></span>
	</form>
	<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("location:index.php");
		$_SESSION['logedout']='<p style="color:green; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">You are not Logged in</p>';
		

	}

	?>
</body>
</html>
