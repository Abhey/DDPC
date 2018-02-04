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

				$currentTab = "makeNotification";

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
								<h4 class="title">Make Notification</h4>
							</div>
							<div class="content">
								<form method="GET" action="addNotification.php">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Notification Id</label>
												<?php
													$query = "SELECT * FROM notifications";
													$allnotifications = mysqli_query($connection, $query);
													$notificationsCount = mysqli_num_rows($allnotifications);
													$newNotificationId = $notificationsCount + 1;
												?>
												<input type="text" class="form-control border-input"  placeholder="Company" value="<?php echo $newNotificationId; ?>" name="id">
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group">
												<label>Description</label>
												<input type="text" class="form-control border-input" placeholder="notification details" name="description">
											</div>
										</div>
										
									</div>

									<!-- <div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Issue Date</label>
												<input type="text" class="form-control border-input" id="from_datepicker" name="issue_date"/>
											   
											</div>
										</div>
									</div> -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">

												<label>Groups</label>
												<?php
													$roleValues = array("admin", "student", "HOD", "ConvenerDDPC", "ChairmanSDPC", "Supervisor");
													$roleTexts = array("Admin", "Student", "HOD", "DDPC Convener", "SDPC Chairman", "Supervisor");
													for($i = 0; $i < count($roleValues); $i++)
													{
												?>
													<label class="checkbox">
													<input type="checkbox" name="target_group[]" value="<?php echo $roleValues[$i] ?>" data-toggle="checkbox"><?php echo $roleTexts[$i] ?>
													</label>
													<!-- <br /> -->
	
												<?php
													}
												?>									
											</div>
										</div>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-info btn-fill btn-wd">Send Notification</button>
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

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">

		 $("#from_datepicker").datepicker({
				  minDate: 0,
				  dateFormat: 'yy-mm-dd',
				  onSelect: function(date) {
					$("#to_datepicker").datepicker('option', 'minDate', date);
				  }
				});

		function removeNot() {

			$('.notificationAlert').css({
				'display': 'none'
			});

			xmldata = new XMLHttpRequest();

			var el = document.getElementById('notid').innerHTML;

			var urltosend = "setCookie.php?notid="+el;
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
