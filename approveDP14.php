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
$applicantStudentName = getStudentName($studentRegNo);

$notifMessage = "";

if( strlen($nextNotifTo) > 0 )
{
	$notifMessage = "<a href=\"studentDP14.php\">New DP14 application by ".$studentRegNo." - ".$applicantStudentName."</a>";
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
$query = "UPDATE supervisorchange SET progress='$thisProgress', status='$thisStatus' WHERE reg_no='$studentRegNo' AND supervisor_id='$applicantFacultyId'";
$result = mysqli_query($connection, $query);

if(!strcmp($thisStatus, "approved"))
{
	$query = "SELECT * FROM currentsupervisor WHERE reg_no='$studentRegNo'";
	$result = mysqli_query($connection, $query);

	$s1Id = mysqli_fetch_array($result);
	$s1Id = $s1Id['supervisor1_id'];

	$query = "SELECT * FROM supervisorchange WHERE reg_no='$studentRegNo' AND supervisor_id='$s1Id' AND status='approved'";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) >= 1)
	{
		$query = "UPDATE currentsupervisor SET supervisor2_id='$applicantFacultyId' WHERE reg_no='$studentRegNo'";
		$result = mysqli_query($connection, $query);
	}
	else
	{
		$query = "UPDATE currentsupervisor SET supervisor1_id='$applicantFacultyId' WHERE reg_no='$studentRegNo'";
		$result = mysqli_query($connection, $query);
	}

}

?>