<?php
session_start();
if(isset($_SESSION['reg_no']))
	$reg_no=$_SESSION['reg_no'];

$doc=new DOMDocument("1.0");
$my_node=$doc->createElement("briefs");
$pnode=$doc->appendChild($my_node);
include("./includes/connect.php");
$meeting_no = $_GET['meeting_no'];
$agenda_id = $_GET['agenda_id'];
$query="SELECT * from meetingagendabrief WHERE meeting_no='$meeting_no' AND agenda_id='$agenda_id'";
$result=mysqli_query($connection, $query);

header("Content-type:text/xml");//creating nodes with db info in XML file
while ($row = mysqli_fetch_assoc($result))
{
	$my_node=$doc->createElement("brief");
	$newnode=$pnode->appendChild($my_node);
	$newnode->setAttribute("agenda_name", $row['agenda_name']);
	$newnode->setAttribute("description", $row['description']);
}
echo $doc->saveXML();//saving XML Document
?>
