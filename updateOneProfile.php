<?php

	// Start the session.
	session_start();
    if(!isset($_SESSION['is_admin']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_GET['reg_no'];

    // Establish the connection.
	include("./includes/connect.php");

	if(1)
	{
		$password = $_GET['password'];
		$category = $_GET['category'];
		$program = $_GET['program'];
		$name = $_GET['name'];
		$father_name = $_GET['father_name'];
		$mail_id = $_GET['mail_id'];
		$contact_no = $_GET['contact_no'];
		$address = $_GET['address'];
		$hostel = $_GET['hostel'];
		$gender = $_GET['gender'];
		$nationality = $_GET['nationality'];
		$stipendiary = $_GET['stipendiary'];
		$dept_id = $_GET['dept_id'];
		$program_category = $_GET['program_category'];
		$year_of_joining = $_GET['year_of_joining'];
		// $mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
		// $contact_no = mysqli_real_escape_string($connection, $_GET['contact_no']);
		// $address = mysqli_real_escape_string($connection, $_GET['address']);
		// $father_name = mysqli_real_escape_string($connection, $_GET['father_name']);

		// Query to update the information in the database.
		$query = "UPDATE studentmaster SET password = '$password', category = '$category', program = '$program', name = '$name', father_name = '$father_name', mail_id = '$mail_id', contact_no = '$contact_no', address = '$address', hostel = '$hostel', gender = '$gender', nationality = '$nationality', stipendiary = '$stipendiary', dept_id = '$dept_id', program_category = '$program_category', year_of_joining = '$year_of_joining' WHERE reg_no = '$reg_no' ";

		echo $query;

		// Run the query and save the result in $queryRan.
		$queryRan = mysqli_query($connection, $query);

		// If successful, then redirect. 
		if($queryRan)
		{
			header("Location: updateStudentDetails.php?reg_no=".$reg_no);	
		}
		else
		{
			echo "Unknown Error Occured";
		}

	} 

?>