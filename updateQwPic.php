<?php

	session_start();
    if(!isset($_SESSION['userid']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['userid'];

    $reg_no = $_POST['qwUser'];
    // echo $reg_no;

	include("./includes/connect.php");
    $target_dir = "images/";
	$target_file = $target_dir . $reg_no . ".jpg";
	//echo $target_file;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	// Check if image file is an actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["photo"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        // echo "File is not an image.";

	        $uploadOk = 0;
	        header("Location: ./viewStudent.php?qwStudent=".$reg_no."&img_type=0");
	        exit();
	    }
	}

	// Check file size
	if ($_FILES["photo"]["size"] > 500000) {
	    // echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	    header("Location: ./viewStudent.php?qwStudent=".$reg_no."&img_type=1");
	    exit();
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	    header("Location: ./viewStudent.php?qwStudent=".$reg_no."&img_type=2");
	    exit();
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    // echo "Sorry, your file was not uploaded.";
	    header("Location: ./viewStudent.php?qwStudent=".$reg_no."&img_type=3");
	    exit();

	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file))
	    {
	        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
	
			// if($queryRan){
			// 	header("Location: ./viewStudent.php?qwStudent=".$reg_no."");
			// 	exit();
			// }
			// else{
			// 	// echo "Unknown Error Occured";
			 	header("Location: ./viewStudent.php?qwStudent=".$reg_no."");
			 	exit();
			// }

	    } else {
	        // echo "Sorry, there was an error uploading your file.";
	        header("Location: ./viewStudent.php?qwStudent=".$reg_no."&img_type=5");
	    }
	}
?>