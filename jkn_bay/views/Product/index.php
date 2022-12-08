<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/Product/index.css"/>
			<title>Seller Page</title>
	</head>
		
	<body>	
		<!-- Nav -->
    		<?php $this->view('nav'); ?>
	
		<h1 class="display">My Products</h1>
	
		<div>
			<?php
				foreach($data['product'] as $item){
					if($item->status == 'selling'){
						echo"
							<div id='container'>	
								<div class='product-details'>					
									<h3>$item->name</h3>
						 			
									<span class='desc'>$item->description</span	>
									<br><br>
									
										<div class='controls'>
												<a class='btn btn-primary' href='/Product/edit/$item->product_id'>
							   					<span class='buy'>Edit</span>
							 				</a>
										</div>

										<div class='controls'>
												<a class='btn btn-danger' href='/Product/delete/$item->product_id'>
							   					<span class='buy'>Delete</span>
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
											<li><strong>Rating: </strong>$item->rating</li>
										</ul>
									</div>
								</div>
							</div>
						";
					}
				}
			?>	
		</div>
	</body>		
</html>