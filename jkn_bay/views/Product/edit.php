<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>
			<link rel="stylesheet" href="/css/Product/editProduct.css"/>

			<script type="text/javascript">
				$(document).ready(
					function(){
						var stateOfProduct = "<?= $data['product']->state ?>";
								
						if(stateOfProduct == 'new'){
							const state = document.getElementById('state_new');
							state.checked = true;
						} else if(stateOfProduct == 'used'){
							const state = document.getElementById('state_used');
							state.checked = true;
						}

						var categoryOfProduct = "<?= $data['product']->category_id ?>";
						var category = document.getElementById('category');
						
						if(categoryOfProduct == null){
							category.value = 'None';
						} else if(categoryOfProduct == '1'){
							category.value = '1';
						} else if(categoryOfProduct == '2'){
							category.value = '2';
						} else if(categoryOfProduct == '3'){
							category.value = '3';
						} else if(categoryOfProduct == '4'){
							category.value = '4';
						} 
					}
				);
			</script>

		<title>Edit Product Page</title>

	</head>

	<body>
	
		<!-- Nav -->
	   		<?php $this->view('nav'); ?>

	   		<h1>Product Settings</h1>

		<!-- Display Product Info -->
					<div class="col-md-5 border-right">
			    		<div class="p-3 py-5">		
							<h2> Edit Product </h2>

								<form action='' method='post' enctype="multipart/form-data">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name='name' value="<?= $data['product']->name ?>">
									</div>

									<div class="form-group">
										<label for="description">Description</label>
										<input type="text" class="form-control" id="description" name="description" value="<?= $data['product']->description ?>">
									</div>
					
							<div class = "right">
								<div class="form-group">
									<label for="price">Price</label>
									<input type="text" min="0" step='0.01' class="form-control" id="price" name="price" value="<?= $data['product']->price ?>">
								</div>

								<div class="form-group">
									<label for="quantity">Quantity</label>
									<input type="text" min="0" class="form-control" id="quantity" name="quantity" value="<?= $data['product']->quantity ?>">
								</div>

								<div class="form-group" id='states'>
									<p>Condition</p>
						    		<input type="radio" id="state_new" name="state" value="new">
									<label for="state_new">New</label>
						  			<input type="radio" id="state_used" name="state" value="used">
									<label for="state_used">Used</label>
				  				</div>
								<div class="form-group">
						    			<label> Category:
										<select name='category' id='category' value=''>
												<option>None</option>
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

								<button type="submit" name='action' value='Register' class="btn btn-success">Save Changes</button>
							</div>

						</form>
			    	</div>
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

			file = "<?= $data['product']->image ?>";
			if (file != "") {
				document.getElementById("image_preview").src = "/images/" + file;
			}
	</script>