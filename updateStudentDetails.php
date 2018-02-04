<?php

    include("./includes/preProcess.php");
    $prevPageLink = "dashboard.php";

    $thisRegNo = $_GET['reg_no'];
    
    $query = "SELECT * FROM studentmaster WHERE reg_no='$thisRegNo'";
    $result = mysqli_query($connection, $query);

    $user  = mysqli_fetch_array($result);

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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo $user['photo_path']; ?>" alt="..."/>
                                  <h4 class="title"><?php echo $user['name']; ?><br />
                                  </h4><br>
                                  <form method="post" action="updateOnePic.php" enctype="multipart/form-data">
                                        <center><input type="file" name="photo" id="photo"></center><br>
                                        <input type="hidden" name="reg_no" value="<?php echo $user['reg_no']?>" >
                                        <input type="submit" name="submit" value="Upload Image">
                                  </form>
                                  
                                </div>
                            </div>
                            <hr>
                            <?php
                                if(isset($_GET['img_type'])&&$_GET['img_type']==0)
                                {
                                    ?>
                                    <p class="title">File is not an image.</p>
                                    <?php
                                }
                                else if(isset($_GET['img_type'])&&$_GET['img_type']==1)
                                {
                                    ?>
                                    <p class="title">Sorry, your file is too large.</p>
                                    <?php
                                }
                                else if(isset($_GET['img_type'])&&$_GET['img_type']==2)
                                {
                                    ?>
                                    <p class="title">Sorry, only JPG, JPEG, PNG and GIF files are allowed.</p>
                                    <?php
                                }
                                else if(isset($_GET['img_type'])&&$_GET['img_type']==3)
                                {
                                    ?>
                                    <p class="title">Sorry, your file was not uploaded.</p>
                                    <?php
                                }
                                else if(isset($_GET['img_type'])&&$_GET['img_type']==4)
                                {
                                    ?>
                                    <p class="title">Unknown Error Occured.</p>
                                    <?php
                                }
                                else if(isset($_GET['img_type'])&&$_GET['img_type']==5)
                                {
                                    ?>
                                    <p class="title">Sorry, Error happened while uploading.</p>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="GET" action="updateOneProfile.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="<?php echo $user['reg_no']; ?>" name = "reg_no">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="<?php echo $user['password']; ?>" name = "password">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control border-input" name="category">
                                                <option value="General" selected>General</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Program</label>
                                                <select class="form-control border-input" name="program">
                                                <option value="Ph.D." selected>Ph.D</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control border-input" placeholder="name" value="<?php echo $user['name'] ?>" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <input type="text" class="form-control border-input" placeholder="name" value="<?php echo $user['father_name'] ?>" name="father_name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="mail_id" value="<?php echo $user['mail_id'] ?>" name="mail_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" class="form-control border-input" placeholder="contact_no" value="<?php echo $user['contact_no'] ?>" name="contact_no">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" value="<?php echo $user['address'] ?>" name="address">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Hostel</label>
                                                <select class="form-control border-input" name="hostel">
                                                <option value="hostelName" selected>hostel name</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control border-input" name="gender">
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <select class="form-control border-input" name="nationality">
                                                <option value="Indian" selected>Indian</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Stipendiary</label>
                                                <select class="form-control border-input" name="stipendiary">
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control border-input" name="dept_id">
                                                <?php
                                                    $query = "SELECT * FROM department";
                                                    $result = mysqli_query($connection, $query);

                                                    while($thisDepartment = mysqli_fetch_array($result))
                                                    {
                                                        $selected = "";
                                                        if($thisDepartment['dept_id'] == $user['dept_id'])
                                                        {
                                                            $selected = "selected";
                                                        }
                                                ?>
                                                    <option value="<?php echo $thisDepartment['dept_id']; ?>" <?php echo $selected ?>><?php echo $thisDepartment['dept_name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Joining Date</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $user['year_of_joining'] ?>" name="year_of_joining" id="year_of_joining">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Program Category</label>
                                                <select class="form-control border-input" name="program_category">
                                                <?php
                                                    $query = "SELECT * FROM programcategorylookup";
                                                    $result = mysqli_query($connection, $query);

                                                    while($thisCategory = mysqli_fetch_array($result))
                                                    {
                                                        $selected = "";
                                                        if($thisCategory['category'] == $user['program_category'])
                                                        {
                                                            $selected = "selected";
                                                        }
                                                ?>
                                                    <option value="<?php echo $thisCategory['category']; ?>" <?php echo $selected ?>><?php echo $thisCategory['category']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
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

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script type="text/javascript">

        $("#year_of_joining").datepicker({
                  // minDate: 0,
                  dateFormat: 'yy-mm-dd',
                  // onSelect: function(date) {
                  //   $("#to_datepicker").datepicker('option', 'minDate', date);
                  // }
                });

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
