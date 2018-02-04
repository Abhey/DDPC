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
		<script type="text/javascript">
			function nowsearch(meeting_no, num)
			{
				var url='./fetch_attendance.php?meeting_no=' + meeting_no;
				load_my_URL(url,function(data)
				{
					var xml=parse_my_XMLdata(data);
					var members = xml.documentElement.getElementsByTagName("attendance");
					for(var i = 0; i < members.length; i++)
					{
						document.getElementById("list" + (i + 1)).innerHTML = members[i].getAttribute("member_name");
						document.getElementById("list" + (i + 1)).style.display = 'block';
					}
				});
			}
			function load_my_URL(url, do_func)
			{
			    var my_req = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
			    my_req.onreadystatechange = function()
				{
			        if (my_req.readyState == 4)
					{
						my_req.onreadystatechange = no_func;
						do_func(my_req.responseText, my_req.status);
			        }
			    };
			    my_req.open('GET', url, true);
			    my_req.send(null);
			}
			function parse_my_XMLdata(data)
			{
			    if (window.ActiveXObject)
				{
			        var doc = new ActiveXObject('Microsoft.XMLDOM');
			        doc.loadXML(data);
			        return doc;
			    }
				else if (window.DOMParser)
				{
			        return (new DOMParser).parseFromString(data, 'text/xml');
			    }
			}
			function no_func() {}
			
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

					$currentTab = "showAttendance";

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
					<form method="GET" action="markAttendance.php">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Meeting Number</label>
									<select name="meeting_no" class="form-control border-input" onchange="nowsearch(this.value, 1);">
									<option selected disabled>Select</option>
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
									<ul>
										<?php
											for($i=1; $i<100; $i++)
											{
												echo "<li id=\"list$i\" class=\"hiddenList\"></li>";
											}
										?>
									</ul>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</form>
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