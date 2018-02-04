	<?php

		include("./includes/preProcess.php");
		include("./includes/utilities.php");
		$prevPageLink = "fillDetails.php";
		$student_reg_no = $_GET['student_reg_no'];
		$query = "SELECT * FROM studentmaster NATURAL JOIN currentsupervisor WHERE reg_no='$student_reg_no'";
		$results = mysqli_query($connection, $query);
		$student = mysqli_fetch_array($results);
		$query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no ASC";
		$results = mysqli_query($connection, $query);
		$arr = mysqli_fetch_array($results);
		$date_of_reg = $arr['date_of_reg'];
		if($date_of_reg === null) {
			$date_of_reg = date('Y-m-d');
		}
		$current_sem_no = getCurrentSem($student_reg_no);
		$sem_no = $current_sem_no + 1;
		$thisQuery = "SELECT member_id FROM `members` WHERE role='ConvenerDDPC'";
		$thisResult = mysqli_query($connection, $thisQuery);
		$thisResult = mysqli_fetch_array($thisResult);
		$nextNotifTo = $thisResult['member_id'];
		$query = "SELECT * from studentprogramdetails where reg_no = '$student_reg_no'";
		$result = mysqli_query($connection, $query);
		$studentprogramdetails = mysqli_fetch_assoc($result);

		$query = "select total_credits_registered from studentregistration where reg_no = '$student_reg_no' AND sem_no = '$current_sem_no'";
		$result = mysqli_query($connection, $query);
		$total = mysqli_fetch_assoc($result);
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
		<div class="content" id="printThisSection">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<b>
								<div class="col-md-offset-10"> Form: DP-03</div>
								<div class="col-md-offset-10"> (Clause 4.3)</div>
								<center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
								<center><u><h5>Semester Progress Report of the Candidate</h5></u></center><br>
								<div class="col-md-offset-1" style="font-size:15px">
									<form class="form-inline" id="dp03" name="dp03" action="submitDP03.php" method="POST">


									
									</b>
									Name of the Student : <b><?php echo $student['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $student['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>
									Supervisor(s) : <b><?php echo getFacultyName($student['supervisor1_id']); 
									if(!empty($student['supervisor2_id'])){
										echo ", ".getFacultyName($student['supervisor2_id']); 
									}
									?></b>
									
									<div class="col-md-11">
										<b>No. of Courses completed:</b>
										<?php echo getCoursesCompleted($student_reg_no); ?>
										<!-- <input name="courses_completed" type="number"/> -->
									</div>
									<div class="col-md-11">
										<b>Total Credits: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(a)Attempted : </b>
										<?php 											  
												echo $total['total_credits_registered'];
											?>
										<!-- <input name="credits_attempted" type="number" min="0"/><br> -->
									</div>
									<div class="col-md-offset-2">
										<b>(b)Earned</b><input name="credits_earned" type="number" min="0"/>
									</div>

									<div class="col-md-11">
											<b>Date of Comprehensive Examination:</b>
											<?php
												if($studentprogramdetails['date_of_comp'] == 0){
											?>
												<input type="text" id="comp_date" name="comp_date">
											<?php
												}
												else {
													echo $studentprogramdetails['date_of_comp'];
											?>
													<input type="text" id="comp_date" name="comp_date" value="<?php echo $studentprogramdetails['date_of_comp']?>" hidden>
											<?php
												}
											?>
									</div>
									<div class="col-md-11">
											<b>Date of State of Art:</b>
											<?php
												if($studentprogramdetails['date_of_soa'] == 0){
											?>
												<input type="text" id="soa_date" name="soa_date">
											<?php
												}
												else {
													echo $studentprogramdetails['date_of_soa'];
											?>
													<input type="text" id="soa_date" name="soa_date" value="<?php echo $studentprogramdetails['date_of_soa']?>" hidden>
											<?php
												}
											?>
									</div>
									<div class="col-md-11">
											<b>Date of Presentation:</b>
											<?php
												if($studentprogramdetails['date_of_open'] == 0){
											?>
												<input type="text" id="pres_date" name="pres_date">
											<?php
												}
												else {
													echo $studentprogramdetails['date_of_open'];
											?>
													<input type="text" id="pres_date" name="pres_date" value="<?php echo $studentprogramdetails['date_of_open']?>" hidden>
											<?php
												}
											?>
									</div>
									<div class="col-md-11">
											<b>Progress of the candidate is satisfactory:</b>
											<select>
												<option value="">Select</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
									</div>
									<div class="col-md-11">
										<div class = "row col-md-5">
											<b>Credit: </b>
											<?php 											  
												echo $total['total_credits_registered'];
											?>
										</div>
										<div class="row col-md-6">
											<b>Grade: </b>
												<select id="grade" name="grade">
												<option value="">Select</option>
												<?php

												$counter = $total['total_credits_registered']/4;
												for ($i = 0; $i < $counter + 1; $i++ ) { 
													$option = "";
													$value = 0;
													for($s = 0; $s <= $i - 1; $s++){
														$option = $option."S";
														$value = $value + 4;
													}
													for($x = ($counter - $i); $x > 0; $x--){
														$option = $option."X";
													}
											?>
													<option value="<?php echo $value ?>"><?php echo $option ?></option>
											<?php
												}

											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row col-md-offset-1">
									<div class="col-md-11" style="font-size:10px;">
										
							<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
							<input type="text" name="student_reg_no" value="<?php echo $student['reg_no'] ?>" style="display: none;">
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
		

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
	$("#comp_date, #soa_date, #pres_date").datepicker({
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