<?php

	session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];
    if(empty($_GET['meeting_no']))
        echo "Add Meeting Number";
    else if(empty($_GET['member_id']))
        echo "Add Members";
    else
    {
        include("./includes/connect.php");
        foreach($_GET['member_id'] as $thisMember)
        {
            $query = "INSERT INTO meetattendance (`meeting_no`, `member_id`) VALUES('$_GET[meeting_no]', '$thisMember')";
            echo $query;
            $result=mysqli_query($connection, $query); 
            if($result)
            {
                header("location: ./meetingAttendance.php?sent=1");
            }

        }
    }

?>