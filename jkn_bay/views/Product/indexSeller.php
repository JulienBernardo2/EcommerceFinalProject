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
			<link rel="stylesheet" href="/css/nav.css"/>
			<link rel="stylesheet" href="/css/indexSeller.css"/>

		<!-- Scripts -->
			<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
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


			<title>Seller Page</title>
	</head>
		
	<body>	

		<!-- Nav -->
			<div class ="navbar">
				<?php if(isset($_SESSION['username'])){
			    	echo '
			     		<a class="nav-link" href ="/Product/indexSeller">Home</a>
			            <a class="nav-link" href ="/Message/indexSellerMes">Messages</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
	  					<img src="/jknimage.png" alt="JKN" />
			            <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/soldHistory">History</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
					';
			    }?>	
			</div>
			
		<!-- Title of page -->
		
			<div class="title">
				<h1 class="display">My Products</h1>
			</div>
		<div>
			<?php
					foreach($data['product'] as $item)

					{
						if($item->status == 'selling'){
							echo"
								<div id='container'>	
									<div class='product-details'>					
										<h1>$item->name</h1>
							 			
										<span class='desc'>$item->description</span	>
										
											<div class='controls'>
													<a class='btn' href='/Product/edit/$item->product_id'>
								   					<span class='shopping-cart'><i class='fa-duotone fa-pencil' aria-hidden='true'></i></span>
								   					<span class='buy'>Edit</span>
								 				</a>
											</div>

											<div class='controls'>
													<a class='btn' href='/Product/delete/$item->product_id'>
								   					<span class='shopping-cart'><i class='fa fa-trash' aria-hidden='true'></i></span>
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