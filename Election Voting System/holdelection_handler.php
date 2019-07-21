<?php 
	session_start();
	include "dbconnect.php";
	
	$a = 1;
	$topic = mysqli_real_escape_string($con, $_POST['topic']);
	$candidateics = $_POST['cic'];
	$enddate = $_POST['enddate'];
	$enddatef = date("Y-m-d", strtotime($enddate));
	$ic_pattern = "/^\d{6}[-]\d{2}[-]\d{4}$/";
	
	$candidateiclist = explode(',', $candidateics);
	
	$q = "INSERT INTO election(Topic, E_EndDate) VALUES('$topic', '$enddatef')";
	
	if(mysqli_query($con, $q))
	{
		foreach($candidateiclist as $icc)
		{
			$ic = mysqli_real_escape_string($con, $icc);
			
			$qa = "SELECT MAX(EID) FROM election";
			$qa_r = mysqli_query($con, $qa);
			$qa_rr = mysqli_fetch_array($qa_r);
			$b = $qa_rr[0];
			
			$q2 = "INSERT INTO election_voters(EID, CIC) VALUES($b,'$ic')";
			if(preg_match($ic_pattern, $ic))
			{
				if(mysqli_query($con, $q2))
				{
					
				}
				else
				{
					$a = 0;
					echo "<script>alert('Candidate does not exist.');</script>
				 	<meta http-equiv='refresh' content='0.5;holdelection.php' />";
				}
			}
			else
			{
				$a = 0;
				echo "<script>alert('Invalid IC Number(s).');</script>
				 	<meta http-equiv='refresh' content='0.5;holdelection.php' />";
			}
		}
		
		if($a == 0)
		{
			$qd = "DELETE FROM election WHERE topic = '$topic'";
			mysqli_query($con, $qd);
		}
		
		if($a == 1)
			echo "<script>alert('Election successfully held.');</script>
				 	<meta http-equiv='refresh' content='0.5;holdelection.php' />";
	}

?>