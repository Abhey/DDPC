	<?php

		include("./includes/preProcess.php");
	    $prevPageLink = "dashboard.php";
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
                                <h4 class="title">Students List</h4>
                                <p class="category">List of students under supervision</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>S.No</th>
                                        <th>Registration Number</th>
                                    	<th>Name</th>
                                    	<th>Date of Joining</th>
                                    	<th>SRC</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM studentmaster NATURAL JOIN currentsupervisor WHERE supervisor1_id = '$supervisor_id' OR supervisor2_id ='$supervisor_id'";
                                            $allStudents = mysqli_query($connection, $query);
                                            $counter = 0;

                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {

                                                $counter = $counter + 1;
                                        ?>
                                                <tr>
                                                	<td>
                                                		<?php echo $counter."."; ?>
                                                	</td>
                                                    <td>
                                                        <a href="viewStudent.php?qwStudent=<?php echo $thisStudent['reg_no'] ?>">
                                                        <?php echo $thisStudent['reg_no'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['name'] ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                    	$reg_no = $thisStudent['reg_no'];
                                                    	$query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no ASC";
														$results = mysqli_query($connection, $query);
														$arr = mysqli_fetch_array($results);
														$date_of_reg = $arr['date_of_reg'];
														if($date_of_reg === null) {
															$date_of_reg = "--";
														}
														echo $date_of_reg;
													?>

                                                    </td>
                                                    <td>
                                                    <?php
                                                    $query = "SELECT * FROM src WHERE reg_no ='$reg_no'";
                                                    $results = mysqli_query($connection, $query);
                                                    $arr = mysqli_fetch_array($results);
                                                    ?>
                                                    Internal SRC Member - <?php echo getFacultyName($arr['src_int_id']); ?><br>
                                                    External SRC Member - <?php echo getFacultyName($arr['src_ext_id']); ?><br>
                                                    Supervisor 1 - <?php echo getFacultyName($arr['supervisor1_id']); ?><br>
                                                    Supervisor 2 - <?php echo getFacultyName($arr['supervisor2_id']); ?><br>
                                                    </td>
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
