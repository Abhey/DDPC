<?php

	include("./includes/preProcess.php");
	$supervisor_id = $_SESSION['reg_no'];
	$s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$supervisor_id'";
	$s_result = mysqli_query($connection, $s_query);
	$s_array = array();
	while($s_row = mysqli_fetch_array($s_result))
	{
		array_push($s_array, $s_row['reg_no']);
	}
	$s_query = "Select role from members WHERE member_id = '$supervisor_id'";
	$s_result = mysqli_query($connection, $s_query);
	$role_array = array();
	while($s_row = mysqli_fetch_array($s_result))
	{
		array_push($role_array, $s_row['role']);
	}

	$s_query = "SELECT reg_no FROM supervisorchange WHERE supervisor_id='$supervisor_id'";
	$s_result = mysqli_query($connection, $s_query);
	$newSupervisorFor = array();
	while($s_row = mysqli_fetch_array($s_result))
	{
		echo $s_row['reg_no'];
		array_push($newSupervisorFor, $s_row['reg_no']);
	}

	function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}
	$prevPageLink = "approve.php";


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
	<!-- <script type="text/javascript">
		alert("hi");
	</script> -->
	

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

				$currentTab = "student";

				include("./includes/sideNav.php");

			?>

		</div>
	</div>

	<!-- Top navbar panel -->
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
								<h4 class="title">Change registration status</h4>
								<p class="category">List of application of all the students</p>
							</div>
							<div class="content table-responsive table-full-width">
								<table class="table table-striped">
									<thead>
										<th>Registration Number</th>
										<th>Current Supervisor</th>
										<th>New Supervisor</th>
										<th>Reason</th>
										<th>--</th>
									</thead>
									
									<tbody>
										<?php
											// Get all the applications that are to be approved by this Faculty
											$tempVar = $supervisor_id;
											$tempQuery = "SELECT * FROM supervisorchange WHERE status='pending'";
											$tempResult = mysqli_query($connection, $tempQuery);
											$applications = $tempResult;

											while( $thisApplication = mysqli_fetch_array($applications) )
											{
												$currProgress = $thisApplication['progress'];
												
												if(
													!in_array($thisApplication['progress'], $role_array) 
													&&
													!(in_array($thisApplication['reg_no'], $s_array)
													 	&&
													 	!strcmp($currProgress, "supervisor")
													 	)
													&&
													!(!strcmp($currProgress, "newSupervisor")
														&&
														in_array($thisApplication['reg_no'], $newSupervisorFor)
														&&
														!strcmp($supervisor_id, $thisApplication['supervisor_id'])
													)
												)
												{
													continue;
												}
										?>

											<tr>
												<td>
													<?php echo $thisApplication['reg_no']; ?>
												</td>

												<td>
													<?php
														$tempVar = $thisApplication['reg_no'];
														$tempQuery = "SELECT * FROM currentsupervisor WHERE reg_no='$tempVar'";
														$tempResult = mysqli_query($connection, $tempQuery);
														$tempResult = mysqli_fetch_array($tempResult);

														echo $tempResult['supervisor1_id'];
													?>
												</td>
												
												<td>
													<?php echo $thisApplication['supervisor_id']; ?>
												</td>

												<td>
													<?php
														echo $thisApplication['reason'];
													?>
												</td>

												<!-- Approve / Forward or not -->
												<td>
												<?php
													// set the variables to be sent with the form
													$setAction = "";
													$setStatus = "";
													$setProgress = "";
													$nextNotifTo = "";

													if(!strcmp("supervisor", $currProgress))
													{
														$setAction = "Forward";
														$setStatus = "pending";
														$setProgress = "newSupervisor";
													}
													if(!strcmp("newSupervisor", $currProgress))
													{
														$setAction = "Forward";
														$setStatus = "pending";
														$setProgress = "ConvenerDDPC";
													}

													if(!strcmp("ConvenerDDPC", $currProgress))
													{
														$setAction = "Forward";
														$setStatus = "pending";
														$setProgress = "HOD";
													}
													if(!strcmp("HOD", $currProgress))
													{
														$setAction = "Forward";
														$setStatus = "pending";
														$setProgress = "ChairmanSDPC";
													}
													if(!strcmp("ChairmanSDPC", $currProgress))
													{
														$setAction = "Approve";
														$setStatus = "approved";
													}


													if( strlen($setProgress) > 0 )
													{
														if(!strcmp($setProgress, "newSupervisor"))
														{
															$nextNotifTo = $thisApplication['supervisor_id'];
														}
														else
														{
															$tempQuery = "SELECT * FROM members WHERE role='$setProgress'";
															$tempResult = mysqli_query($connection, $tempQuery);
															$tempResult = mysqli_fetch_array($tempResult);
															$nextNotifTo = $tempResult['member_id'];
														}
													}
												?>
													<form method="post">
	<input type="submit" name="submit" value="<?php echo $setAction; ?>" 
              reg_no = "<?php echo $thisApplication['reg_no'] ?>"
	      status="<?php echo $setStatus; ?>" progress="<?php echo $setProgress; ?>" nextNotifTo="<?php echo $nextNotifTo; ?>"
	      facultyId="<?php echo $thisApplication['supervisor_id']; ?>"
														/>
													</form>
												</td>
												
												<!-- <td>--</td> -->
											</tr>


										<?php
											}
										?>
									</tbody>
								</table>

							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

		<footer class="footer">
		   
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
		}

		 $("input[name='submit']").click(function(event){

			event.preventDefault();
			var formData = {  // Javascript object
				action: $(this).attr('value'),
				reg_no: $(this).attr('reg_no'),
				status: $(this).attr('status'),
				progress: $(this).attr('progress'),
				nextNotifTo: $(this).attr('nextNotifTo'),
				facultyId: $(this).attr('facultyId')
			};
			
			$.ajax({
				url:'./approveDP14.php',
				type:'post',
				data: formData,
				success: function(data){
					// alert(data);
					location.reload();
				},
				error: function(){
					alert('failure');
				}
			});
		});
	</script>
</html>
