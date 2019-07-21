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
					<p style="font-family: Verdana;font-size:16px; text-align:center;">Hold Election</p>
					<form name="signin" id="signin" method="post" action="holdelection_handler.php" enctype="multipart/form-data">
						<p>
							<label class="labels" for="topic">Topic</label>
							<input type="text" name="topic" class="input">
						</p>
						<p>
							<label class="labels" for="cic">Candidate IC's (End of each IC followed by a comma)</label>
							<input type="text" name="cic" class="input">
						</p>
						<p>
							<label class="labels" for="enddate">End Date</label>
							<input type="date" name="enddate" class="input">
						</p>
						<br/>
						<input class="btn" type="submit" name = "submit" value="Hold Election">
					</form>
			</div>
			</div>
		</div>	
	<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>