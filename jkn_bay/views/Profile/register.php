<!doctype html>
<html lang="en">
	<link rel="stylesheet" href="/css/Profile.css"/>
	<head>
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

		<title>Register a new user</title>

	
	</head>

	<body>
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
		<div>
<div class="navbar">
  <a class="active" href="#">Home</a> 
  <a href="#">Search</a> 
  <img src="/jknimage.png" alt="JKN" />
  <a href="#">About</a> 
  <a href="#">Profile</a> 
</div>
<div class = "left">
		<h1 class = "signup">Sign up</h1>
<form action='' method='post'>
			<div class="form-group">
    			<label for="username">Username</label>
    			<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
  			</div>

  			<div class="form-group">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  			</div>
			<div class="form-group">
    			<label for="passwordConf">Password Confirmation</label>
    			<input type="password" class="form-control" id="passwordConf" name="password_confirmation" placeholder="Re-enter Password">
  			</div>
  			<div class="form-group">
    			<label for="first_name">First Name</label>
    		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
  			</div>
  		</div>
  			<div class = "right">
  			<div class="form-group">
    			<label for="last_name">Last Name</label>
    		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
  			</div>
  			<div class="form-group">
    			<label for="postal_code">Postal Code</label>
    		<input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code">
  			</div>
  			<div class="form-group">
    			<label for="city">City</label>
    		<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
  			</div>
  			<div class="accounttype">
  			Select Account Type
  			<br>
  			<br>
    		<input type="radio" id="role_buy" name="role" value="buyer">
			<label for="role_buy">Buyer</label>
  			<input type="radio" id="role_sell" name="role" value="seller">
			<label for="role_sell">Seller</label>

  			<br>
  			<br>
  			</div>
				<button type="submit" name='action' value='Register' class="btn btn-secondary">Sign up</button>
  			<br>
  		
  		</div>
		</form>
	</body>
</div>
</html>
