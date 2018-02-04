<!-- Index Page with Login Form -->

<!-- session.php checks if a session already exists. -->
<?php
	include("./includes/session.php");
	$invalid = 0;

	// If the login details do not match with any entry in the database.
	if(isset($_GET['invalid']))
	{
		$invalid = $_GET['invalid'];
		if($invalid == '1')
			echo "<script>alert('Invalid Details');</script>";
	}
?>
<!-- 
<!-- HTML code -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MNNIT - DDPC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rancho&effect=3d">
	
	<link rel="stylesheet" href="css/fontawesome.css" />

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="inBody">

	<!-- Modal Core -->
	<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
	 	<div class="modal-dialog">
	    	<div class="modal-content background-image">
	      		<div class="modal-body">
					<div class="col-md-12" style="margin-top:30px;">
						<!-- The Login Form -->
		        		<form action="login.php" method="post">
						  	<div class="form-group label-floating">
								<label class="control-label">Id</label>
								<input type="text" name="reg_no" class="form-control">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
				  			<button type="submit" name="login" class="btn btn-default whiteColor" style="margin-left:200px;">Log In</button>
						</form>
					</div>
	     		</div>
			    <div class="modal-footer">
			    </div>
	    	</div>
	  	</div>
	</div>

	<!-- Signer Button  Ends-->

	<div class="wrapper">
		
		<div class="main" id="mainBox">
			<div class="container" >
				<!-- <h1 class="font-effect-3d"></h1> -->
				<div class="col-md-3">
					<a href="#" class="btn btn-raised" id="logger" data-toggle="modal" data-target="#studentModal">
						LogIn
					</a>
				</div>
			</div>
		</div>
	</div>


</body>

	<!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>
	<script type="text/javascript">
		$(".success-alert").fadeTo(2000, 500).slideUp(500, function(){
		    $(".success-alert").alert('close');
		});

	</script>
</html>