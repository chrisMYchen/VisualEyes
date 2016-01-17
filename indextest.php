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
  <style>
	body,html{
		height:100%;
	}
	body{
		background-image:url('images/background.jpg');
		background-size: cover:
		background-repeat: no-repeat;
		opacity: 1;
		-webkit-animation: fadeIn 4s;
		animation: fadeIn 4s;
	}
	.frontPage{
		background-color:rgba(0,0,0,.5);
		box-shadow: 16px 16px 6px rgba(0,0,0,.8);
		color:white;
		padding: 32px;
		-webkit-border-radius: 16px;
		-moz-border-radius: 16px;
		border-radius: 16px;
	}
	@-webkit-keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}

	@keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}
	input{
		color:black;
	}
  </style>

	<script src="jquery-2.1.3.min.js"></script>
	
	<script>
		$(function() {
			$("#loginButton").click(function(){
				$.post("login.php",
				{
					user: $("#user").val(),
					pass: $("#pass").val()
				},
				function(data, status){
					if(data==1)
						window.location.replace("home.php");
				});
			});
		});
		
		
	</script>
  
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	<div class="container">
		<div class="row">
			<div class="half column frontPage" style="margin-top: 10%">
				<h4 style = "color:#FFCC00"><strong>Visualsize</strong></h4>
				<p>This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
				<form id = "login">
					<div class="row">
						<div class="two columns">
							<label>Username</label>
							<input type="text" placeholder="Username" id="user"></input>
						</div>
						<div class="two columns offset-by-two">
							<label>Password</label>
							<input type="password" placeholder="Password" id="pass"></input>
						</div>
						
					</div>
					
				</form>
				<div class="row">
					<div class="three columns">
						<button class="button button-primary" id="loginButton">Login</button>
					</div>
					<div class="three columns offset-by-one">
						<button class="button button-primary" ><a href="createAccount.php" style="color:#FFFFFF">Create New Account</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
