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
	
	$course_id = mysqli_real_escape_string($connection, $_POST['course_id']);
	$course_name = mysqli_real_escape_string($connection, $_POST['course_name']);
	$course_coordinator = mysqli_real_escape_string($connection, $_POST['course_coordinator']);
	$course_instructor = mysqli_real_escape_string($connection, $_POST['course_instructor']);
	$total_credits = mysqli_real_escape_string($connection, $_POST['total_credits']);
	$min_credits = mysqli_real_escape_string($connection, $_POST['min_credits']);
	$max_credits = mysqli_real_escape_string($connection, $_POST['max_credits']);

	

	$query = "UPDATE course SET course_name = '$course_name', course_coordinator = '$course_coordinator', course_instructor = '$course_instructor' WHERE course_id = '$course_id'";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		$query = "SELECT * FROM theorycourses WHERE course_id = '$course_id'";
		$queryRan = mysqli_query($connection, $query);
		if(mysqli_num_rows($queryRan) == 1)
		{
			$query = "UPDATE theorycourses SET total_credits = '$total_credits' WHERE course_id = '$course_id'";
			$queryRan = mysqli_query($connection, $query);
			if($queryRan)
			{
				header("location: ./adminDashboard.php");
			}
			else
			{
				echo "Error";
			}
		}
		else
		{
			$query = "UPDATE othercourses SET min_credits = '$min_credits', max_credits = '$max_credits' WHERE course_id = '$course_id'";
			$queryRan = mysqli_query($connection, $query);
			if($queryRan)
			{
				header("location: ./dashboard.php");
			}
			else
			{
				echo "Error";
			}
		}

	}
	else
	{
		echo "Unknown Error Occured";
	}
	

?>