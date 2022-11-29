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
			<link rel="stylesheet" href="/css/messageView.css"/>

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


			<title>Order History</title>
	</head>
		
	<body>	

		<!-- Nav -->
			<div class ="navbar">
				<?php
				echo '
		        		<a class="active" href ="/Product/indexBuyer">Home</a>
		        		<a  href ="/Profile/viewCart">Cart</a>
		        		<a  href ="/Message/indexBuyerMes">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Profile/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
		        ?>
			</div>

		<h1 class='title'>My Messages</h1>	

		<div class="order">
		<?php

						foreach($data['discountM'] as $item){
							echo "
											<div class='container'>
		    									<article class='card'>
		        									<div class='card-body'>
		            									<h6>Discount</h6>
		            									
		            									<article class='card1'>
								                		
								                		<div class='card-body row'>
								                    		<div class='card-body row'>
								                    			<div class='col'> <strong>Message:</strong><br>$item->message</div>
								                    			<div class='col'> <strong>Date and Time:</strong><br>$item->date_time</div>
								                			</div>
								                		</div>
								            	</article>
								            	<hr style='display:inline-block'>
									        	<ul class='row'>
									        	</ul>
						 						</hr>
				        					</div>

							    			</article>
										</div><br> 	
									";
						}

						foreach($data['messages'] as $item){
							echo "
											<div class='container'>
		    									<article class='card'>
		        									<div class='card-body'>
		            									<h6>Product: $item->name</h6>
		            									
		            									<article class='card1'>
								                		
								                		<div class='card-body row'>
								                    		<div class='card-body row'>
								                    			<div class='col'> <strong>Message:</strong><br>$item->message</div>
								                    			<div class='col'> <strong>Date:</strong><br>$item->date_time</div>
								                    			<div class='col'> <strong>Sent to:</strong><br>$item->username</div>
								                			</div>
								                		</div>
								            	</article>
								            	<hr style='display:inline-block'>
									        	<ul class='row'>
									        	</ul>
						 						</hr>
				        					</div>

							    			</article>
										</div><br> 	
									";
						}
		?>
	</div>
	</body>		
</html>