<!doctype html>
<html lang="en">
	
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<link rel="stylesheet" href="/css/Product/addProduct.css"/>
		
		<title>Add Product</title>
	</head>
		<body>

			<!-- Nav -->
	    		<?php $this->view('nav'); ?>

		<h1>Add your Product</h1>
		<div class="col-md-5">
	    	<div class="p-3 py-5">
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
			    		<input type="number" min="0" step='0.01' class="form-group" id="price" name='price'>
					</div>

					<div class="form-group">
						<label for="quantity">Quantity in Stock: </label>
			    		<input type="number" min="0" class="form-group" id="quantity" name='quantity'>
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
	</body>
</html>

<script>
	image.onchange = evt => {
		const [file] = image.files
	  	if (file) {
	    	image_preview.src = URL.createObjectURL(file)
	 	 	}
		}
</script>		 