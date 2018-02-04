<?php

	include("./includes/preProcess.php");
	
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

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

	<link href="./css/myCss.css" rel="stylesheet">

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

				$currentTab = "meetingAttendance";

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
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="ti-panel"></i>
								<p style="display : none;">Stats</p>
							</a>
						</li>
						<?php include('./includes/notifications.php'); ?>
						<li>
							<a href="./logout.php">
								<i class="ti-settings"></i>
								<p>LogOut</p>
							</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>


		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h4 class="title">Meeting Attendance</h4>
							</div>
							<div class="content">
								<form method="GET" action="markAttendance.php">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Meeting Number</label>
												<select name="meeting_no" class="form-control border-input">
													<?php
														$query = "SELECT * from meeting";
														$meetings = mysqli_query($connection, $query);
														// print($meetings);
														while($thisMeeting = mysqli_fetch_array($meetings) )
														{
													?>
														<option value="<?php echo $thisMeeting['meeting_no'] ?>"><?php echo $thisMeeting['meeting_no'] ?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Members</label>
												<?php
													$query = "SELECT * from members";
													$members = mysqli_query($connection, $query);
													while($thisMember = mysqli_fetch_array($members))
													{
														$thisId = $thisMember['member_id'];
														$query1 = "SELECT * FROM studentmaster WHERE reg_no='$thisId'";
														
														$thisName = mysqli_query($connection, $query1);
														if(mysqli_num_rows($thisName) != 1)
														{
															$query1 = "SELECT * FROM faculty WHERE faculty_id='$thisId'";
															$thisName = mysqli_query($connection, $query1);
														}
														$thisName = mysqli_fetch_array($thisName);
														
														$thisMemberName = $thisName['name'];
												?>
													<label class="checkbox">
													<input type="checkbox" name="member_id[]" value="<?php echo $thisMember['member_id'] ?>" data-toggle="checkbox"><?php echo $thisMemberName ?>
													</label>
													<!-- <br /> -->
	
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-info btn-fill btn-wd">Mark Attendance</button>
									</div>
									<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				if(isset($_GET['sent'])&&$_GET['sent']==1)
				{

			?>
			<div class="container">
				<p class="title"> Notification sent successfully</p>
			</div>
			<?php
				}
			?>
		</div>

		<footer class="footer">
			<!-- <div class="container-fluid">
				<nav class="pull-left">
					<ul>

						<li>
							<a href="http://www.creative-tim.com">
								Creative Tim
							</a>
						</li>
						<li>
							<a href="http://blog.creative-tim.com">
							   Blog
							</a>
						</li>
						<li>
							<a href="http://www.creative-tim.com/license">
								Licenses
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright pull-right">
					&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
				</div>
			</div> -->
		</footer>


	</div>
</div>


</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
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

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">

		function removeNot() {

			$('.notificationAlert').css({
				'display': 'none'
			});

			xmldata = new XMLHttpRequest();

			var el = document.getElementById('notid').innerHTML;

			var urltosend = "set_cookie.php?notid="+el;
			console.log(el);
			xmldata.open("GET", urltosend,false);
			xmldata.send(null);
			if(xmldata.responseText != ""){
				toPrint = xmldata.responseText;
			}

			console.log(toPrint);


			// body...
		}
	</script>


</html>
