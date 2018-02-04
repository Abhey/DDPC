<?php

    session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];
    if(empty($_GET['description']))
        echo "add description";
    else
    {
        $target_group = (string) NULL;
        $target_member = (string) NULL;
        $id = $_GET['id'];
        $description = $_GET['description'];
        $issue_date = $_GET['issue_date'];
        include("./includes/connect.php");
        include("./includes/utilities.php");
        if(isset($_GET['target_group']))
        {
            foreach($_GET['target_group'] as $target_group)
            {
                if(!strcmp($target_group, "student"))
                {
                    $query = "SELECT * FROM studentmaster";
                    $result = mysqli_query($connection, $query);

                    while($thisPerson = mysqli_fetch_array($result))
                    {
                        sendNotification($description, $thisPerson['reg_no'], 1);
                    }
                    
                }
                else if(!strcmp($target_group, "Supervisor"))
                {
                    $query = "SELECT * FROM faculty";
                    $result = mysqli_query($connection, $query);

                    while($thisPerson = mysqli_fetch_array($result))
                    {
                        sendNotification($description, $thisPerson['faculty_id'], 1);
                    }
                }
                else
                {
                    $query = "SELECT * FROM members WHERE role='$target_group'";
                    $result = mysqli_query($connection, $query);

                    while($thisPerson = mysqli_fetch_array($result))
                    {
                        sendNotification($description, $thisPerson['member_id'], 1);
                    }
                }
                
                {
                    header("location: ./makeNotification.php?sent=1");
                }
            }
        }
        if(isset($_GET['target_member']))
        {
            $target_member = $_GET['target_member'];
            $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$id', '$description', '$issue_date', '$target_group', '$target_member')";

            // echo $query;
            $result=mysqli_query($connection, $query); 
            if($result)
            {
                header("location: ./makeNotification.php?sent=1");
            }
        }


    }

?>