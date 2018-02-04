	<?php

            include("./includes/preProcess.php");
	    $prevPageLink = "application.php";
	    $supervisor_id = $_SESSION['reg_no'];
	    $s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$supervisor_id' OR supervisor2_id = '$supervisor_id'";
	    $s_result = mysqli_query($connection, $s_query);
	    $s_array = array();
	    while($s_row = mysqli_fetch_array($s_result))
	    {
	        array_push($s_array, $s_row['reg_no']);
	    }
	    $form_no = $_GET['form'];
		
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
                    <?php include("./includes/topright.php") ?>

                </div>
            </div>
        </nav>
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8">
							<div class="card">
                            <div class="header">
                                <h4 class="title">Apply the form for <?php
                                if(!strcmp($form_no, "02")){
                                    echo "Student Reasearch Committee";
                                }
                                else if(!strcmp($form_no, "08")){
                                    echo "List of Suggested Examiners for Ph.D Comprehensive Examination";
                                }
                                else if(!strcmp($form_no, "15")){
                                    echo "List of Suggested Examiners for Ph.D Oral Board";
                                }
                                else if(!strcmp($form_no, "16	")){
                                    echo "List of Suggested Examiners for Ph.D Thesis Evaluation Board";
                                }
                                ?></h4>
                                <p class="category">List of students under supervision</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>S.No</th>
                                        <th>Registration Number</th>
                                    	<th>Name</th>
                                    	<th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM studentmaster";
                                            $allStudents = mysqli_query($connection, $query);
                                            $counter = 0;
                                            if(!strcmp($form_no, "02")){
                                            	$query = "Select * from src where reg_no = '";
                                            }
                                            else if(!strcmp($form_no, "08")){
                                            	$query = "Select * from examinarpanel where type = 'Ph.D Comprehensive Examination' AND reg_no = '";
                                            }
                                            else if(!strcmp($form_no, "15")){
                                            	$query = "Select * from examinarpanel where type = 'Ph.D Thesis Evaluation Board' AND reg_no = '";
                                            }
                                            else if(!strcmp($form_no, "16")){
                                            	$query = "Select * from examinarpanel where type = 'Ph.D Oral Board' AND reg_no = '";
                                            }


                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                                if (!in_array($thisStudent['reg_no'], $s_array))
                                                {
                                                    continue;
                                                }
                                                $counter = $counter + 1;
                                                $final_query = $query.$thisStudent['reg_no']."' group by reg_no";
                                                //$thisQuery = mysqli_query($connection, $final_query);
                                                $result  = $connection->query($final_query);
                                                if(!$result) {
                                                	$status = "Not Submitted";
                                                }
                                                else{
                                                	$status = "Submitted";
                                                }
                                        ?>
                                                <tr>
                                                	<td>
                                                		<?php echo $counter."."; ?>
                                                	</td>
                                                    <td>
                                                        <a href="./applyDP<?php echo $form_no ?>.php?student_reg_no=<?php echo $thisStudent['reg_no'] ?>">
                                                        <?php echo $thisStudent['reg_no'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['name'] ?>
                                                    </td>
                                                    <td>
                                                    	<?php echo $status ?>
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
