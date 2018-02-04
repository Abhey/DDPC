<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
// print_r($_POST);
$course1= $_POST['course1'];
$course2= $_POST['course2'];
$course3= $_POST['course3'];
$course4= $_POST['course4'];
$course5= $_POST['course5'];
$credits1 = $_POST['credits1'];
$credits2 = $_POST['credits2'];
$credits3 = $_POST['credits3'];
$credits4 = $_POST['credits4'];
$credits5 = $_POST['credits5'];
$student_selected_coordinator1 = "";
$student_selected_coordinator2 = "";
$student_selected_coordinator3 = "";
$student_selected_coordinator4 = "";
$student_selected_coordinator5 = "";
$sem_no = $_POST['sem_no'];
$sem_type = $_POST['sem_type'];
$status = "pending";
$progress = "Supervisor";
$totalcredits = $credits1 + $credits2 + $credits3 + $credits4 + $credits5;
// echo $_POST['student_selected_coordinator1'];

if(isset($_POST['student_selected_coordinator1'])) {
	$student_selected_coordinator1 = $_POST['student_selected_coordinator1'];
}
if(isset($_POST['student_selected_coordinator2'])) {
	$student_selected_coordinator2 = $_POST['student_selected_coordinator2'];
}
if(isset($_POST['student_selected_coordinator3'])) {
	$student_selected_coordinator3 = $_POST['student_selected_coordinator3'];
}
if(isset($_POST['student_selected_coordinator4'])) {
	$student_selected_coordinator4 = $_POST['student_selected_coordinator4'];
}
if(isset($_POST['student_selected_coordinator5'])) {
	$student_selected_coordinator5 = $_POST['student_selected_coordinator5'];
}

$query = "SELECT value FROM variables WHERE var = 'session'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$academic_year = $row['value'];

$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`) VALUES ('$reg_no', '$course1', '$credits1', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status', '$student_selected_coordinator1' )";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
}
if(!empty($course2)) 
{
	$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`) VALUES ('$reg_no', '$course2', '$credits2', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status', '$student_selected_coordinator2')";
	$result = mysqli_query($connection, $query);
}
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
if(!empty($course3)) 
{
	$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`) VALUES ('$reg_no', '$course3', '$credits3', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status', '$student_selected_coordinator3')";
	$result = mysqli_query($connection, $query);
}
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
if(!empty($course4)) 
{
	$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`) VALUES ('$reg_no', '$course4', '$credits4', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status', '$student_selected_coordinator4')";
	$result = mysqli_query($connection, $query);
	
}
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
if(!empty($course5)) 
{
	$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`) VALUES ('$reg_no', '$course5', '$credits5', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status', '$student_selected_coordinator4')";
	$result = mysqli_query($connection, $query);
	
}
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
else
{
	$registration_by = "admin";
	$date_of_reg = date('Y-m-d');
	$query = "INSERT INTO `studentregistration` (`reg_no`, `sem_no`, `sem_type`, `registration_by`, `date_of_reg`, `remarks`, `total_credits_registered`) VALUES ('$reg_no', '$sem_no', '$sem_type', '$registration_by' ,'$date_of_reg' , '', '$totalcredits' )";
	$result = mysqli_query($connection, $query);
	// header("location: ./dashboard.php");
}
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
else
{
	$nextNotifTo = $_POST['nextNotifTo'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"studentDP01.php\">New DP01 application</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);
	echo "<script>
alert('Application Submitted Successfully.');
window.location.href='./dashboard.php';
</script>";
}
?>
