<?php
include "dbconnect.php";
session_start();

$target_directory = "assets/img/candidate/";
$target_file=$target_directory.basename($_FILES["file"]["name"]);
$imageFileType=pathinfo($target_file, PATHINFO_EXTENSION);

if(isset($_POST["submit"]))
{
	$ic = $_POST['ic'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$description = $_POST['description'];
	$address = $_POST['address'];
	$ic_pattern = "/^\d{6}[-]\d{2}[-]\d{4}$/";

	$imagename = basename($_FILES["file"]["name"]);
	$query = "INSERT INTO candidate(CIC, CName, CPhone, CDescription, CAddress, CPhoto) VALUES('$ic', '$name', $phone, '$description', '$address', '$target_file')";

	$checkic = "SELECT * FROM candidate WHERE CIC = $ic";
	$checkicQ = mysqli_query($con, $checkic);

		if(preg_match($ic_pattern, $ic))
		{
			if(file_exists($target_file) === false)
			{
				if($_FILES["file"]["size"] < 800000)
				{
					if($imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "jpeg")
					{
						if (mysqli_query($con,$query))
						{
							if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
							{
								echo "<script>alert('Candidate sucessfully registered.');</script>
				 				 		<meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
							}
							else
							{
								echo "<script>alert('Unable to upload image.');</script>
				 				 			<meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
							}
						}
						else
						{
							echo "<script>alert('Candidate already registered.');</script>
				 				 <meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
						}
					}
					else
					{
						echo "<script>alert('Sorry, only PNG and JPG files are allowed.');</script>
				 				 <meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
					}
				}
				else
				{
					echo "<script>alert('File selected is too large');</script>
							  <meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
				}
			}
			else
			{
				echo "<script>alert('Sorry, image already exists.');</script>
			 			 <meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
			}
		}
		else
		{
			echo 	"<script>alert('Invalid IC!');</script>
						 <meta http-equiv='refresh' content='0.5;addnewcandidate.php' />";
		}
	}
?>