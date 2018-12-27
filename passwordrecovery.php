<?php
include('server.php');
?>
<html>
<head>
	<title>Password Recovery</title>
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
 
</style>
</head>
<body>
<form method="post" action="">
	<h3 style="text-align:center;font-family:arial; color: red">Username Validation Form</h3>
	<div id="pageborder">
<table id="loginbox">
<tr><td>Username</td><td><input type="text" placeholder="Username" name="user"autocomplete="off" value="<?php session_start(); echo $_SESSION['username']?>"/></td></tr>

<tr><td>Security Question</td><td>
	<select name="securityquestion">
					<option>
						What is Your Pet Name?
					</option>
					<option>
						What is the Name of Your Father Nurse?
					</option>
					<option>
						What is your Favorite Color?
					</option>
					<option>
						What is your Favorite Word?
					</option>
				</select>
</td></tr>
<tr><td>Your Answer</td><td><input type="text" placeholder="Answer" name="answer"autocomplete="off"/></td></tr>

<tr><td colspan="4"><input type="submit" name="checkid" value="Validate My Identity"></td></tr>
</table>
<?php
if(isset($_POST['checkid']))
{
	$username=mysqli_escape_string($con,$_POST['user']);
	$security=mysqli_escape_string($con,$_POST['securityquestion']);
	$answer=mysqli_escape_string($con,$_POST['answer']);
	$security=md5($security);
	$answer=md5($answer);
	$sql="SELECT * FROM users WHERE Username='$username' and Security_Question='$security' and Answer='$answer'";
	$fetcher=mysqli_query($con,$sql);
	if(mysqli_num_rows($fetcher)==1)
	{
		echo '<p style="color:white; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>Identity Verified With Success!! Please Wait a While.</p>';
		header("refresh:5; url=updatepassword.php");	
		
	}
	else
	{
		echo '<p style="color:white; background-color:red; border:1px double red; text-align:center;font-weight:bold; font-size:20px;" class=css3-notification>The Combination of Your Security Recovery Details Is Invalid!!</p>';
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
