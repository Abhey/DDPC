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
	
	$role_id = mysqli_real_escape_string($connection, $_POST['role_id']);
	$role_name = mysqli_real_escape_string($connection, $_POST['role_name']);



	

	$query = "INSERT INTO `rolelookup` (`role_id`, `role_name`) VALUES ('$role_id', '$role_name')";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		
		echo "<script>
alert('Role inserted successfully.');
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