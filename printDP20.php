<?php

    include("./includes/preProcess.php");
    date_default_timezone_set("Asia/Kolkata");
    $reg_no = $_SESSION['reg_no'];
    $query = "SELECT * FROM studentmaster NATURAL JOIN studentthesisdetails NATURAL JOIN department WHERE reg_no ='$reg_no'";
	$results = mysqli_query($connection, $query);
	$student = mysqli_fetch_array($results);
    
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

  	</head>
  	<body>

  		<a href="application.php" class="btn btn-default no-print">Home</a>&nbsp;
  		<a href="dashboard.php" class="btn btn-default no-print" onClick="window.print()">Print</a>&nbsp;&nbsp; 
  		<br><br>

  		<div class="col-md-offset-10"> Form: DP-20</div>
								<center><h3><b>UNDERTAKING</b></h3></center>
								<div class="col-md-offset-1 col-md-10" style="font-size:25px">
								I declare that the work presented in this thesis entitled <b>"<?php echo $student['proposed_topic'] ?>"</b> submitted to the Department of <b><?php echo $student['dept_name'] ?></b>, Motilal Nehru National Institute of Technology, Allahabad,(India) for the award of <b>Doctor of Philosophy</b> Degree in <b><?php echo $student['AOR'] ?></b>, is my original work. I neither have plagiarized any part of the thesis nor submitted the same work for the award of any other Degree anywhere. In case this undertaking is found incorrect, The Degree shall be withdrawn uncondionally.
									
								<br><br><br><br><br>
<div style="font-size:20px">
				<div class="col-md-offset-9">(Signature of the Student)</div><br>
				<div class="col-md-offset-1">Date: <?php echo date('Y-m-d'); ?></div><br>
				<div class="col-md-offset-1">Place: MNNIT Allahabad</div><br>



			</div>
  	</body>
  	</html>
