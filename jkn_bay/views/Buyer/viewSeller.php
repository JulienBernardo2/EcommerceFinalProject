<html>
	<header>
		<!-- Imports -->
    		<?php $this->view('header'); ?>


			<link rel="stylesheet" href="/css/Buyer/index.css"/>
			<link rel="stylesheet" href="/css/Buyer/viewSeller.css"/>	
		
		<title>View Seller</title>
		
		<!-- Nav -->
	   		<?php $this->view('nav'); ?>
	</header>
	<body>
		<div class="container rounded bg-white mt-5 mb-5">
	    	<div class="row">
	        	<div id = "profileMenu" class=" border-right">
	            	<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" style ="width: 200px; height: 200px;" src="/images/<?= $data['profile']->image?>"><span class="firstName"><?=$data['profile']->first_name?></span>			<span class="text-black-50"><?=$data['profile']->last_name?></span><span> </span></div>Seller Rating: <span class="text-black-50"><?=$data['profile']->ratingSeller?></span>
	        	</div>

	        	<div class="col-md-3">
	                <h4 class="text-right"> <?= _("Products") ?> </h4>
	                <?php
	                    foreach($data['products'] as $item){
	                    	if($item->status == 'selling'){
								echo"
									<div id='container'>	
										<div class='product-details'>					
											<h1 id='nameI'>$item->name</h1>	
															 	
											<span class='desc'>$item->description</span>		
											<a href='/Message/contactSeller/$item->profile_id/$item->product_id' class='btn btn-primary'>
										   				<span class='buy'> " . _("Contact Seller about product") . "</span>
										 	</a>
																				
											<div class='control2'>
												<a class='btn btn-success' href='/Buyer/addToCart/$item->product_id'>
													<span class='buy'> " . _("Add to Cart") . "</span>
										 		</a>
											</div>
										</div>
											
										<div class='product-image'>
											<img src='/images/$item->image' alt=''>
											
												<div class='info'>
													<h2> " . _("Details") . "</h2>
													
													<ul>
														<li><strong> " . _("Quality:") . "</strong>$item->state </li>
														<li><strong> " . _("In stock:") . "</strong>$item->quantity</li>
														<li><strong> " . _("Price:") . "</strong>$$item->price</li>
													</ul>
												</div>
										</div>
									</div>
								";
							}
						}
					?> 
				</div>
			</div>
		</div>
	</body>
</html>