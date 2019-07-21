<?php

include "dbconnect.php";

if ($_POST) {

	$voteric=$_POST['ic'];

	$query="SELECT * from voter WHERE VIC='$voteric'";

	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result) == 1)
	{
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['id'] = $voteric;

		$_SESSION['userLevel'] = 2;

		header('location:home.php');
	}
	else {
		echo  "<script>alert('Invalid Username.  Please key in again.');</script>
				 <meta http-equiv='refresh' content='0.5;voterlogin.php' />";
	}
}


?>

