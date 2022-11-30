<html>
	<head>	
		<!-- Jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

		<!-- Bootstrap JS -->
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
		<!-- Css file -->
			<link rel="stylesheet" href="/css/register.css"/>
			<link rel="stylesheet" href="/css/nav.css"/>
		
		<!-- Scripts -->
    		<script type="text/javascript" src="/js/popUp.js"></script>

    	<!-- Title of page -->
			<title>Sign up</title>

     	<!-- Message Pop ups -->
			<?php
				if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger" id="alert-message">
  						<a href="#" id='alert-message' class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['error'] ?>
					</div>
			<?php  }
				if(isset($_GET['message'])){ ?>
					<div class="alert alert-success" id="alert-message">
  						<a href="#"  class="close" data-dismiss="alert" aria-label="close">&times;</a>
  						<?= $_GET['message'] ?>
					</div>
			<?php  }
			?>
	</head>

	<body onload="timeout()">

		<!-- This is the navbar -->
		<div class="navbar"> 
			<a class="active" href ="/Product/indexBuyer">Home</a>
  			<img src="/jknimage.png" alt="JKN" />	
		</div>

		<form action='' method='post' enctype="multipart/form-data">
 			<h1>Sign Up</h1>
	 		<h4>When you register to a new account you get a one time use discount code for 20% off</h4>

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

	 		<div class="form-group">
	  			Select Account Type
				<label for="role_buy"> <input type="radio" id="role_buy" name="role" value="buyer"> Buyer</label>
				<label for="role_sell"> <input type="radio" id="role_sell" name="role" value="seller"> Seller</label>
			</div>

			<div class="form-group">
				<label for="image_preview">Profile Pic</label>
				<input type="file" name="image" id="image" />
	    		<img id='image_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px"/><br>
			</div>
			
			<button type="submit" name='action' value='Register' class="btn btn-success">Sign up</button>
		</form>
	</body>
</html>
