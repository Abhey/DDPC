<?php

    include("./includes/preProcess.php");
    $mem_id = $_SESSION['reg_no'];

    $query = "SELECT * from src natural join studentmaster where src.status= 'pending' ";
    $result = mysqli_query($connection, $query);
    $student = mysqli_fetch_assoc($result);

    $src_int_id = $student['src_int_id'];
    $src_ext_id = $student['src_ext_id'];
    $supervisor1_id = $student['supervisor1_id'];
    $supervisor2_id = $student['supervisor2_id'];

    $s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$mem_id'";
    $s_result = mysqli_query($connection, $s_query);
    $s_array = array();
    while($s_row = mysqli_fetch_array($s_result))
    {
        array_push($s_array, $s_row['reg_no']);
    }

    function faculty($faculty_id, $connection)
    {
        $query = "SELECT * FROM faculty NATURAL JOIN department WHERE faculty_id = '$faculty_id'";
        $result = mysqli_query($connection, $query);

        $faculty = mysqli_fetch_assoc($result);
        return $faculty;
    }

    $s_query = "Select role from members WHERE member_id = '$mem_id'";
    $s_result = mysqli_query($connection, $s_query);
    $role_array = array();
    while($s_row = mysqli_fetch_array($s_result))
    {
        array_push($role_array, $s_row['role']);
    }
    $prevPageLink = "approve.php";
    
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
                                <h4 class="title">Student Reasearch Committee</h4>
                                <p class="category">List of SRC Committee for students</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Registration Number</th>
                                        <th>Student Name</th>
                                        <th>SRC Internal Member</th>
                                        <th>SRC External Member</th>
                                        <th>Supervisor 1</th>
                                        <th>Supervisor 2</th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = "SELECT * FROM src NATURAL JOIN studentmaster WHERE status = 'pending'";
                                            $allStudents = mysqli_query($connection, $query);

                                            while( mysqli_num_rows($allStudents) !=0 && $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                                if( !in_array($thisStudent['progress'], $role_array) && strcmp($thisStudent['progress'], "Supervisor")  )
                                                    {
                                                        continue;
                                                    }
                                        ?>
                                            <tr>
                                                <td><?php echo $thisStudent['reg_no']; ?>
                                                </td>
                                                <td><?php echo $thisStudent['name']; ?>
                                                </td>
                                                <td>
                                                   <?php 
                                                        $fac = faculty($thisStudent['src_int_id'], $connection);
                                                        echo $fac['name']." - ".$fac['designation']." - ".$fac['dept_name'];
                                                   ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $fac = faculty($thisStudent['src_ext_id'], $connection);
                                                        echo $fac['name']." - ".$fac['designation']." - ".$fac['dept_name'];
                                                   ?>
                                                    
                                                </td>
                                                <td>
                                                <?php 
                                                        $fac = faculty($thisStudent['supervisor1_id'], $connection);
                                                        echo $fac['name']." - ".$fac['designation']." - ".$fac['dept_name'];
                                                   ?>
                                                
                                                </td>
                                                <td>
                                                <?php 
                                                        $fac = faculty($thisStudent['supervisor2_id'], $connection);
                                                        echo $fac['name']." - ".$fac['designation']." - ".$fac['dept_name'];
                                                   ?>
                                                
                                                </td>
                                            </tr>
                                                        <?php 
                                                        if (!strcmp($thisStudent['status'], "pending")) 
                                                        {
                                                            if(in_array($thisStudent['progress'], $role_array) && !strcmp("ConvenerDDPC", $thisStudent['progress'])) 
                                                        {
                                                            $thisQuery = "SELECT member_id FROM `members` WHERE role='HOD'";
                                                            $thisResult = mysqli_query($connection, $thisQuery);
                                                            $thisResult = mysqli_fetch_array($thisResult);
                                                            $nextNotifTo = $thisResult['member_id'];
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="HOD" nextNotifTo="<?php echo $nextNotifTo ?>"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Don't Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ConvenerDDPC" />
                                                        </form>
                                                    </td>
                                                    </tr>
                                                     <?php
                                                        } else if(in_array($thisStudent['progress'], $role_array) && !strcmp("HOD", $thisStudent['progress'])) 
                                                            {
                                                                $thisQuery = "SELECT member_id FROM `members` WHERE role='ChairmanSDPC'";
                                                                $thisResult = mysqli_query($connection, $thisQuery);
                                                                $thisResult = mysqli_fetch_array($thisResult);
                                                                $nextNotifTo = $thisResult['member_id'];

                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ChairmanSDPC" nextNotifTo="<?php echo $nextNotifTo ?>"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Don't Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="HOD" />
                                                        </form>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                        } else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ChairmanSDPC", $thisStudent['progress'])) 
                                                        {
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Approve" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="approved" progress="ChairmanSDPC" />
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Deny" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ChairmanSDPC" />
                                                        </form>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                            } 
                                                        } else {


                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <?php
                                                            }

                                                    ?>  
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
        }

         $("input[name='submit']").click(function(event){

            event.preventDefault();
            var formData = {  // Javascript object
                reg_no: $(this).attr('reg_no'),
                status: $(this).attr('status'),
                progress: $(this).attr('progress'),
                nextNotifTo: $(this).attr('nextNotifTo')
            };
            
            $.ajax({
                url:'./approveDP02.php',
                type:'post',
                data: formData,
                success: function(data){
                    // alert(data);
                    location.reload();
                },
                error: function(){
                    alert('failure');
                }
            });
        });
    </script>
</html>