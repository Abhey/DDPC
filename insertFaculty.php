<?php

	// Start the session.
	session_start();
	if(!isset($_SESSION['reg_no']))
	{
		header("location: ./");
	}
	else
		$reg_no = $_SESSION['reg_no'];

	// Establish the connection.
	include("./includes/connect.php");
	
	$faculty_id = mysqli_real_escape_string($connection, $_GET['faculty_id']);
	$name = mysqli_real_escape_string($connection, $_GET['name']);
	$dept_id = mysqli_real_escape_string($connection, $_GET['dept_id']);
	$designation = mysqli_real_escape_string($connection, $_GET['designation']);
	$contact = mysqli_real_escape_string($connection, $_GET['contact']);
	$mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
	$external = mysqli_real_escape_string($connection, $_GET['external']);
	$affiliation = mysqli_real_escape_string($connection, $_GET['affiliation']);
	$password = $faculty_id;

	$query = "INSERT INTO `faculty` (`faculty_id`, `name`, `dept_id`, `designation`, `contact`, `mail_id`, `external`, `affiliation`, `password`) VALUES ('$faculty_id', '$name', '$dept_id', '$designation', '$contact', '$mail_id', '$external', '$affiliation', '$password')";

	$queryRan = mysqli_query($connection, $query);
	// If successful, then redirect. 
	if($queryRan)
	{
		echo "<script>
alert('Faculty inserted successfully.');
window.location.href='./add.php';
</script>";
	}
	else
	{
		if(mysqli_errno($connection)==1062){
			echo "<script>
			alert('Duplicate Entry.');
			window.location.href='./add.php';
			</script>";
					}
		echo "Unknown Error Occured";
	}
	

?>