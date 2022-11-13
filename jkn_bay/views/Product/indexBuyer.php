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
			<link rel="stylesheet" href="/css/style2.css"/>
		
		<!-- Scripts -->
			<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
        	</script>

        	<script type="text/javascript">
				$(document).ready(
					function(){
						const url = window.location.href;
						const myArray = url.split("/");
						const lastVal = myArray.pop();
						const select = document.getElementById('category');
								
							if(lastVal == "None" || (lastVal =="" || (lastVal != "1") || (lastVal != "2") || (lastVal != "3") || (lastVal != "4"))){
							} else{
								select.value = lastVal;
							}
						}
					);
			</script>

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
		
	</head>
	
	<body>
	
		<!-- Nav -->
			<div class="navbar">
				<?php 
				
				if(isset($_SESSION['username'])){
		        	echo '
		        		<a class="nav-link" href ="/Product/indexBuyer">Home</a>
		        		<a class="nav-link" href ="/Profile/viewCart">Cart</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
					';
		        }else{
		        	echo '
		        		<a class="nav-link" href ="/Product/indexBuyer">Home</a>
  						<img src="/jknimage.png" alt="JKN" />
		        		<a class="nav-link" href ="/Profile/index">Login</a>
		        		<a class="nav-link" href ="/Profile/register">Sign up</a>
		        	';
		        } ?>
			</div>

		<!-- Search for products -->	
			<form action='/Product/search/' method="get">
				<div class="input-group rounded">
					<div class="form-outline">
						<input type="text" id="searchbar" class="form-control" name="searchbar" placeholder="Search" />
					</div>
				  
				  	<button name="action" class="btn btn-primary">
				    	<i class="fa fa-search"></i>
				  	</button>
				</div>
			</form>

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

		<!-- Products to dsiplay -->
			<div id="divMainContainer">
				<h1>Catalog</h1>
					
				<?php
					foreach($data['product'] as $item){
						echo"
							<div class='wrapper'>
							    <div class=product-img>
									<img src='/images/$item->image' style='max-width:200px;max-height:200px'/>
							    </div>
							
							    <div class='product-info'>
								    <div class='product-text'>
										<h1>$item->name</h1>
										<h4>$item->state</h4>
										<p>$item->price</p><br>
							         	<p class='desc'>$item->description</p>
							         	<p class='desc'>In stock: $item->quantity</p>
							      	</div>
							      
							      	<div class='product-price-btn'>
							        	<a class='edit-button' href ='/Profile/addToCart/$item->product_id'>
											<i class='fa fa-cart'></i>Add To Cart
										</a>
							      	</div>
							    </div>
							</div>
						";
					}
				?>
			</div>
	</body>
</html>
