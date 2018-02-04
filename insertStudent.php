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
	
	$thisRegNo = mysqli_real_escape_string($connection, $_GET['reg_no']);
	$name = mysqli_real_escape_string($connection, $_GET['name']);
	$mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
	$contact_no = mysqli_real_escape_string($connection, $_GET['contact_no']);
	$address = mysqli_real_escape_string($connection, $_GET['address']);
	$father_name = mysqli_real_escape_string($connection, $_GET['father_name']);
	$category = mysqli_real_escape_string($connection, $_GET['category']);
	$program = mysqli_real_escape_string($connection, $_GET['program']);
	$highest_qualification = mysqli_real_escape_string($connection, $_GET['highest_qualification']);
	$hostel = mysqli_real_escape_string($connection, $_GET['hostel']);
	$gender = mysqli_real_escape_string($connection, $_GET['gender']);
	$nationality = mysqli_real_escape_string($connection, $_GET['nationality']);
	$admission_category_code = mysqli_real_escape_string($connection, $_GET['admission_category_code']);
	$stipendiary = mysqli_real_escape_string($connection, $_GET['stipendiary']);
	$program_type = mysqli_real_escape_string($connection, $_GET['program_type']);
	$program_category = mysqli_real_escape_string($connection, $_GET['program_category']);
	$password = $thisRegNo;

	$query = "INSERT INTO `studentmaster` (`reg_no`, `name`, `mail_id`, `contact_no`, `address`, `father_name`, `category`, `program`, `highest_qualification`, `hostel`, `gender`, `nationality`, `admission_category_code`, `stipendiary`, `program_type`, `program_category`, `password`) VALUES ('$thisRegNo', '$name', '$mail_id', '$contact_no', '$address', '$father_name', '$category', '$program', '$highest_qualification', '$hostel', '$gender', '$nationality', '$admission_category_code', '$stipendiary', '$program_type', '$program_category', '$password')";

	$queryRan = mysqli_query($connection, $query);
	// If successful, then redirect. 
	if($queryRan)
	{
		echo "<script>
alert('Student inserted successfully.');
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