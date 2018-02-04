    <?php

        include("./includes/preProcess.php");
        
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

                    $currentTab = "uploadDocument";

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
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-panel"></i>
                                    <p style="display : none;">Stats</p>
                                </a>
                            </li>
                            <?php include('./includes/notifications.php'); ?>
                            <li>
                                <a href="./logout.php">
                                    <i class="ti-settings"></i>
                                    <p>LogOut</p>
                                </a>
                            </li>
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
                                        <h4 class="title">Upload Documents</h4>
                                    </div>
                                    <hr style="background-color: #111">
                                    <div class="content">
                                        <form action="uploadDoc.php" enctype="multipart/form-data" method="post">
                                        Doc Type : <select name="application_type">
                                            <option selected disabled>Select</option>
                                            <?php
                                                if (!strcmp("student", $_SESSION['role']))
                                                {
                                                    $query = "SELECT * FROM documentlookup";
                                                    $documentTypes = mysqli_query($connection, $query);
                                                    
                                                    while( $thisDocumentType = mysqli_fetch_array($documentTypes)  )
                                                    {
                                            ?>
                                                <option value="<?php echo $thisDocumentType['doc_type_id'] ?>"><?php echo $thisDocumentType['doc_type'] ?></option>
                                            <?php
                                                    }
                                                }
                                                else {
                                            ?>

                                                    <option value="4">Form DP-13</option>
                                            <?php
                                                }

                                            ?>
                                        </select>
                                        <br><br>
                                        <input type="file" name="doc" value="" /><br />
                                        <input type="submit" name="submit" value="Upload Doc" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                    <?php
                        if(isset($_GET['doc_type'])&&$_GET['doc_type']==0)
                            {
                    ?>
                    <p class="title">Please select a file.</p>
                    <?php
                        }
                        else if(isset($_GET['doc_type'])&&$_GET['doc_type']==1)
                        {
                    ?>
                    <p class="title">Please select a file in PDF format.</p>
                    <?php
                        }
                        else if(isset($_GET['doc_type'])&&$_GET['doc_type']==2)
                        {
                    ?>
                    <p class="title">Sorry, Error happened while uploading.</p>
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

                xmldata.open("GET", urltosend,false);
                xmldata.send(null);
                if(xmldata.responseText != ""){
                    toPrint = xmldata.responseText;
                }
            }
        </script>


    </html>
