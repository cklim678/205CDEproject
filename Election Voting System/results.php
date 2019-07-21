<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/results.css">
<title>Chunkiat Voting System</title>
</head>

<body>
<div class="menubar"><?php include "menubar.php";?></div>
		<?php 
			if(!isset($_SESSION['id']))
			{
	 			echo 	"<script>alert('You must be logged in to access this feature.');</script>
						<meta http-equiv='refresh' content='0.5;viewresult.php' />";
			}
			$id = $_GET['id'];
			
			$q = "SELECT E_EndDate FROM election WHERE EID=$id";
			$res = mysqli_query($con, $q);
			$getDate = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$enddate = date("Y-m-d", strtotime($getDate['E_EndDate']));
			$current = date("Y-m-d");
			$available = (($current > $enddate) === true);
			
			if(($_SESSION['userLevel'] == 1) || ($available === true)){}
			else
			{
				echo 	"<script>alert('You are not allowed to view the votes for this election at the moment.');</script>
						<meta http-equiv='refresh' content='0.5;viewresult.php' />";
			}
		?>
		<div class="wrapper">	
			<div class="content">
				<p style="font-size:30px;text-align:center;">
				<?php 
					$qa = "SELECT Topic FROM election WHERE EID=$id";
					$resa = mysqli_query($con, $qa);
					$getName = mysqli_fetch_array($resa, MYSQLI_ASSOC);
					$topicName = $getName['Topic'];
					echo $topicName;
				?>
				</p>
				<table>
  				  <thead>
       				 <tr>
            			<th>Candidate IC</th>
            			<th>Candidate Name</th>
            			<th>Candidate Votes</th>
        			</tr>
    			</thead>
    			<tbody>
    			<?php 
    				$query = "SELECT election_voters.*, candidate.CName from candidate,election_voters WHERE election_voters.cic=candidate.cic";
    				$result = mysqli_query($con, $query);
    				
    				while($election = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    			?>
        			<tr>
            			<td><?php echo $election['CIC'];?></td>
            			<td><?php echo $election['CName'];?></td>
            			<td><?php echo $election['CVotes'];?></td>
        			</tr>
        			<?php endwhile;?>
    			</tbody>
			</table>
		</div>	
	</div>
	<div class="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>