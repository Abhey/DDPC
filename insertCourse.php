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
	
	$course_type = mysqli_real_escape_string($connection, $_POST['course_type']);
	$course_id = mysqli_real_escape_string($connection, $_POST['course_id']);
	$dept_id = mysqli_real_escape_string($connection, $_POST['dept_id']);
	$course_name = mysqli_real_escape_string($connection, $_POST['course_name']);
	$course_coordinator = mysqli_real_escape_string($connection, $_POST['course_coordinator']);
	$course_instructor = mysqli_real_escape_string($connection, $_POST['course_instructor']);
	$total_credits = mysqli_real_escape_string($connection, $_POST['total_credits']);
	$min_credits = mysqli_real_escape_string($connection, $_POST['min_credits']);
	$max_credits = mysqli_real_escape_string($connection, $_POST['max_credits']);
	$sem_type = mysqli_real_escape_string($connection, $_POST['sem_type']);
	$academic_year = mysqli_real_escape_string($connection, $_POST['academic_year']);
	

	$query = "INSERT INTO `course` (`course_id`, `dept_id`, `course_name`, `course_coordinator`, `course_instructor`, `sem_type`, `academic_year`) VALUES ('$course_id', '$dept_id', '$course_name', '$course_coordinator', '$course_instructor', '$sem_type', '$academic_year' )";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		if(!strcmp($course_type, "theory_courses")) 
		{
			$query = "INSERT INTO `theorycourses` (`course_id`, `total_credits`, `sem_type`, `academic_year`) VALUES ('$course_id', '$total_credits', '$sem_type', '$academic_year')";
			$queryRan = mysqli_query($connection, $query);
			if($queryRan)
			{
				echo "<script>
alert('Theory Course inserted successfully.');
window.location.href='./add.php';
</script>";
			}
			else
			{
				echo "Error";
			}
		}
		else {
			$query = "INSERT INTO `othercourses` (`course_id`, `min_credits`, `max_credits`, `sem_type`, `academic_year`) VALUES ('$course_id', '$min_credits', '$max_credits', '$sem_type', '$academic_year')";
			$queryRan = mysqli_query($connection, $query);
			if($queryRan)
			{
				echo "<script>
alert('Other Course inserted successfully.');
window.location.href='./add.php';
</script>";
			}
			else
			{
				echo "Error";
			}
		}
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