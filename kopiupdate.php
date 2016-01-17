<?php

session_start();
if (!isset($_SESSION['userID']))
	header("Location:indextest.php");
var_dump($_SESSION);
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
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	
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
		background-image: url('images/landscape.jpg');
		background-size: cover;
		padding-bottom: 5rem;
	}
	.section {
		text-align: right;
	}
	.options{
		text-align:center;
	}
	
	textarea {
		color:black;
	}
	
  </style>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
		
		<div class = "row heading">
			<div class = "container">
				<div style = "margin-top:2%" class = "two columns">
					<a  class = "topbar" href = "home.php"> Return to Home </a>  
				</div>
				<div style = "margin-top:2%" class = "two offset-by-eight columns">
					<a  class = "topbar" href = "logout.php"> Log Out </a>  
				</div>
			</div>
		</div>
		<div style = "" class="row hero">
			<div class = "container">
				<div class="one-third column section">
					<h1> Update your progress <br>  </h1>
					<h1>  <br>   </h1>
					<h4> What's new? </h4>
				</div>
				<div class = "one-half column piano">
					<!--<img class="walk" src="images/walk.png"> -->
				</div>
			</div>
		</div>
		
		<div class = "row forms">
			
			
			
			<div class = "container">
				<div id = "kapi">
					
					<div class = "three columns tag">
						<table class="u-full-width">
						  <thead>
							<tr>
							  <th>Your Goals:</th>
							  <th>Current Progress:</th>
							  <th>Units:</th>
							  <th>Today's Training:</th>
							  <th> </th>
							</tr>
						  </thead>
						  <tbody>
						  <?php
							
								$conn = new mysqli("localhost", "ThunderPunch", "Power75", "ThunderPunch");
								$sql='SELECT goalName, goalUnit, Progress FROM goals WHERE userID=?';
								$stmt = $conn->prepare($sql);
								$stmt->bind_param('s',$_SESSION['userID']);
									
									if($stmt === false) {
									  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
									}
									
									$stmt->execute();
									$stmt->bind_result($goalName, $goalUnit, $currentValue);
									
									
									while($stmt->fetch()){	
									
										echo
											"<tr>"+
												"<td> $goalName </td>"+
												"<td> $currentValue  </td>" +
												"<td> $goalUnit  </td>"+
												"<td><form action = 'createGoals.php' method='GET'> <input type = 'text' /></td> <button class = 'button-primary' onClick = 'update(\"" . $goalName . "\"'>Update</button> </form>"+
											"</tr>";
											
									}

									$stmt->close();

						?>
							
						  </tbody>
						</table>
						
							
						<!-- if no goals set... display x -->
						<!-- get table of goals for user ... display  -->
					</div>
				
					</form>
				</div>
			</div>
			<!--
				<div class = "container ">
					<input id = "newGoal" type = "button"  value = "Add new goal"></input>
					<input type = "submit" value = "Submit goals"></input>
				</div>
			-->
			
			
		</div>
		

</body>

</html>