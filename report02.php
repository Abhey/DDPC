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

					$currentTab = "report";

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
                                <h4 class="title">Details of Registered Students</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-bordered">
                                    <thead>
                                    	<th>S.No</th>
                                        <th>Reg. No.</th>
                                    	<th>Name of Student</th>
                                    	<th>Category</th>
                                    	<th>Year of Registration</th>
                                    	<th>Supervisor Name</th>
                                    	<th>Remarks</th>
                                    	<th>Date</th>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$query = "SELECT distinct(reg_no), name, supervisor1_id, program_category,year_of_joining FROM studentmaster natural join studentregistration natural join currentsupervisor";
                                            $allStudents = mysqli_query($connection, $query);
                                            $counter = 0;
                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                            	$counter++;
                                            	$reg_no = $thisStudent['reg_no'];
	                                            $query = "SELECT year(date_of_reg) AS year_of_joining FROM studentregistration WHERE reg_no = '$reg_no' ORDER BY date_of_reg ASC LIMIT 0,1";
	                                            $result = mysqli_query($connection, $query);
	                                            $StudentSemDetails = mysqli_fetch_array($result);
	                                            $query = "SELECT * FROM studentprogramdetails where reg_no = '$reg_no'";
	                                            $result = mysqli_query($connection, $query);
	                                            $StudentProgramDetails = mysqli_fetch_array($result);                                      
                                    	?>
                                    		<tr>
                                    			<td>
                                                	<?php echo $counter."."; ?>
                                                </td>
                                                <td>
                                                	<?php echo $thisStudent['reg_no']; ?>
                                                </td>
                                                <td>
                                                	<?php echo $thisStudent['name']; ?>
                                                </td>
                                                <td>
                                                	<?php echo $thisStudent['program_category']; ?>
                                                </td>
                                                <td>
                                                	<?php echo $StudentSemDetails['year_of_joining']; ?>
                                                </td>
                                                <td>
                                                	<?php echo getFacultyName($thisStudent['supervisor1_id']) ?>
                                                </td>
                                                <td>
                                                	<?php echo $StudentProgramDetails['status']; ?>
                                                </td>
                                                <td>
                                                	<?php echo $StudentProgramDetails['date_of_update']; ?>
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
