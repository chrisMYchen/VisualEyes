<?php
session_start();
/*
if (!isset($_SESSION['userID']))
	header("Location:indextest.php");
*/
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
		background-image: url('images/mountain.jpg');
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
			<!--goal wizard:
					property ... 
					width/distance/weight/energy (cal)/
					increase/decrease 
					current:
					end goal: #
					volume:
					distance
					body fat
					lose x amount of weight
					get mile down to certain x time
					gain x weight
					measurements 
					waist
					bicep 
					chest width
					calf width
					
					
					goal name (have defaults and allow for ur own?):
					type:
					current:
					end goal:
					comments:
					-->
		<div class = "row heading">
			<div class = "container">
				<div style = "margin-top:2%" class = "two columns">
					<a  class = "topbar" href = "home.php"> Return to Home </a>  
				</div>
				<div style = "margin-top:2%" class = "two columns offset-by-six">
					Welcome <?php echo $usern; ?>
				</div>
				<div style = "margin-top:2%" class = "two columns">
					<a  class = "topbar" href = "logout.php"> Log Out </a>  
				</div>
			</div>
		</div>
		<div style = "" class="row hero">
			<div class = "container">
				<div class="one-third column section">
					<h1> Set your goals <br>  </h1>
					<h1>  <br>   </h1>
					<h4> Plan your success </h4>
				</div>
				<div class = "one-half column piano">
					<!--<img class="walk" src="images/walk.png"> -->
				</div>
			</div>
		</div>
		
		<div class = "row forms">
			
			<form action = "createGoals.php" method="GET">
			<div class = "container">
				<div id = "kapi">
					<div class = "three columns tag">
						<h4> Goal Name: </h4>
						<h6> Example: Run</h6>
						<input type = "text" required name = "goalname[]" placeholder = "Goal Name">
					</div>
					<div class = "nine columns input">
						<h4> Specifications: </h4>
						<h6> Type: Length, Current: 0 km, End: 100 km, Comments: I want to run 100 km by the end of this month.</h6>
						<select required name = "type[]">
							<option value = "" disabled selected > Select your unit type </option>
							<option value="distance">Distance</option>
							<option value="mass">Mass (weight)</option>
							<option value="energy">Energy (calories)</option>
						</select>
						<input  type = "text" name = "current[]" placeholder = "Current measure">
							
						</input>
						<input type = "text" name = "end[] placeholder = "End goal">
							
						</input>
						<textarea rows="4" cols="70" placeholder = "What extra notes do you want to keep?"></textarea>
					</div>
				</div>
			</div>
				<div class = "container ">
					<input id = "newGoal" type = "button"  value = "Add new goal"></input>
					<input type = "submit" value = "Submit goals"></input>
				</div>
			</form>
			
		</div>
		
		
	<script>
		
		document.getElementById("newGoal").onclick = function() {newGoal()};
		
		function newGoal(){
			document.getElementById("kapi").innerHTML = document.getElementById("kapi").innerHTML +
					"<div class = 'kapi'>" +
					"<div class = 'three columns tag'>" + 
						"<input type = 'text' required name = 'goalname[]'  placeholder = 'Goal Name'> "+
					"</div>"+ 
					"<div class = 'nine columns input'> "+
					
						"<h6> Type: Length, Current: 0 km, End: 100 km, Comments: I want to run 100 km by the end of this month.</h6> "+
						"<select required name = 'type[]'> "+
							"<option value = '' disabled selected > Select your unit type </option> "+
							"<option value='distance'>Distance</option>"+
							"<option value='mass'>Mass (weight)</option> "+
							"<option value='energy'>Energy (calories)</option> "+
						"</select>"+
						"<input type = 'text' name = 'current[]' placeholder = 'Current measure'>"+
							
						"</input>"+
						"<input type = 'text' name = 'end[]' placeholder = 'End goal'>"+
							
						"</input>"+
						"<textarea rows='4' cols='70' placeholder = 'What extra notes do you want to keep?'></textarea>"+
					"</div>"+
				"</div>"
		}
	</script>

</body>


</html>