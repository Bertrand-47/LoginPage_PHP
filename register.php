<?php
include("server.php")
?>
<html>
<head>
	<title>Registration Page</title>
	<style type="text/css">
		#regbox
		{
			border:9px solid blue;
			border-radius: 45px 90px 20px 10px;
			font-family: 'Cambria';
			font-size: 18px;
			width: 650px;
			height: 600px;
			margin-left: 30%;
			box-shadow: transparent;
			margin-top: 5%;

		}
		input[type="text"],input[type="password"],input[type="date"],input[type="email"],select
		{
			width: 100%;
			height: 45px;
			font-family: 'Cambria';
			font-size: 16px;
			border-top: none;
			border-left: none;
			border-right: none;
			border-bottom: 3px solid blue;
			padding-top: 8px;
		}
		input[type="submit"]
		{
			width: 100%;
			background-color:   #11a130;
			height: 30px;
			font-family: 'Cambria';
			font-size: 20px;
			font-weight: bold;
			border-radius: 20px 10px 10px 20px;
			color: white;

		}
	</style>
</head>
<body bgcolor=" #d3e4d6">
	<form method="post" action="">
		<table id="regbox">
			<tr><td colspan="3"><h3 style="text-align: center;font-family: cambria">Welcome To the Registration Page</h3></td></tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr><td><label>First Name</label></td><td><input type="text" name="fname" placeholder="First Name" required="required"/></td></tr>
			<tr><td><label>Last Name</label></td><td><input type="text" name="lname" placeholder="Last Name" required="required"" /></td></tr>
			<tr><td><label>Username</label></td><td><input type="text" name="username" placeholder="Username" autocomplete="off"  /></td></tr>
			<tr><td><label>Password</label></td><td><input type="password" name="password" placeholder="Password" required="required" /></td></tr>
			<tr><td><label>Confirm Your Password</label></td><td><input type="password" name="confirm" placeholder="Confirm Your Password" required="required" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" /></td></tr>
			<tr><td><label>Security Question</label></td><td>
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
			<tr><td><label>Answer</label></td><td><input type="text" name="answer" placeholder="Security Answer" required="
				required" /></td></tr>
			<tr><td colspan="3"><input type="submit" name="register" value="Register" /></td></tr>
		</table>
		<a href="index.php" style="color: red; font-family:cambria; font-weight: bold;font-size: 15px"> Back To Login Page</a>
	</form>
	<?php
	if(isset($_POST['register']))
	{
		$fname=mysqli_escape_string($con,$_POST['fname']);
		$lname=mysqli_escape_string($con,$_POST['lname']);
		$username=mysqli_escape_string($con,$_POST['username']);
		$password=mysqli_escape_string($con,$_POST['password']);
		$password1=mysqli_escape_string($con,$_POST['confirm']);
		$security=mysqli_escape_string($con,$_POST['securityquestion']);
		$answer=mysqli_escape_string($con,$_POST['answer']);
		$role="user";
		// This is a Section to Convert The Secret Question, Password to MD5 Hashes.
		if($password!=$password1)
		{
			echo '<p style="color:red;; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">The Two Password Does not Match!!</p>';
		}
		else
		{
			$password=md5($password);
			$security=md5($security);
			$answer=md5($answer);
			$validator="select * from users where username='$username'";
			$checker=mysqli_query($con,$validator);
			if(mysqli_num_rows($checker)==1)
			{
				echo '<p style="color:red;; border:1px dashed red; text-align:center;font-weight:bold; font-size:20px;">The Username You Supplied Is Already Taken!</p>';
			}
			else
			{
				$sql="insert into users values('$fname','$lname','$username','$password','$security','$answer','$role')";
			$processing=mysqli_query($con,$sql);
			if($processing)
			{
					echo '<p style="color:green;; border:1px double green; text-align:center;font-weight:bold; font-size:20px;">You Has Been Registered Successfully!!</p>';
					session_start();
					$_SESSION["entered"]='<p style="color:black; background-color:green; border:1px double red; text-align:center;font-weight:bold; font-size:20px;">You Logged In Successfully</p>';
					$_SESSION['username']=$username;
					header("refresh:5; url=Home.php");

			}
			}
			
			}
		}

	?>
</body>
</html>