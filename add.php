    <?php

        include("./includes/preProcess.php");
        $prevPageLink = "adminDashboard.php";

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

                    $currentTab = "add";

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
                            <ol style="font-size:25px;">
                                <!-- <li><a href="addRole.php"> Add a Role </a></li> -->
                                <li><a href="addDocumentType.php"> Add a new Document Type</a></li>
                                <li><a href="addLeaveType.php"> Add a new Leave Type </a></li>
                                <li><a href="createCommittee.php"> Add a new Committee</a></li>
                                <li><a href="createCourse.php"> Add a new Course </a></li>
                                <li><a href="createDDPCMember.php"> Add a new DDPC Member</a></li>
                                <li><a href="createDepartment.php"> Add a new Department</a></li>
                                <li><a href="createFaculty.php"> Add a new Faculty Member </a></li>
                                <li><a href="createStudent.php"> Add a new Student</a></li>
                            </ol>
            <footer class="footer">
            </footer>
        </div>
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
