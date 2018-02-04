<?php
	
	//phpinfo();
	
	/*if ($conn = oci_connect("csminiproject1","csminiproject1", '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.31.101.125)(PORT = 1539)) (CONNECT_DATA = (SERVICE_NAME = ORCL) (SID = ORCL)))') )
	{
		echo "done";
		oci_close($conn);
	}
	else
	{	
		$e = oci_error();
 		print htmlentities($e['message']);
 		echo "<br>";
		die("could not connect");
	}*/
	//print $conn;
	$connection = mysqli_connect("localhost","root","","ddpc");
	//mysql_select_db("myDB");
	
?>
