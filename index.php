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
		border: 3px solid blue;
		font-family: 'Cambria';
		font-size: 20px;
		height: 200px;
		width: 500px;
		padding-left: 5%;
		margin-left:35%;
		margin-top: 15%;
	}
  input[type="text"],input[type="password"]
  {
  	width: 200px;
  	height: 30px;
  	font-family: 'Cambria';
  	font-size: 18px;
  }
  input[type="submit"]
  {
  	width: 150px;
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
  #forgot
  {
  	margin-left: 46%;
  	color: white;
  	text-decoration-color: white;
  	font-family: 'times new roman';
  	font-size: 16px;
  	font-weight: bold;
  }

</style>
</head>
<body>
<form method="post" action="">
	<h3 style="text-align:center;font-family:arial; color: red">Login Page</h3>
<table id="loginbox">
<tr><td>Username</td><td><input type="text" placeholder="Username" name="user"autocomplete="off" /></td></tr>
<tr><td>Password</td><td><input type="password" placeholder="Password" name="pass"   /></td></tr>
<tr><td><input type="submit" value="Login" name="loginbtn" /></td><td> <a href="register.php" id="register">Not Registered? Register Here.</a></td></tr>
</table>
<a href="validator.php" id="forgot">I Forgot My Password!</a>
<?php
if(isset($_POST['loginbtn']))
{
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$password=md5($password);
	$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$fetcher=mysqli_query($con,$sql);
	if(mysqli_num_rows($fetcher)==1)
	{
		session_start();
		$_SESSION["entered"]='<p style="color:black; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">You Logged In Successfully</p>';
		$_SESSION['username']=$username;
		header("location:Home.php");
	}
	else
	{
		echo '<p style="color:black; background-color:red; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">Incorrect Credintials!!</p>';
	}
	}
	?>
	<br/>
	<br/>
	
</form>
</body>
</html>