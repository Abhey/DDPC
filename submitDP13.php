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

$progress="ConvenerDDPC";
$status="pending";

// update the status of the application
$query = "UPDATE supervisorselection SET progress='$progress', status='$status' WHERE reg_no='{$_POST['studentToSupervise']}' AND supervisor_id='{$_SESSION[reg_no]}'";
$result = mysqli_query($connection, $query);

// Send notification to the next person
$query = "SELECT member_id FROM members WHERE role='$progress'";
$result = mysqli_query($connection, $query);
$result = mysqli_fetch_array($result);

$nextNotifTo = $result['member_id'];
$query = "SELECT * FROM notifications";
$allnotifications = mysqli_query($connection, $query);
$notificationsCount = mysqli_num_rows($allnotifications);
$newNotificationId = $notificationsCount + 1;
$description = "<a href=\"studentDP13.php\">New DP13 application by ".$_SESSION[reg_no]." - ".$user['name']."</a>";
$issue_date = date('Y-m-d');
$target_group = "";
$target_member = $nextNotifTo;

$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
$result = mysqli_query($connection, $query);

echo "<script>
alert('Application Submitted Successfully.');
window.location.href='./dashboard.php';
</script>";

?>