<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>Admin Login</title>
</head>

<body>
<div class="page-wrap">
<div class="content">
<?php
session_start();
if(isset($_SESSION['id']))
{
	echo 	"<meta http-equiv='refresh' content='0.5;home.php' />";
}
?>
			<div class="prompt">
				<p style="font-family: Verdana;font-size:16px; text-align:center;">Voter Login</p>
				<form name="signin" id="signin" method="post" action="voter_authenticate.php">
					<p>
						<label class="labels" for="ic">Voter IC</label>
						<input type="text" name="ic" class="input">
					</p>
					<br/>
					<input class="btn" type="submit" name = "submit" value="Sign In">
				<br/>
				<br/>
				<a href="adminlogin.php">Admin Login</a>
			</div>
		</div>
	</div>
</body>
</html>