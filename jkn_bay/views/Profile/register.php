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
		
		<!--Font-Awesome -->	
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Scripts -->
			<script type="text/javascript" src="/js/popup.js"></script>

		<!-- Css file -->
			<link rel="stylesheet" href="/css/nav.css"/>
			<link rel="stylesheet" href="/css/Profile/register.css"/>

		<title>Sign Up</title>
	</head>

	<body>
		<!-- Nav Bar -->
			<div class="navbar"> 
				<a class="active" href ="/Buyer/index">Home</a>
				<img style='margin-right: 46%;' src="/images/jknimage.png" alt="JKN" />	
			</div>

			<h1 style="margin-left: 45%; margin-top: 2%;">Sign Up</h1>
			<h4 style="margin-left: 20%; margin-top: 2%;">When you register to a new account you get a one time use discount code for 20% off</h4>

		<!-- Form to allow user to sign up -->
			<form action='' method='post'>
				<div id="main" class='float-container'>
					<div class='float-child'>
						<label>Username</label>
						<input type="text" class="form-control" name='username' placeholder="Enter username"> 
					
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter Password">
				
						<label>Password Confirmation</label>
						<input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter Password">
			    
						<label>First Name</label>
						<input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
				
						<label>Last Name</label>
						<input type="text" class="form-control"  name="last_name" placeholder="Enter Last Name">
					</div>

					<div class='float-child'>
						<label>Postal Code</label>
						<input type="text" class="form-control" name="postal_code" placeholder="Enter Postal Code">
					
			  		<label for="city">City</label>
			  		<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">

						<div>
							Select Account Type<br>
							<label for="role_buy"> <input type="radio" id="role_buy" name="role" value="buyer"> Buyer</label><br>
							<label for="role_sell"> <input type="radio" id="role_sell" name="role" value="seller"> Seller</label>
						</div>

						<div>
							<label for="image_preview">Profile Pic</label>
							<input type="file" name="image" id="image" />
				  		<img id='image_preview' src='/images/blank.jpg' style="max-width:100px;max-height:100px"/><br>
						</div>

						<button style='margin-top: 6%;' type="submit" name='action' class="btn btn-success">Sign up</button>
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

		<!-- Display Image -->
		<script>
			image.onchange = evt => {
				const [file] = image.files
				if (file) {
		  		image_preview.src = URL.createObjectURL(file)
					}
			}

			file = "<?= $data->image ?>";
			if (file != "") {
			document.getElementById("image_preview").src = "/images/" + file;
			}
		</script>