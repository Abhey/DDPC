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
include("./includes/utilities.php");

$studentRegNo = $_POST['reg_no'];
$thisAction = $_POST['action'];
$thisStatus = $_POST['status'];
$thisProgress = $_POST['progress'];
$nextNotifTo = $_POST['nextNotifTo'];
$applicantFacultyId = $_POST['facultyId'];
$applicantFacultyName = getFacultyName($applicantFacultyId);

$notifMessage = "";

if( strlen($nextNotifTo) > 0 )
{
	$notifMessage = "New DP13 application by ".$applicantFacultyId." - ".$applicantFacultyName;
}
else
{
	// for a notification to be sent to the student
}

if(sendNotification($notifMessage, $nextNotifTo, 1))
{
	// successful
	echo "done";
}
else
{
	// error
}

// update the status of the application
$query = "UPDATE supervisorselection SET progress='$thisProgress', status='$thisStatus' WHERE reg_no='$studentRegNo' AND supervisor_id='$applicantFacultyId'";
$result = mysqli_query($connection, $query);

?>