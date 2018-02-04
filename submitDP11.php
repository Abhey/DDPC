<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
include("./includes/preProcess.php");

$student_reg_no = mysqli_real_escape_string($connection, $_POST['student_reg_no']);;
$sem_date = mysqli_real_escape_string($connection, $_POST['sem_date']);
$date_of_update = date('Y-m-d');

$completed = 0;
$status = 'Open Completed';

$query = "UPDATE studentprogramdetails SET date_of_open = '$sem_date', status = '$status', date_of_update = '$date_of_update' WHERE reg_no = '$student_reg_no'"; 
$result = mysqli_query($connection, $query);
if($result)
{
	
	echo "<script>
	alert('Data filled Successfully.');
	window.location.href='./fillDetails.php';
	</script>";


} else {
	echo "<script>
	alert('Data could not be filled.');
	window.location.href='./fillDetails.php'
	</script>";
}


?>