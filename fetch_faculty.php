<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("faculty_members");//parent node of XML
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$faculty_id = $_GET['faculty_id'];
$query="SELECT * FROM faculty NATURAL JOIN department WHERE faculty_id ='$faculty_id'";
$result=mysqli_query($connection, $query);

		header("Content-type:text/xml");//creating nodes with db info in XML file
		while ($row = mysqli_fetch_assoc($result)){
		$my_node=$doc->createElement("faculty");
		$newnode=$pnode->appendChild($my_node);
		$newnode->setAttribute("faculty_id", $row['faculty_id']);
		$newnode->setAttribute("name",$row['name']);
		$newnode->setAttribute("designation",$row['designation']);
		$newnode->setAttribute("dept_name",$row['dept_name']);
		$newnode->setAttribute("dept_id",$row['dept_id']);
		$newnode->setAttribute("address",$row['address']);
		$newnode->setAttribute("contact",$row['contact']);
		$newnode->setAttribute("mail_id",$row['mail_id']);
		}
		echo $doc->saveXML();//saving XML Document
?>
