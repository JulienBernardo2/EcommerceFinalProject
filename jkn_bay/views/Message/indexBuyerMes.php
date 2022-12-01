<html>
	<head>
		<!-- Jquery -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<!-- Bootstrap JS -->
			<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

		<!--Font-Awesome CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/nav.css"/>
			<link rel="stylesheet" href="/css/Message/messageView.css"/>

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
		        		<a class="active" href ="/Buyer/index">Home</a>
		        		<a  href ="/Buyer/viewCart">Cart</a>
		        		<a  href ="/Message/indexBuyerMes">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Buyer/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
		        ?>
			</div>

		<h1 class='title' style="margin-bottom: 5%;">My Messages</h1>	

		<?php
			foreach($data['discountM'] as $item){
							echo "
											<div class='container'>
		    									<article class='card' style='width: 70%; margin-left: 15%;'>
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

						$product_id_saved = 0;
						$message_id = 0;
						foreach($data['messages'] as $item){
							if($message_id == 0){
								$message_id = $item->message_id;
							}
							
							if($item->product_id != $product_id_saved && $product_id_saved != 0){
								echo'
									<button class="mbtn btn btn-primary turned-button" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;">Reply</button>
										</article>
										</div>
							    	</article>
							    	</div>	
									<br> 
								';
								$message_id = $item->message_id;
							}

							if($item->product_id != $product_id_saved){
							echo "
											<div class='container' style='margin-bottom: 15px'>
		    									<article class='card' style='width: 70%; margin-left: 15%;'>
		        									<div class='card-body'>
		            									<h6>Product: $item->name</h6>
		            									
		            									<article class='card1'>    		
								            
							";
							}
								echo"
											<div class='card-body row'>
								            	<div class='card-body row'>
													<div class='col'> <strong>Message:</strong><br>$item->message</div>
												    <div class='col'> <strong>Date:</strong><br>$item->date_time</div>
												    <div class='col'> <strong>Sent from:</strong><br>$item->username</div>
												</div>
								    		</div>
												
								            		
									";
							$product_id_saved = $item->product_id;
							$message_id = $item->message_id;	
						}
						if($data['messages'] != null){
						echo '
		<button class="mbtn btn btn-primary turned-button" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;">Reply</button>';
							
						}
		?>
	</body>

<!-- The modal -->
	<div id='modalDialog' class='modal' style="width:40%; margin-top: 5%; margin-left:30%;">
		<div class='modal-content animate-top'>
				<div class='modal-header' style="background-color: lightgrey;">
					<h5 class="modal-title">Reply</h5>
					<button type="button" class='btn' id="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
				</div>
				<form method="post" id="replyFrm">
					<div class="modal-body">
						<div class="response"></div>

						<div class="form-group">
							<label for="message">Enter Message</label>
							<input type="text" class="form-control" id="message" name="message">
						</div>
					</div>

					<div class="modal-footer">
							<button type="submit" name='action' id="submit" class="btn btn-success">Send</button>
					</div>	
				</form>
				
		</div>
	</div>
	<script>
		var message_id;
		var modal = $('#modalDialog');
		var span = $("#close");

		$(document).ready(function(){
			// $('#submit').click(function(e){
			// 	_message = $('#message').val();
			// 	$.ajax({
			// 		type: "POST",
			// 		url: "/Message/reply/" + message_id,
			// 		data: { message : _message }
			// 	});
			// 	modal.hide();
			// });

			$('.mbtn').click(function(e){
				message_id = $(this).attr('message_id');
				$('#replyFrm').attr('action', '/Message/reply/' + message_id);
				modal.show();

			});

			span.on('click', function(){
				modal.hide();
			});
		});
	</script>		
</html>