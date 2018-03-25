<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/25/2018
 * Time: 10:21 PM
 */

session_start();
if(!isset($_SESSION['reg_no']))
{
        header("location: ./");
}
else
        $sup_no = $_SESSION['reg_no'];


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

//Query for DDPC
$ddpcQuery = "Select member_id  from members where role='DDPC Convener' ";
$nextNotifTo = mysqli_fetch_assoc(mysqli_query($connection,$ddpcQuery));
$nextNotifTo  = $nextNotifTo['member_id'];


//inserting data
$insQuery = "Insert into stipendhod values ('$vac_availed','$vac_leaves','$unauth_abs','$stipend_id','$date')";
$insResult = mysqli_query($connection,$insQuery);

//updating the stipend table
$upQuery = "update stipend set stipend_amount='$stipend_amt' where stipend_id='$stipend_id'";
$upResult = mysqli_query($connection,$upQuery);

$upQuery = "update stipend set `progress` = 'DDPC Convener' where stipend_id='$stipend_id';";
$upResult  = mysqli_query($connection,$upQuery);

//getting reg_no of student
$stuQuery = "select reg_no from stipend where stipend_id=$stipend_id";
$reg_no = mysqli_fetch_assoc(mysqli_query($connection,$stuQuery));
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
        $description = "<a href='ddpcStipend.php?stipend_id=$stipend_id'>New Stipend Application</a>";
        $issue_date = date("Y-m-d");
        $target_group = "";
        $target_member = $nextNotifTo;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
        echo '<script>alert("Submitted Successfully");
                         window.location="./studentStipendHOD.php";
                </script>';
        exit();
}