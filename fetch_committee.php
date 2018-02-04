<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("committees");//parent node of XML
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$dept_id = $_GET['dept_id'];
$query="SELECT * FROM committee natural join department where dept_id = '$dept_id'";
$result=mysqli_query($connection, $query);

		header("Content-type:text/xml");//creating nodes with db info in XML file
		while ($row = mysqli_fetch_assoc($result)){
		$my_node=$doc->createElement("committee");
		$newnode=$pnode->appendChild($my_node);
		$newnode->setAttribute("dept_id", $row['dept_id']);
		$newnode->setAttribute("committee_id",$row['committee_id']);
		$newnode->setAttribute("committee_name",$row['committee_name']);
		$newnode->setAttribute("dept_name",$row['dept_name']);
		$newnode->setAttribute("hod",$row['hod']);
		}
$query="SELECT max(committee_id) as max_committee_id FROM committee where dept_id = '$dept_id'";
$result=mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$my_node=$doc->createElement("committee_num");
		$newnode=$pnode->appendChild($my_node);
		$newnode->setAttribute("max_committee_id", $row['max_committee_id']);
		echo $doc->saveXML();//saving XML Document
?>
