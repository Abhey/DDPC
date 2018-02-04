<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$supervisor_comment = $_POST['supervisor_comment'];
$student_reg_no = $_POST['reg_no'];
$progress = "ConvenerDDPC";
$query = "UPDATE partfullstatus SET supervisor_comment = '$supervisor_comment', progress = '$progress' WHERE reg_no = '$student_reg_no'";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} else {
         

         $query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;
		$description = "<a href=\"studentDP05.php\">New DP05 application</a>";
		$issue_date = date('Y-m-d');
		$target_group = "";
		$target_member ="ConvenerDDPC";

		$query = "INSERT INTO `notifications` (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
		$result = mysqli_query($connection, $query);
         
	 header("location: ./studentDP05.php");
	 exit();

}
?>
