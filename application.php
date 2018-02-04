	<?php

		include("./includes/preProcess.php");
	    $prevPageLink = "dashboard.php";

	    $supervisor_id = $_SESSION['reg_no'];
	    $s_query = "Select * from currentsupervisor WHERE supervisor1_id = '$supervisor_id'";
	    $s_result = mysqli_query($connection, $s_query);
	    if(mysqli_num_rows($s_result) >= 1){
	    	$_SESSION['supervisor'] = 1;
	    }
	    else{
	    	$_SESSION['supervisor'] = 0;
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
		<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 

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

					$currentTab = "application";

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
                    <?php include("./includes/topright.php") ?>

                </div>
            </div>
        </nav>
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
							<h4>Apply an application</h4>
							<?php
								if (!strcmp($_SESSION['role'], "student")) {
							?>
							<ol style="font-size:25px;">
								<li><a href="applyLeave.php"> Apply Leave (DP-06)</a></li>
								<li><a href="applyStipend.php">Apply Stipend</a> </li>
								<li><a href="changeRegStatus.php"> Apply for Change of Registration Status (DP-05)</a></li>

								<li><a href="applyDP01.php"> Apply for Academic Registration (DP-01)</a></li>
								<li><a href="applyDP04.php"> Apply for addition or deletion of courses (DP-04)</a></li>
								<li><a href="applyDP12.php"> Supervisor selection (DP-12)</a></li>
								<li><a href="applyDP14.php"> Change Supervisor (DP-14)</a></li>

							</ol>
							<?php
								}
								if (!strcmp($_SESSION['role'], "Supervisor") || $_SESSION['supervisor']) {
							?>
							<ol style="font-size:25px;">
								<li><a href="studentList.php?form=02"> Student Reasearch Committee (DP-02) </a></li>
								<li><a href="studentList.php?form=08"> List of Suggested Examiners for Ph.D Comprehensive Examination (DP-08)</a></li>
								<li><a href="studentList.php?form=16"> List of Suggested Examiners for Ph.D Oral Board (DP-16)</a></li>
								<li><a href="studentList.php?form=15"> List of Suggested Examiners for Ph.D Thesis Evaluation Board (DP-15) </a></li>
								<!-- <li><a href="studentList.php?form=13"> Supervisor Selection </a></li> -->

							</ol>
							<?php
								}
							?>
							</div>
							<div class="col-md-6">
							<h4>Print an application</h4>
							<?php
								if (!strcmp($_SESSION['role'], "student")) {
							?>
							<ol style="font-size:25px;">

								<li><a href="viewLeave.php"> View and Print Leave Application (DP-06)</a></li>
								<li><a href="viewStipend.php"> View and Print Stipend Application</a></li>
								<li><a href="printDP05.php"> Print Change of Registration Status Application (DP-05)</a></li>

								<li><a href="printDP01.php"> Print latest Academic Registration Application (DP-01)</a></li>
								<li><a href="printDP20.php"> Print Undertaking  (DP-20)</a></li>
							</ol>
							<?php
								}
								if (!strcmp($_SESSION['role'], "Supervisor")) {
							?>
							<ol style="font-size:25px;">

								<li><a href="studentList.php?form=03">Print Semester Progress Report of the Candidate (DP-03)</a></li>
								<li><a href="studentList.php?form=09">Print Report of Examiners of the Comprehensive Examination (DP-09)</a></li>
								<li><a href="studentList.php?form=10">Print Report of State-of-the-Art Seminar (DP-10)</a></li>
								<li><a href="studentList.php?form=11">Print Report of Open Seminar (DP-11) </a></li>
							</ol>
							<?php
								}
							?>
							</div>

			<footer class="footer">
			</footer>

	</div>
	</div>
	</div>
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

			  $("#from_datepicker").datepicker({
				  minDate: 0,
				  dateFormat: 'yy-mm-dd',
				  onSelect: function(date) {
					$("#to_datepicker").datepicker('option', 'minDate', date);
				  }
				});

			  $("#to_datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
			  $('#to_datepicker').change(function () {
                var diff = $('#from_datepicker').datepicker("getDate") - $('#to_datepicker').datepicker("getDate");
                $('#diff').val((diff / (1000 * 60 * 60 * 24) * -1) + 1);
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
