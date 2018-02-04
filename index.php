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

	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rancho&effect=3d">

	<link rel="stylesheet" href="css/fontawesome.css" />
	<link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-3.3.7/dist/css/bootstrap-theme.css" rel="stylesheet">

	<!-- CSS Files -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/material-kit.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="./css/myCss.css" rel="stylesheet">

	<style>
		body{
			background-color: white;
		}
		.convertInputtoBox
        {
            background-color: white !important;
            color: black !important;
        }
	</style>
</head>

<body id="inBody" background="white">

	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- <a class="navbar-brand" href="#"><b>MOTITAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY</a></b> -->
			</div>
			<div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="jumbotron">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<img src="./img/index.jpg" alt="MNNIT Allahabad" style="width:100px;height:100px; margin-top:20px;">
					</div>
					<div class="col-md-6">
						<h2>DDPC PORTAL</h2>
						<p>Motilal Nehru National Institute of Technology, Allahabad</p>
					</div>
				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-sm-8">
				<div style="color:green;">
				</div>
				<div class="col-md-offset-6" style="margin-top: 50px;">
					<form class="form-group" action="login.php" method="post" >
						<h2 class="form-signin-heading">Please sign in</h2>
						<label for="inputEmail" class="sr-only">Username</label>
						<input type="text" name="reg_no" class="form-control border-input convertInputtoBox" placeholder="Username" required>
						<label for="inputPassword"  class="sr-only">Password</label>
						<input type="password" name="password" id="passWord" class="form-control border-input convertInputtoBox" placeholder="Password" required>
						<button class="btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
					</form>

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