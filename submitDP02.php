<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$faculty1= mysqli_real_escape_string($connection, $_POST['src_int_id']);
$faculty2= mysqli_real_escape_string($connection, $_POST['src_ext_id']);
$faculty3= mysqli_real_escape_string($connection, $_POST['supervisor1_id']);
$faculty4= mysqli_real_escape_string($connection, $_POST['supervisor2_id']);
$student_reg_no = mysqli_real_escape_string($connection, $_POST['student_reg_no']);
$status = "pending";
$progress = "ConvenerDDPC";

$academic_year = date('Y');

$query = "INSERT INTO `src` (`reg_no`, `src_int_id`, `src_ext_id`, `supervisor1_id`, `supervisor2_id`, `status`, `progress`) VALUES ('$student_reg_no', '$faculty1', '$faculty2', '$faculty3', '$faculty4', '$status', '$progress')";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
else{
	$nextNotifTo = $_POST['nextNotifTo'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"studentDP02.php\">New DP02 application</a>";
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
