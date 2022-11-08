<!doctype html>
<html lang="en">
	<link rel="stylesheet" href="/css/style.css"/>
	<head>
<?php
			if(isset($_GET['error'])){ ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['error'] ?>
				</div>
		<?php  }
			if(isset($_GET['message'])){ ?>
				<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['message'] ?>
				</div>
		<?php  }
		?>
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
		bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
		Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
		<title>Log in Page</title>

		<div class="navbar">
  <a href ="/Product/indexBuyer" class="active" href="#">Home</a> 
  <a href="#">Search</a> 
  <img src="/jknimage.png" alt="JKN" />
  <a href="#">About</a> 
  <a href="#">Profile</a> 
</div>
	</head>
	
	<body>
		

		<div>
			<div class="description">
  				<h1 class="title" >Welcome to JKN-Bay</h1>
  				<p>
  					The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
  					<br></br>
  					The company, which caters to individual sellers and small businesses, is a market leader in e-commerce worldwide. JKN-Bay is headquartered in Montreal, Canada. Customers can participate in Web sites set up within their own country or use one of the company's international sites.
  				</p>
  			</div>

			<h1>Log-In</h1>
		
<div class ="line">
  			</div>
		<form action='' method='post'>
			<div class="form-group1">
    			<label for="username">Username</label>
    			<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
  			</div>

  			<div class="form-group2">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  			</div>

  			<br>
  			<br>
  			<button type="submit" name='action' value='Login' class="btn btn-primary">Login</button>
  			<br>
		</form>

		<p>Don't have an Account? <a href ="/Profile/register">Sign Up</a></p>
	</body>
</div>
</html>
</html>

