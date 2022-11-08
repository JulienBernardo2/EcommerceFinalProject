<!doctype html>
<html lang="en">
	<link rel="stylesheet" href="/css/style2.css"/>
	<head>
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
		<title>Home</title>

		<div class="navbar">
  <a href ="/Product/indexBuyer" class="active" href="#">Home</a> 
  <a href="#">Search</a> 
  <img src="/jknimage.png" alt="JKN" />
  <a href="#">About</a> 
  <a href="#">Profile</a> 
</div>
	</head>
	
	<body>
		

		<div>
		<div class="container1">
			<div class="container">
				<h1 class="display">JKN-Catelogue</h1>
				<div class="divCartOptions">
					<button class="btn btn-primary btn-purchase"a href ="/Profile/cart" type="button">CART</button>
						<i class="fa fa-book"></i>&nbsp&nbsp&nbsp&nbsp&nbsp
					</button>
					<button class="btn btn-primary btn-purchase" a href ="/Profile/indexBuyer" type="button">CATELOG</button>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</button>
				</div>
                <br><br>
				<div class="divSearchBar">
					<p class="text-white">
						Find Items:
						<input type="text" id="carSearchBar" name="Name" placeholder="Serach for Item">
						<button type="button" class="btn btn-dark btn-sm" onclick="searchByKeyword()">
							Search
							<i class="fa fa-search"></i>
						</button>
					</p>
				</div>
			</div>
		<div id="divAlert" class="alert alert-primary" role="alert">

		</div>
	</div>


	<div id="divMainContainer">
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
								                <a class='edit-button' href ='/Product/addToCart/$item->product_id'>
													<i class='fa fa-cart'></i>Add To Cart
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

    <br><br><br><br><br><br><br>	
</div>
</html>
</html>
