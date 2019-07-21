<?php
$con = mysqli_connect("127.0.0.1","root","","voting") or die ("Could not connect to database.");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,"voting") or die ("Failed !");

date_default_timezone_set("Asia/Kuala_Lumpur");
?>