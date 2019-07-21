<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>Chunkiat Voting System</title>
</head>

<body>
<div class="menubar"><?php include "menubar.php";?></div>
		<?php 
			if(!isset($_SESSION['id']))
			{
	 			echo 	"<script>alert('You must be logged in to access this feature. Now redirecting you to the login page...');</script>
						<meta http-equiv='refresh' content='0.5;adminlogin.php' />";
			}
			else if($_SESSION['userLevel'] != 1)
			{
				echo 	"<script>alert('You do not have the required permission to access this page.');</script>
						<meta http-equiv='refresh' content='0.5;home.php' />";
			}
		?>
		<div class="wrapper">	
			<div class="content">
				<div class="prompt">
					<p style="font-family: Verdana;font-size:16px; text-align:center;">Add New Voter</p>
					<form name="signin" id="signin" method="post" action="addnewvoter_handler.php" enctype="multipart/form-data">
						<p>
							<label class="labels" for="ic">IC</label>
							<input type="text" name="ic" class="input">
						</p>
						<p>
							<label class="labels" for="name">Name</label>
							<input type="text" name="name" class="input">
						</p>
						<p>
							<label class="labels" for="phone">Phone</label>
							<input type="text" name="phone" class="input">
						</p>
						<p>
							<label class="labels" for="Address">Address</label>
							<input type="text" name="address" class="input">
						</p>
						<p>
							<label class="labels" for="file">Upload Photo</label>
							<input type="file" name="file">
						</p>
						<br/>
						<input class="btn" type="submit" name = "submit" value="Create Account">
					</form>
			</div>
			</div>
		</div>	
	<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>