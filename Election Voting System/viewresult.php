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
						<meta http-equiv='refresh' content='0.5;voterlogin.php' />";
			}
		?>
		<div class="wrapper">	
			<div class="content">
				<table>
  				  <thead>
       				 <tr>
           				 <th>Election ID</th>
           				 <th>Topic</th>
            			<th>End Date</th>
            			<th>Has Ended</th>
            			<th>Action</th>
        			</tr>
    			</thead>
    			<tbody>
    			<?php 
    				$query = "SELECT * FROM election";
    				$result = mysqli_query($con, $query);
    				
    				while($election = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    			?>
        			<tr>
            			<td><?php echo $election['EID'];?></td>
            			<td><?php echo $election['Topic'];?></td>
            			<td><?php echo $election['E_EndDate'];?></td>
            			<td><?php
            					$enddate = date("Y-m-d", strtotime($election['E_EndDate']));
            					$current = date("Y-m-d");
            					$available = (($current > $enddate) === true);
            					
            					if($available === true)
            						echo "Ended";
								else
									echo "Ongoing";
            			?></td>
            			<td>
            			<?php 
            				if(($available === true) || $_SESSION['userLevel'] == 1)
            					echo "<a href='results.php?id={$election['EID']}'><input type='button' class='edit' alt='submit' value='View' style='font-size:14px; margin-left:14px;'></a>";
            				else
            					echo "N/A";
            			?>
            			</td>
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