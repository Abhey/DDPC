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
    else if(empty($_GET['agenda_id']))
        echo "Add Agenda Id";
    else if(empty($_GET['agenda_name']))
        echo "Add Agenda Name";
    else if(empty($_GET['description']))
        echo "Add Description";
    else
    {
        $meeting_no     = $_GET['meeting_no'];
        $agenda_id      = $_GET['agenda_id'];
        $agenda_name    = $_GET['agenda_name'];
        $description    = $_GET['description'];

        include("./includes/connect.php");

        $query = "INSERT INTO meetingagendabrief (`meeting_no`, `agenda_id`, `agenda_name`, `description`) VALUES('$meeting_no', '$agenda_id', '$agenda_name', '$description')";
        echo $query;
        $result=mysqli_query($connection, $query); 
        if($result)
        {
            header("location: ./addMeetingBrief.php?sent=1");
        }
    }

?>