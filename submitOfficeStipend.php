<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/25/2018
 * Time: 10:21 PM
 */


/***
 * Gathering the data and inserting it to the table and updating the progress to DDPC and then sending notif to DDPC
 */
session_start();
if(!isset($_SESSION['reg_no']))
{
        header("location: ./");
}
else
        $sup_no = $_SESSION['reg_no'];

require ("./includes/preProcess.php");
allow_access("ddpcoffice");


require("./includes/connect.php");
require_once ("includes/validFunc.php");
require_once ("includes/utilities.php");

if($_SERVER['REQUEST_METHOD']=="GET"||!isset($_POST['stipend_id']))
        die("<h3>Error!!</h3>");

//Data Processing
$vac_availed = trim(htmlentities(stripslashes($_POST['vac_type'])));
$vac_leaves = trim(htmlentities(stripslashes($_POST['vac_leaves'])));
$unauth_abs  =trim(htmlentities(stripslashes($_POST['unauth_leaves'])));
$stipend_id = trim(htmlentities(stripslashes($_POST['stipend_id'])));
$date = trim(htmlentities(stripslashes($_POST['date'])));
$stipend_amt = trim(htmlentities(stripslashes($_POST['stipend_amt'])));

//Query for DDPC (to send Notif)
$hodQuery = "Select member_id  from members where role='ConvenerDDPC'";
$nextNotifTo = mysqli_fetch_assoc(mysqli_query($connection,$hodQuery));
$nextNotifTo  = $nextNotifTo['member_id'];


//inserting data
$insQuery = "Insert into stipendoffice values ('$stipend_id','$vac_availed','$vac_leaves','$unauth_abs','$date')";
$insResult = mysqli_query($connection,$insQuery);

//updating the stipend table
$upQuery = "update stipend set stipend_amount='$stipend_amt' where stipend_id='$stipend_id'";
$upResult = mysqli_query($connection,$upQuery);
if(!$upResult)
        echo ("Unsuccessful. Try Again <br>".mysqli_error($connection));

$upQuery = "update stipend set `progress` = 'DDPC' where stipend_id='$stipend_id';";
$upResult  = mysqli_query($connection,$upQuery);
if(!$upResult)
        echo ("Unsuccessful. Try Again <br>".mysqli_error($connection));

//getting reg_no of student
$stuQuery = "select reg_no from stipend where stipend_id='$stipend_id'";
$stuResult = mysqli_query($connection,$stuQuery);
if(!$stuResult)
        echo ("Unsuccessful. Try Again <br>".mysqli_error($connection));
$reg_no = mysqli_fetch_assoc($stuResult);
$reg_no = $reg_no['reg_no'];

if (!$upResult)
{
        die("Unsuccessful. Try Again <br>".mysqli_error($connection));
} else {

        //Sending Notification
        $query = "SELECT * FROM notifications";
        $allnotifications = mysqli_query($connection, $query);
        $notificationsCount = mysqli_num_rows($allnotifications);
        $newNotificationId = $notificationsCount + 1;
        $description = "<a href=\"studentStipendDDPC.php?stipend_id=$stipend_id\">New Stipend Application($reg_no)</a>";
        $issue_date = date("Y-m-d");
        $target_group = "";
        $target_member = $nextNotifTo;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
        echo '<script>alert("Submitted Successfully");
                         window.location="studentStipendOffice.php";
                </script>';
        exit();
}