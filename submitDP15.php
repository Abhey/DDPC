<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$faculty1= mysqli_real_escape_string($connection, $_POST['faculty1']);
$faculty2= mysqli_real_escape_string($connection, $_POST['faculty2']);
$faculty3= mysqli_real_escape_string($connection, $_POST['faculty3']);
$faculty4= mysqli_real_escape_string($connection, $_POST['faculty4']);
$faculty5= mysqli_real_escape_string($connection, $_POST['faculty5']);
$faculty6= mysqli_real_escape_string($connection, $_POST['faculty6']);
$role1= mysqli_real_escape_string($connection, $_POST['role1']);
$role2= mysqli_real_escape_string($connection, $_POST['role2']);
$role3= mysqli_real_escape_string($connection, $_POST['role3']);
$role4= mysqli_real_escape_string($connection, $_POST['role4']);
$role5= mysqli_real_escape_string($connection, $_POST['role5']);
$role6= mysqli_real_escape_string($connection, $_POST['role6']);
$student_reg_no = mysqli_real_escape_string($connection, $_POST['student_reg_no']);
$status = "pending";
$progress = "ConvenerDDPC";
$type = "Ph.D Thesis Evaluation Board";

$academic_year = date('Y');

for ($i=1; $i <= 6; $i++) { 
	# code...
	$faculty = ${"faculty" . $i};
	$role = ${"role" . $i};
	$query = "INSERT INTO `examinarpanel` (`reg_no`, `type`, `faculty_id`, `role`, `status`, `progress`) VALUES ('$student_reg_no', '$type', '$faculty', '$role', '$status', '$progress')";
	$result = mysqli_query($connection, $query);
	if (!$result)
	{
		die("Unsuccessful".mysqli_error($connection));
		echo $result;
	}

}

	$nextNotifTo = $_POST['nextNotifTo'];
	$query = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$newNotificationId = $notificationsCount + 1;
	$description = "<a href=\"studentDP15.php\">New DP15 application</a>";
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
