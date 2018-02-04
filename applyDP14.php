	<?php

	include("./includes/preProcess.php");
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
	$sem_no = $current_sem_no;
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

		/*
			Get the courses he has registered for
			KEYS :
				reg_no and sem_no
		*/
		$queryCourses = "SELECT * from courseregistration WHERE reg_no='$thisUniqueId' AND sem_no='$sem_no'";
		$resultCourses = mysqli_query($connection, $queryCourses);
	}
	function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}
	$query = "SELECT * from studentprogramdetails WHERE reg_no = '$reg_no'";
	$result = mysqli_query($connection, $query);
	$studentprg = mysqli_fetch_assoc($result);


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

			function instaSearch(faculty_id, num)
			{
				var url='./fetch_faculty.php?faculty_id=' + faculty_id;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var Faculty = xml.documentElement.getElementsByTagName("faculty");
				var name = Faculty[0].getAttribute("name");
				var facultyDeptName = Faculty[0].getAttribute("dept_name");
				var faculty_id = Faculty[0].getAttribute("faculty_id");
				var facultyDesignation = Faculty[0].getAttribute("designation");
				var id = "f" + num + 3;
				document.getElementById(id).innerHTML = facultyDesignation;
				id = "f" + num + 4;
				document.getElementById(id).innerHTML = facultyDeptName;
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
							<b>
								<div class="col-md-offset-10"> Form: DP-14</div>
								<div class="col-md-offset-10"> (Clause 12.1(5))</div>
								<center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
								<center><u><h5>Change of Supervisor(s)</h5></u></center><br>
								<div class="col-md-offset-1" style="font-size:15px">
									<form class="form-inline" id="dp14" name="dp14" action="submitDP14.php" method="post" onsubmit="return checkform(this.form);">
									</b>
									Name of the Student : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $_SESSION['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b><br>Existing Supervisor(s): <b> <?php echo getFacultyName($supervisor['supervisor1_id'])."  ".getFacultyName($supervisor['supervisor2_id']) ?> </b><br>
									Present Status of Work :<b> <?php echo $studentprg['status']?> </b><br>
									Suggested Supervisor(s): <br />


									<div class="row col-md-offset-1">
										<div class="col-md-11" style="font-size:10px;">
											<table class="table table-bordered table-condensed">
												<thead>
													<th>SI. No.</th>
													<th>Name of the Faculty</th>
													<th>Designation</th>
													<th>Department</th>
												</thead>

												<tbody>
													<?php
														for($i = 1; $i <= 2; $i++)
														{
													?>
		<tr>
		<td><?php echo $i ?></td>

		<td>
<select class="form-control border-input" name="faculty<?php echo $i ?>" 
															onchange="instaSearch(this.value, <?php echo $i ?>);">
<option value="">
																	Select
</option>
<?php
$query = "SELECT * FROM faculty";
$faculties = mysqli_query($connection, $query);

while( $thisFaculty = mysqli_fetch_array($faculties)  )
{
?>
<option value="<?php echo $thisFaculty['faculty_id'] ?>">
<?php echo $thisFaculty['name'] ?>
</option>
															<?php
															}
															?>
															</select>	
														</td>

														<td id="<?php echo "f".$i; ?>3"></td>
														
														<td id="<?php echo "f".$i; ?>4"></td>
													</tr>
													<?php
														}
													?>
												</tbody>
											</table>
										</div>
									</div>

									
									Reason for change: 
									<input type="text" name="reason" class="form-control border-input" style="width:80%;">
									<br />
								</div>
								
								
							


							<div style="font-size:15px">
								<div class="col-md-offset-1"><b>Date: </b><?php echo date("d/m/Y"); ?></div>
								<div class="col-md-offset-8">(Signature of the Student)</div><br>
								<div class="col-md-offset-1">Comment and No objection of Existing Supervisor(s): </div><br>
								<div class="col-md-offset-1">(Signature of the Supervisor(s))</div><br>
								<div class="col-md-offset-1">Consent of the suggested Supervisor(s)</div><br>
								<div class="col-md-offset-8">(Signature)</div><br>
								<div class="col-md-offset-1">Remark of Convener, DDPC</div><br>
								<div class="col-md-offset-8">(Signature)</div><br>
								<div class="col-md-offset-1">(Head of Department)</div>
								<div class="col-md-offset-8">Chairman (SDPC)</div><br>
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
