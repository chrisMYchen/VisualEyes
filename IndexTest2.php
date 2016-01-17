<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>ThunderPunch</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
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
		<!--background-color:rgba(0,0,0,.2); -->
		color:white;
	}
	@-webkit-keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}

	@keyframes fadeIn {
		from{opacity: 0;}
		to{opacity:1;}
	}
  </style>

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	<div class="container">
		<div class="row">
			<div class="half column frontPage" style="margin-top: 25%">
				<h4><strong>ThunderPunch</strong></h4>
				<p style = "color:white">This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
			</div>
		</div>
		
		<div class = "row">
			<form id = "login">
					<div class="row">
						<div class="two columns">
							<label>Username</label>
							<input type="email" placeholder="Username" id="user"></input>
						</div>
						<div class="two columns offset-by-two">
							<label>Password</label>
							<input type="password" placeholder="Password" id="pass"></input>
						</div>
						
					</div>
					<button type="submit" class="button button-primary">Login</button>
			</form>
		</div>
	</div>
</body>
</html>
