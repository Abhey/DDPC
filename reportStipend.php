<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 4/21/2018
 * Time: 3:00 AM
 */

include("./includes/preProcess.php");
allow_access("ChairmanSDPC");
require_once ("./includes/utilities.php");
$prevPageLink = "reports.php";
$supervisor_id = $_SESSION['reg_no'];

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
        <style>
                select{
                        border: 1px solid black;
                }
        </style>

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
                                                                <h4 class="title">Stipend Details of Students</h4>
                                                                <p class="category">Details of Students</p>
                                                        </div>
                                                        <form class="form">
                                                                <div class="form-group col-md-offset-3 col-md-2" >
                                                                        <select id="month" class="form-control border-input">
                                                                                <?php for($i=1;$i<=12;$i++) { ?>
                                                                                        <option value="<?=$i?>" <?php if(date('m')==$i) echo "selected"?> ><?=$i?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group col-md-offset-2 col-md-2">
                                                                        <select id="year" class="form-control border-input">
                                                                                <?php for($i=date('Y');$i>2012;$i--) { ?>
                                                                                        <option value="<?=$i?>"><?=$i?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                </div>
                                                        </form>
                                                        <div class="content table-responsive table-full-width">
                                                                <table class="table table-bordered">
                                                                        <thead>
                                                                        <tr>
                                                                                <th>S.No</th>
                                                                                <th>Reg. No.</th>
                                                                                <th>Name of Student</th>
                                                                                <th>Supervisor</th>
                                                                                <th>Sem</th>
                                                                                <th>Stipend Amount</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

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

<!--Ajax Request to Fetch the data-->
<script>
        $(".border-input").change(function(){

                var month = $("form").find("#month").val();
                var year = $("form").find("#year").val();

                //sending request
                $.post("getStipendReport.php",
                        {
                                month : month,
                                year : year
                        }, function(data,status){
                                console.log(status);
                                if(status=="ok")
                                        console.log(data);
                                        $("tbody").html(data);
                        });
        });
</script>


<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>


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
