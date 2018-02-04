<?php

    include("./includes/preProcess.php");

    $prevPageLink = "reports.php";
    
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">View Registered Students</h4>
                            </div>
                            <div class="content">
                                <form method="GET" action="viewStudents.php">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>From Year:</label>
                                                <select id="from_year" name="from_year" onchange="changeYear(this.value);" required></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>To Year:</label>
                                                <select id="to_year" name="to_year" required />
                                                <option value="">Select From Year</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd">View Students</button>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>      
                                    
                    <!-- <div class="col-lg-12 col-md-12">
                    	<div class="card">
                            <div class="header">
                                <h4 class="title">Supervisor Wise List of Students</h4>
                            </div>
                        	<div class="content">
                        		<a href="supervisorWiseList.php"><button class="btn btn-info btn-fill btn-wd">View Students</button></a>                            
                            </div>
                        </div> 
                    </div> -->
                    <div class="clearfix"></div>
                                
                            



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

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script type="text/javascript">
    options = "<option value=''>Select</option>";
    for (var i = 2005; i <= new Date().getFullYear(); i++) {
    	options += "<option value ='"+ i +"'>"+i+"</option>";
    }
    document.getElementById("from_year").innerHTML = options;
    function changeYear(from_year){
    	options = "<option value=''>Select</option>";
    	for (var i = from_year; i <= new Date().getFullYear(); i++) {
    		options += "<option value ='"+ i +"'>"+i+"</option>";
    	}
   		document.getElementById("to_year").innerHTML = options;

    }
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


            // body...
        }
    </script>

</html>
