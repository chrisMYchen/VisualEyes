<?php
	session_start();
	$error = '';
	$redir = false;
	if(isset($_POST['createUser']) && isset($_POST['createPass']) && isset($_POST['confirmPass'])){
		$user = strip_tags($_POST['createUser']);	$user = htmlspecialchars($user);	$user = strtolower($user);
		$pass = strip_tags($_POST['createPass']);	$pass = htmlspecialchars($pass);
		$confpass = strip_tags($_POST['confirmPass']);	$confpass = htmlspecialchars($confpass);		
		if($pass != '' && $confpass != ''){
			$conn = new mysqli("localhost", "ThunderPunch", "Power75", "ThunderPunch");
			$sql = 'SELECT username FROM users WHERE username=?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s',$user);
			if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
			}
			$stmt->execute();
			$stmt->bind_result($userID);
			if($stmt->fetch()){
				$error = 'Username Already Taken';
			}
			else{
				if($pass == $confpass){
					$pass="150y03HitfPr0p33vP2n" . $pass;
					for($i =0; $i<1000;$i++){
						$pass = sha1($pass);
					}
					$sql = 'INSERT INTO users (username,password) VALUES (?,?)';
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('ss',$user, $pass);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
					}
					$stmt->execute();
					$sql='SELECT userID FROM users WHERE username=? && password=?';
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('ss',$user, $pass);
					if($stmt === false) {
					  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
					}
					$stmt->execute();
					$stmt->bind_result($userID);
					if($stmt->fetch()){
						$_SESSION['userID']=$userID;
						$redir=true;
					}
				}
				else{
					$error = 'Passwords do not match';
				}
			}
			$stmt->close();
		}
		$_POST['createPass'] = '';
		$_POST['confirmPass'] = '';
		if($redir == true){
			$redir = false;
			header('Location: home.php');
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
	
	.picture {
		background-image: url('images/CA.jpg');
		background-size: cover;
		color: #fff;
		padding-bottom: 5rem;
		width: 100%;
		
	}
	
	.frontPage{
		background-color:rgba(0,0,0,.5);
		box-shadow: 16px 16px 6px rgba(0,0,0,.8);
		padding: 32px;
		-webkit-border-radius: 16px;
		-moz-border-radius: 16px;
		border-radius: 16px;
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
	
	.this{
		color:black;
	}
	
	
  </style>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
		<div class = "row heading">
			<div class = "container">
				<div style = "margin-top:2%"class = "two columns offset-by-ten">
					<button class="button button-primary" ><a href="indextest.php" style="color:#FFFFFF"> Log In </a></button> 
				</div>
			</div>
		</div>
		<div class = "row">
			<div class="one-half column offset-by-three">
				<div>
					<h4> New to Visualsize? </h4>
					<h6> Create an account to access all the amazing features that ThunderPunch has to offer. You will be able to track your life progress and complete goals easier, all you need is to sign up!</h6>
				</div>
			</div>
		</div>
		<div class="row picture">
			<div class="one-half column offset-by-three" style="margin-top:5%">
				<form id = "createAccount" method="POST" action="createAccount.php">
					<div class="row">
						<div class="twelve columns">
							<?php
								if($error != ''){
									echo "<h4 style=\"color:#FF3333\">$error</h5>";
								}
							?>
							<h2>Create Your Account</h2>
						</div>
					</div>
					<div class="row">
						<div class="two columns">
							<label>Username</label>
							<input class="this" maxlength="16" type="text" placeholder="Username" name="createUser" value=<?php if(isset($user)) echo "".$user ?> >	</input>
						</div>
					</div>
					<div class="row">
						<div class="two columns">
							<label>Password</label>
							<input class="this" type="password" placeholder="Password" name="createPass"></input>
						</div>
					</div>
					<div class="row">
						<div class="three columns">
							<label>Confirm Password</label>
							<input class="this" type="password" placeholder="Confirm Password" name="confirmPass"></input>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns">
							<button class="button button-primary" id="createAccount">Create Account</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</body>
</html>