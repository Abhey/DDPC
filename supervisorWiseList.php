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
				if(course_id == ""){
					var id1 = num + "1";
					var id2 = num + "2";
					var id3 = num + "3";
					document.getElementById(id1).value = document.getElementById(id1).defaultValue;
					document.getElementById(id2).innerHTML = "";
					document.getElementById(id3).innerHTML = "";
					var s_id = "student_selected_coordinator" + num;
					document.getElementById(s_id).value = document.getElementById(s_id).defaultValue;
					document.getElementById(s_id).style.visibility = "hidden";
				}
				var url='./fetch_course.php?course_id=' + course_id;
				load_my_URL(url,function(data){
					var xml=parse_my_XMLdata(data);
					var mCourses = xml.documentElement.getElementsByTagName("course");
					if (mCourses[0].hasAttribute("total_credits"))
					{
						var course_name = mCourses[0].getAttribute("course_name");
						var course_coordinator = mCourses[0].getAttribute("course_coordinator");
						var total_credits = mCourses[0].getAttribute("total_credits");
						var id1 = num + "1";
						var id2 = num + "2";
						var id3 = num + "3";
						document.getElementById(id1).setAttribute("min", total_credits);
						document.getElementById(id1).setAttribute("max", total_credits);
						document.getElementById(id1).value = total_credits;
						document.getElementById(id2).innerHTML = mCourses[0].getAttribute("dept_name");
						document.getElementById(id3).innerHTML = course_coordinator;
						var s_id = "student_selected_coordinator" + num;
						document.getElementById(s_id).style.visibility = "hidden";

					} else {
						var course_name = mCourses[0].getAttribute('course_name');
						var course_coordinator = mCourses[0].getAttribute('course_coordinator');
						var min_credits = mCourses[0].getAttribute("min_credits");
						var max_credits = mCourses[0].getAttribute("max_credits");
						var id1 = num + "1";
						var id2 = num + "2";
						var id3 = num + "3";
						document.getElementById(id1).setAttribute("min", min_credits);
						document.getElementById(id1).setAttribute("max", max_credits);
						document.getElementById(id1).value = min_credits;
						document.getElementById(id2).innerHTML = mCourses[0].getAttribute("dept_name");
						course_name = (course_name.toLowerCase());
						if (course_name == "state of the art" || course_name == "soa") {
							document.getElementById(id3).innerHTML = "Entire SRC Panel";
							var s_id = "student_selected_coordinator" + num;
							document.getElementById(s_id).style.visibility = "hidden";
						} else if (course_name == "comprehensive") {
							document.getElementById(id3).innerHTML = "Comprehensive Panel";
							var s_id = "student_selected_coordinator" + num;
							document.getElementById(s_id).style.visibility = "hidden";
						} else if (course_name == "thesis performance") {
							document.getElementById(id3).innerHTML = "<?php echo $supervisor_name; ?>";
							var s_id = "student_selected_coordinator" + num;
							document.getElementById(s_id).style.visibility = "hidden";
						} else if (course_name == "mini project" || course_name == "research seminar") {

							var input_faculty_name = document.getElementById(id3);
							input_faculty_name.innerHTML = "<?php echo $supervisor_name; ?>";
							var s_id = "student_selected_coordinator" + num;
							document.getElementById(s_id).style.visibility = "visible";
						} 
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

					$currentTab = "studentsundersupervision";

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
							<div class="content table-responsive table-full-width">
								<table class="table table-bordered">
									<thead>
										<th>S.No</th>
										<th>Supervisor</th>
										<th>Registration Number</th>
										<th>Students under Supervision</th>
									</thead>
									<tbody>
										<?php
											$query = "SELECT * FROM faculty WHERE dept_id = '4'";
											$allSupervisors = mysqli_query($connection, $query);
											$counter = 0;
											while( $thisSupervisor = mysqli_fetch_array($allSupervisors) )
											{
												$supervisor_id = $thisSupervisor['faculty_id'];
												$query = "SELECT * FROM studentmaster NATURAL JOIN currentsupervisor WHERE supervisor1_id = '$supervisor_id' OR supervisor2_id ='$supervisor_id'";
												$allStudents = mysqli_query($connection, $query);
												$count = mysqli_num_rows($allStudents);
												if($count == 0){
													continue;
												}
												$counter = $counter + 1;
										?>
											<tr>
												<td rowspan="<?php echo $count + 1 ?>">
													<?php echo $counter."."; ?>
												</td>
												<td rowspan="<?php echo $count + 1 ?>">
													<?php echo $thisSupervisor['name']; ?>
												</td>
											 </tr>
										<?php
											

											while( $thisStudent = mysqli_fetch_array($allStudents) )
											{

												
										?>
													<tr>
													<td>
														<a href="viewStudent.php?qwStudent=<?php echo $thisStudent['reg_no'] ?>">
														<?php echo $thisStudent['reg_no'] ?>
														</a>
													</td>
													
													<td>
														<?php echo $thisStudent['name'] ?>
														<?php
															if(!empty($thisStudent['supervisor2_id'])){
																echo "<b>(Under Joint-supervision)</b>";
															} 
														?>
													</td>
													</tr>
												
										<?php
											}
										?>
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
