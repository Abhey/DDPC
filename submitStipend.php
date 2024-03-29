<?php
/**
This is the backend checking of form whenever student submits an application
The data is verified and sanitized and then inserted in appropriate tables and waited for approval
The notification is also sent to the supervisors
 **/


include ("./includes/preProcess.php");
allow_access("student");


session_start();
if(!isset($_SESSION['reg_no']))
{
        header("location: ./");
}
else
        $reg_no = $_SESSION['reg_no'];


require("./includes/connect.php");
require_once ("includes/validFunc.php");
require_once ("includes/utilities.php");

// Processing Data

$month =trim(stripslashes(htmlentities($_POST['month'])));
$sem =trim(stripslashes(htmlentities($_POST['sem'])));
$lec =trim(stripslashes(htmlentities($_POST['lec'])));
$tut =trim(stripslashes(htmlentities($_POST['tut'])));
$prac =trim(stripslashes(htmlentities($_POST['prac'])));
$lib_work =trim(stripslashes(htmlentities($_POST['lib_work'])));
$research =trim(stripslashes(htmlentities($_POST['research'])));
$comp =trim(stripslashes(htmlentities($_POST['comp'])));
$other=trim(stripslashes(htmlentities($_POST['other'])));
$hours=trim(stripslashes(htmlentities($_POST['hours'])));
$details=trim(stripslashes(htmlentities($_POST['details'])));
$date=date("Y-m-d");
$year=date("Y");
$nextNotifTo = getSupervisor($reg_no);


$error = 0;
$max_hours = 480;

if(empty($lec) && $lec > $max_hours)
    $lec = 0;
if(empty($tut) && $tut > $max_hours)
    $tut = 0;
if(empty($prac) && $prac > $max_hours)
    $prac = 0;
if(empty($lib_work) && $lib_work > $max_hours)
    $lib_work = 0;
if(empty($research) && $research > $max_hours)
    $research = 0;
if(empty($comp) && $comp > $max_hours)
    $comp = 0;

if(!checkValidity($lec, $tut, $prac, $lib_work, $research, $comp, $hours))
        $error = 1;


if($error)
{
        echo '<script>alert("Incorrect Hours Entered .....");
                         window.location="./applyStipend.php";
              </script>';
}
else{
    //Inserting Data
    $stipendID = $reg_no."-".$month."-".$year;
    $query = "INSERT INTO `stipend` (`stipend_id`,`reg_no`, `month`, `year`, `date_sent`, `sem`, `progress`)VALUES ('$stipendID','$reg_no', '$month', '$year', '$date', '$sem', 'Supervisor')";
    $result = mysqli_query($connection, $query);

    $query1 = "insert into stipendstuddetails (stipend_id,faculty_id,lecture,tut,prac,lib_work,comp_work,research_work,other,hours_per_week,details) VALUES ('$stipendID','$nextNotifTo','$lec','$tut','$prac','$lib_work','$comp','$research','$other','$hours','$details');";
    $result1 = mysqli_query($connection,$query1);

    if (!$result)
    {
        die("Unsuccessful. Try Again <br>".mysqli_error($connection));
    } else {

        //Sending Notification
        $query = "SELECT * FROM notifications";
        $allnotifications = mysqli_query($connection, $query);
        $notificationsCount = mysqli_num_rows($allnotifications);
        $newNotificationId = $notificationsCount + 1;
        $description ="<a href=\"supStipend.php?stipend_id=$stipendID\">New Stipend Application($reg_no)</a>";
        $issue_date = date("Y-m-d");
        $target_group = "";
        $target_member = $nextNotifTo;

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
        $result = mysqli_query($connection, $query);
        echo '<script>alert("Applied Successfully");
                         window.location="./printStipend.php?stipendID='.$stipendID.'";
                </script>';
        exit();
    }
}