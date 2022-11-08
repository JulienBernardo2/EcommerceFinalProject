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

			<link rel="stylesheet" href="/css/style.css"/>

			<title>Main Page</title>

			<!--Font-Awesome CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    			<div class="navbar-collapse">
        			<ul class="navbar-nav">
            			<li class="nav-item">
                			<a class="nav-link" href ="/Publication/index">Main Page</a>
            			</li>
           	        </ul>
        			<ul class="navbar-nav ml-auto">
            			<?php if(isset($_SESSION['username'])){
            				echo '	<li class="nav-item">
                						<a class="nav-link" href ="/Profile/logout">Logout</a>
            						</li>
									<li class="nav-item">
				    					<a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
				  					</li>
				  					<li class="nav-item">
				    					<a class="nav-link" href ="/Product/add">New Product</a>
				  					</li>';
            			} ?>
           	        </ul>
    			</div>
			</nav>

			<div class="container">
				<h2>My Products</h2>
				<?php
					foreach($data['product'] as $item)

					{
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
								         <div class='rating'>
								               <span><i class='fa fa-star'></i></span>
								               <span><i class='fa fa-star'></i></span>
								               <span><i class='fa fa-star'></i></span>
								               <span><i class='fa fa-star'></i></span>
								               <span><i class='fa fa-star-half-alt'></i></span>  
								               <span>(250 rating)</span>
								         </div>
								         <p class='desc'>$item->description</p>
								         <p class='desc'>In stock: $item->quantity</p>
								      </div>
								      <div class='product-price-btn'>
								                <a class='edit-button' href ='/Product/edit/$item->product_id'>
													<i class='fa fa-pencil'></i>Edit Product
												</a>
								                <a class='delete-button' href ='/Product/delete/$item->product_id'>
													<i class='fa fa-trash'></i>Delete Product
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