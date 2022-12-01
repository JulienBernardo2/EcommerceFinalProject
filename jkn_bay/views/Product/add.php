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

		<link rel="stylesheet" href="/css/nav.css"/>
		<link rel="stylesheet" href="/css/Product/addProduct.css"/>
		
		<title>Add Product</title>
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

			<!-- Nav -->
			<div class ="navbar">
				<?php
			    	echo '
			     		<a class="nav-link" href ="/Product/index">Home</a>
			            <a class="nav-link" href ="/Message/indexSellerMes">Messages</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
	  					<img src="/jknimage.png" alt="JKN" />
			            <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Product/soldHistory">History</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
					';
			    ?>	
			</div>


		
		<h1>Add your Product</h1>
		<div class="col-md-5">
    		<div class="p-3 py-5">
				<div class = "left">
					<form action='' method='post' enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Name: </label>
				    		<input type="text" class="form-group" id="name" name='name'>
				    	</div>

				    	<div class="form-group">
				    		<label for="desc">Description: </label>
				    		<input type="text" class="form-group" id="desc" name='description'>
				    	</div>

				    	<div class="form-group">
			    			<label for="price">Price: </label>
			    			<input type="number" step='0.01' class="form-group" id="price" name='price'>
						</div>

						<div class="form-group">
							<label for="quantity">Quantity in Stock: </label>
			    			<input type="number" class="form-group" id="quantity" name='quantity'>
			    		</div>

			    		<div class="form-group">
				    		<label> Filter by Category:
									<select name='category' id='category'>
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
							<p>Condition</p>
				    		<input type="radio" id="state_new" name="state" value="new">
							<label for="state_new">New</label>
				  			<input type="radio" id="state_used" name="state" value="used">
							<label for="state_used">Used</label>
				  		</div>
						
						<div class="form-group">
							<label for="image_preview">Image</label>
							<input type="file" name="image" id="image" />
				    		<img id='image_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px"/><br>
				    	</div>
			  			
			  			<button type="submit" name="action" class="btn btn-success">Add your new Product</button>
					</form>
				</div>
			</div>
		</div>
		<script>
			image.onchange = evt => {
		  		const [file] = image.files
		  	if (file) {
		    	image_preview.src = URL.createObjectURL(file)
		 	 	}
			}
		</script>		 
	</body>
</html>