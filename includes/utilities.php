<?php
	function getStudentName($reg_no)
	{
		include ("connect.php");
		$query = "SELECT name from studentmaster where reg_no = '$reg_no'";
		$queryResult = mysqli_fetch_assoc(mysqli_query($connection,$query));
		return $queryResult['name'];
	}
	function getFacultyName($faculty_id){
		include("connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}

	function getDepartment($reg_no)
	{
		include("connect.php");
		$deptQuery = "SELECT dept_name,dept_id from department WHERE dept_id=(SELECT dept_id from studentmaster where reg_no ='$reg_no')";
		//echo $deptQuery;
		$deptResult = mysqli_query($connection, $deptQuery);
		$deptResult = mysqli_fetch_assoc($deptResult);
		$dept = $deptResult['dept_name'];
		return $dept;
	}
	function getDepartmentID($reg_no)
	{
		include("connect.php");
		$deptQuery = "SELECT dept_id from studentmaster where reg_no ='$reg_no'";
		//echo $deptQuery;
		$deptResult = mysqli_query($connection, $deptQuery);
		$deptResult = mysqli_fetch_assoc($deptResult);
		$deptID = $deptResult['dept_id'];
		return $deptID;
}


      function getSupervisor($reg_no){
		include("connect.php");
		$query = "SELECT supervisor1_id FROM currentsupervisor WHERE reg_no ='$reg_no'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['supervisor1_id'];
		return $faculty_name;
	}


	// type 1 for individual notification
	// type 2 for group notification
	function sendNotification($notificationMessage, $notificationTarget, $notificationType)
	{
		// get new notification id
		include("connect.php");
		$query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;

		// get the date
		$issue_date = date('Y-m-d');

		if($notificationType == 1)
		{
			$target_group = "";
			$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$notificationMessage', '$issue_date', '$target_group', '$notificationTarget')";
			$result = mysqli_query($connection, $query);
			return 1;
		}
		else
		{
			return 0;
		}

		return 0;
	}

	//get the sem number from the course id
	function getSemNumber($courseId)
	{
		$semNo = 0;
		$semNo = (int)$courseId[3];
		$semNo *= 10;
		$semNo = $semNo + ((int)$courseId[4]);

		return $semNo;
	}
	function getCurrentSem($reg_no){
		include("connect.php");
		$query = "SELECT sem_no FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no DESC";
		$results = mysqli_query($connection, $query);
		if(mysqli_num_rows($results) == 0)
		{
		 $current_sem_no = 0;
		}
		else
		{
		    $arr = mysqli_fetch_array($results);
		    $current_sem_no = $arr['sem_no'];
		}
		return $current_sem_no;
	}
	function getCoursesCompleted($reg_no){
		include("connect.php");
		$current_sem_no = getCurrentSem($reg_no);
		$query = "SELECT count(course_id) AS count FROM courseregistration WHERE reg_no ='$reg_no' AND sem_no ='$current_sem_no' AND dropcourse = '0'";
		$results = mysqli_query($connection, $query);
		$ThisResult = mysqli_fetch_assoc($results);
		$count = $ThisResult['count'];
		return $count;
	}
?>

