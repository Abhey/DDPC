<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}


//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("courses");//parent node of XML
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$course_id = $_GET['course_id'];
$query="SELECT * FROM course NATURAL JOIN theorycourses NATURAL JOIN department WHERE course_id ='$course_id'";
$result=mysqli_query($connection, $query);
if (mysqli_num_rows($result) != 1) {
	$query="SELECT * FROM course NATURAL JOIN othercourses NATURAL JOIN department WHERE course_id ='$course_id'";
	$result=mysqli_query($connection, $query);


	if(mysqli_num_rows($result) != 1) {
		echo "failed query";
	} else {
		header("Content-type:text/xml");//creating nodes with db info in XML file
		while ($row = mysqli_fetch_assoc($result)){
		$my_node=$doc->createElement("course");
		$newnode=$pnode->appendChild($my_node);
		$newnode->setAttribute("course_name", $row['course_name']);
		$newnode->setAttribute("course_coordinator", getFacultyName($row['course_coordinator']));
		$newnode->setAttribute("course_instructor", getFacultyName($row['course_instructor']));
		$newnode->setAttribute("min_credits",$row['min_credits']);
		$newnode->setAttribute("max_credits",$row['max_credits']);
		$newnode->setAttribute("dept_name",$row['dept_name']);
		}
		echo $doc->saveXML();//saving XML Document
	}

} else {
	header("Content-type:text/xml");//creating nodes with db info in XML file
	while ($row = mysqli_fetch_assoc($result)){
	$my_node=$doc->createElement("course");
	$newnode=$pnode->appendChild($my_node);
	$newnode->setAttribute("course_name", $row['course_name']);
	$newnode->setAttribute("course_coordinator", getFacultyName($row['course_coordinator']));
	$newnode->setAttribute("course_instructor", getFacultyName($row['course_instructor']));
	$newnode->setAttribute("total_credits",$row['total_credits']);
	$newnode->setAttribute("dept_name",$row['dept_name']);
	}
	echo $doc->saveXML();//saving XML Document
}


?>
