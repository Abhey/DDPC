<?php

    include("./includes/preProcess.php");
        $supervisor_id = $_SESSION['reg_no'];
        $s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$supervisor_id'";
        $s_result = mysqli_query($connection, $s_query);
        $s_array = array();
        while($s_row = mysqli_fetch_array($s_result))
        {
            array_push($s_array, $s_row['reg_no']);
        }
        $s_query = "Select role from members WHERE member_id = '$supervisor_id'";
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
                                <h4 class="title">Change registration status</h4>
                                <p class="category">List of application of all the students</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Registration Number</th>
                                        <th>Current Status</th>
                                        <th>Reason</th>
                                        <th>Date of Request</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM partfullstatus WHERE status='pending'";
                                            $allStudents = mysqli_query($connection, $query);


                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                                if(!in_array($thisStudent['progress'], $role_array)  && strcmp($thisStudent['progress'], "Supervisor"))
                                                {
                                                    continue;
                                                }
                                                else {

                                                    if (!strcmp($thisStudent['progress'], "Supervisor") && !in_array($thisStudent['reg_no'], $s_array))
                                                    {
                                                        continue;
                                                    }
                                                    else

                                        ?>
                                                <tr>
                                                    <td>
                                                       <a href="./viewStudent.php?qwStudent=<?php echo $thisStudent['reg_no'] ?>">
                                                        <?php echo $thisStudent['reg_no'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['reg_status'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['reason'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['date_of_modification'] ?>
                                                    </td>
                                                    <?php 
                                                        if (!strcmp($thisStudent['status'], "pending")) 
                                                        {
                                                            if(!strcmp($thisStudent['progress'],"Supervisor") && in_array($thisStudent['reg_no'], $s_array)AND empty($thisStudent['supervisor_comment']))
                                                            {
                                                                $thisQuery = "SELECT member_id FROM `members` WHERE role='ConvenerDDPC'";
                                                                $thisResult = mysqli_query($connection, $thisQuery);
                                                                $thisResult = mysqli_fetch_array($thisResult);
                                                                $nextNotifTo = $thisResult['member_id'];

                                                    ?>
                                                    <td>
                                                        <form method="post" id="comment" action="commentDP05.php">
                                                        <textarea form="comment" style="vertical-align:top" class="form-control border-input" name="supervisor_comment" id="supervisor_comment"></textarea>
                                                        <input type="text" hidden value="<?php echo $thisStudent['reg_no'];?>" name="reg_no" nextNotifTo="<?php echo $nextNotifTo ?>" >
                                                        <input type="submit" value="Comment"/>
                                                        </form>
                                                    </td>
                                                    <td></td>
                                                    <?php
                                                        }else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ConvenerDDPC", $thisStudent['progress'])) 
                                                        {
                                                            $thisQuery = "SELECT member_id FROM `members` WHERE role='HOD'";
                                                            $thisResult = mysqli_query($connection, $thisQuery);
                                                            $thisResult = mysqli_fetch_array($thisResult);
                                                            $nextNotifTo = $thisResult['member_id'];
                                                    ?>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="HOD" nextNotifTo="<?php echo $nextNotifTo ?>" />
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ConvenerDDPC"/>
                                                        </form>
                                                    </td>
                                                     <?php
                                                        } 
                                                        else if(in_array($thisStudent['progress'], $role_array) && !strcmp("HOD", $thisStudent['progress'])) 
                                                            {
                                                                $thisQuery = "SELECT member_id FROM `members` WHERE role='ChairmanSDPC'";
                                                            $thisResult = mysqli_query($connection, $thisQuery);
                                                            $thisResult = mysqli_fetch_array($thisResult);
                                                            $nextNotifTo = $thisResult['member_id'];

                                                    ?>

                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ChairmanSDPC" nextNotifTo="<?php echo $nextNotifTo ?>" />
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="HOD"/>
                                                        </form>
                                                    </td>
                                                    <?php    
                                                            }  else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ChairmanSDPC", $thisStudent['progress'])) 
                                                        {
                                                    ?>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Approve" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="approved" progress="ChairmanSDPC"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ChairmanSDPC"/>
                                                        </form>
                                                    </td>
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
                progress: $(this).attr('progress')
            };
            
            $.ajax({
                url:'./approveDP05.php',
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