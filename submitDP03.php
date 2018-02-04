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

$student_reg_no = mysqli_real_escape_string($connection, $_POST['student_reg_no']);
$courses_completed = mysqli_real_escape_string($connection, $_POST['courses_completed']);
// $credits_attempted = mysqli_real_escape_string($connection, $_POST['credits_attempted']);
$credits_earned = mysqli_real_escape_string($connection, $_POST['credits_earned']);
$comp_date = mysqli_real_escape_string($connection, $_POST['comp_date']);
$soa_date = mysqli_real_escape_string($connection, $_POST['soa_date']);
$pres_date = mysqli_real_escape_string($connection, $_POST['pres_date']);
$grade = mysqli_real_escape_string($connection, $_POST['grade']);
$date_of_update = date('Y-m-d');
$date_of_comp_of_course_work = date('Y-m-d');
$credit_earn_course_work = $credits_earned;
$date_of_comp = $comp_date;
$date_of_soa = $soa_date;
$date_of_open = $pres_date;
$completed = 0;
$status = "Course Work Completed";


$query = "INSERT INTO studentprogramdetails (`reg_no`, `date_of_comp_of_course_work`, `credit_earn_course_work`, `credit_earn_thesis`, `date_of_comp`, `date_of_soa`, `date_of_open`, `date_of_final_viva`, `date_thesis_submission`, `date_of_termination`, `completed`, `program_left`, `status`, `date_of_update`) VALUES('$student_reg_no', '$date_of_comp_of_course_work', '$credit_earn_course_work', '', '$date_of_comp', '$date_of_soa', '$date_of_open', '', '', '', '$completed', '', '$status', '$date_of_update')";
$result = mysqli_query($connection, $query);

if(!$result){

$query = "UPDATE studentprogramdetails SET date_of_comp_of_course_work = '$date_of_comp_of_course_work', credit_earn_course_work = '$credit_earn_course_work', date_of_comp = '$date_of_comp', date_of_soa = '$date_of_soa', date_of_open = '$date_of_open', completed = '0', status = '$status', date_of_update = '$date_of_update' WHERE reg_no = '$student_reg_no'"; 
$result = mysqli_query($connection, $query);
	if(!$result){
		echo "<script>
			alert('Data could not be filled.');
			window.location.href='./fillDetails.php';
			</script>";
	}
	else{
		echo "<script>
			alert('Data filled Successfully.');
			window.location.href='./fillDetails.php';
			</script>";
	}
}else {
	echo "<script>
alert('Data filled Successfully.');
window.location.href='./fillDetails.php';
</script>";
}


?>