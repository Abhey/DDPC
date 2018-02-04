<?php
session_start();
if(!isset($_SESSION['reg_no']))
{
	header("location: ./");
}
else
	$reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$query = "SELECT sem_no, sem_type FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY date_of_reg DESC";
$results = mysqli_query($connection, $query);
if(mysqli_num_rows($results) == 0)
{
	$current_sem_no = 0;
}
else
{
	$arr = mysqli_fetch_array($results);
	$current_sem_no = $arr['sem_no'];
	$current_sem_type = $arr['sem_type'];
}
$query = "SELECT total_credits_registered FROM studentregistration WHERE reg_no = '$reg_no' AND sem_no = '$current_sem_no' AND sem_type = '$current_sem_type'"; 
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$total_credits_registered = $row['total_credits_registered'];
$total_dropped_credits = 0;
$total_added_credits = 0;
if(isset($_POST['dc_list'])){
	foreach($_POST['dc_list'] as $index){
		$total_dropped_credits = $total_dropped_credits + $_POST['dropped_credits'][$index];
	}
}
if(isset($_POST['credits'])){
	foreach($_POST['credits'] as $credit){
		$total_added_credits = $total_added_credits + $credit;
	}
}
$total_credits_registered = $total_credits_registered - $total_dropped_credits + $total_added_credits;

if ($total_credits_registered < 8 || $total_credits_registered > 20){
	echo "<script>
	alert('Application not submitted. Total no. of credits selected were not in the range of 8 and 20.');
	window.location.href='./application.php';
</script>";
}
if ($total_dropped_credits != $total_added_credits) {
	$query = "UPDATE studentregistration SET total_credits_registered = '$total_credits_registered' WHERE reg_no = '$reg_no' AND sem_no = '$current_sem_no' AND sem_type = '$current_sem_type'";
	$result = mysqli_query($connection, $query);
	if (!$result)
	{
		die("Unsuccessful".mysqli_error($connection));
		echo $result;
	}
}

$progress = "Supervisor";
$status = "pending";
$dropcourse = 0;
$query = "SELECT value FROM variables WHERE variables.key = 'session'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$academic_year = $row['value'];

if(isset($_POST['courses'])){
	foreach($_POST['courses'] as $index=>$course) {
		if(empty($course)){
			break;
		}
		$credits_enrolled = $_POST['credits'][$index];
		$reason = $_POST['reasons'][$index];
		$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`, `dropcourse`, `reason`) VALUES ('$reg_no', '$course', '$credits_enrolled', '$current_sem_no', '$current_sem_type', '$academic_year', '$progress', '$status', '' , '$dropcourse', '$reason')";
		$result = mysqli_query($connection, $query);
		if (!$result)
		{
			die("Unsuccessful add : ".mysqli_error($connection));
			echo "add : ".$result;
		}
	}
}
if(isset($_POST['dc_list'])){
	foreach($_POST['dc_list'] as $index) {
		$course = $_POST['dropped_courses'][$index];
		$reason = $_POST['dropped_reasons'][$index];
		$query = "UPDATE `courseregistration` SET dropcourse = '1', status = '$status', progress = '$progress', reason = '$reason' WHERE reg_no = '$reg_no' AND sem_no = '$current_sem_no' AND sem_type = '$current_sem_type' AND course_id = '$course'";
		$result = mysqli_query($connection, $query);
		if (!$result)
		{
			die("Unsuccessful".mysqli_error($connection));
			echo "drop : ".$result;
		}
	}
}


if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} else {
	$nextNotifTo = $_POST['nextNotifTo'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"studentDP04.php\">New DP04 application</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);
	echo "<script>
	alert('Application Submitted Successfully.');
	window.location.href='./application.php';
</script>";
}
?>
