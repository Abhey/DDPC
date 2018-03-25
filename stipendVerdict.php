<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/26/2018
 * Time: 2:00 AM
 */
require("./includes/connect.php");
require_once ("includes/validFunc.php");
require_once ("includes/utilities.php");
if($_SERVER['REQUEST_METHOD']=='GET')
        die("<h3>Unauthorized Access</h3>");
$verdict = '';
$stipend_id = htmlentities(trim(stripslashes($_POST['stipend_id'])));
if(isset($_POST['verdict_approve']))
        $verdict = "approved";
else if(isset($_POST['verdict_decline']))
        $verdict = "declined";
else
        die("<h3>Error occurred!!</h3>");

//Getting roll number
$rollQuery = "select reg_no from stipend where stipend_id='$stipend_id'";
$regno =  mysqli_fetch_assoc(mysqli_query($connection,$rollQuery));
$regno = $regno['reg_no'];

// Updating Database
$insQuery = "update stipend set status = '$verdict' where stipend_id = '$stipend_id'";
$res = mysqli_query($connection,$insQuery);

if (!$res)
{
        die("Unsuccessful. Try Again <br>".mysqli_error($connection));
} else {

        //Sending Notification to Student
        $query = "SELECT * FROM notifications";
        $allnotifications = mysqli_query($connection, $query);
        $notificationsCount = mysqli_num_rows($allnotifications);
        $newNotificationId = $notificationsCount + 1;
        $description = "<a href=\"printStipend.php?stipendID=$stipend_id\">Stipend Application: $verdict </a>";
        $issue_date = date("Y-m-d");
        $target_group = "";
        $target_member = $regno;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
        echo '<script>alert("Submitted Successfully");
                         window.location="./studentStipendDDPC.php";
                </script>';
        exit();
}
