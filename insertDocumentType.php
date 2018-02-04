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
	
	$doc_type_id = mysqli_real_escape_string($connection, $_POST['doc_type_id']);
	$doc_type = mysqli_real_escape_string($connection, $_POST['doc_type']);



	

	$query = "INSERT INTO `documentlookup` (`doc_type_id`, `doc_type`) VALUES ('$doc_type_id', '$doc_type')";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		
		echo "<script>
alert('Document Type inserted successfully.');
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