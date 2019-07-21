<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/results.css">
<title>CS Voting System</title>
</head>

<body>
<div class="menubar"><?php include "menubar.php";?></div>
		<?php 
			if(!isset($_SESSION['id']))
			{
	 			echo 	"<script>alert('You must be logged in to access this feature.');</script>
						<meta http-equiv='refresh' content='0.5;voterlogin.php' />";
			}
		?>
		<div class="wrapper">	
			<div class="content">
				<div class = "prompt" style="width:700px;">
				<form method="post" action="vote_process_final.php">
           				 <legend style="font-size:20px;">Vote for your candidate</legend>
           				 <br/>
           				 <p>Topic:</p>
            			<p style="font-size:16px;"><strong><em>
            			<?php 
            				$id = $_GET['id'];
            				$q = "SELECT Topic FROM election WHERE EID = $id";
            				$result = mysqli_query($con, $q);
            				$getTopic = mysqli_fetch_array($result, MYSQLI_ASSOC);
            				echo $getTopic['Topic'];
            			?></em></strong></p>
            			<?php 
            				$query = "SELECT election_voters.EID, election_voters.CIC, candidate.CName, candidate.CPhone, candidate.CDescription, candidate.CAddress, candidate.CPhoto FROM election, election_voters, candidate WHERE candidate.CIC=election_voters.CIC AND election_voters.EID = $id";
           				 	$result = mysqli_query($con, $query);
            				while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)):
          				?>
            			<div class='radio'>
            				<label><input onclick="document.getElementById('lool').disabled = false;document.getElementById('lool').style.background = 'green';" type='radio' value="<?php echo $rows['CIC'];?>" name='radio'>
            					<?php echo "Candidate: " . $rows['CName'];?><br/>
            					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Description: " .$rows['CDescription'];?><br/>
            					<img style="position:relative;left:90px;width:150px;height:200px;" src="<?php echo $rows['CPhoto'];?>">
            				</label>
            			</div>
            			<?php endwhile;?>
            			<br/><br/><br/>
            			<input type="hidden" name="eid" value="<?php echo $id;?>">
            			<input type="hidden" name="vic" value="<?php echo $_SESSION['id']?>">
            			<input id="lool" style="font-size: 16px; color: white; background-color:#F0F0F0; border-radius:7px; width: 100%; line-height:2.75;box-shadow: 1px 1px 0.5px #888888;" type="submit" name = "Vote" value="Vote" disabled>
    			</form>
    			</div>
			</div>	
		</div>
		<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>