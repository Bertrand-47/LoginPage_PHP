<?php
include('server.php')
?>
<html>
<head>
	<title>Login Page</title>
<style type="text/css">
	body
	{
		background-color: black;
		color:white;
	}
	#loginbox
	{
		border: 4px dashed blue;
		font-family: 'Cambria';
		font-size: 20px;
		height: 200px;
		width: 500px;
		padding-left: 5%;
		margin-left:35%;
		margin-top: 5%;
	}
  input[type="text"],input[type="password"]
  {
  	width: 250px;
  	height: 35px;
  	font-family: 'Cambria';
  	font-size: 18px;
  }
  input[type="submit"]
  {
  	width: 380px;
  	height: 30px;
  	background-color: green;
  	font-family: 'Cambria';
  	font-size: 18px;
  	color: white;
  	border-radius: 20px;

  }
  h3
  {
  	margin-top:5%;
  }
  #register
  {
  	font-family: 'Cambria';
  	color: red;
  	font-size:16px;
  }
  #pageborder
  {
  	border: 2.5px solid ;
  	height:400px;
  	border-radius: 170px 170px 10px 5px;
  	background-image: url('bg.jpg');
  	background-size: cover;
  }
 
</style>
</head>
<body>
<form method="post" action="">
	<h3 style="text-align:center;font-family:arial; color: red">Username Validation Form</h3>
	<div id="pageborder">
<table id="loginbox">
<tr><td>Your Username</td><td><input type="text" placeholder="Username" name="user"autocomplete="off" /></td></tr>
<tr><td colspan="4"><input type="submit" name="check" value="Validate My Username"></td></tr>
</table>
<?php
if(isset($_POST['check']))
{
	$username=mysqli_escape_string($con,$_POST['user']);
	$sql="SELECT * FROM users WHERE username='$username'";
	$fetcher=mysqli_query($con,$sql);
	if(mysqli_num_rows($fetcher)==1)
	{
		session_start();
		$_SESSION['username']=$username;
		echo '<p style="color:white; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>Please Wait... While We are Checking!!</p>';
		header("refresh:5; url=passwordrecovery.php");
	}
	else
	{
		echo '<p style="color:white; background-color:red; border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>The Username You Supplied Is Not Associated With Any Account!</p>';
	}
	}
	?>
	<br/>
	<br/>	
		</table>
		</div>
	</form>
</body>
</html>
