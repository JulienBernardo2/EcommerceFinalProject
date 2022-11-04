<!doctype html>
<html lang="en">
	
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

		<h1>Sign up</h1>

		<form action='' method='post'>
    		<label for="username">Username</label>
    		<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
    		<br>

    		<label for="password">Password</label>
    		<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  			<br>

  			
    		<label for="passwordConf">Password Confirmation</label>
    		<input type="password" class="form-control" id="passwordConf" name="password_confirmation" placeholder="Re-enter Password">
  			<br>

  			
    		<label for="first_name">First Name</label>
    		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
  			<br>

  			<label for="last_name">Last Name</label>
    		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
  			<br>

  			<label for="postal_code">Postal Code</label>
    		<input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code">
  			<br>
  			
    		<label for="city">City</label>
    		<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
  			<br>
			
			<p>Select Account Type</p>
    		<input type="radio" id="role_buy" name="role" value="buyer">
			<label for="role_buy">Buyer</label>
  			<input type="radio" id="role_sell" name="role" value="seller">
			<label for="role_sell">Seller</label>
  			<br>

  			<button type="submit" name='action' value='Register' class="btn btn-primary">Sign up</button>
  			<br>
		</form>
	</body>
</html>