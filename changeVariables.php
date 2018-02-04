<?php

    // Start the session.
    session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];

    // Establish the connection.
    include("./includes/connect.php");


    if(isset($_POST['action_change_sem'])){
        $sem = mysqli_real_escape_string($connection, $_POST['sem']);
        $query = "UPDATE variables SET value = '$sem' WHERE var = 'sem'";
        $queryRan = mysqli_query($connection, $query);
        if($queryRan)
        {
            echo "<script>
                alert('Sem Type Changed successfully.');
                window.location.href='./change.php';
                </script>";

        }
        else
        {
            echo "Unknown Error Occured";
        }

    } else if(isset($_POST['action_close_reg'])){
        $reg_open = mysqli_real_escape_string($connection, $_POST['reg_open']);
        $query = "UPDATE variables SET value = '$reg_open' WHERE var = 'reg_open'";
        $queryRan = mysqli_query($connection, $query);
        if($queryRan)
        {
            echo "<script>
                alert('Registration Closed.');
                window.location.href='./change.php';
                </script>";

        }
        else
        {
            echo "Unknown Error Occured";
        }
    } else if(isset($_POST['action_open_reg'])){
        $reg_open = mysqli_real_escape_string($connection, $_POST['reg_open']);
        $query = "UPDATE variables SET value = '$reg_open' WHERE var = 'reg_open'";
        $queryRan = mysqli_query($connection, $query);
        if($queryRan)
        {
            echo "<script>
                alert('Registration Opened.');
                window.location.href='./change.php';
                </script>";

        }
        else
        {
            echo "Unknown Error Occured";
        }
    } else if(isset($_POST['action_change_session'])){
        $session = mysqli_real_escape_string($connection, $_POST['session']);
        $query = "UPDATE variables SET value = '$session' WHERE var = 'session'";
        $queryRan = mysqli_query($connection, $query);
        if($queryRan)
        {
            echo "<script>
                alert('Session Changed successfully.');
                window.location.href='./change.php';
                </script>";

        }
        else
        {
            echo "Unknown Error Occured";
        }
    }    

?>