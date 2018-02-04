<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("students");//parent node of XML
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$reg_no = $_GET['reg_no'];
$query="SELECT * from studentmaster natural join studentthesisdetails natural join currentsupervisor natural join studentregistration WHERE studentregistration.sem_no = (SELECT min(sem_no) from studentregistration where reg_no = '$reg_no') AND studentmaster.reg_no = '$reg_no'";
$result=mysqli_query($connection, $query);

		header("Content-type:text/xml");//creating nodes with db info in XML file
		while ($row = mysqli_fetch_assoc($result)){
		$my_node=$doc->createElement("student");
		$newnode=$pnode->appendChild($my_node);

		$newnode->setAttribute("reg_no", $row['reg_no']);
		$newnode->setAttribute("dept_id", $row['dept_id']);

		$tempVar = $row['dept_id'];
		$tempQuery = "SELECT * FROM department WHERE dept_id='$tempVar'";
		$tempResult = mysqli_query($connection, $tempQuery);
		$tempResult = mysqli_fetch_array($tempResult);
		$dept_name = $tempResult['dept_name'];

		$newnode->setAttribute("dept_name", $dept_name);
		$newnode->setAttribute("name",$row['name']);
		$newnode->setAttribute("date_of_reg",$row['date_of_reg']);
		$newnode->setAttribute("AOR",$row['AOR']);
		$newnode->setAttribute("supervisor1_id",$row['supervisor1_id']);
		$newnode->setAttribute("supervisor2_id",$row['supervisor2_id']);
		}
		echo $doc->saveXML();//saving XML Document



?>
