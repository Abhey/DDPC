<?php

include("./includes/preProcess.php");
$prevPageLink = "dashboard.php";

    //echo $_GET['qwStudent'];

$qwStudent = $_GET['qwStudent'];

$query = "SELECT * FROM studentmaster WHERE reg_no='$qwStudent'";
$results = mysqli_query($connection, $query);
$qwUser = mysqli_fetch_array($results);

$name = ucfirst(strtolower(explode(" ", $qwUser['name'])[0]));

$query2 = "SELECT sem_no, course.course_id, course_name, credits_enrolled, course_coordinator FROM courseregistration JOIN course ON courseregistration.course_id = course.course_id WHERE reg_no = '$qwStudent' Order by sem_no desc, courseregistration.course_id";
$result2 = mysqli_query($connection, $query2);

$query3 = "SELECT * FROM studentthesisdetails WHERE reg_no = '$qwStudent'";
$result3 = mysqli_query($connection, $query3);
$thesis = mysqli_fetch_array($result3);

$query4 = "SELECT * FROM studentprogramdetails WHERE reg_no = '$qwStudent'";
$result4 = mysqli_query($connection, $query4);
$program = mysqli_fetch_array($result4);

$query5 = "SELECT sem_no, courseresultmaster.course_id, course_name, credits_earned, grade, result FROM courseresultmaster JOIN course ON courseresultmaster.course_id = course.course_id WHERE reg_no = '$qwStudent' ORDER BY sem_no DESC";
$query_result = mysqli_query($connection, $query5);

