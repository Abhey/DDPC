<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/25/2018
 * Time: 7:41 PM
 */

include("./includes/preProcess.php");
allow_access("ConvenerDDPC");
$nextNotifTo = "";
$hod_id = $_SESSION['reg_no'];
$prevPageLink = "fillDetails.php";

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

        <style>
                #stu_rows:hover{
                        background-color: #c8c8c8;
                        cursor: pointer;
                }
        </style>

        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/themify-icons.css" rel="stylesheet">

        <link href="./css/myCss.css" rel="stylesheet">
        <!-- <script type="text/javascript">
            alert("hi");
        </script> -->





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

                        $currentTab = "student";

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
                                                                <h4 class="title col-md-6">Stipend Applications</h4>
                                                                <div class="col-md-6">
                                                                        <div class="col-md-offset-1 col-md-4">
                                                                                <button class="btn btn-success col-md-12" id="approve_all">Approve All</button>
                                                                        </div>
                                                                        <div class="col-md-offset-2 col-md-4">
                                                                                <button class="btn btn-danger col-md-12" id="decline_all">Decline All</button>
                                                                        </div>

                                                                </div>
                                                                <p class="category">List of stipend application of all the students</p>
                                                        </div>
                                                        <div class="content table-responsive table-full-width">
                                                                <table class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                        <th>Registration Number</th>
                                                                        <th>Month</th>
                                                                        <th>Year</th>
                                                                        <th>Sem</th>
                                                                        <th>Stipend Amount</th>
                                                                        <th>Status</th>
                                                                        <th style="text-align: center">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $query = "SELECT * FROM `stipend` where progress='DDPC' ";
                                                                        $allApps = mysqli_query($connection, $query);
                                                                        // echo "here".mysqli_num_rows($allStudents);

                                                                        while( $thisApp = mysqli_fetch_array($allApps) )
                                                                        {
                                                                                //echo $thisStudent['progress'];
                                                                                if( !strcmp($thisApp['status'], "approved") || $thisApp['status'] == "declined")
                                                                                        continue;
                                                                                else {
                                                                                        ?>
                                                                                        <tr id="stu_rows">
                                                                                        <td>
                                                                                                <a href="./viewStudent.php?qwStudent=<?php echo $thisApp['reg_no'] ?>">
                                                                                                        <?php echo $thisApp['reg_no'] ?>
                                                                                                </a>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php
                                                                                                echo $thisApp['month'];
                                                                                                ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['year']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['sem']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['stipend_amount']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                                <?php echo $thisApp['status'] ?>
                                                                                        </td>
                                                                                         <td>
<!-- Will Send an AJAX Request for it, done in table_verdict.js-->
<form action="">
<input type="button" class="col-md-offset-1 col-md-4 btn btn-success btn-fill btn-wd" name="submit-yes" value="Approve">
<input type="button" class=" col-md-offset-1 col-md-4 btn btn-danger btn-fill btn-wd" name="submit-no" value="Decline">
<input type="hidden" name="stipend_id" value="<?php echo $thisApp['stipend_id'] ?>"/>
</form>
                                                                                        </td>
                                                                                        <?php
                                                                                }?>
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

                </footer>


        </div>
</div>


</body>


<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<script>
        var ajax_request_url = "submitDDPCStipend.php";
        var details_url = "ddpcStipend.php";

</script>
<!-- Script for Approve and Decline -->
<script src="./js/table_verdict.js">

</script>


<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>


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
        }
</script>
</html>