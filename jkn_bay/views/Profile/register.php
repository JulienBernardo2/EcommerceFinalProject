<html>
	<head>

		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- Css file -->
			<link rel="stylesheet" href="/css/Profile/register.css"/>

		<title>Sign Up</title>
	</head>

	<body>

	<body>
		<!-- Nav Bar -->
			<div class="navbar"> 
				<a class="active" href ="/Buyer/index">Home</a>
				<img style='margin-right: 46%;' src="/images/jknimage.png" alt="JKN" />	
			</div>

		<!-- Form to allow user to sign up -->
			<form action='' method='post' enctype="multipart/form-data">
 			<h1>Sign Up</h1>

	 		<h4>When you register to a new account you get a one time use discount code for 20% off</h4>

			<div class="form-group-left">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="right form-control" id="password" name="password" placeholder="Enter Password">
			</div>

			<div class="form-group-left">
				<label for="passwordConf">Password Confirmation</label>
				<input type="password" class="form-control" id="passwordConf" name="password_confirmation" placeholder="Re-enter Password">
		    </div>

    		<div class="form-group">
				<label for="first_name">First Name</label>
				<input type="text" class="right form-control" id="first_name" name="first_name" placeholder="Enter First Name">
			</div>

			<div class="form-group-left">
    			<label for="last_name">Last Name</label>
    			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
 			</div>

 			<div class="form-group">
    			<label for="postal_code">Postal Code</label>
    			<input type="text" class="right form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code">
    		</div>

		    <div class="form-group-left">
	    		<label for="city">City</label>
	    		<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
	 		</div>

	 		<div class="form-group">
	  			Select Account Type
				<label for="role_buy"> <input type="radio" id="role_buy" name="role" value="buyer"> Buyer</label>
				<label for="role_sell"> <input type="radio" id="role_sell" name="role" value="seller"> Seller</label>
			</div>

			<div class="form-group-left">
				<label for="image_preview">Profile Picture</label>
				<input type="file" name="image" id="image" /><br>
	    		<img id='image_preview' src='/images/blank.jpg' style="max-width:200px; max-height:200px; min-height: 200px; min-width: 200px;"/><br>
			</div>

			<div class="form-group-button">
				<br><br>
				<button type="submit" name='action'class="btn btn-success">Sign up</button>	
			</div>
		</form>
	</body>
</html>

<!-- Display Image -->
		<script>
			image.onchange = evt => {
	  		const [file] = image.files
	  		if (file) {
	    		image_preview.src = URL.createObjectURL(file)
	  			}
			}
		</script>