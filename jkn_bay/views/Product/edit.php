<html>
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

		<!--Font-Awesome CSS-->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/profileEdit.css"/>

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

		<title>Edit Product Page</title>

	</head>

	<body>
	
		<!-- Nav -->
			<div class ="navbar">
				<?php if(isset($_SESSION['username'])){
			    	echo '
			     		<a class="nav-link" href ="/Product/indexSeller">Home</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
	  					<img src="/jknimage.png" alt="JKN" />
			            <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
					';
			    }?>	
			</div>	

		<!-- Display Product Info -->
			<div class="container rounded bg-white mt-5 mb-5">
				<div class="row">
					<div class="col-md-3 border-right">
			
					</div>

					<div class="col-md-5 border-right">
			    		<div class="p-3 py-5">
			        		<div class="d-flex justify-content-between align-items-center mb-3">
				            	<h4 class="text-right">Product Settings</h4>
			        		</div>

							<div class = "left">
								<h1 class = "signup">Edit Product</h1>

								<form action='' method='post' enctype="multipart/form-data">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name='name' value="<?= $data['product']->name ?>">
									</div>

									<div class="form-group">
										<label for="description">Description</label>
										<input type="text" class="form-control" id="description" name="description" value="<?= $data['product']->description ?>">
									</div>
							</div>

							<div class = "right">
								<div class="form-group">
									<label for="price">Price</label>
									<input type="text" class="form-control" id="price" name="price" value="<?= $data['product']->price ?>">
								</div>

								<div class="form-group">
									<label for="quantity">Quantity</label>
									<input type="text" class="form-control" id="quantity" name="quantity" value="<?= $data['product']->quantity ?>">
								</div>

								<div class="form-group">
									<label for="state">State</label>
									<input type="text" class="form-control" id="state" name="state"value="<?= $data['product']->state ?>">
								</div>

								<div class="form-group">
						    			<label> Category:
										<select name='category' id='category' value=''>
												<option selected>None</option>
												<?php
													foreach ($data['categorys'] as $category){
														echo "	
																<option id='category' value='$category->category_id'>$category->nicename</option>";

												}
												?>
											</select>
									</label>
						    	</div>

								<div class="form-group">
									<label>Image:<input type="file" name="image" id="image" /></label><img id='image_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px" /><br>
								</div>

								<button type="submit" name='action' value='Register' class="btn btn-secondary">Save Changes</button>
							</div>

						</form>
			    	</div>


		<!-- Display Image -->
			<script>
				image.onchange = evt => {
		  		const [file] = image.files
		  		if (file) {
		    		image_preview.src = URL.createObjectURL(file)
		  			}
				}

				file = "<?= $data['product']->image ?>";
				if (file != "") {
				document.getElementById("image_preview").src = "/images/" + file;
				}
			</script>
	</body>
	
</html>