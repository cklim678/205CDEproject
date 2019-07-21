<?php
session_start();
include "dbconnect.php";
?>
<ul>
	<li><a href = "home.php"><img style="height:23px;" src="assets\img\logo.png"/></a></li>
	<li>
		<a href = "
			<?php
				if($_SESSION['userLevel'] == 1)
					echo 'electionhome.php';
				else if($_SESSION['userLevel'] == 2)
					echo 'vote.php';
			?>
		
		">
			<?php
				if($_SESSION['userLevel'] == 1)
					echo 'Election';
				else if($_SESSION['userLevel'] == 2)
					echo 'Vote';
			?>
		</a>
	</li>
	<li>
		<a href="viewresult.php">
			<?php
				if($_SESSION['userLevel'] == 1)
					echo 'Calculate Results';
				else if($_SESSION['userLevel'] == 2)
					echo 'View Results';
			?>
		</a>
	</li>
	<li style = "float:right;"><a href = "logout.php">Logout</a>
		
</ul>