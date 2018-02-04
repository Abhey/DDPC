	<?php

		include("./includes/preProcess.php");
		$prevPageLink = "reports.php";
		$supervisor_id = $_SESSION['reg_no'];
		function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
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

	<script type="text/javascript">
			function nowsearch(faculty_id, num)
			{
				// alert("hello");
				// if(course_id == ""){
				// 	var id1 = num + "1";
				// 	var id2 = num + "2";
				// 	var id3 = num + "3";
				// 	document.getElementById(id1).value = document.getElementById(id1).defaultValue;
				// 	document.getElementById(id2).innerHTML = "";
				// 	document.getElementById(id3).innerHTML = "";
				// 	var s_id = "student_selected_coordinator" + num;
				// 	document.getElementById(s_id).value = document.getElementById(s_id).defaultValue;
				// 	document.getElementById(s_id).style.visibility = "hidden";
				// }
				var url='./fetchAllStudents.php?supervisor_id=' + faculty_id;
				// alert(url);
				load_my_URL(url,function(data){
					var xml=parse_my_XMLdata(data);
					var allStudents = xml.documentElement.getElementsByTagName("student");
					
					var limit = allStudents.length;


					for(var i = 0; i < limit; i++)
					{
						document.getElementById(i + "2").innerHTML = allStudents[i].getAttribute("studentName");
						var generalUrl = "<a href=\"viewStudent.php?qwStudent=" + allStudents[i].getAttribute("studentRegNo") + "\">" + allStudents[i].getAttribute("studentRegNo") + "</a>";
						document.getElementById(i + "1").innerHTML = generalUrl;
					}

					for(var i = limit; i < 100; i++)
					{
						document.getElementById(i + "1").innerHTML = "";
						document.getElementById(i + "2").innerHTML = "";
					}



					// var course_name = mCourses[0].getAttribute("course_name");
					// var course_coordinator = mCourses[0].getAttribute("course_coordinator");
					// var total_credits = mCourses[0].getAttribute("total_credits");
					// var id1 = num + "1";
					// var id2 = num + "2";
					// var id3 = num + "3";
					// document.getElementById(id1).setAttribute("min", total_credits);
					// document.getElementById(id1).setAttribute("max", total_credits);
					// document.getElementById(id1).value = total_credits;
					// document.getElementById(id2).innerHTML = mCourses[0].getAttribute("dept_name");
					// document.getElementById(id3).innerHTML = course_coordinator;
					// var s_id = "student_selected_coordinator" + num;
					// document.getElementById(s_id).style.visibility = "hidden";
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

					$currentTab = "supervisorStudentList";

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
							<div class="col-md-12">
							<div class="card">
							<div class="header">
								<h4 class="title">Supervisor Wise List of Students</h4>
								<p class="category">List of students under supervision</p>
							</div>
							<select class="form-control border-input" name="facultyIn" onchange="nowsearch(this.value);">
								<option value="">Select</option>
								<?php
								$query = "SELECT * FROM faculty";
								$allFaculty = mysqli_query($connection, $query);
								while( $thisFaculty = mysqli_fetch_array($allFaculty)  )
								{ ?>
									<option value="<?php echo $thisFaculty['faculty_id'] ?>">

									<?php echo $thisFaculty['faculty_id']." - ".$thisFaculty['name'];
										   ?>
									   
									</option>
								<?php
								} ?>
								
							</select>
							<div class="content table-responsive table-full-width">
								<table class="table table-bordered">
									<thead>
										<th>Registration Number</th>
										<th>Name</th>
									</thead>
									<tbody>
										<?php
											for($i = 0; $i < 100; $i++)
											{ 
										?>
											<tr id="<?php echo "row".$i ?>">
												<td id="<?php echo $i."1" ?>"></td>
												<td id="<?php echo $i."2" ?>"></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>

							</div>
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
