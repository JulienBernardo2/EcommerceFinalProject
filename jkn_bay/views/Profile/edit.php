<html>
<head>
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	 <!--Bootstrap CSS --> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
	bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
	Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 

	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
	integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
	crossorigin="anonymous"></script>
	
	<!--Font-Awesome CSS-->
	 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="/css/editProfile.css"/>

	<!-- Scripts -->
			<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
        	</script>
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
	<title>Main Page</title>
		<div class="navbar">
				<?php if($_SESSION['role'] == 'buyer'){
		        	echo '
		        		<a class="nav-link" href ="/Product/indexBuyer">Home</a>
		        		<a class="nav-link" href ="/Profile/viewCart">Cart</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
					';
		        }else{
		        	echo '
		        		<a class="nav-link" href ="/Product/indexSeller">Home</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
		        	';
		        } ?>
			</div>


</head>
<body>
		<div class="col-md-5">
    		<div class="p-3 py-5">
				<div class = "left">
					<h1 class = "signup">Edit Profile</h1>
					<form action='' method='post' enctype="multipart/form-data">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name='username' value="<?= $data->username ?>">
						</div>

						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" name="first_name" value="<?= $data->first_name ?>">
						</div>
				</div>

				<div class = "right">
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" value="<?= $data->last_name ?>">
					</div>

					<div class="form-group">
						<label for="postal_code">Postal Code</label>
						<input type="text" class="form-control" id="postal_code" name="postal_code" value="<?= $data->postal_code ?>">
					</div>

					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city"value="<?= $data->city ?>">
					</div>

					<div class="form-group">
						<label>Profile Image:<input type="file" name="image" id="image" />
						</label><img id='image_preview' src='/images/blank.jpg' style="min-width:200px;min-height:200px" /><br>
					</div>

					<button type="submit" name='action' class="btn btn-primary">Save Changes</button>
					<br>		
				</div>
			</form>
    	</div>
	</div>

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
</body>
</html>