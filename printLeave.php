<?php

    include("./includes/preProcess.php");
    date_default_timezone_set("Asia/Kolkata");
    
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

  		<a href="application.php" class="btn btn-default no-print">Home</a><br><br>
  		<a href="dashboard.php" class="btn btn-default no-print" onClick="window.print()">Print</a>

  		<div class="col-md-offset-10"> Form: DP-06</div>
								<div class="col-md-offset-10"> (Clause 5.0)</div>
								<center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
								<center><u><h3>Leave Application</h3></u></center>
								<div class="col-md-offset-1" style="font-size:25px">
									<u>Head of the Department</u></b><br><br>
									Kindly allow me to avail Leave/Leave on Duty from <b><?php echo $_GET['from'];?></b> to <b><?php echo $_GET['from'];?></b>for <b><?php echo $_GET['days'];?></b> day(s)<!--  and station leave from date ____ time ____ to ____ -->.<br><br>Date :<b> <?php echo date('d-m-Y'); ?></b> Time: <b><?php echo date('H:i:s'); ?></b>.<br> My address during leave will be as below<br>
									Address : <b><?php echo $_GET['address'];?></b><br>

									Yours Sincerely<br><br>
									<b>
									Name: </b><?php echo $user['name'];?><br>
									<b>Registration No.: </b><?php echo $_SESSION['reg_no'];?><br>
									<b>Dated:</b> <?php echo $_GET['applied_on'] ?><br>
									
								</div>
								<br><br><br>
								<div style="font-size:25px">
									<center><u>For Official Use</u></center><br>
									<div class="col-md-offset-1">
									Recommende/Not Recommended:<br><br>
									</div>
									<div class="col-md-offset-1"><b>Supervisor(s)</div><br>
									<div class="col-md-offset-1">Convener DDPC</b></div><br>
									<div class="col-md-offset-1">Approved By:            Head of the Deapartment</div>


								</div>
  	</body>
  	</html>
