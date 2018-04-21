<?php
/**
 * Created by PhpStorm.
 * User: JAshMe
 * Date: 3/15/2018
 * Time: 3:19 AM
 */

/**
 * Front end can be made more impressive
 */

    include("./includes/preProcess.php");
    allow_access("student");
    require_once ("./includes/utilities.php");
    date_default_timezone_set("Asia/Kolkata");

   // Getting the data

$stipendID = htmlentities(stripslashes(trim($_REQUEST['stipendID'])));
$stipendQuery = "select * from stipend where stipend_id = '$stipendID'";
$stipendResult = mysqli_query($connection,$stipendQuery);
$stipendResult = mysqli_fetch_assoc($stipendResult);


if($stipendResult['reg_no']!= $reg_no)
        die("<h2>Please don't try this!! You will be reported.</h2>");
$studQuery = "select * from stipendstuddetails where stipend_id = '$stipendID'";
$studResult = mysqli_query($connection,$studQuery);
$studResult = mysqli_fetch_assoc($studResult);
// Finding Department
       $dept = getDepartment($reg_no);


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
        <style>
        </style>

</head>
<body>

<a href="application.php" class="btn btn-default no-print">Home</a><br><br>
<a href="dashboard.php" class="btn btn-default no-print" onClick="window.print()">Print</a>
<div class="content">
        <div class="container-fluid">
                        <div class="col-md-12">
                                        <div class="col-md-offset-10"> </div>
                                        <div class="col-md-offset-10"> </div>
                                        <br>
                                        <br>
                                        <center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
                                        <center><u><h3>Stipend Application</h3></u></center>
                                        <?php if($stipendResult['status']=='pending'){ ?>
                                        <center><div class="text text-info"><h3>Not Approved Yet</h3></div></center>
                                        <?php }
                                                else if($stipendResult['status']=='approved'){
                                                        ?>
                                        <center><div class="text text-success"><h3>Approved </h3></div></center>
                                        <?php }
                                                else if($stipendResult['status']=='declined'){
                                                        ?>
                                        <center><div class="text text-danger"><h3>Rejected</h3></div></center>
                                        <?php
                                        } ?>
                                        <br><center><h4><b><u>Head of the Department</u></b></h4></center><br><br>
                                        <form class="form form-horizontal" id="stipend">
                                                <div class="row">
                                                        <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4" for="name"><b>Name of Student: </b></label>
                                                                <p class="form-control-static col-md-8"><?= $user['name'];?></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4">Registration No.: </label>
                                                                <p class="form-control-static col-md-8"><?= $_SESSION['reg_no'];?></p>
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

                                                <!---------------------------To Be Filled by Student------------------------------------>
                                                <h4 align="center"><u> (A) To be Filled by Student</u></h4>
                                                <h5 align="center"><b>Work Assigned By the Department</b></h5>
                                                <div class="row">
                                                        <div class="form-group col-md-12">
                                                                <label class="control-label col-md-6" for="fac_mem">Faculty Member with whom associated:</label>
                                                                <p class="form-control-static col-md-6"><?=getFacultyName($studResult['faculty_id'])?></p>
                                                        </div>
                                                        <div class="form-group col-md-12" align="left">
                                                                <p class="col-md-6 form-control-static"><strong>Teaching and Research work:</strong></p>
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
                                                                <div class="form-group col-md-4">
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

                                                <!----------------------------------------For Faculty--------------------------------------------->

                                                <h4 align="center"><u>(B) To Be Completed By The Faculty With Whom Associated For Department Work</u></h4>


                                                <?php
                                                //Checking if info filled by teacher
                                                $work_sat = 'Not Filled Yet';
                                                $assoc_project = "Not Filled Yet";
                                                $special_remarks = "Not Filled Yet";
                                                $date = "Not Filled Yet";
                                                $sup_remarks = "Not Filled Yet";
                                                $sup_date = "Not Filled Yet";

                                                $checkQuery = "SELECT * from stipendsupdetails where stipend_id = '$stipendID'";
                                                $checkResult = mysqli_query($connection,$checkQuery);
                                                if(!$checkResult)
                                                        echo "Unsuccessful Try Again".mysqli_error($connection);
                                                if(mysqli_num_rows($checkResult)>0)
                                                {
                                                        $checkResult = mysqli_fetch_assoc($checkResult);
                                                        $work_sat = $checkResult['work_satisfactory'];
                                                        $assoc_project = $checkResult['assoc_project'];
                                                        $special_remarks = $checkResult['special_remarks'];
                                                        $date = $checkResult['date'];
                                                        $sup_remarks = $checkResult['remark_sup'];
                                                        $sup_date = $checkResult['date_sup'];
                                                        if($sup_date=="0000-00-00")
                                                        {
                                                                $sup_remarks = "Not Filled Yet";
                                                                $sup_date = "Not Filled Yet";
                                                        }
                                                }
                                                ?>
                                                <br>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-7" for="name">Has his/her work been satisfactory (as assigned in section ‘A’)?:</label>
                                                                <p class="form-control-static col-md-3"><?= $work_sat?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-6" for="name">Is the student associated with sponsored project?:</label>
                                                                <p class="form-control-static col-md-3"><?= $assoc_project?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label class="control-label col-md-12" for="name">Specify remarks of the teacher with whom the student is associated for the departmental work:</label>
                                                                <p class="form-control-static col-md-offset-3 col-md-9"><?= $special_remarks?></p>
                                                        </div>
                                                </div>


                                                <div class="row">
                                                        <div class="form-group col-md-5">
                                                                <label class="control-label col-md-6">Date:</label>
                                                                <p class="form-control-static col-md-6"><?= $date?></p>
                                                        </div>
                                                </div>

                                                <!-----------------------For Supervisor------------------------------------------------------->

                                                <h4 align="center"><u>(C) To Be Completed By The Thesis Supervisor </u></h4>

                                                <?php
                                                //Getting name of supervisor
                                                $sup_id = getSupervisor($reg_no);
                                                ?>

                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-5" for="name">Name of the Thesis Supervisor:</label>
                                                                <p class="form-control-static col-md-3"><?= getFacultyName($sup_id)?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-9" for="name">Remarks of the Thesis Supervisor regarding progress of thesis work during the Said period:</label>
                                                                <p class="form-control-static col-md-11" style="margin-left: 12%"><?= $sup_remarks?></p>
                                                        </div>
                                                </div>

                                                <div class="row">
                                                        <div class="form-group col-md-5">
                                                                <label class="control-label col-md-6">Date:</label>
                                                                <p class="form-control-static col-md-6"><?= $sup_date?></p>
                                                        </div>
                                                </div>
