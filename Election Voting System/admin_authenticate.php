<?php

include "dbconnect.php";

if ($_POST) {

	$adminid=$_POST['id'];
	$pass=stripslashes($_POST['password']);
	$password=sha1($pass);

	$query="SELECT * from admin WHERE a_id='$adminid' AND a_password='$password'";

	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result) == 1)
	{
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['id'] = $adminid;

		$_SESSION['userLevel'] = 1;

		header('location:home.php');
	}
	else {
		echo  "<script>alert('Wrong password/username.  Please key in again.');</script>
				 <meta http-equiv='refresh' content='0.5;adminlogin.php' />";
	}
}


?>

