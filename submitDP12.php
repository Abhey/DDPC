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

$supervisor = "supervisor";
$pending = "pending";
$reg_no = $_SESSION['reg_no'];

// Send notification to the supervisors that a student has filled DP12 for them

if(isset($_POST[faculty1]))
{
	$nextNotifTo = $_POST['faculty1'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"applyDP13.php\">New DP12 application by ".$_SESSION[reg_no]." - ".$user['name']."</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);

	$query = "INSERT INTO supervisorselection (`reg_no`, `supervisor_id`, `progress`, `status`) 
				VALUES ('$reg_no', '{$_POST['faculty1']}', '$supervisor', '$pending')";
	$result = mysqli_query($connection, $query);
}
if(isset($_POST[faculty2]))
{
	$nextNotifTo = $_POST['faculty2'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"applyDP13.php\">New DP12 application by ".$_SESSION[reg_no]." - ".$user['name']."</a>";
	$issue_date = date('Y-m-d');
	$target_group = "";
	$target_member = $nextNotifTo;

	$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	$result = mysqli_query($connection, $query);

	$query = "INSERT INTO supervisorselection (`reg_no`, `supervisor_id`, `progress`, `status`) 
				VALUES ('$reg_no', '{$_POST['faculty2']}', '$supervisor', '$pending')";
	$result = mysqli_query($connection, $query);
}
echo "<script>
alert('Application Submitted Successfully.');
window.location.href='./dashboard.php';
</script>";

?>