<!-------------------------------------------- To be completed by HOD------------------------------------------------->
                                                <h4 align="center"><u>(D) To be Completed by the Departmental Office</u></h4>
                                                <?php
                                                        //Getting the Required Values from database

                                                        //Leaves
                                                        $cl=0;
                                                        $ml=0;
                                                        $casLeaveQuery = "SELECT month(from_date) \"Month\",sum(`no_of_days`) \"Total Days\" from `leave` where `reg_no`='$reg_no' and `sem_no` = ".$stipendResult['sem']." and `academic_year`=". $stipendResult['year']." and `leave_type` = 3 and `status`='approved' having Month = '".$stipendResult['month']."'";

                                                        $casLeaveResult = mysqli_query($connection,$casLeaveQuery);
                                                        if($casLeaveResult)
                                                        {
                                                                if(mysqli_num_rows($casLeaveResult)>0)
                                                                {
                                                                        $casLeaveResult = mysqli_fetch_assoc($casLeaveResult);
                                                                        $cl = $casLeaveResult['Total Days'];
                                                                }
                                                        }


                                                        $medlLeaveQuery = "SELECT month(from_date) \"Month\",sum(`no_of_days`) \"Total Days\" from `leave` where `reg_no`='$reg_no' and `sem_no` = ".$stipendResult['sem']." and `academic_year`=". $stipendResult['year']." and `leave_type` = 1 and `status`='approved' having Month = '".$stipendResult['month']."'";

                                                        $medLeaveResult = mysqli_query($connection,$casLeaveQuery);
                                                        if(mysqli_num_rows($medLeaveResult)>0)
                                                        {
                                                                $medLeaveResult = mysqli_fetch_assoc($medLeaveResult);
                                                                $ml = $medLeaveResult['Total Days'];
                                                        }

                                                        $unauth_days = "Not Filled Yet";
                                                        $vac_availed = "Not Filled Yet";
                                                        $vac_days = "Not Filled Yet";
                                                        $stipend_amount = "Not Filled Yet";
                                                        $hod_date = "Not Filled Yet";
                                                        $hodQuery = "select * from stipendoffice where stipend_id='$stipendID'";
                                                        $hodresult = mysqli_query($connection,$hodQuery);
                                                        if(mysqli_num_rows($hodresult)>0)
                                                        {
                                                                $hodresult = mysqli_fetch_assoc($hodresult);
                                                                $unauth_days = $hodresult['unauth_abs'];
                                                                $vac_availed = $hodresult['vac_availed'];
                                                                if($vac_availed="W")
                                                                        $vac_availed = "Winter Vacation";
                                                                if($vac_availed="S")
                                                                        $vac_availed = "Summer Vacation";
                                                                if($vac_availed="N")
                                                                        $vac_availed = "No Vacation";
                                                                $vac_days = $hodresult['vac_leaves'];
                                                                $stipend_amount = $stipendResult['stipend_amount'];
                                                                $hod_date = $hodresult['date'];

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
                                                                <label class="control-label col-md-5">Summer/Winter vacation availed:</label>
                                                                <p class="form-control-static col-md-3"><?= $vac_availed?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-5">Vacation Leaves Taken:</label>
                                                                <p class="form-control-static col-md-3" ><?= $vac_days?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-5">No. of days unauthorized absence from duty during the month:</label>
                                                                <p class="form-control-static col-md-3" ><?= $unauth_days?></p>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group"  style="margin-left: 2%">
                                                                <label class="control-label col-md-5">Amount of scholarship recommended:</label>
                                                                <p class="form-control-static col-md-3" ><?= $stipend_amount?></p>
                                                        </div>
                                                </div>


                                                <div class="row">
                                                        <div class="form-group col-md-5">
                                                                <label class="control-label col-md-6">Date:</label>
                                                                <p class="form-control-static col-md-6"><?= $hod_date?></p>
                                                        </div>
                                                </div>

                                        </form>



                                        <br>
                                </div>
                </div>
        </div>
<script>window.print();</script>
</body>
</html>
