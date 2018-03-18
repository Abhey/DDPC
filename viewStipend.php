<?php
/**
 * Created by PhpStorm.
 * User:JAshMe
 * Date: 2/4/2018
 * Time: 12:12 AM
 */

                include("./includes/preProcess.php");
		$prevPageLink = "application.php";

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

                        $currentTab = "applyLeave";

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
                                        <ul class="nav navbar-nav navbar-right">

                                                <?php include("./includes/topright.php") ?>

                                        </ul>

                                </div>
                        </div>
                </nav>
                <div class="content">
                        <div class="container-fluid">
                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="card">
                                                        <div class="header">
                                                                <h4 class="title">Previously Applied Stipends</h4>
                                                        </div>
                                                        <div class="content table-responsive table-full-width">
                                                                <table class="table table-striped">
                                                                        <thead>
                                                                        <th>Registration Number</th>
                                                                        <th>Month</th>
                                                                        <th>Year</th>
                                                                        <th>Sem</th>
                                                                        <th>Stipend Amount</th>
                                                                        <th>Status</th>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $reg_no = $_SESSION['reg_no'];
                                                                        $query = "SELECT * FROM `stipend` WHERE reg_no = '$reg_no'";
                                                                        $allApps = mysqli_query($connection, $query);


                                                                        while( $thisApp = mysqli_fetch_array($allApps) )
                                                                        {
                                                                                ?>
                                                                                <tr>
                                                                                        <td>
                                                                                                <?php echo $thisApp['reg_no']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php
                                                                                                echo $thisApp['month'];
                                                                                                ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['year'] ;?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['sem'] ;?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php
                                                                                                        if($thisApp['status']=="pending")
                                                                                                                echo "Not Filled Yet";
                                                                                                        else
                                                                                                                echo $thisApp['stipend_amount'] ;?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['status'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <form method="POST" action="printStipend.php">
                                                                                                        <input type="text" hidden name="stipendID" value="<?php echo $thisApp['stipend_id'] ?>"/>
                                                                                                        <input type="submit" value="Print"/>
                                                                                                </form>
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

        </div>


        <footer class="footer">
        </footer>
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
