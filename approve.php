<?php

	include("./includes/preProcess.php");
	$prevPageLink = "dashboard.php";
	$reg_no = $_SESSION['reg_no'];
	$s_query = "Select role from members WHERE member_id = '$reg_no'";
    $s_result = mysqli_query($connection, $s_query);
    $role_array = array();
    while($s_row = mysqli_fetch_array($s_result))
    {
        array_push($role_array, $s_row['role']);
    }
	$s_query = "Select * from currentsupervisor WHERE supervisor1_id = '$reg_no' OR supervisor2_id = '$reg_no'";
    $s_result = mysqli_query($connection, $s_query);
    if(mysqli_num_rows($s_result) >= 1){
    	$var = "Supervisor";
    	array_push($role_array, $var);
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

					$currentTab = "approve.php";

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
							<ol style="font-size:25px;">
							<?php
							if(in_array("Supervisor", $role_array) || in_array("ConvenerDDPC", $role_array) || in_array("HOD", $role_array)) {
							?>
								<li><a href="studentLeave.php"> Student Leave Application</a></li>

							<?php
							}
							if(in_array("Supervisor", $role_array) || in_array("ConvenerDDPC", $role_array) || in_array("HOD", $role_array) || in_array("ChairmanSDPC", $role_array)){
							?>
								<li><a href="studentDP05.php"> Approve Change of Registration Status Application </a></li>
								<li><a href="studentDP01.php"> Approve the Student Academic Registration Application </a></li>
							<?php
							}
							if(in_array("ConvenerDDPC", $role_array) || in_array("HOD", $role_array) || in_array("ChairmanSDPC", $role_array)){
							?>
								<li><a href="studentDP02.php"> Student Research Committee</a></li>
								<li><a href="studentDP08.php"> Approve Examiner Panel for Ph.D Comprehensive Examination</a></li>
								<li><a href="studentDP16.php"> Approve Examiner Panel for Ph.D Oral Board</a></li>
								<li><a href="studentDP15.php"> Approve Examiner Panel for Ph.D Thesis Evaluation Board</a></li>
							<?php
							}
 
							?>
							</ol>
			<footer class="footer">
			</footer>
		</div>
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
