<?php
include('server.php');
?>
<html>
<head>
	<title>Update Password</title>
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
  input[type="text"],input[type="password"],select
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
  	background-image: url('bg2.jpg');
  	background-size: cover;
  }
 #disp
 {
 	border: 1px solid red;
 	background-color: red;
 }
</style>
</head>
<body>
<form method="post" action="">
	<h3 style="text-align:center;font-family:arial; color: red">Update Password</h3>
	<div id="pageborder">
<table id="loginbox">
<tr><td>Username</td><td><input type="text" name="user" id="disp" value="<?php session_start(); echo $_SESSION['username']?>"></td></td></tr>
<tr><td>Your New Password</td><td><input type="password" placeholder="New Password" name="p1" autocomplete="off"/></td></tr>
<tr><td>Confirm Your New Password</td><td><input type="password" placeholder="Confirm" name="p2" autocomplete="off"/></td></tr>
<tr><td colspan="4"><input type="submit" name="checkid" value="Update My Password"></td></tr>
</table>
<?php
if(isset($_POST['checkid']))
{
	$user=mysqli_escape_string($con,$_POST['user']);
	$p1=md5(mysqli_escape_string($con,$_POST['p1']));
	$p2=md5(mysqli_escape_string($con,$_POST['p2']));
	if($p1!=$p2)
	{
		echo '<p style="color:white; background-color:red; border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>The Two Password Does not Match!!</p>';	
	}
	else
	{
	$checker=mysqli_query($con,"update users set Password='$p1' where Username='$user'");
	if(!$checker)
	{
		mysqlI_error($con);
	}
		else
	{
		echo '<p style="color:white; background-color:green; border:1px double green; text-align:center;font-weight:bold; font-size:20px;">Your Password Has Been Changed Successfully!!</p>';
		header("refresh:5;url=message.php");
	}
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
