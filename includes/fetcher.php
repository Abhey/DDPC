<?php
	include("./connect.php");


	if(!isset($_GET['start']) || !isset($_GET['end']) || !isset($_GET['saleType']) || !isset($_GET['prType']))
		header("location: ../404error.html");

	$start = mysql_real_escape_string($_GET['start']);
	$end = mysql_real_escape_string($_GET['end']);
	$prType = mysql_real_escape_string($_GET['prType']);
	$saleType = mysql_real_escape_string($_GET['saleType']);


	$que = "SELECT * FROM property where Price >= $start and Price <= $end and take = 1 ";
	if($prType <= 1)
		if($saleType <= 1)		
			$que .= "and Type=$saleType and prType=$prType";
		else
			$que .= "and prType=$prType";

	if(isset($_GET['search'])){
		$searchText = mysql_real_escape_string($_GET['search']);
		$que .= " and (Address like '%$searchText%' or City like '%$searchText%') ";
	}

	$query_ran = mysql_query($que);
	while ( $data =  mysql_fetch_array($query_ran) ) {
		$pid = $data['PropertyId'];
		$address = $data['Address'];
		$prTypeIn = $data['prType'];
		$saleTypeIn = $data['Type'];
		$cost = $data['Price'];
		$area = $data['PlotArea'];
		$city = $data['City'];
		$uid = $data['Owner'];
		$head = $data['Heading'];
		$uname = mysql_result(mysql_query("SELECT Name from client where clientid=$uid"), 0);

?>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	            <div class="box">
	                <div class="info">
	                    <h4 class="text-center"><?php echo $head; ?></h4>
	                    <p>
	                    	Address: <?php echo $address; ?><br>
	                    	City: <?php echo $city; ?><br>
	                    	Property Type: <?php echo ($prTypeIn==1 ? "Commercial":"Residential"); ?><br>
	                    	Sale or Rent: <?php echo ($saleTypeIn==1 ? "Sale":"Rent"); ?><br>
	                    	Price: <?php echo $cost; ?><br>
	                    	Plot Area: <?php echo $area; ?><br>
	                    	Owner: <?php echo $uname; ?> 
	                    </p>
	                    <a href="details.php?id=<?php echo $pid;?>" class="btn btn-success">View Complete Detail</a>
	                </div>
	            </div>
	        </div>
<?php

	}

?>
