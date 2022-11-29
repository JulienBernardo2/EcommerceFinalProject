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

			 <!-- Alertify -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

		<!-- Scripts -->
			<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
        	</script>

        	<script type="text/javascript">
        		function prompt(reply_to, product_id, profile_id){
                alertify.prompt("Reply to buyer", "Message", '',
                  function(input, value){ 
                          if(value == ''){
                            value = null;
                          }
                          if (input){   
                            window.location.href = '/Message/reply/' + value +'/'+ parseInt(reply_to) +'/'+ parseInt(product_id) + '/' + parseInt(profile_id);
                          } else{
                            alertify.error('Cancel'); 
                          }
                  }, "");
            };
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
		        		<a class="nav-link" href ="/Product/indexSeller">Home</a>
			            <a class="nav-link" href ="/Message/indexSellerMes">Messages</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
	  					<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
			            <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/soldHistory">History</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
		        	';
		        ?>
			</div>

		<h1 class='title'>My Messages</h1>	

		<div class="order">
		<?php

						foreach($data as $item){
							echo "
											<div class='container'>
		    									<article class='card'>
		        									<div class='card-body'>
		            									<h6>Product: $item->name</h6>
		            									
		            									<article class='card1'>
									                		
									                		<div class='card-body row'>
									                    		<div class='card-body row'>
									                    			<div class='col'> <strong>Message:</strong><br>$item->message</div>
									                    			<div class='col'> <strong>Date and Time:</strong><br>$item->date_time</div>
									                    			<div class='col'> <strong>Sent from:</strong><br>$item->username</div>
									                			</div>
									                		</div>
								            			</article>
								            			<button onclick='prompt($item->message_id, $item->product_id, $item->profile_id)' class='btn btn-primary' style='margin-left: 90%;'>Reply</button>
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