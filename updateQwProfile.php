<?php

	session_start();
    if(!isset($_SESSION['userid']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['userid'];

    $reg_no = $_GET['qwUser'];

    // echo $reg_no;

	include("./includes/connect.php");

	$name = mysqli_real_escape_string($connection, $_GET['name']);
	$mail_id = mysqli_real_escape_string($connection, $_GET['mail_id']);
	$contact_no = mysqli_real_escape_string($connection, $_GET['contact_no']);
	$address = mysqli_real_escape_string($connection, $_GET['address']);
	$father_name = mysqli_real_escape_string($connection, $_GET['father_name']);

	$query = "UPDATE studentmaster SET name = '$name', mail_id = '$mail_id', contact_no = '$contact_no', address = '$address', father_name = '$father_name' WHERE reg_no = '$reg_no' ";

	//echo $query;

	$queryRan = mysqli_query($connection, $query); 
	//echo $query;
	// print_r($queryRan);
	if($queryRan){
		;
	}
	else{
		echo "Unknown Error Occured";
	}

	header("Location: viewStudent.php?qwStudent=".$reg_no."&status=1");

?>