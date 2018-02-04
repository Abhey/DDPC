<?php
session_start();
include("includes/connect.php");
$notificationId = $_GET['notid'];
$query = "UPDATE notifications SET `read`='1' WHERE id =$notificationId";
// echo $query;
$result = mysqli_query($connection, $query);
// echo "done!";

$thisRole = $_SESSION['role'];
$thisUniqueId = $_SESSION['reg_no'];
$query = "SELECT * FROM notifications WHERE (target_group='$thisRole' OR target_member='$thisUniqueId') AND `read`='0' ORDER BY issue_date DESC";
$allNotifications = mysqli_query($connection, $query);

$countNotifications = 0;
while( $notification = mysqli_fetch_array($allNotifications) )
{
    $countNotifications += 1;
}
echo $countNotifications;

?>