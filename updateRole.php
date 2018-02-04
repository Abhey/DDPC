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
	
	$member_id = mysqli_real_escape_string($connection, $_POST['member_id']);

	$role = mysqli_real_escape_string($connection, $_POST['role']);

	

	$query = "UPDATE members SET role = '$role' WHERE member_id = '$member_id'";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		header("location: ./adminDashboard.php");

	}
	else
	{
		echo "Unknown Error Occured";
	}
	

?>