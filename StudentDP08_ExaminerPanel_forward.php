<?php

	// Start the session.
	session_start();
    
       // $reg_no = $_GET['reg_no'];

    // Establish the connection.
	include("./includes/connect.php");

	if(1)
	{
		$status = $_GET['status'];
		$progress = $_GET['progress'];
		$reg_no = $_GET['reg_no'];
		
		

		// Query to update the information in the database.
		$query = "UPDATE examinarpanel SET status = '$status', progress = '$progress'  WHERE reg_no = '$reg_no' ";

		echo $query;

		// Run the query and save the result in $queryRan.
		$queryRan = mysqli_query($connection, $query);

		// If successful, then redirect. 
		if($queryRan)
		{
			header("Location: studentDP08.php");	
		}
		else
		{
			echo "Unknown Error Occured";
		}

	} 

?>
