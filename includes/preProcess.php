<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");

$is_admin = 0;
if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
{
    $is_admin = 1;
    $name = "ADMIN";
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $user['name'] = "ADMIN";
    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
}else if(! strcmp($_SESSION['role'], "student"))
{
    $query = "SELECT * FROM studentmaster WHERE reg_no='$reg_no'";
    $results = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($results);
    if(empty($user['photo_path']))
    {
        $user['photo_path']='./images/default.jpg';
    }
    $query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY date_of_reg ASC";
    $results = mysqli_query($connection, $query);
    $arr = mysqli_fetch_array($results);
    $date_of_reg = $arr['date_of_reg'];
    $query = "SELECT sem_no, sem_type FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY date_of_reg DESC";
    $results = mysqli_query($connection, $query);
    if(mysqli_num_rows($results) == 0)
    {
     $current_sem_no = 0;
    }
    else
    {
        $arr = mysqli_fetch_array($results);
        $current_sem_no = $arr['sem_no'];
        $current_sem_type = $arr['sem_type'];
    }
    $name = ucfirst(strtolower(explode(" ", $user['name'])[0])); 
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' ); 
} else
{
    $query = "SELECT * FROM faculty WHERE faculty_id = '$reg_no'";
    $results = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($results);
    if(empty($user['photo_path']))
    {
        $user['photo_path']='./images/default.jpg';
    }
        // $name = ucfirst(strtolower(explode(" ", $user['name'])[0])); 

    $name = $user['name'];
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' ); 
}
?>

