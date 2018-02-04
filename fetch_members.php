<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

//it returns an xml file which contains all markers stored in the database
$doc=new DOMDocument("1.0");//creating XML DOM
$my_node=$doc->createElement("members");//parent node of XML
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$member_id = $_GET['member_id'];
$query="SELECT * FROM members WHERE member_id ='$member_id'";
$result=mysqli_query($connection, $query);

		header("Content-type:text/xml");//creating nodes with db info in XML file
		while ($row = mysqli_fetch_assoc($result)){
		$my_node=$doc->createElement("member");
		$newnode=$pnode->appendChild($my_node);
		$newnode->setAttribute("member_id", $row['member_id']);
		$newnode->setAttribute("member_type",$row['member_type']);
		$newnode->setAttribute("committee_id",$row['committee_id']);
		$newnode->setAttribute("dept_id",$row['dept_id']);
		$newnode->setAttribute("role",$row['role']);
		}
		echo $doc->saveXML();//saving XML Document



?>
