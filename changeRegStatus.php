	<?php

		include("./includes/preProcess.php");
		$prevPageLink = "application.php";

		if (strpos($user['program_category'], 'Part Time') !== false) {
			echo "<script>
			alert('Cannot apply as your current status is already ".$user['program_category'].".');
			window.location.href='./application.php';
			</script>";

		}


		$reg_no = $_SESSION['reg_no'];
		$query = "SELECT supervisor1_id, supervisor2_id FROM currentsupervisor WHERE reg_no ='$reg_no'";
		$s_results = mysqli_query($connection, $query);
		$arr = mysqli_fetch_array($s_results);

		$id1 = $arr['supervisor1_id'];
		$id2 = $arr['supervisor2_id'];
		$q1 = "SELECT name from faculty where faculty_id = '$id1'"; 
		$r1 = mysqli_query($connection, $q1);
		$row1 = mysqli_fetch_array($r1);
		$sname1 = $row1['name'];
		$sname2 ="";
		if(!empty($id2)) {
			$q1 = "SELECT name from faculty where faculty_id = '$id2'"; 
			$r1 = mysqli_query($connection, $q1);
			$row1 = mysqli_fetch_array($r1);
			$sname2 = $row1['name'];
		}
		if ( !strcmp($_SESSION['role'], "student") )
	    {
	        $thisUniqueId = $_SESSION['reg_no'];
	        $thisQuery = "SELECT supervisor1_id FROM currentsupervisor WHERE reg_no='$thisUniqueId'";
	        $thisResult = mysqli_query($connection, $thisQuery);
	        $thisResult = mysqli_fetch_array($thisResult);
	        $nextNotifTo = $thisResult['supervisor1_id'];
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
								<div class="col-md-offset-10"> Form: DP-05</div>
								<div class="col-md-offset-10"> (Clause 4.5)</div>
								<center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
								<center><u><h3>Change of Registration Status</h3></u></center><br><br><br>
								<div class="col-md-offset-1" style="font-size:20px">
								<form class="form-inline" id="dp05" action="submitDP05.php" method="post">
									</b>
									Name of the Student : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $_SESSION['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>
									Supervisor(s): <b> <?php echo $sname1." ".$sname2; ?></b><br>
									Present Registration Status: <b><?php echo $user['program_category'] ?></b><br>
									Registration Status to be converted to: <b>Part-Time</b><br>
									Justification/Reason:<textarea form="dp05" style="vertical-align:top" class="form-control border-input" name="reason" id="reason"></textarea>
									
								</div>
								<br><br><br>
								<div style="font-size:25px">
								<div class="col-md-offset-8">(Signature of the Student)</div><br><br><br>
									<div class="col-md-offset-1">Comment of the Supervisor(s) :</div><br><br><br><br>
									<div class="col-md-offset-8">(Signature of the Supervisor(s))</div><br><br><br>
									<div class="col-md-offset-1">
									Recommended By:<br><br>
									</div>
									<div class="col-md-offset-1"><b>Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Department</b></div>
									<div class="col-md-offset-1"></b></div><br>
									<div class="col-md-offset-1">Approved By:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC</div>


								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
								</div><br>
								<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
								</form>
								</div>
							</div>
						</div>
					<div>
					<?php
						if(isset($_GET['submit'])&&$_GET['submit']==1)
							{
					?>
					<p class="title">Leave applied successfully.</p>
					<?php
						}
						else if(isset($_GET['submit'])&&$_GET['submit']==0)
						{
					?>
					<p class="title">Error! Leave not submitted successfully.</p>
					<?php
						}
					?>
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