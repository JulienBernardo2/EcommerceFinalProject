<html>
	<header>
		<!-- Imports -->
    		<?php $this->view('header'); ?>


		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/Buyer/index.css"/>
			
		<!-- Set the name of category -->
	       	<script type="text/javascript">
				$(document).ready(
					function(){
						const url = window.location.href;
						const myArray = url.split("/");
						const lastVal = myArray.pop();
						const select = document.getElementById('category');
						
						if(lastVal == "None" || lastVal =="" || (lastVal!= 1 && lastVal!= 2 && lastVal!= 3 && lastVal!= 4)){
						}else{
							select.value = lastVal;
							}
					}
				);
				</script>

			<!-- Get the name of the filtered category -->	
	        	<script type="text/javascript">
	        		function changeURL(category_name){ 
	        			location.href = "/Profile/filterCategory/"+ category_name.value;	
	        		}
	        	</script>
		
		
		
		<title>Buyer Index</title>
		
		<!-- Nav -->
      		<?php $this->view('nav'); ?>
	</header>
	
	<body>
		
		<!-- Title of page -->
		<h1> <?= _("Catelog") ?> </h1>
				
		<!-- Search for products -->	
		<div class='search'>
			<form action='/Profile/search/' method="get">
				<div class="input-group rounded">
					<div class="form-outline">
						<input type="text" id="searchbar" class="form-control" name="searchbar" placeholder="Search" />
					</div>
				  
				  	<button name="action" class="btn btn-primary" id="searchIcon">
				    	<i class="fa fa-search"></i>
				  	</button>
				</div>
			</form>
		</div>

		<div class='filters'>
			<label> <?= _("Filter by Category:") ?>
				<select class='form-select' name='category' id='category' onchange='changeURL(this)'>
					<option selected> None </option>
					<?php
						foreach ($data['categorys'] as $category){
							echo "	
								<option id='category' value='$category->category_id'>$category->nicename</option>";

						}
					?>
				</select>
			</label><br>
		</div>

		<?php
			foreach($data['product'] as $item) {	
				if($item->status == 'selling'){
					echo"
						<div id='container'>	
							<div class='product-details'>					
								<h3>$item->name</h3>
								<span class='desc'>$item->description</span>
								<br><br>
								";
								if(isset($_SESSION['profile_id'])){
									echo "
											<div class='controls'>
										<a href='/Buyer/viewSeller/$item->profile_id' class='btn btn-primary'>
							   				<span class='buy'> " . _("View Seller") . "</span>
							 			</a>
							 		</div>
								
										
									<div class='controls'>
										<a class='btn btn-success' href='/Buyer/addToCart/$item->product_id'>
						   					<span class='buy'> " . _("Add to Cart") . "</span>
						 				</a>
									</div>
									";
								}		
						echo "		
							</div>
							
							<div class='product-image'>
								<img src='/images/$item->image' alt=''>
								
									<div class='info'>
										<h2> " . _("Details") . "</h2>
										
										<ul>
											<li><strong> " . _("Quality:") .  " </strong>$item->state </li>
											<li><strong>  " . _("In stock:") .  "</strong>$item->quantity</li>
											<li><strong> " . _("Price:") .  "</strong>$$item->price</li>
											<li><strong>Rating:</strong>$item->rating</li>
										</ul>
									</div>
							</div>
						</div>
					";
				}
				 else{
					continue;
				}
			}		
		?>
	</body>
</html>
