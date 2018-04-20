<?php
if(isset($_POST['login']))
{
	include("./includes/connect.php");
	$reg_no = mysqli_real_escape_string($connection, $_POST['reg_no']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	if(!strcmp($reg_no, "admin") AND !strcmp($password, "admin"))
	{
		session_start();
		$_SESSION['is_admin'] = 1;
		$_SESSION['reg_no'] = "admin";
		$_SESSION['role'] = "admin";

		header("location: ./adminDashboard.php");
	}else if($reg_no=="ddpcoffice" and $password=="ddpcoffice")
	{
		session_start();
		$_SESSION['reg_no'] = "ddpcoffice";
		$_SESSION['role'] = "ddpcoffice";

		header("location:./officeDashboard.php");
	}
	else
	{
		$query = "SELECT * FROM studentmaster where reg_no='$reg_no' and password='$password'";
		//echo $query
		$results = mysqli_query($connection, $query);
		if(mysqli_num_rows($results) == 1)
		{
			session_start();
			$_SESSION['reg_no'] = $reg_no;
			$_SESSION['role'] = "student";
			$query = "SELECT * FROM members where member_id = '$reg_no'";
			$results = mysqli_query($connection, $query);
			if(mysqli_num_rows($results) == 1)
			{
				$_SESSION['in_ddpc'] = 1;
			} else {
				$_SESSION['in_ddpc'] = 0;
			}

			header("location: ./dashboard.php");
		}
		else
		{
			$query = "SELECT * FROM faculty where faculty_id='$reg_no' and password='$password'";
			$results = mysqli_query($connection, $query);
			if(mysqli_num_rows($results) == 1)
			{
				$query = "SELECT * FROM members WHERE member_id='$reg_no'";
				$results = mysqli_query($connection, $query);
				if(mysqli_num_rows($results) >= 1)
				{
					$result = mysqli_fetch_array($results);
					$_SESSION['in_ddpc'] = 1;
					if (strcmp($result['role'], "member")){
						session_start();
						$_SESSION['reg_no'] = $reg_no;
						$_SESSION['role'] = $result['role'];
						header("location: ./dashboard.php");
					}
					else 
					{
						$query = "SELECT * FROM currentsupervisor WHERE supervisor1_id ='$reg_no'";
						$results = mysqli_query($connection, $query);
						if(mysqli_num_rows($results) >= 1)
						{
							session_start();
							$_SESSION['reg_no'] = $reg_no;
							$_SESSION['role'] = "Supervisor";			
							header("location: ./dashboard.php");
						}	
						else
						{
							session_start();
							$_SESSION['reg_no'] = $reg_no;
							$result = mysqli_fetch_array($results);
							$_SESSION['role'] = "faculty";
							header("location: ./dashboard.php");
						}
					}
					
				}	
				else 
				{
					$query = "SELECT * FROM currentsupervisor WHERE supervisor1_id ='$reg_no'";
					$results = mysqli_query($connection, $query);
					if(mysqli_num_rows($results) >= 1)
					{
						session_start();
						$_SESSION['reg_no'] = $reg_no;
						$_SESSION['role'] = "Supervisor";
						header("location: ./dashboard.php");
					}	
					else
					{
						session_start();
						$_SESSION['reg_no'] = $reg_no;
						$result = mysqli_fetch_array($results);
						$_SESSION['role'] = "faculty";
						header("location: ./dashboard.php");
					}
				}
			}
			else
			{
				header("location: ./index.php?invalid=1");
			}
		}
	}
}
else
{
	header("location: 404error.html");
}
?>
