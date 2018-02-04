<?php

    include("./includes/preProcess.php");
    date_default_timezone_set("Asia/Kolkata");
    $reg_no = $_SESSION['reg_no'];
    $query = "SELECT supervisor1_id, supervisor2_id FROM currentsupervisor WHERE reg_no ='$reg_no'";
    $s_results = mysqli_query($connection, $query);
    $arr = mysqli_fetch_array($s_results);

    $id1 = $arr['supervisor1_id'];
    $id2 = $arr['supervisor2_id'];
    $q1 = "SELECT name from faculty where faculty_id = '$id1'"; 
    $r1 = mysqli_query($connection, $q1);
    $row1 = mysqli_fetch_array($r1);
    $sname1 = $row1['name'];
    $sname2 ="";
    if(!empty($id2)) {
      $q1 = "SELECT name from faculty where faculty_id = '$id2'"; 
      $r1 = mysqli_query($connection, $q1);
      $row1 = mysqli_fetch_array($r1);
      $sname2 = $row1['name'];
    }

    $query = "SELECT * FROM partfullstatus WHERE reg_no = '$reg_no'";
    $results = mysqli_query($connection, $query);
    $form = mysqli_fetch_array($results);
    
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
  		<a href="dashboard.php" class="btn btn-default no-print" onClick="window.print()">Print</a>&nbsp;&nbsp; Status : <?php echo $form['status'];?>

  		<div class="col-md-offset-10"> Form: DP-05</div>
                <div class="col-md-offset-10"> (Clause 4.5)</div>
                <center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>

                <center><u><h3>Change of Registration Status</h3></u></center>
                <div class="col-md-offset-1" style="font-size:20px">
                <form class="form-inline" id="dp05" action="submitDP05.php" method="post">
                  </b>
                  Name of the Student : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $_SESSION['reg_no'];?> </b><br>
                  Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>
                  Supervisor(s): <b> <?php echo $sname1." ".$sname2; ?></b><br>
                  Present Registration Status: <b>Full-Time</b><br>
                  Registration Status to be converted to: <b>Part-Time</b><br>
                  Justification/Reason: <b><?php echo $form['reason'] ?></b>
                  
                </div>
                <br><br><br>
                <div style="font-size:20px">
                <div class="row">
                <div class="col-md-offset-1">Date:<b> <?php echo date('d-m-Y'); ?></b>&nbsp;&nbsp;&nbsp;&nbsp; Time: <b><?php echo date('H:i:s'); ?></b>
                <div class="col-md-offset-4">(Signature of the Student)</div><br><br><br>
                </div>
                  <div class="col-md-offset-1">Comment of the Supervisor(s) : <b><?php echo $form['supervisor_comment'];?></b></div><br><br>
                  <div class="col-md-offset-8">(Signature of the Supervisor(s))</div><br><br>
                  <div class="col-md-offset-1">
                  Recommended By:<br><br>
                  </div>
                  <div class="col-md-offset-1"><b>Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head of Department</b></div>
                  <div class="col-md-offset-1"></b></div><br><br>
                  <div class="col-md-offset-1">Approved By:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC</div>


                </div>
  	</body>
  	</html>
