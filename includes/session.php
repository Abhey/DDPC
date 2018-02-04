<?php
	session_start();
	if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
	{
		header("Location: ./adminDashboard.php");
	}
	else if(isset($_SESSION['reg_no']))
	{
		header("Location: ./dashboard.php");
	}

?>