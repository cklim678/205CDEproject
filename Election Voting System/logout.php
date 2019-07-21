<?php
	session_start();
	session_unset();
	session_destroy();
	header('location:voterlogin.php');

mysqli_close($con);

?>