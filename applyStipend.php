<?php

include("./includes/preProcess.php");
$prevPageLink = "application.php";
if ( !strcmp($_SESSION['role'], "student") )
{
    $thisUniqueId = $_SESSION['reg_no'];
    $thisQuery = "SELECT supervisor1_id FROM currentsupervisor WHERE reg_no='$thisUniqueId'";
    $thisResult = mysqli_query($connection, $thisQuery);
    $thisResult = mysqli_fetch_array($thisResult);
    $nextNotifTo = $thisResult['supervisor1_id'];
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
                            <div class="col-md-offset-10"> Form: DP-06</div>
                            <div class="col-md-offset-10"> (Clause 5.0)</div>
                            <center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
                            <center><u><h3>Stipend Application</h3></u></center>
                            <br><br><center><h4><b><u>Head of the Department</u></b></h4></center><br><br>
                            <form class="form form-horizontal" id="stipend" action="submitStipend.php" method="post">
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-4" for="name"><b>Name of Student: </b></label>
                                    <p class="form-control-static col-md-8"><?php echo $user['name'];?></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-4">Registration No.: </label>
                                    <p class="form-control-static col-md-8"><?php echo $_SESSION['reg_no'];?></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-4">Program: </label>
                                    <p class="form-control-static col-md-8">PhD</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label col-md-4">Department:</label>
                                    <p class="form-control-static col-md-8"></p>
                                </div>
<!--                                <div class="row">-->
                                <div class="form-group col-md-6" style="margin-left: -40%">
                                    <label class="control-label col-md-2" for="month">Month: </label>
                                    <div class="col-md-4">
                                        <select  class="form-control" style="border: solid black 1px"  id="month">
                                            <?php  for($i=1;$i<13;$i++)
                                                echo "<option> $i</option>" ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6"  style="margin-left: -5%">
                                    <label class="control-label col-md-2" for="sem">Sem: </label>
                                    <div class="col-md-4">
                                        <select  class="form-control" style="border: solid black 1px"  id="sem">
                                            <?php  for($i=1;$i<17;$i++)
                                                echo "<option> $i</option>" ?>
                                        </select>
                                    </div>
                                </div>
                                </div>

<!--                                </div>-->
                                <input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
                                <h4 align="center"><u> To be Filled by Student</u></h4>
                                <h5 align="center"><b>Work Assigned By the Department</b></h5>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-4" for="fac_mem">Faculty Member with whom associated:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="fac_mem" class="form-control" style=" border: solid black 1px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-3">Teaching and Research work:</label>
                                        <p class="col-md-6 form-control-static"></p>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-md-6" for="lec">Lecture:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="lec" class="form-control" style=" border: solid black 1px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-md-6" for="tut">Tutorial:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="tut" class="form-control" style=" border: solid black 1px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-md-6" for="prac">Practical:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="prac" class="form-control" style=" border: solid black 1px;">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-6" for="lib_work">Library Work:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="lib_work" class="form-control" style=" border: solid black 1px;">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-6" for="research">Research Work:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="research" class="form-control" style=" border: solid black 1px;">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label col-md-6" for="comp">Computational Work:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="comp" class="form-control" style=" border: solid black 1px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-offset-3">
                                            <label class="control-label col-md-4" for="comp">Other (specify):</label>
                                            <div class="col-md-3">
                                                <input type="text" id="comp" class="form-control" style=" border: solid black 1px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-3" for="tot_hrs">Total No. of hours per week:</label>
                                        <div class="col-md-3">
                                            <input type="number" id="tot_hrs" class="form-control" style=" border: solid black 1px;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-3" for="details">Details of work carried out:</label>
                                        <div class="col-md-6">
                                            <textarea id="details" class="form-control" style=" border: solid black 1px;"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo date("Y-m-d");?>">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label class="control-label col-md-6">Date:</label>
                                        <p class="form-control-static col-md-6"><?php echo date("Y-m-d");?></p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Apply</button>
                                </div>
                            </form>

                            <br>
                        </div>
                    </div>
                </div>
                <div>
                    <?php
                    if(isset($_GET['submit'])&&$_GET['submit']==1)
                    {
                        ?>
                        <p class="title">Leave applied successfully.</p>
                        <?php
                    }
                    else if(isset($_GET['submit'])&&$_GET['submit']==0)
                    {
                        ?>
                        <p class="title">Error! Leave not submitted successfully.</p>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>



    <footer class="footer">
    </footer>
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
