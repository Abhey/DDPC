<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/21/2018
 * Time: 3:37 AM
 */

/** This file is called through ajax request and it returns the list of stipends of that (month,year) */

include("./includes/preProcess.php");
allow_access("ChairmanSDPC");
require_once ("./includes/utilities.php");
$nextNotifTo = "";
$hod_id = $_SESSION['reg_no'];

if($_SERVER['REQUEST_METHOD']=="GET"|| !isset($_POST['month']))
        echo "<h3>Error!!</h3>";

$month = trim(htmlentities(stripslashes($_POST['month'])));
$year = trim(htmlentities(stripslashes($_POST['year'])));


$selQuery = "select * from stipend where `month`=$month and `year` = $year and status=\"approved\" ";
$result = mysqli_query($connection,$selQuery);
$i = 1;
while($row = mysqli_fetch_array($result))
{
        $reg_no = $row['reg_no'];
        $name = getStudentName($reg_no);
        $supervisor = getFacultyName(getSupervisor($reg_no));
        $sem = $row['sem'];
        $stipend_amt = $row['stipend_amount'];

        echo "<tr><td>$i</td><td>$reg_no</td><td>$name</td><td>$supervisor</td><td>$sem</td><td>$stipend_amt</td></tr>";
        $i++;
}

