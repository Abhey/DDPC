<?php

    include("./includes/preProcess.php");
    $mem_id = $_SESSION['reg_no'];
    $s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$mem_id'";
    $s_result = mysqli_query($connection, $s_query);
    $s_array = array();
    while($s_row = mysqli_fetch_array($s_result))
    {
        array_push($s_array, $s_row['reg_no']);
    }
    $s_query = "Select role from members WHERE member_id = '$mem_id'";
    $s_result = mysqli_query($connection, $s_query);
    $role_array = array();
    while($s_row = mysqli_fetch_array($s_result))
    {
        array_push($role_array, $s_row['role']);
    }
    function faculty($faculty_id, $connection)
    {
        $query = "SELECT * FROM faculty NATURAL JOIN department WHERE faculty_id = '$faculty_id'";
        $result = mysqli_query($connection, $query);

        $faculty = mysqli_fetch_assoc($result);
        return $faculty;
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
                                <h4 class="title">List of Examiners</h4>
                                <p class="category">List of Suggested Examiners for Ph.D Oral Board</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Registration Number</th>
                                        <th>Student Name</th>
                                        <th>Panel Member Name</th>
                                        <th>Panel Member Designation</th>
                                        <th>Panel Member Department</th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = "SELECT name, reg_no, status, progress FROM examinarpanel NATURAL JOIN studentmaster WHERE status = 'pending' AND type = 'Ph.D Oral Board' GROUP BY reg_no";
                                            $allStudents = mysqli_query($connection, $query);

                                            while( mysqli_num_rows($allStudents) !=0 && $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                                if(!in_array($thisStudent['progress'], $role_array) && strcmp($thisStudent['progress'], "Supervisor")   )
                                                    {
                                                        continue;
                                                    }
                                                $app_reg_no = $thisStudent['reg_no'];
                                                $query = "SELECT * FROM examinarpanel NATURAL JOIN faculty NATURAL JOIN department WHERE reg_no = '$app_reg_no'";
                                                $allApps = mysqli_query($connection, $query);
                                                $rnum = mysqli_num_rows($allApps);
                                                $rnum = $rnum + 1;
                                        ?>
                                            <tr>
                                                <td rowspan="<?php echo $rnum ?>"><?php echo $thisStudent['reg_no']; ?>
                                                </td>
                                                <td rowspan="<?php echo $rnum ?>"><?php echo $thisStudent['name']; ?>
                                                </td>
                                            </tr>
                                        <?php

                                                while ( $thisApp = mysqli_fetch_array($allApps)) 
                                                {
                                                    $sem_no = $thisApp['sem_no'];

                                                    if( !in_array($thisApp['progress'], $role_array))
                                                    {
                                                        continue;
                                                    }
                                                    else {
                                        ?>
                                                    <tr>
                                                        <td>
                                                           <?php echo $thisApp['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $thisApp['designation']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $thisApp['dept_name']; ?>
                                                        </td>
                                                    </tr>
                                                        <?php 
                                                    }
                                                }

                                                        if (!strcmp($thisStudent['status'], "pending")) 
                                                        {
                                                            if(!strcmp($thisStudent['progress'],"Supervisor") && in_array($thisStudent['reg_no'], $s_array) && empty($thisStudent['supervisor_comment']))
                                                            {
                                                                $thisQuery = "SELECT member_id FROM `members` WHERE role='ConvenerDDPC'";
                                                                $thisResult = mysqli_query($connection, $thisQuery);
                                                                $thisResult = mysqli_fetch_array($thisResult);
                                                                $nextNotifTo = $thisResult['member_id'];

                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Advise" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ConvenerDDPC" sem_no="<?php echo $sem_no;?>" nextNotifTo="<?php echo $nextNotifTo ?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Advised" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="Supervisor" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                        } else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ConvenerDDPC", $thisStudent['progress']))
                                                        {
                                                            $thisQuery = "SELECT member_id FROM `members` WHERE role='HOD'";
                                                            $thisResult = mysqli_query($connection, $thisQuery);
                                                            $thisResult = mysqli_fetch_array($thisResult);
                                                            $nextNotifTo = $thisResult['member_id'];
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="HOD" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time" nextNotifTo="<?php echo $nextNotifTo ?>"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Don't Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ConvenerDDPC" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    </tr>
                                                     <?php
                                                        } 
                                                        else if(in_array($thisStudent['progress'], $role_array) && !strcmp("HOD", $thisStudent['progress']))
                                                            {

                                                    ?>
                                                    <tr>
                                                    <td rowspan="<?php echo $rnum ?>">
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ChairmanSDPC" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    <td rowspan="<?php echo $rnum ?>">
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Don't Forward" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="HOD" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    </tr>
                                                    <?php    
                                                            }  else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ChairmanSDPC", $thisStudent['progress']))
                                                        {
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Recommend" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ChairmanSenate" sem_no="<?php echo $sem_no;?>" reg_status="Part-Time"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Don't Recommend" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="pending" progress="ChairmanSDPC" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
                                                        </form>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                            } 
                                                            else if(in_array($thisStudent['progress'], $role_array) && !strcmp("ChairmanSenate", $thisStudent['progress']))
                                                        {
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Approve" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="approved" progress="ChairmanSenate" sem_no="<?php echo $sem_no;?>" reg_status="Part-Time"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Deny" reg_no = "<?php echo $thisStudent['reg_no'] ?>" status="denied" progress="ChairmanSenate" sem_no="<?php echo $sem_no;?>" reg_status="Full-Time"/>
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
                url:'./approveDP16.php',
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