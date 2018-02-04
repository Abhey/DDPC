<?php

    include("./includes/preProcess.php");
    $prevPageLink = "dashboard.php";
    
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

                $currentTab = "progRequirement";

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
                                <h4 class="title">Minimum Residence, Maximum Duration and Academic Requirements</h4>
                                <p class="category">The followinf table lists the minimum residence and maximum duration allowed in the Ph.D. Programme and credit requirements for graduation in the Ph.D. programmes.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Department </th>
                                    	<th>Qualifying Degree</th>
                                    	<th>Min Total Credits to be earned</th>
                                        <th>Min Credits through Course Work/Reasearch SEminar/Mini-Projects </th>
                                        <th>Credits through Comprehensive Examination</th>
                                        <th>Credits through State of Art Seminar</th>
                                        <th>Min Credits through Research</th>
                                        <th>Min Duration</th>
                                        <th>Min Residence Period</th>
                                        <th>Max Duration Full Time (Part Time)</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM studentmincredit";
                                            $allSemesters = mysqli_query($connection, $query);

                                            while( $thisSemester = mysqli_fetch_array($allSemesters) )
                                            {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $thisSemester['department']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['qualifying_degree']; ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo $thisSemester['min_credit_to_earn']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['min_credit_through']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['credit_through_compre_exam']; ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo $thisSemester['credit_through_soa']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['credit_through_research']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['min_duration']; ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo $thisSemester['min_residence_full_time']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisSemester['max_duration_full_time']." (".$thisSemester['max_duration_part_time'].")"; ?>
                                                    </td>
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
            <!-- <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div> -->
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


            // body...
        }
    </script>


</html>
