
<?php
/**
	This file is run via ajax call whenever any person approves the leave.
 	It updates the status of leave and sends notification to students accordingly
 **/

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
include("./includes/utilities.php");
$reg_no = $_POST['reg_no'];
$leave_type = $_POST['leave_type'];
$from_date= $_POST['from_date'];
$to_date = $_POST['to_date'];
$status = $_POST['status'];
$progress = $_POST['progress'];
$nextNotifTo = $_POST['nextNotifTo'];

$query = "UPDATE `leave` SET status = '$status', progress = '$progress' WHERE reg_no = '$reg_no' AND leave_type = '$leave_type' AND from_date = '$from_date' AND to_date = '$to_date'";
$result = mysqli_query($connection, $query);

if (!$result)
{
	echo $query;
} else {
	if(!strcmp($status, "approved")){
		$notificationMessage = "Your leave from ".$from_date." to ".$to_date." has been approved.";
		sendNotification($notificationMessage, $reg_no, 1);
	} else if(!strcmp($status, "denied")){
		$notificationMessage = "Your leave from ".$from_date." to ".$to_date." has been denied.";
		sendNotification($notificationMessage, $reg_no, 1);
	} else 
	{
		$nextNotifTo = $_POST['nextNotifTo'];
		$query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;
		$description = "<a href=\"studentLeave.php\">New leave application</a>";
		$issue_date = date('Y-m-d');
		$target_group = "";
		$target_member = $nextNotifTo;

		$query = "INSERT INTO `notifications` (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
		$result = mysqli_query($connection, $query);
	}
}

?>
