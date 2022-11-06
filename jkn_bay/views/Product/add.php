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
		
		<h1>Add your Product</h1>

		<form action='' method='post' enctype="multipart/form-data">
			<label for="name">Name</label>
    		<input type="text" class="form-control" id="name" name='name'>
    		<br>

    		<label for="desc">Description</label>
    		<input type="text" class="form-control" id="desc" name='description'>
    		<br>

    		<label for="price">Price</label>
    		<input type="number" class="form-control" id="price" name='price'>
			<br>

			<label for="quantity">Quantity in Stock</label>
    		<input type="text" class="form-control" id="quantity" name='quantity'>
    		<br>

			<p>Condition</p>
    		<input type="radio" id="state_new" name="state" value="new">
			<label for="state_new">New</label>
  			<input type="radio" id="state_used" name="state" value="used">
			<label for="state_used">Used</label>
  			<br>
			
			<label for="image_preview">Image</label>
			<input type="file" name="image" id="image" />
    		<img id='image_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px"/><br>
  			
  			<button type="submit" name="action" class="btn btn-primary">Add your new Product</button>
		</form> 

		<a id="backBtn" href='/Product/indexAdmin'>Back</a>

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