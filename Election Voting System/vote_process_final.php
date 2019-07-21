<?php
	include "dbconnect.php";
	
	$cic = $_POST['radio'];
	$eid = $_POST['eid'];
	$vic = $_POST['vic'];
	
	$query = "INSERT INTO voter_election(VIC, EID) VALUES('$vic', $eid)";
	$query1 = "UPDATE election_voters SET CVotes = CVotes + 1 WHERE CIC='$cic' AND EID=$eid";
	
	if(mysqli_query($con, $query))
	{
		if(mysqli_query($con, $query1))
		{
			echo 	"<script>alert('Successfully voted.');</script>
					<meta http-equiv='refresh' content='0.5;home.php' />";
		}
		else
		{
			echo 	"<script>alert('Unable to vote.');</script>
					<meta http-equiv='refresh' content='0.5;vote.php' />";
		}
	}
	else
	{
		echo 	"<script>alert('Already voted in this election.');</script>
					<meta http-equiv='refresh' content='0.5;home.php' />";
	}
?>