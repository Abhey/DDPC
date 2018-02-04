
<?php	include("includes/functions.php"); ?>
<nav class="navbar navbar-success navbar-fixed-top navbar-transparent" id="topnav" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="./">MNNIT</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<!-- <div class="navbar-form navbar-left" role="search" style="margin-top: 5px;">
						<div class="input-group col-md-6">
							<span class="input-group-addon">
								<i class="material-icons whiteColor">search</i>
							</span>
							<input type="text" class="form-control" onkeyup="searchItem(event)" id="searchBox" placeholder="Search property with location: City or locality..."  style="width: 300px;">
						</div>
					</div> -->
				</li>
			</ul>	

			<ul class="nav navbar-nav navbar-right ">
				<li><a href="#" id="ErrorPanel"></a></li>
				<li><?php if(checkUser($email)){ ?><a href="#" data-toggle="modal" data-target="#sellerModal">Sell / Rent </a><?php }else { ?> <a href="#" data-toggle="modal" onclick="bringDown('dummy')" data-target="#loadInfo"></a> <?php } ?></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?php echo $name; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="./dashboard.php">Dashboard</a></li>
						<?php if($isAdmin == '1') { ?>
					  
							<li><a href="#" data-toggle="modal" onclick="bringDown()" data-target="#AddNewEmployeeDiv">Add New Employee</a></li>

							<li><a href="#" data-toggle="modal" onclick="bringDown()" data-target="#AddNewDepartmentDiv">Add New Department</a></li>

							<li><a href="departments.php" >Admin Panel</a></li>

							<li><a href="lookup.php" >Edit Lookup</a></li>
					 
						<?php } ?>
					  <li><a href="#" data-toggle="modal" onclick="bringDown()" data-target="#loadInfo">Change Your Info</a></li>
					  <li class="divider"></li>
					  
					  <li class="divider"></li>
					  <li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<li>
