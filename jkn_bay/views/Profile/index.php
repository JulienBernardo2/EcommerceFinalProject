<html>
	<head>
		<!-- Jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap Css --> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

		<!-- Bootstrap JS -->
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<!-- Alertify -->
			<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
			<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		
		<!-- Font-Awesome -->
			<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

		<!-- Scripts -->
			<script type="text/javascript" src="/js/popup.js"></script>

		<!-- Css file -->
			<link rel="stylesheet" href="/css/nav.css"/>
			<link rel="stylesheet" href="/css/Profile/login.css"/>

		<title>Log in Page</title>
	</head>

	<body>
		<!-- This is the navbar -->
			<div class="navbar"> 
				<a href ="/Buyer/index">Home</a>
	  			<img id='imageJKN' src="/images/jknimage.png" alt="JKN" />	
			</div>

		<!-- Form to allow user to login -->
			<form action='' method='post'>
				<div id="main" class='float-container' style="margin-top: 5%;">
					<div class='float-child'>
						<h2 style="margin-bottom: 3%;">Login</h2>

						<label>Username</label>
						<input type="text" name='username' class="form-control" style='max-width: 60%;  margin-bottom: 5%; '/>

						<label>Password</label>
						<input type="password" name='password' class="form-control" style='max-width:60%;  margin-bottom: 5%;'/>

						<button type="submit" name='action' class='btn btn-primary'  style='margin-left: 48%;' value='Login'>Login</button>
						<p style="margin-top: 2%; margin-left: 20%;">Don't have an account? <a href ="/Profile/register">Sign Up</a></p>
					</div>

					<div class='float-child'>
						<h2>Welcome to JKN Bay</h2>
						<p>
							The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
							<br></br>
							The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
						</p>
					</div>
				</div>
			</form> 
	</body>
</html>

	<!-- PopUp Acceptances -->
		<?php
		if(isset($_GET['message'])){
			echo"<script>popUpSuccess('$_GET[message]');</script>";
		}
		?>

		<?php
		if(isset($_GET['error'])){
			echo"<script>popUpError('$_GET[error]');</script>";
		}
		?>