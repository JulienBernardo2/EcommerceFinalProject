<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- Css file -->
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