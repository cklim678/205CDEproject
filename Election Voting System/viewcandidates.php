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
				<table>
  				  <thead>
       				 <tr>
           				 <th>Candidate IC</th>
           				 <th>Candidate Name</th>
            			<th>Candidate Phone</th>
            			<th>Candidate Description</th>
            			<th>Candidate Address</th>
            			<th>Candidate Photo</th>
            			<th>Action</th>
        			</tr>
    			</thead>
    			<tbody>
    			<?php 
    				$query = "SELECT * FROM candidate";
    				$result = mysqli_query($con, $query);
    				
    				while($candidate = mysqli_fetch_array($result, MYSQLI_ASSOC)):
    			?>
        			<tr style="display:table-row;">
            			<td><?php echo $candidate['CIC'];?></td>
            			<td><?php echo $candidate['CName'];?></td>
            			<td><?php echo $candidate['CPhone'];?></td>
   						<td style="width:270px;max-width:270px;"><?php echo $candidate['CDescription'];?></td>
   						<td><?php echo $candidate['CAddress'];?></td>
   						<td><img style="width:150px;" src="<?php echo $candidate['CPhoto'];?>"/></td>
   						<td><?php echo "<a onclick=\"return confirm('Are you sure?');\" href='deletecandidate.php?ic={$candidate['CIC']}'><input type='button' class='edit' alt='submit' value='Delete' style='font-size:14px; margin-left:14px;'></a>";?></td>
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