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
	
	$dept_id = mysqli_real_escape_string($connection, $_POST['dept_id']);
	$committee_id = mysqli_real_escape_string($connection, $_POST['committee_id']);

	$committee_name = mysqli_real_escape_string($connection, $_POST['committee_name']);
	

	$query = "INSERT INTO `committee` (`dept_id`, `committee_id`, `committee_name`) VALUES ('$dept_id', '$committee_id', '$committee_name')";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		echo "<script>
alert('Committee inserted successfully.');
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