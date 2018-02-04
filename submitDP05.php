<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$reason = $_POST['reason'];
$date_of_modification = date('Y-m-d');
$comment = "";
$status = "pending";
$progress = "Supervisor";
$reg_status = "Full-Time";
$query = "INSERT INTO `partfullstatus` (`reg_no`, `reg_status`, `date_of_modification`, `reason`, `supervisor_comment`, `progress`, `status`) VALUES ('$reg_no', '$reg_status', '$date_of_modification', '$reason', '$comment', '$progress', '$status')";
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
	$description = "<a href=\"studentDP05.php\">New DP05 application</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);
	 header("location: ./printDP05.php?reason=".$reason);
	 exit();
}
?>
