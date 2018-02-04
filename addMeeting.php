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
    else if(empty($_GET['dept_id']))
        echo "Add Department";
    else if(empty($_GET['committee_id']))
        echo "Add Committee";
    else if(empty($_GET['date']))
        echo "Add date";
    else if(empty($_GET['time']))
        echo "Add Time";
    else if(empty($_GET['venue']))
        echo "Add Venue";
    else if(empty($_GET['type']))
        echo "Add meeting type";
    else
    {
        $meeting_no     = $_GET['meeting_no'];
        $dept_id        = $_GET['dept_id'];
        $committee_id   = $_GET['committee_id'];
        $date           = $_GET['date'];
        $time           = $_GET['time'];
        $venue          = $_GET['venue'];
        $type           = $_GET['type'];

        include("./includes/connect.php");

        $query = "INSERT INTO meeting (`meeting_no`, `dept_id`, `committee_id`, `date`, `time`, `venue`, `type`) VALUES('$meeting_no', '$dept_id', '$committee_id', '$date', '$time', '$venue', '$type')";
        echo $query;
        $result=mysqli_query($connection, $query); 
        if($result)
        {    
	        //$nextNotifTo = $_POST['nextNotifTo'];
			
	
	
	$query1 = "SELECT * FROM members WHERE dept_id='$dept_id'";
			$all = mysqli_query($connection, $query1);
	$Count = mysqli_num_rows($all);
	while($row = mysqli_fetch_array($all))
	{
		$query3 = "SELECT * FROM notifications";
	$allnotifications = mysqli_query($connection, $query3);
	$notificationsCount = mysqli_num_rows($allnotifications);
	$description = '<a href="test.php?m_no=<?php echo $meeting_no; ?>">New Meeting</a>';
	$issue_date = date('Y-m-d');
	$target_group = "";
	$newNotificationId = $notificationsCount + 1;
	
	$target_member = $row['member_id'];
    
	$query2 = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
	  mysqli_query($connection, $query2);
	}	
            header("location: ./createMeeting.php?sent=1");
        }
    }

?>