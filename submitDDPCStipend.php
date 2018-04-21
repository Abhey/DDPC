<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/20/2018
 * Time: 2:37 AM
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


$stipend_id = trim(htmlentities(stripslashes($_POST['stipend_id'])));
$verdict = trim(htmlentities(stripslashes($_POST['verdict'])));
$is_single = trim(htmlentities(stripslashes($_POST['is_single'])));
$is_start = '';
if($is_single == "false")
        $is_start = trim(htmlentities(stripslashes($_POST['is_Start'])));

//getting regno of student
$stuQuery = "select reg_no from stipend where stipend_id='$stipend_id'";
$stuResult = mysqli_query($connection,$stuQuery);
if(!$stuResult)
        die("Unsuccessful. Try Again <br>".mysqli_error($connection));
$reg_no = mysqli_fetch_assoc($stuResult);
$reg_no = $reg_no['reg_no'];


if($verdict=="approve")
{
        $upQuery = "update stipend set `progress` = 'HOD',`status` = 'pending' where stipend_id='$stipend_id';";
        $upResult  = mysqli_query($connection,$upQuery);
        if(!$upResult)
                die("Unsuccessful. Try Again <br>".mysqli_error($connection));


}
else
{
        $upQuery = "update stipend set `progress` = 'DDPC',`status` = 'declined' where stipend_id='$stipend_id';";
        $upResult  = mysqli_query($connection,$upQuery);
        if(!$upResult)
                die("Unsuccessful. Try Again <br>".mysqli_error($connection));

}


if($verdict=="approve")
{
        //Query for HOD (to send notif)
        $ddpcQuery = "Select member_id  from members where role='HOD' ";
        $nextNotifTo = mysqli_fetch_assoc(mysqli_query($connection,$ddpcQuery));
        $nextNotifTo  = $nextNotifTo['member_id'];
        if($is_single == "true")
        {
                $description = "<a href=\"studentStipendHOD.php\">New Stipend Application($reg_no)</a>";
                notify($description, $nextNotifTo);
        }
        else
        {
                //Notify only single time
                if($is_start  == "true")
                {
                        $description = "<a href=\"studentStipendHOD.php\">New Stipend Applications</a>";
                        notify($description, $nextNotifTo);
                }
        }
}
else
{
        $nextNotifTo  = $reg_no;
        $description = "<a href=\"printStipend.php?stipendID=$stipend_id\">Stipend Application: Declined </a>";
        notify($description,$nextNotifTo);
}



function notify($description,$nextNotifTo)
{
        include("./includes/connect.php");

        $query = "SELECT * FROM notifications";
        $allnotifications = mysqli_query($connection, $query);
        $notificationsCount = mysqli_num_rows($allnotifications);
        $newNotificationId = $notificationsCount + 1;
        $issue_date = date("Y-m-d");
        $target_group = "";
        $target_member = $nextNotifTo;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
}