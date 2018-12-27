<?php
$con=mysqli_connect("localhost","root","");
$db_select=mysqli_select_db($con,"login");
if(!$db_select)
{
	echo "We Encountered an Error!".mysqli_error($con);
}
?>