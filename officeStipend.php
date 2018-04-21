<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/25/2018
 * Time: 7:56 PM
 */

/**
This file is used for filling details regarding leaves and stipend amount. This is filled by DDPC office
 */

include("./includes/preProcess.php");
allow_access("ddpcoffice");
require_once ("./includes/utilities.php");
$prevPageLink = "studentStipendDDPC.php";
$ddpc_id = $_SESSION['reg_no'];
$s_query = "Select * from currentsupervisor WHERE supervisor1_id = '$ddpc_id'";
$s_result = mysqli_query($connection, $s_query);
if(mysqli_num_rows($s_result) >= 1){
        $_SESSION['supervisor'] = 1;
        $isSup = true;
}
else{
        $_SESSION['supervisor'] = 0;
        $isSup = false;
}

$stipendID= htmlentities(stripslashes(trim($_REQUEST['stipend_id'])));


// Getting the data
$stipendQuery = "select * from stipend where stipend_id = '$stipendID'";
$stipendResult = mysqli_query($connection,$stipendQuery);
$stipendResult = mysqli_fetch_assoc($stipendResult);

$studQuery = "select * from stipendstuddetails where stipend_id = '$stipendID'";
$studResult = mysqli_query($connection,$studQuery);
$studResult = mysqli_fetch_assoc($studResult);

$supQuery = "select * from stipendsupdetails where stipend_id = '$stipendID'";
$supResult = mysqli_query($connection,$supQuery);
$supResult = mysqli_fetch_assoc($supResult);


