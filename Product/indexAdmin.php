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

			<link rel="stylesheet" href="/style.css"/>

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
				    					<a class="nav-link" href ="/Product/add">List a Product</a>
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
								<div class='row'>
									<div class='col-md-3'></div>
										<div class='product-top'>
											<img src='/images/$item->image' style='max-width:200px;max-height:200px'/>
												<div class='overlay'>
													<button type'button' class='btn btn-secondary' title=''>
														<i class='fa fa-pencil'></i>
													</button>
													<button type'button' class='btn btn-secondary' title=''>
														<i class='fa fa-trash'></i>
													</button>
												</div>
										</div>

										<div class='product-bottom text-center'>
												<h3>$item->name</h3><br>
												<h5>$item->price</h5><br>
												<h6>$item->state</h6><br>
										</div> 
									</div>	

							";
					}
				?>
			</div>
	</body>
</html>