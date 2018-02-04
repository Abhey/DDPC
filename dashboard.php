<?php

    include("./includes/preProcess.php");  
    $prevPageLink = "dashboard.php";
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

    </head>
<body>


<div class="wrapper">

    <!-- Sidebar -->
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

                $currentTab = "dashboard";

                // Include this file for side navbar tabs.
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
                    <ul class="nav navbar-nav navbar-right">

                        <?php include("./includes/topright.php") ?>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo $user['photo_path']; ?>" alt="..."/>
                                  <h4 class="title"><?php echo $name; ?><br />
                                  </h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Profile</h4>
                            </div>
                            <div class="content">
                                <?php 
                                    if(!strcmp($_SESSION['role'], "student"))
                                    {
                                ?>
                                <form method="GET" action="updateProfile.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" disabled placeholder="Company" value="<?php echo $user['reg_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" placeholder="name" value="<?php echo $user['name'] ?>" name="name" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input convertInputtoBox" placeholder="mail_id" value="<?php echo $user['mail_id'] ?>" name="mail_id" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" placeholder="contact_no" value="<?php echo $user['contact_no'] ?>" name="contact_no" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" placeholder="Home Address" value="<?php echo $user['address'] ?>" name="address" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <!-- <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button> -->
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <form method="GET" action="updateProfile.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Faculty ID</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" disabled placeholder="Company" value="<?php echo $user['faculty_id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control border-input convertInputtoBox"  placeholder="name" value="<?php echo $user['name'] ?>" name="name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" disabled placeholder="Company" value="<?php echo $user['designation']; ?>">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input convertInputtoBox"  placeholder="mail_id" value="<?php echo $user['mail_id'] ?>" name="mail_id" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" class="form-control border-input convertInputtoBox" placeholder="contact_no" value="<?php echo $user['contact'] ?>" name="contact_no" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-center">
                                        <!-- <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button> -->
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    if(!strcmp($_SESSION['role'], "student"))
                    {
                ?>  
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Academic Profile</h4>
                                </div>
                                <div class="content">
                                <?php 
                                $reg_no = $user['reg_no'];
                                $query = "SELECT * FROM currentsupervisor WHERE reg_no ='$reg_no'";
                                $results = mysqli_query($connection, $query);
                                $arr = mysqli_fetch_array($results);
                                ?>
                                <div>
                                Current Supervisor(s): <b><?php echo getFacultyName($arr['supervisor1_id']); ?></b>
                                <?php
                                if(!empty($arr['supervisor2_id'])){
                                        echo getFacultyName($arr['supervisor2_id']); 
                                    }
                                $query = "SELECT max(sem_no) AS sem_no FROM studentregistration WHERE reg_no ='$reg_no'";
                                $results = mysqli_query($connection, $query);
                                $arr = mysqli_fetch_array($results);
                                ?>
                                </div>
                                <div>
                                Current Semester: <b><?php echo $arr['sem_no'] ?></b>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">SRC</h4>
                                </div>
                                <div class="content">
                                <?php 
                                $reg_no = $user['reg_no'];
                                $query = "SELECT * FROM src WHERE reg_no ='$reg_no' AND status='approved'";
                                $results = mysqli_query($connection, $query);
                                $arr = mysqli_fetch_array($results);
                                ?>
                                Internal SRC Member - <b><?php echo getFacultyName($arr['src_int_id']); ?><br></b>
                                External SRC Member - <b><?php echo getFacultyName($arr['src_ext_id']); ?><br></b>
                                Supervisor 1 - <b><?php echo getFacultyName($arr['supervisor1_id']); ?><br></b>
                                Supervisor 2 - <b><?php echo getFacultyName($arr['supervisor2_id']); ?><br></b>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
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
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome <b><?php echo $name ?></b>"

            },{
                type: 'success',
                timer: 4000
            });

    	});

        // This function is called when the notification dropdown is clicked.
        function removeNot() {

            $('.notificationAlert').css({
                'display': 'none'
            });

            xmldata = new XMLHttpRequest();

            var el = document.getElementById('notid').innerHTML;

            var urltosend = "set_cookie.php?notid="+el;
            // console.log(el);
            xmldata.open("GET", urltosend, false);
            xmldata.send(null);
            if(xmldata.responseText != ""){
                toPrint = xmldata.responseText;
            }

            // console.log(toPrint);
        }
	</script>

</html>
