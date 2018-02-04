<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$leave_type = "3";
$from = $_POST['from_datepicker'];
$to = $_POST['to_datepicker'];
$from_date = date_create($_POST['from_datepicker']);
$to_date = date_create($_POST['to_datepicker']);
$address = $_POST['address'];
$applied_on = date('Y-m-d');



$diff = date_diff($from_date, $to_date);
$days = $diff->format('%a');
$days = $days + 1;
// echo $days;
$query = "SELECT sem_no, sem_type FROM studentregistration WHERE `reg_no` = '$reg_no'";
		$record = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($record);
		$sem_no = $row['sem_no'];
		$sem_type = $row['sem_type'];
		$year = "2016";
$status = "pending";
$query = "INSERT INTO `leave` (`reg_no`, `leave_type`, `sem_no`, `sem_type`, `academic_year`, `from_date`, `to_date`, `no_of_days`, `status`, `address`, `applied_on`) VALUES ('$reg_no', '$leave_type', '$sem_no', '$sem_type', '$year', '$from', '$to', '$days', '$status', '$address', '$applied_on')";
$result = mysqli_query($connection, $query);

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
	$description = "<a href=\"studentLeave.php\">New leave application</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);
	header("location: ./printLeave.php?from=".$from."&to=".$to."&days=".$days."&address=".$address."&applied_on=".$applied_on);
	exit();
}
?>
