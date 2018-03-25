<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/25/2018
 * Time: 4:34 PM
 */

/**
 * This file inserts data to the database after validating it and then updates the progress and sends notification to hod
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


// Processing Data
$stipendID = trim(stripslashes(htmlentities($_POST['stipend_id'])));
$sat_work = trim(stripslashes(htmlentities($_POST['sat_work'])));
$assoc_pro = trim(stripslashes(htmlentities($_POST['assoc_pro'])));
$remarks = trim(stripslashes(htmlentities($_POST['remarks'])));
$b_date = trim(stripslashes(htmlentities($_POST['b-date'])));
$remark_sup = trim(stripslashes(htmlentities($_POST['remarks_sup'])));
$s_date = trim(stripslashes(htmlentities($_POST['s-date'])));

//Query for HOD
$hodQuery = "Select member_id  from members where role='HOD' ";
$nextNotifTo = mysqli_fetch_assoc(mysqli_query($connection,$hodQuery));
$nextNotifTo  = $nextNotifTo['member_id'];


//inserting data
$insQuery = "Insert into stipendsupdetails values ('$stipendID','$sat_work','$assoc_pro','$remarks','$b_date','$remark_sup','$s_date')";
$insResult = mysqli_query($connection,$insQuery);

//updating the stipend table
$upQuery = "update stipend set `progress` = 'HOD' where stipend_id = '$stipendID';";
$upResult  = mysqli_query($connection,$upQuery);

//getting reg_no of student
$stuQuery = "select reg_no from stipend where stipend_id=$stipendID";
$reg_no_array = mysqli_fetch_assoc(mysqli_query($connection,$stuQuery));
$reg_no = $reg_no_array['reg_no'];

if (!$upResult)
{
        die("Unsuccessful. Try Again <br>".mysqli_error($connection));
} else {

        //Sending Notification
        $query = "SELECT * FROM notifications";
        $allnotifications = mysqli_query($connection, $query);
        $notificationsCount = mysqli_num_rows($allnotifications);
        $newNotificationId = $notificationsCount + 1;
        $description = "<a href=\"hodStipend.php?stipend_id=$stipendID\">New Stipend Application</a>";
        $issue_date = $date;
        $target_group = "";
        $target_member = $nextNotifTo;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
        echo '<script>alert("Stipend Filled Successfully");
        window.location= "./studentStipendSup.php";
        )</script>';
        exit();
}