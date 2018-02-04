	<?php

		include("./includes/preProcess.php");
		$prevPageLink = "fillDetails.php";
		$student_reg_no = $_GET['student_reg_no'];
		$query = "SELECT * FROM studentmaster NATURAL JOIN currentsupervisor WHERE reg_no='$student_reg_no'";
		$results = mysqli_query($connection, $query);
		$student = mysqli_fetch_array($results);
		$query = "SELECT * FROM studentmaster NATURAL JOIN studentthesisdetails WHERE reg_no='$student_reg_no'";
		$results = mysqli_query($connection, $query);
		$thesis = mysqli_fetch_array($results);
		$query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no ASC";
		$results = mysqli_query($connection, $query);
		$arr = mysqli_fetch_array($results);
		$date_of_reg = $arr['date_of_reg'];
		if($date_of_reg === null) {
			$date_of_reg = date('Y-m-d');
		}
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
		$sem_no = $current_sem_no + 1;
		$thisQuery = "SELECT member_id FROM `members` WHERE role='ConvenerDDPC'";
		$thisResult = mysqli_query($connection, $thisQuery);
		$thisResult = mysqli_fetch_array($thisResult);
		$nextNotifTo = $thisResult['member_id'];
		function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}
		$query = "SELECT * from studentprogramdetails where reg_no = '$student_reg_no'";
		$result = mysqli_query($connection, $query);
		$studentprogramdetails = mysqli_fetch_assoc($result);
		if($studentprogramdetails['date_of_open'] == 0 || strtotime($studentprogramdetails['date_of_open'] > time())){
			echo "<script>
			alert('The Open Seminar of this student has not taken place.');
			window.location.href='./fillDetails.php';
			</script>";
		}
	?> 
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>MNNIT - DDPC</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Animation library for notifications   -->
		<link href="assets/css/animate.min.css" rel="stylesheet"/>

		<!--  Paper Dashboard core CSS    -->
		<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

		<!--  Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/themify-icons.css" rel="stylesheet">

		<link href="./css/myCss.css" rel="stylesheet">

		<link href="assets/css/datepicker.css" rel="stylesheet" />
		<style type="text/css">
		.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year{
		   background: #333;
		   border: 1px solid #555;
		   color: #EEE;
		 }
		</style>
		
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-background-color="black" data-active-color="warning">

		<!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->
		<div class="sidebar-wrapper">
			<div class="logo">
				<?php include('./includes/topleft.php') ?>
			</div>

			<?php

			$currentTab = "fillDetails";

			include("./includes/sideNav.php");

			?>

		</div>
	</div>

	<div class="main-panel">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<?php include('./includes/logo.php'); ?>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">

                        <?php include("./includes/topright.php") ?>

                    </ul>

				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<b>
								<div class="col-md-offset-10"> Form: DP-11</div>
								<div class="col-md-offset-10"> (Clause 11)</div>
								<center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
								<center><u><h5>Report of Open Seminar</h5></u></center><br>
								<div class="col-md-offset-1" style="font-size:15px">
									<form class="form-inline" id="dp11" name="dp11" action="submitDP11.php" method="post">


									
									</b>
									Name of the Student : <b><?php echo $student['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $student['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>
									Thesis Title: <b><?php 
										if(empty($thesis['proposed_topic'])){
											echo "Not submitted yet.";
										}
										else{
											echo $thesis['proposed_topic'];
										}
										 
									?></b>

									<div class="col-md-11">
											<b>Date of delivery of the Seminar:</b>
											<?php
												if($studentprogramdetails['date_of_open'] == 0){
											?>
												<input type="text" id="sem_date" name="sem_date">
											<?php
												}
												else {
													echo $studentprogramdetails['date_of_open'];
											?>
													<input type="text" id="sem_date" name="sem_date" value="<?php echo $studentprogramdetails['date_of_open']?>" hidden>
											<?php
												}
											?>
									</div>
									<div class="col-md-11">
											Name of Thesis Supervisor(s):
											<b><?php echo getFacultyName($student['supervisor1_id']); 
											if(!empty($student['supervisor2_id'])){
												echo ", ".getFacultyName($student['supervisor2_id']); 
											}
									?></b>
									</div>

									<div class="col-md-11">
											<b>Comments:</b>
											<input type="text" id="comments" name="comments" style="width: 75%;">
									</div>
									
								</div>
								
								<div class="row col-md-offset-1">
									<div class="col-md-11" style="font-size:10px;">
										
							<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
							<input type="text" name="student_reg_no" value="<?php echo $student_reg_no ?>" style="display: none;">
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
			<div style="font-size:15px">
				<div class="row col-md-offset-1">
					<div class="col-md-4">
						Supervisor(s)
					</div>
					<div class="col-md-4">
						Internal Member SRC
					</div>
					<div class="col-md-3">
						External Member SRC
					</div>
				</div>
				<br/><br><br>
				<div class="row col-md-offset-1">
					<div class="col-md-4">
						Forwarded By:
					</div>
					<div class="col-md-4">
						Convener DDPC
					</div>
					<div class="col-md-3">
						Head of Department
					</div>
				</div>
				<br/><br><br>
				<div class="row col-md-offset-1">
					<div class="col-md-4">
						Approved By:
					</div>
					<div class="col-md-4">
						Chairman SPDC
					</div>
				</div>
				<br>



			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-info btn-fill btn-wd">Fill</button>
			</div><br>
			<h5 class="text-center" id="msg" style="color:red;"></h5>
		</form>
	</div>
</div>
<div>
</div>
</div>

</div>

</div>


<footer class="footer">
</footer>
</div>
</div>
<p></p>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-1.10.4.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>


<!-- Javascript for Datepicker -->
<!-- <script src="assets/js/datepicker.js"></script> -->

<script type="text/javascript">
	$("#sem_date").datepicker({
				  minDate: 0,
				  changeMonth: true,
				  changeYear: true,
				  dateFormat: 'yy-mm-dd'
				});
	function removeNot() {

		$('.notificationAlert').css({
			'display': 'none'
		});

		xmldata = new XMLHttpRequest();

		var el = document.getElementById('notid').innerHTML;

		var urltosend = "set_cookie.php?notid="+el;

		xmldata.open("GET", urltosend,false);
		xmldata.send(null);
		if(xmldata.responseText != ""){
			toPrint = xmldata.responseText;
		}
	}

</script>


</html> 