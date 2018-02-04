<?php
include("./includes/connect.php");
include("./includes/preProcess.php");
include("./includes/utilities.php");

//session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];



$supervisor = "supervisor";
$pending = "pending";
$reg_no = $_SESSION['reg_no'];

$reason = $_POST['reason'];

// Send notification to the supervisors that a student has filled DP12 for them

if(isset($_POST['faculty1']))
{
	$nextNotifTo = getSupervisor($reg_no);

	echo $nextNotifTo;

	if(strlen($nextNotifTo) > 0)
	{
		$query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;
		$description = "<a href=\"studentDP14.php\">New DP14 application by ".$_SESSION['reg_no']." - ".$user['name']."</a>";
		$issue_date = date('Y-m-d');
		$target_group = "";
		$target_member = $nextNotifTo;

		$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
		$result = mysqli_query($connection, $query);

		$query = "INSERT INTO supervisorchange (`reg_no`, `supervisor_id`, `progress`, `status`, `reason`) 
					VALUES ('$reg_no', '{$_POST['faculty1']}', '$supervisor', '$pending', '$reason')";
		$result = mysqli_query($connection, $query);
	}
}
if(isset($_POST['faculty2']))
{
	$query = "INSERT INTO supervisorchange (`reg_no`, `supervisor_id`, `progress`, `status`, `reason`) 
				VALUES ('$reg_no', '{$_POST['faculty2']}', '$supervisor', '$pending', '$reason')";
	$result = mysqli_query($connection, $query);
}
echo "<script>
alert('Application Submitted Successfully.');
window.location.href='./dashboard.php';
</script>";

?>
