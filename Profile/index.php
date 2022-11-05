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

		<link rel="stylesheet" href="/style.css"/>
		<title>Log in Page</title>

	</head>
	
	<body class="ProfileBody">
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
			<h1>Welcome to JKN-Bay</h1>
		</div>

		<form action='' method='post'>
			<div class="formFormat">
	    			<label for="username">Username</label>
	    			<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
	  			<br>

	    			<label for="password">Password</label>
	    			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
	  			<br>
	  			<br>
	  			<button type="submit" name='action' value='Login' class="btn btn-primary">Login</button>
	  			<br>
	  			<br>
	  			<p>Don't have an Account? <a href ="/Profile/register">Sign Up</a></p>
	  			<br>
  			</div>
		</form>

		
	</body>

</html>