function check_date($arg)
{
    if(strtotime($arg)=="")
        return "-";
    else
        return $arg;
}
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

    $currentTab = "viewStudents";

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
            <div class="col-lg-6 col-md-5">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Personal Profile</h4>
                    </div>
                    <div class="content" style="color: grey;">
                        <form method="GET" action="updateQwProfile.php">
                            <div class="row">
                                <center>
                                    <div class="author">
                                      <img class="avatar border-white" src="<?php echo $qwUser['photo_path']; ?>" alt="..."/>
                                    </div>
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Registration Number : <b><?php echo $qwUser['reg_no']; ?></b>
                                </div>
                                <div class="col-md-6">
                                    Name : <b><?php echo $qwUser['name'] ?></b>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    Email address : <b><?php echo $qwUser['mail_id'] ?></b>
                                </div>
                                <div class="col-md-6">
                                    Contact Number : <b><?php echo $qwUser['contact_no'] ?></b>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    Address : <?php echo $qwUser['address'] ?>
                                </div>
                            </div>
                        </form>
                    </div> 
                    <br>
                    <div class="clearfix"></div>
                        
                </div>
            </div>

            <p>
                <?php
                if(isset($_GET['status'])&&$_GET['status']==1)
                {
                    echo "Updated successfully!";
                }
                ?></p> 
                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">SRC</h4>
                        </div>
                        <div class="content">
                        <?php
                        $reg_no = $qwUser['reg_no'];
                        $query = "SELECT * FROM src WHERE reg_no ='$reg_no'";
                        $results = mysqli_query($connection, $query);
                        $arr = mysqli_fetch_array($results);
                        ?>
                        Internal SRC Member - <?php echo getFacultyName($arr['src_int_id']); ?><br>
                        External SRC Member - <?php echo getFacultyName($arr['src_ext_id']); ?><br>
                        Supervisor 1 - <?php echo getFacultyName($arr['supervisor1_id']); ?><br>
                        Supervisor 2 - <?php echo getFacultyName($arr['supervisor2_id']); ?><br>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Courses Registered</h4>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-striped">
                                <?php
                                $max_sem = 0;
                                while($course_details = mysqli_fetch_array($result2) )
                                {
                                    if ($max_sem == $course_details['sem_no'])
                                    {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $course_details['course_id'];?></td>
                                            <td><?php echo $course_details['course_name'];?></td>
                                            <td><?php echo $course_details['credits_enrolled'];?></td>
                                            <td>
                                                <?php
                                                if(!strcmp($course_details['course_name'], "Thesis Performance") || !strcmp($course_details['course_name'], "State of the Art")){
                                                    echo getFacultyName($arr['supervisor1_id']) ;

                                                }
                                                else if(!strcmp($course_details['course_name'], "Mini Project") || !strcmp($course_details['course_name'], "Research Seminar")){

                                                    echo getFacultyName($arr['supervisor1_id']).", ".getFacultyName($course_details['student_selected_coordinator']) ;

                                                }
                                                else {
                                                    echo getFacultyName($course_details['course_coordinator']);
                                                }
                                            ?>
                                            </td>
                                        </tr> 
                                        <?php 
                                    } else {
                                        $max_sem = $course_details['sem_no'];
                                        ?>
                                        <th>Semester <?php echo $max_sem; ?></th>
                                        <th>Course Id</th>
                                        <th>Course Name</th>
                                        <th>Credits Enrolled</th>
                                        <th>Course Coordinator</th>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $course_details['course_id'];?></td>
                                            <td><?php echo $course_details['course_name'];?></td>
                                            <td><?php echo $course_details['credits_enrolled'];?></td>
                                            <td>
                                            <?php
                                                if(!strcmp($course_details['course_name'], "Thesis Performance") || !strcmp($course_details['course_name'], "State of the Art")){
                                                    echo getFacultyName($arr['supervisor1_id']) ;

                                                }
                                                else if(!strcmp($course_details['course_name'], "Mini Project") || !strcmp($course_details['course_name'], "Research Seminar")){

                                                    echo getFacultyName($arr['supervisor1_id']).", ".getFacultyName($course_details['student_selected_coordinator']) ;

                                                }
                                                else {
                                                    echo getFacultyName($course_details['course_coordinator']);
                                                }
                                            ?>
                                            </td>
                                        </tr>   
                                        <?php
                                    }
                                }
                                ?>
                            </table>

                        </div>
                    </div>

                </div>



            </div> 
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h4 class="title">Thesis Details</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">

                        <h5><b>Area Of Interest</b></h5> <?php echo $thesis['AOR']; ?> 
                        <h5><b>Proposed Topic</b></h5> <?php echo $thesis['proposed_topic']; ?> <br>
                        <h5><b>Final Topic</b></h5> <?php echo $thesis['final_topic']; ?> <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Program Details</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6">

                        <h5><b>Date of completion of course work</b></h5> <?php echo check_date($program['date_of_comp_of_course_work']); ?>
                        <h5><b>Credits earned through course work</b></h5><?php echo $program['credit_earn_course_work']; ?>
                        <h5><b>Credits earned through thesis work</b></h5><?php echo $program['credit_earn_thesis']; ?>
                        <h5><b>Date of comprehension</b></h5> <?php echo check_date($program['date_of_comp']); ?>
                        <h5><b>Date of SOA</b></h5><?php echo check_date($program['date_of_soa']); ?>

                    </div>
                    <div class="col-md-6">

                        <h5><b>Date of Open</b></h5><?php echo check_date($program['date_of_open']); ?>
                        <h5><b>Date of Final Viva</b></h5><?php echo check_date($program['date_of_final_viva']); ?>
                        <h5><b>Date of thesis submission</b></h5><?php echo check_date($program['date_thesis_submission']); ?>
                        <!-- <h5><b>Date of termination</b></h5><?php echo check_date($program['date_of_termination']); ?> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Result</h4>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-striped">
                                <?php
                                $max_sem = 0;
                                while($results = mysqli_fetch_array($query_result) )
                                {
                                    if ($max_sem == $results['sem_no'])
                                    {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $results['course_id'];?></td>
                                            <td><?php echo $results['course_name'];?></td>
                                            <td><?php echo $results['credits_earned'];?></td>
                                            <td><?php echo $results['grade'];?></td>
                                            <td><?php echo $results['result'];?></td>
                                        </tr> 
                                        <?php 
                                    } else {
                                        $max_sem = $results['sem_no'];
                                        ?>
                                        <th>Semester <?php echo $max_sem; ?></th>
                                        <th>Course Id</th>
                                        <th>Course Name</th>
                                        <th>Credits Earned</th>
                                        <th>Grade</th>
                                        <th>Result</th>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $results['course_id'];?></td>
                                            <td><?php echo $results['course_name'];?></td>
                                            <td><?php echo $results['credits_earned'];?></td>
                                            <td><?php echo $results['grade'];?></td>
                                            <td><?php echo $results['result'];?></td>
                                        </tr> 
                                        <?php
                                    }
                                }
                                ?>
                            </table>

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
