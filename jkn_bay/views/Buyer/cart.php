<!doctype html>
<html lang="en">
	<head>

		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- CSS -->
		<link rel="stylesheet" href="/css/Buyer/cart.css"/>
		
		
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
	</head>


	
	<body>

		<!-- Nav -->
    		<?php $this->view('nav'); ?>

	<h1> <?= _("My Cart") ?> </h1>	

	<div id="divMainContainer">
		<table class="table table-striped">
			<tr><th></th><th> <?= _("Name") ?> </th><th> <?= _("Quantity") ?> </th><th> <?= _("Unit Price") ?> </th><th> <?= _("Product Price") ?> </th><th> <?= _("Actions") ?> </th></tr>
				<?php

					foreach($data['product'] as $item)
					{	echo"	
								<tr><td id='image'><img src='/images/$item->image' style='max-width: 150px; max-height: 150px;'></td><td>$item->name</td><td>$item->qty</td><td>$item->price</td><td>" . 
									$item->qty * $item->price . "</td><td>
								<a href='/Buyer/removeFromCart/$item->order_detail_id' class='btn btn-danger'>Delete</a></td>
							";
					}
				?>
				<tr><th colspan=3> <?= _("Sub Total") ?> 
						<th class='discount'> <?= _("Discount code:") ?>  
							<form action="/Discount/applyDiscount/<?= $_SESSION['profile_id'] ?>" method='post'>
								<input type="text" class="form-control" name='code' style='max-width: 200px;'>
								<button type="submit" name='action' id='action' class="btn btn-success"> <?= _("Apply") ?> </button></th>
							</form>
						<th id="sum"><?= $data['cart']->total ?></th>
						<th><a href='/Buyer/checkout/' class='btn btn-success'> <?= _("Checkout") ?> </a></th></tr>
		</table>
	</div>
</div>
</html>
</html>
