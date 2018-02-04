	<?php

	include("./includes/preProcess.php");
	$prevPageLink = "application.php";
	$query = "SELECT * from awarddistribution";
	$result = mysqli_query($connection, $query);
	$course_distribution = array();
	while ($thisSem = mysqli_fetch_assoc($result))
	{
		$course_distribution[$thisSem['sem_no']] = explode('/', $thisSem['credits_through']);
	}
	$query = "SELECT * from currentsupervisor NATURAL JOIN faculty WHERE reg_no = '$reg_no'";
	$result = mysqli_query($connection, $query);
	$supervisor = mysqli_fetch_assoc($result);
	$supervisor_name = $supervisor['name'];
	$sem_no = $current_sem_no + 1;
	if($date_of_reg === null) {
		$date_of_reg = date('Y-m-d');
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
		<script type="text/javascript">
			function nowsearch(course_id, num)
			{
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

			function instaSearch(student_id, num)
			{
				var url='./fetch_student.php?reg_no=' + student_id;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var Student = xml.documentElement.getElementsByTagName("student");
				var studentName = Student[0].getAttribute("name");
				var studentRegno = Student[0].getAttribute("reg_no");
				var studentDateofReg = Student[0].getAttribute("date_of_reg");
				var studentSupervisor2 = Student[0].getAttribute("supervisor2_id");

				var id = num + "1";
				document.getElementById(id).value = studentRegno;
				id = num + "2";
				document.getElementById(id).innerHTML = studentDateofReg;
				id = num + "3";
				document.getElementById(id).innerHTML = Student[0].getAttribute("dept_name");
				id = num + "4";
				document.getElementById(id).innerHTML = studentSupervisor2;
				id = num + "5";
				document.getElementById(id).innerHTML = studentSupervisor2;				
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
								<div class="col-md-offset-10"> Form: DP-13</div>
								<div class="col-md-offset-10"> (Clause 12.1(3))</div>
								<center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
								<center><u><h5>Supervisor Selection<br />(To be filled by the supervisor)</h5></u></center><br>
								<div class="col-md-offset-1" style="font-size:15px">
									<form class="form-inline" id="dp13" name="dp13" action="submitDP13.php" method="post" onsubmit="return checkform(this.form);">


									</b>

									<?php
										// Get the details of the supervisor for the form

										$tempVar = $user['faculty_id'];
										$tempQuery = "SELECT * FROM faculty WHERE faculty_id='$tempVar'";
										$tempResult = mysqli_query($connection, $tempQuery);
										$tempResult = mysqli_fetch_array($tempResult);
									?>


									Name of the Faculty : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Designation : <b><?php echo $tempResult['designation'] ?> </b><br>
									Department : <b> Computer Science and Engineering </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Co-Supervisor (if any): <b><?php echo " -- " ?></b><br>
									<center><u><h5>Details of the Ph.D Students being supervised at present</h5></u></center><br>
								</div>

								<?php
									// Prepare the ids of all the students supervised by the faculty
									// These ids will be used to get the data of these students
									// That data will be displayed in the following table

									$tempVar = $user['faculty_id'];
									$tempQuery = "SELECT * FROM currentsupervisor WHERE supervisor1_id='$tempVar' OR supervisor2_id='$tempVar'";
									$tempResult = mysqli_query($connection, $tempQuery);

									$supervisedStudents = $tempResult;
								?>
								
								<div class="row col-md-offset-1">
									<div class="col-md-11" style="font-size:10px;">
										<table class="table table-bordered table-condensed">
											<thead>
												<th>SI. No.</th>
												<th>Name of the Student</th>
												<th>Reg. No.</th>
												<th>Date of Registration</th>
												<th>Department in which registered</th>
												<th>Co-Supervisor (if any)</th>
												<th>Status of Research Work</th>
											</thead>
											<tbody>
												<?php
												$i = 1;
												while( $thisSupervisedStudent = mysqli_fetch_array($supervisedStudents) ) 
												{
													$thisSupervisedStudentRegno = $thisSupervisedStudent['reg_no'];

													// get the details of the student using the reg_no
													$tempQuery = "SELECT * FROM studentmaster WHERE reg_no='$thisSupervisedStudentRegno'";
													$tempResult = mysqli_query($connection, $tempQuery);
													$tempResult = mysqli_fetch_array($tempResult);
													$thisStudent = $tempResult;
												?>
												<tr>
													<td><?php echo $i; $i++; ?></td>

													<td>
														<?php echo $thisStudent['name']; ?>	
													</td>

													<td>
														<?php echo $thisStudent['reg_no']; ?>
													</td>

													<td>
														<?php 
															// Get the student date of registration 
															$tempQuery = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$thisSupervisedStudentRegno' ORDER BY sem_no ASC";
															$tempResult = mysqli_query($connection, $tempQuery);
															$tempResult = mysqli_fetch_array($tempResult);

															echo $tempResult['date_of_reg'];
														?>
													</td>

													<td>
														<?php
															// Get the department name for the student
															$tempVar = $thisStudent['dept_id'];
															$tempQuery = "SELECT dept_name FROM department WHERE dept_id='$tempVar'";
															$tempResult = mysqli_query($connection, $tempQuery);
															$tempResult = mysqli_fetch_array($tempResult);

															echo $tempResult['dept_name'];
														?>
													</td>

													<td>
														<?php
															// need to get the name of the co-supervisor
															// in case this Faculty is the first supervisor.. print the name of the second supervisor
															// in case this Faculty is the second supervisor.. print the name of the first supervisor

															$tempVar = $thisStudent['reg_no'];
															$tempQuery = "SELECT * FROM currentsupervisor WHERE reg_no='$tempVar'";
															$tempResult = mysqli_query($connection, $tempQuery);
															$tempResult = mysqli_fetch_array($tempResult);

															$tempVar = "";

															if( !strcmp($tempResult['supervisor1_id'], $user['faculty_id']) )
															{
																$tempVar = $tempResult['supervisor2_id'];
															}
															else
															{
																$tempVar = $tempResult['supervisor1_id'];
															}

															if(strlen($tempVar))
															{
																$tempQuery = "SELECT * FROM faculty WHERE faculty_id='$tempVar'";
																$tempResult = mysqli_query($connection, $tempQuery);
																$tempResult = mysqli_fetch_array($tempResult);
																echo $tempResult['name'];
															}
														?>
													</td>

													<td>
														<?php
															// Forget the status of the Research Work for now
														?>
													</td>
												</tr>
												<?php
												}
												?>
											<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
										</tbody>
									</table>
								</div>
								<div class="row col-md-11" style="font-size:15px;">
									<table>
										<tbody>
											<tr>
												<td>
													I wish to supervise the the Ph.D Thesis of Mr./Mrs/Ms
												</td>

												<td>
													<select class="form-control border-input" name="studentToSupervise" onchange="instaSearch(this.value);">
														<option value="">Select</option>
														<?php
															// Get the list of students so that the supervisor can select the student
															$tempQuery = "SELECT * FROM supervisorselection WHERE supervisor_id='{$user['faculty_id']}'";
															$tempResult = mysqli_query($connection, $tempQuery);

															echo $tempQuery;

															$students = $tempResult;

															while( $thisStudent = mysqli_fetch_array($students) )
															{
																$tempQuery = "SELECT name from studentmaster WHERE reg_no='{$thisStudent['reg_no']}'";
																$tempResult = mysqli_query($connection, $tempQuery);
																$tempResult = mysqli_fetch_array($tempResult);
														?>
															<option value=<?php echo $thisStudent['reg_no'] ?> >
																<?php echo $thisStudent['reg_no']." - ".$tempResult['name']; ?>
															</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<br /> <br /> <br />
							<div style="font-size:15px">
								<div class="col-md-offset-1"><b>Date: </b><?php echo date("d/m/Y"); ?></div>
								<div class="col-md-offset-8">(Signature of the Faculty)</div><br>
								<div class="col-md-offset-1">Approved By: </div><br>
								<div class="col-md-offset-1 col-md-11">
									<table class="table">
										<tbody>
											<tr>
												<td>Convener DDPC</td>
												<td>Head of Department</td>
												<td>Chairman SDPC</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
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
	function checkform(form) {
		var credits1 = document.getElementById(11).value;
		var credits2 = document.getElementById(21).value;
		var credits3 = document.getElementById(31).value;
		var credits4 = document.getElementById(41).value;
		var credits5 = document.getElementById(51).value;
		var total_credits = Number(credits1) + Number(credits2) + Number(credits3) + Number(credits4) + Number(credits5);
		if (total_credits < 8 || total_credits > 20) {
			// alert(total_credits);
			document.getElementById("msg").innerHTML = "Sum of credits is out of bound. Please fill correctly.";
			return false;
		} else {
			document.dp01.submit();

		}
	}

</script>


</html> 