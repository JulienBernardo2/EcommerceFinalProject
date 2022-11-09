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

		<!--Font-Awesome CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title>Home</title>

		<div class="navbar">

		  <?php if(isset($_SESSION['username'])){
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
	</head>
	
	<body>

	<div id="divMainContainer">
		<h2>My Cart</h2>

		<table class="table table-striped">
			<tr><th></th><th>Name</th><th>Quantity</th><th>Unit Price</th><th>Product Price</th><th>Actions</th></tr>
				<?php
					$sum = 0;

					foreach($data as $item)

					{
						echo"
								<tr><td><img src='/images/$item->image'/ style='max-width= 200px'></td><td>$item->name</td><td>$item->qty</td><td>$item->price</td><td>" . $item->qty * $item->price . "</td><td>
								<a href='/Profile/removeFromCart/$item->order_detail_id' class='btn btn-danger'>Delete</a></td>
							";
							$sum += $item->qty * $item->price;
					}
				?>
				<tr><th colspan=4>Sub Total<th><?= $sum ?></th><th><a href='/Profile/checkout/' class='btn btn-success'>Checkout</a></th></tr>
		</table>
	</div>
</div>
</html>
</html>
