<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

$doc=new DOMDocument("1.0");
$my_node=$doc->createElement("attendances");
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$meeting_no = $_GET['meeting_no'];
$query="SELECT * from meetattendance WHERE meeting_no='$meeting_no'";
$result=mysqli_query($connection, $query);

header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result))
{
	$my_node=$doc->createElement("attendance");
	$newnode=$pnode->appendChild($my_node);
	$newnode->setAttribute("member_id", $row['member_id']);
	$thisUniqueId = $row['member_id'];
	$query1 = "SELECT * FROM studentmaster WHERE reg_no='$thisUniqueId'";
	$thisMember = mysqli_query($connection, $query1);
	if(mysqli_num_rows($thisMember) != 1)
	{
		$query1 = "SELECT * FROM faculty WHERE faculty_id='$thisUniqueId'";
		$thisMember = mysqli_query($connection, $query1);
	}
	$thisMember = mysqli_fetch_array($thisMember);
	$newnode->setAttribute("member_name", $thisMember['name']);
}
echo $doc->saveXML();//saving XML Document


?>
