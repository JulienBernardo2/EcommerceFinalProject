<html>
	<header>
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
			<link rel="stylesheet" href="/css/indexBuyer.css"/>
			<link rel="stylesheet" href="/css/nav.css"/>
		
		<!-- Scripts -->
			<!-- Timeout the message -->
				<script type="text/javascript">
	            	window.setTimeout(function() {
	                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
	                    	$(this).remove(); 
	                	});
	            	}, 3000);
	        	</script>
			
			<!-- Set the name of category -->
	        	<script type="text/javascript">
					$(document).ready(
						function(){
							const url = window.location.href;
							const myArray = url.split("/");
							const lastVal = myArray.pop();
							const select = document.getElementById('category');
							
								if(lastVal == "None" || lastVal =="" || (lastVal!= 1 && lastVal!= 2 && lastVal!= 3 && lastVal!= 4)){

								} else{
									select.value = lastVal;
								}
							}
						);
				</script>
			<!-- Get the name of the filtered category -->	
	        	<script type="text/javascript">
	        		function changeURL(category_name){
	        			let url = location.href; 
	        			location.href = "/Product/filterCategory/"+ category_name.value;	
	        		}
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
		
		<title>Buyer Page</title>
		
		<!-- Nav -->
			<div class="navbar">
				<?php 
				
				if(isset($_SESSION['username'])){
		        	echo '
		        		<a class="active" href ="/Product/indexBuyer">Home</a>
		        		<a  href ="/Profile/viewCart">Cart</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a  href ="/Profile/logout">Logout</a>
					';
		        }else{
		        	echo '
		        		<a  href ="/Product/indexBuyer">Home</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a  href ="/Profile/index">Login</a>
		        		<a href ="/Profile/register">Sign up</a>
		        	';
		        } ?>
			</div>	
	</header>
	
	<body>
		
		<!-- Title of page -->
		<div>
			<div class="title">
				<h1 class="display">Catelog</h1>
			</div>
		
		<!-- Search for products -->	
		<div class='search'>
			<form action='/Product/search/' method="get">
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
		<label> Filter by Category:
				<select name='category' id='category' onchange='changeURL(this)'>
					<option selected>None</option>
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
					foreach($data['product'] as $item)

					{	
			 			$profile = new \jkn_bay\models\Product();
			 			$profile = $profile->getUsername($item->product_id);
						echo"
								<div id='container'>	
									<div class='product-details'>					
										<h1>$item->name</h1>
								
										<button href ='/Product/addRating/$item->product_id' class='btn1' name='action'>
							   				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up' viewBox='0 0 16 16'>
							  					<path fill-rule='evenodd' d='M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z'/>
											</svg>
							 			</button>
							 
							 			<button class='btn2'>
							   				<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-down' viewBox='0 0 16 16'>
							  					<path fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z'/>
											</svg>
										</button>
							
										<p class = 'ratingNum'>Test</p>
							 			
										<span class='desc'>$item->description</span>
										
										
										<button class='btn'>
							   				<span class='buy'>Contact Seller</span>
							 			</button>
							
										
										<div class='control2'>
												<a class='btn' href='/Profile/addToCart/$item->product_id'>
							   					<span class='shopping-cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></span>
							   					<span class='buy'>Add to Cart</span>
							 				</a>
										</div>
									</div>
								
									<div class='product-image'>
										<img src='/images/$item->image' alt=''>
								
										<div class='info'>
											<h2>Details</h2>
											
											<ul>
												<li><strong>Quality: </strong>$item->state </li>
												<li><strong>In stock: </strong>$item->quantity</li>
												<li><strong>Price: </strong>$$item->price</li>
												<li><strong>Seller: </strong>$profile->username</li>
											</ul>
										</div>
									</div>
								</div>
							";
							}
			?>	
							</div>
	</body>
</html>
