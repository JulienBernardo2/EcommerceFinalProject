<!doctype html>
<html lang="en">
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

		<!-- CSS -->
		<link rel="stylesheet" href="/css/Buyer/cart.css"/>
		<link rel="stylesheet" href="/css/nav.css"/>
		
		<title>Home</title>
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

		<div class="navbar">
		<?php {
			    	echo '
			     		<a class="active" href ="/Buyer/index">Home</a>
		        		<a  href ="/Buyer/viewCart">Cart</a>
		        		<a  href ="/Message/indexBuyerMes">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Buyer/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
			    }?>	

	</div>
	</head>
	
	<body>

	<h1>My Cart</h1>	

	<div id="divMainContainer">
		<table class="table table-striped">
			<tr><th></th><th>Name</th><th>Quantity</th><th>Unit Price</th><th>Product Price</th><th>Actions</th></tr>
				<?php

					foreach($data['product'] as $item)
					{	echo"	
								<tr><td id='image'><img src='/images/$item->image' style='max-width: 150px; max-height: 150px;'></td><td>$item->name</td><td>$item->qty</td><td>$item->price</td><td>" . 
									$item->qty * $item->price . "</td><td>
								<a href='/Buyer/removeFromCart/$item->order_detail_id' class='btn btn-danger'>Delete</a></td>
							";
					}
				?>
				<tr><th colspan=3>Sub Total
						<th class='discount'>Discount code: 
							<form action="/Discount/applyDiscount/<?= $_SESSION['profile_id'] ?>" method='post'>
								<input type="text" class="form-control" name='code' style='max-width: 200px;'>
								<button type="submit" name='action' id='action' class="btn btn-success">Apply</button></th>
							</form>
						<th id="sum"><?= $data['cart']->total ?></th>
						<th><a href='/Buyer/checkout/' class='btn btn-success'>Checkout</a></th></tr>
		</table>
	</div>
</div>
</html>
</html>
