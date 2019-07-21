<?php
include "dbconnect.php";

if( isset($_GET['ic']) )
{
		$ic = $_GET['ic'];
		$query = "DELETE FROM candidate WHERE CIC = '$ic'";

		if(mysqli_query($con, $query))
		
		{
			echo "<meta http-equiv='refresh' content='0.5;viewcandidates.php' /> ";
		}
			
		else
		{
			echo "<script>alert('Error deleting candidate. Candidate might be in an election.');</script><meta http-equiv='refresh' content='0.5;viewcandidates.php' /> ";
		}

}
?>