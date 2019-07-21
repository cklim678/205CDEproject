<?php include "dbconnect.php"; ?>

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
	 			echo 	"<meta http-equiv='refresh' content='0.5;adminlogin.php' />";
			}
		?>
		<div class="wrapper">
			<div class="content">
				<h2>Election Actions</h2>
				<ul style="list-style-type: none;">
					<li><button style="width:260px;margin-bottom:20px;" class="btn"><a href="addnewvoter.php">Add New Voter</a></button></li>
					<li><button style="width:260px;margin-bottom:20px;" class="btn"><a href="addnewcandidate.php">Add New Candidate</a></button></li>
					<li><button style="width:260px;margin-bottom:20px;" class="btn"><a href="viewcandidates.php">View Candidates</a></button></li>
					<li><button style="width:260px;" class="btn"><a href="holdelection.php">Hold Election</a></button></li>
				</ul>
			</div>
		</div>	
	<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>