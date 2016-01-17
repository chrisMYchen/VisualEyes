<?php
	session_start();
	if(isset($_SESSION['userID']) && $_SESSION['userID'] > -1){
		$conn = new mysqli("localhost", "ThunderPunch", "Power75", "ThunderPunch");
		$sql = 'SELECT username FROM users WHERE userID=?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s',$_SESSION['userID']);
		if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		}
		$stmt->execute();
		$stmt->bind_result($usern);
		if($stmt->fetch()){
			$error = 'Username Already Taken';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>ThunderPunch</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
	
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

	<link rel="icon" type="image/png" href="images/favicon.png">



	<script src="jquery-2.1.3.min.js"></script>
	 <style>
	 body {
		width:100%;
	 }
	.values {
		background-image: url('../images/values-bg.jpg');
		background-size: cover;
		color: #fff;
		padding-bottom: 5rem;
	}
	.hero {
		background-image: url('images/jogging.jpg');
		background-size: cover;
		padding-bottom: 5rem;
	}
	.section {
		text-align: right;
	}
	.options{
		text-align:center;
	}
	
  </style>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
		<div class = "row heading">
			<div class = "container">
				<span> 	<?php if(isset($_SESSION['userID']) && $_SESSION['userID'] > -1){
								echo '<div style="margin-top:2%;" class="two columns offset-by-eight">Welcome '.$usern. '</div><div style="margin-top:2%;" class = "two columns"><a class = "topbar" href = "logout.php"> Log Out </a></div>';
							} 
							else{
								echo'<div style="margin-top:2%;" class="three columns offset-by-nine"><button class="button button-primary" ><a href="indextest.php" style="color:#FFFFFF"> Log In </a></button></div>';
							} ?></span>
			</div>
		</div>
		<div style = "" class="row hero">
			<div class = "container">
				<div class="one-third column section">
					<h1> Welcome. <br>  Willkomen. </h1>
					<h1> Bienvenidos. <br>  Bienvenue. </h1>
					<h4> Your fitness tracker for the average person. </h4>
				</div>
				<div class = "one-half column piano">
					<!--<img class="walk" src="images/walk.png"> -->
				</div>
			</div>
		</div>
		
		<div class = "row options">
			<div class = "container">
				<div class = "one-third column newstats">
					<h4> <a href = "goals.php"> Set your goals </a> </h4>
					<h6> Plan your success. </h6>
				</div>
				<div class = "one-third column newstats">
					<h4> <a href = "update.php"> Update your activity </a> </h4>
					<h6> Work towards your goals and fitness health.</h6>
				</div>
				<div class = "one-third column yourstats">
					<h4> <a href = ""> Track your stats </a> </h4>
					<h6> Your fitness history with realtime stat tracking and smart analysis.</h6>
				</div>
			</div>
		</div>
		
		<div class = "row tutorial">
			<h3> 
		</div>
	
</body>
</html>