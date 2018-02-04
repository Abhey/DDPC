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

	if(! strcmp($_SESSION['role'], "student"))
	{
		$name = mysqli_real_escape_string($connection, $_GET['name']);
		$mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
		$contact_no = mysqli_real_escape_string($connection, $_GET['contact_no']);
		$address = mysqli_real_escape_string($connection, $_GET['address']);
		$father_name = mysqli_real_escape_string($connection, $_GET['father_name']);

		// Query to update the information in the database.
		$query = "UPDATE studentmaster SET name = '$name', mail_id = '$mail_id', contact_no = '$contact_no', address = '$address', father_name = '$father_name' WHERE reg_no = '$reg_no' ";

		// Run the query and save the result in $queryRan.
		$queryRan = mysqli_query($connection, $query);

		// If successful, then redirect. 
		if($queryRan)
		{
			header('Location: user.php');	
		}
		else
		{
			echo "Unknown Error Occured";
		}

	} else {
		$name = mysqli_real_escape_string($connection, $_GET['name']);
		$mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
		$contact_no = mysqli_real_escape_string($connection, $_GET['contact_no']);

		// Query to update the information in the database.
		$query = "UPDATE faculty SET name = '$name', mail_id = '$mail_id', contact = '$contact_no' WHERE faculty_id = '$reg_no' ";

		// Run the query and save the result in $queryRan.
		$queryRan = mysqli_query($connection, $query);

		// If successful, then redirect. 
		if($queryRan)
		{
			header('Location: user.php');	
		}
		else
		{
			echo "Unknown Error Occured";
		}
	}

	

?>