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
	 			echo 	"<meta http-equiv='refresh' content='0.5;voterlogin.php' />";
			}
		?>
		<div class="wrapper">
			<div class="content">
					<?php 
						if($_SESSION['userLevel'] == 2)
						{
							$query = "SELECT * FROM voter WHERE VIC='{$_SESSION['id']}'";
							$result = mysqli_query($con, $query);
							$get = mysqli_fetch_array($result, MYSQLI_ASSOC);
							$photo = $get['VPhoto'];
							$name = $get['VName'];
							$ic = $_SESSION['id'];
							$phone = $get['VPhone'];
							$address = $get['VAddress'];
							
							echo
							"
								<div class='homey'>
									<div class='photo'>
										<img src='$photo' style='height:150px;width:100%;'>
									</div>
									<div class='info' style='padding:10px;'>
										<p>Voter IC: $ic</p>
										<p>Voter Name: $name</p>
										<p>Voter Phone: $phone</p>
										<p>Voter Address: $address</p>
									</div>
								</div>
							";
						}
					?>
			</div>
		</div>	
	<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>