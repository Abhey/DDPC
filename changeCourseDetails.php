<?php

    include("./includes/preProcess.php");


    $prevPageLink = "update.php";

    
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
    <script type="text/javascript">

            function nowsearch(course_id)
            {

                var url='./fetch_course.php?course_id=' + course_id;
                load_my_URL(url,function(data){
                var xml=parse_my_XMLdata(data);
                var mCourses = xml.documentElement.getElementsByTagName("course");
                    if (mCourses[0].hasAttribute("total_credits"))
                    {

                        var course_name = mCourses[0].getAttribute("course_name");
                        var course_coordinator = mCourses[0].getAttribute("course_coordinator");
                        var course_instructor = mCourses[0].getAttribute("course_instructor");
                        var total_credits = mCourses[0].getAttribute("total_credits");
                        document.getElementById("course_name").value = course_name;
                        document.getElementById("course_coordinator").value = course_coordinator;
                        document.getElementById("course_instructor").value = course_instructor;
                        document.getElementById("total_credits").value = total_credits;
                        document.getElementById("min_credits").value = "";
                        document.getElementById("max_credits").value = "";



                    } else {

                        var course_name = mCourses[0].getAttribute('course_name');
                        var course_coordinator = mCourses[0].getAttribute('course_coordinator');
                        var course_instructor = mCourses[0].getAttribute("course_instructor");
                        var min_credits = mCourses[0].getAttribute("min_credits");
                        var max_credits = mCourses[0].getAttribute("max_credits");
                        document.getElementById("course_name").value = course_name;
                        document.getElementById("course_coordinator").value = course_coordinator;
                        document.getElementById("course_instructor").value = course_instructor;
                        document.getElementById("min_credits").value = min_credits;
                        document.getElementById("max_credits").value = max_credits;
                        document.getElementById("total_credits").value = "";

                    }

                });
            }
            function load_my_URL(url, do_func)
            {
                var my_req = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
                my_req.onreadystatechange = function()
                {
                    if (my_req.readyState == 4)
                    {
                        my_req.onreadystatechange = no_func;
                        do_func(my_req.responseText, my_req.status);
                    }
                };
                my_req.open('GET', url, true);
                my_req.send(null);
            }
            function parse_my_XMLdata(data)
            {
                if (window.ActiveXObject)
                {
                    var doc = new ActiveXObject('Microsoft.XMLDOM');
                    doc.loadXML(data);
                    return doc;
                }
                else if (window.DOMParser)
                {
                    return (new DOMParser).parseFromString(data, 'text/xml');
                }
            }
            function no_func() {}
            
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

                $currentTab = "user";

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
                                <h4 class="title">Update a Course Details</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="updateCourseDetails.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Course Id - Course Name</label>
                                                <select class="form-control border-input" name="course_id" onchange="nowsearch(this.value);">
                                                <option selected disabled>Select</option>
                                                <?php

                                                    $query = "SELECT course_id, course_name FROM course";
                                                    $results = mysqli_query($connection, $query);

                                                    while($course = mysqli_fetch_assoc($results))
                                                    {
                                                ?>
                                                <option value="<?php echo $course['course_id'];?> "><?php echo $course['course_id']." - ".$course['course_name'];?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Course Coordinator" name="course_name" id="course_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course Coordinator</label>
                                                <input type="text" class="form-control border-input" placeholder="Course Coordinator" name="course_coordinator" id="course_coordinator">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Course Instructor</label>
                                                <input type="text" class="form-control border-input" placeholder="Course Instructor" name="course_instructor" id="course_instructor">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Total Credits(In case of theory courses)</label>
                                                <input type="text" class="form-control border-input" placeholder="Total Credits" name = "total_credits" id = "total_credits">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Min Credits(In case of other courses)</label>
                                                <input type="text" class="form-control border-input" placeholder="Min Credits" name = "min_credits" id = "min_credits">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Max Credits(In case of other courses)</label>
                                                <input type="text" class="form-control border-input" placeholder="Max Credits" name = "max_credits" id = "max_credits">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Course Details</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
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