// Finding Department
$thisUniqueID = $stipendResult['reg_no'];
$dept = getDepartment($thisUniqueID);




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

                        $currentTab = "fillDetails";

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
                                                        <div class="col-md-offset-10"> </div>
                                                        <div class="col-md-offset-10"> </div>
                                                        <br>
                                                        <br>
                                                        <center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
                                                        <center><u><h3>Stipend Application</h3></u></center>
                                                        <br><center><h4><b><u>Head of the Department</u></b></h4></center><br><br>
                                                        <form class="form form-horizontal" id="stipend" action="submitOfficeStipend.php" method="post">
                                                                <div class="row">
                                                                        <div class="form-group col-md-6"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-4" for="name"><b>Name of Student: </b></label>
                                                                                <p class="form-control-static col-md-8"><?= getStudentName($thisUniqueID);?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                                <label class="control-label col-md-4">Registration No.: </label>
                                                                                <p class="form-control-static col-md-8"><?= $thisUniqueID;?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                                <label class="control-label col-md-4">Program: </label>
                                                                                <p class="form-control-static col-md-8">PhD</p>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                                <label class="control-label col-md-4">Department:</label>
                                                                                <p class="form-control-static col-md-8"><?= $dept ?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                                <label class="control-label col-md-4" for="month">Month: </label>
                                                                                <p class="form-control-static col-md-8"><?= $stipendResult['month'] ?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                                <label class="control-label col-md-4" for="sem">Sem: </label>
                                                                                <p class="form-control-static col-md-8"><?= $stipendResult['sem']?></p>
                                                                        </div>
                                                                </div>

                                                                <!---------------------------To Be Filled by Student--------------------------------->
                                                                <h4 align="center"><u> (A) To be Filled by Student</u></h4>
                                                                <h5 align="center"><b>Work Assigned By the Department</b></h5>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-6" for="fac_mem">Faculty Member with whom associated:</label>
                                                                                <p class="form-control-static col-md-6"><?=getFacultyName($studResult['faculty_id'])?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-offset-1 col-md-11" align="left">
                                                                                <p class="col-md-offset-1 col-md-6 form-control-static"><strong>Teaching and Research work:</strong></p>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="form-group col-md-4">
                                                                                        <label class="control-label col-md-6" for="lec">Lecture:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['lecture'] ?></p>

                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                        <label class="control-label col-md-6" for="tut">Tutorial:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['tut'] ?></p>
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                        <label class="control-label col-md-6" for="prac">Practical:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['prac'] ?></p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="form-group col-md-4">
                                                                                        <label class="control-label col-md-6" for="lib_work">Library Work:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['lib_work'] ?></p>
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                        <label class="control-label col-md-6" for="research">Research Work:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['research_work'] ?></p>
                                                                                </div>
                                                                                <div class="form-group col-md-5">
                                                                                        <label class="control-label col-md-6" for="comp">Computational Work:</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['comp_work'] ?></p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                <div class="form-group col-md-offset-3">
                                                                                        <label class="control-label col-md-4" for="comp">Other (specify):</label>
                                                                                        <p class="col-md-6 form-control-static"><?= $studResult['other'] ?></p>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group col-md-offset-1 col-md-11">
                                                                                <label class="control-label col-md-4" for="tot_hrs">Total No. of hours per week:</label>
                                                                                <p class="col-md-6 form-control-static"><?= $studResult['hours_per_week'] ?></p>
                                                                        </div>
                                                                        <div class="form-group col-md-offset-1 col-md-11">
                                                                                <label class="control-label col-md-4" for="details">Details of work carried out:</label>
                                                                                <p class="col-md-6 form-control-static"><?= $studResult['details'] ?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-5">
                                                                                <label class="control-label col-md-6">Date Applied:</label>
                                                                                <p class="form-control-static col-md-6"><?= $stipendResult
                                                                                        ['date_sent'];?></p>
                                                                        </div>
                                                                </div>

                                                                <!-----------------------To be filled by Faculty-------------------------------->
                                                                <h4 align="center"><u>(B) To Be Completed By The Faculty With Whom Associated For Department Work</u></h4>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-8">Has his/her work been satisfactory (as assigned in section ‘A’)?</label>
                                                                                &nbsp;&nbsp;
                                                                                <p class="form-control-static col-md-1"><?= $supResult['work_satisfactory']?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-8">Is the student associated with sponsored project?</label>
                                                                                &nbsp;&nbsp;
                                                                                <p class="form-control-static col-md-1"><?= $supResult['assoc_project']?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-8" for="remark">Specify remarks of the teacher with whom the student is associated for the departmental work:</label>
                                                                                <p class="form-control-static col-md-4"><?= $supResult['special_remarks']?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-5">
                                                                                <label class="control-label col-md-6">Date Filled:</label>
                                                                                <p class="form-control-static col-md-6"><?= $supResult['date']?></p>
                                                                        </div>
                                                                </div>

                                                                <!-----------------------To be filled by Thesis Supervisor------------------------>

                                                                <h4 align="center"><u>(C) To Be Completed By The Thesis Supervisor</u></h4>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-6">Name of the Thesis Supervisor:</label>
                                                                                <p class="col-md-6 form-control-static"><?= getFacultyName($studResult['faculty_id']) ?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                                <label class="control-label col-md-6" for="remark_sup">Remarks of the Thesis Supervisor regarding progress of thesis work during the said period:</label>
                                                                                <p class="form-control-static col-md-6"><?= $supResult['remark_sup']?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group col-md-5">
                                                                                <label class="control-label col-md-6">Date Filled:</label>
                                                                                <p class="form-control-static col-md-6"><?= $supResult['date_sup'];?></p>
                                                                        </div>
                                                                </div>
                                                <!----------------------------------To Be Filled by DDPC Office ----------------------------->
                                                                <h4 align="center"><u>(D) To be Completed by the Departmental Office</u></h4>
                                                                <?php
                                                                //Getting the Required Values from database

                                                                //Leaves
                                                                $cl=0;
                                                                $ml=0;
                                                                $casLeaveQuery = "SELECT month(from_date) \"Month\",sum(`no_of_days`) \"Total Days\" from `leave` where `reg_no`='$thisUniqueID' and `sem_no` = ".$stipendResult['sem']." and `academic_year`=". $stipendResult['year']." and `leave_type` = 3 and `status`='approved' having Month = '".$stipendResult['month']."'";

                                                                $casLeaveResult = mysqli_query($connection,$casLeaveQuery);
                                                                if(mysqli_num_rows($casLeaveResult)>0)
                                                                {
                                                                        $casLeaveResult = mysqli_fetch_assoc($casLeaveResult);
                                                                        $cl = $casLeaveResult['Total Days'];
                                                                }


                                                                $medLeaveQuery = "SELECT month(from_date) \"Month\",sum(`no_of_days`) \"Total Days\" from `leave` where `reg_no`='$thisUniqueID' and `sem_no` = ".$stipendResult['sem']." and `academic_year`=". $stipendResult['year']." and `leave_type` = 1 and `status`='approved' having Month = '".$stipendResult['month']."'";

                                                                $medLeaveResult = mysqli_query($connection,$medLeaveQuery);
                                                                if(mysqli_num_rows($medLeaveResult)>0)
                                                                {
                                                                        $medLeaveResult = mysqli_fetch_assoc($medLeaveResult);
                                                                        $ml = $medLeaveResult['Total Days'];
                                                                }

                                                                ?>

                                                                <div class="row">
                                                                        <div class="form-group"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5">Number of Casual leaves sanctioned during the month:</label>
                                                                                <p class="form-control-static col-md-3"><?= $cl." days"?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5">Number of Medical leaves sanctioned during the month:</label>
                                                                                <p class="form-control-static col-md-3"><?= $ml." days"?></p>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5" for="vac_type">Summer/Winter vacation availed:</label>
                                                                                                &nbsp;&nbsp;
                                                                               <select class="form-control" style="width:120px;margin-top: -25px;border: solid black 1px" id="vac_type" name="vac_type">
                                                                                       <option value="N">None</option>
                                                                                       <option value="S">Summer</option>
                                                                                       <option value="W">Winter</option>
                                                                               </select>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group "  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5" for="vac">Vacation Leaves Taken:</label>
                                                                                <div class="col-md-3">
                                                                                <input style="border: solid black 1px;" type="text" class="form-control" id="vac" name="vac_leaves" required>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5" for="unauth">No. of days unauthorized absence from duty during the month:</label>
                                                                                <div class="col-md-3">
                                                                                        <input style="border: solid black 1px;" type="text" class="form-control" id="unauth" name="unauth_leaves" required>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="form-group"  style="margin-left: 2%">
                                                                                <label class="control-label col-md-5" for="stipend_amt">Amount of scholarship recommended: &nbsp;Rs.</label>
                                                                                <div class="col-md-3">
                                                                                        <input style="border: solid black 1px;" type="text" class="form-control" id="stipend_amt" name="stipend_amt" required>
                                                                                </div>
                                                                        </div>
                                                                </div>

                                                                <input type="hidden" name="date" value="<?= date("Y-m-d")?>">
                                                                <div class="row">
                                                                        <div class="form-group col-md-5">
                                                                                <label class="control-label col-md-6">Date:</label>
                                                                                <p class="form-control-static col-md-6"><?= date("Y-m-d")?></p>
                                                                        </div>
                                                                </div>

                                                                <input type="hidden" name="stipend_id" value="<?= $stipendID ?>">
                                                                <div class="text-center">
                                                                        <button type="submit" class="btn btn-info btn-fill btn-wd" id="Update" >Submit</button>
                                                                </div>
                                                        </form>
                                                        <br>
                                                        <br>
                                                </div>

                                                <br>
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

<!--  Checkbox, Radio & Switch Plugins -->
<!--<script src="assets/js/bootstrap-checkbox-radio.js"></script>-->

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
