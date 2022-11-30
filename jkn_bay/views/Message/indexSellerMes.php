<html>
	<head>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
		        		<a class="nav-link" href ="/Product/indexSeller">Home</a>
			            <a class="nav-link" href ="/Message/indexSellerMes">Messages</a>
			            <a class="nav-link" href ="/Product/add">New Product</a>
	  					<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
			            <a class="nav-link" href ="/Profile/edit/<?=$_SESSION["profile_id"]?">My profile</a>
						<a class="nav-link" href ="/Profile/soldHistory">History</a>
						<a class="nav-link" href ="/Profile/logout">Logout</a>
		        	';
		        ?>
			</div>

		<h1 class='title'>My Messages</h1>	

		<div class="order">
		<?php
					$product_id_saved = 0;
					$message_id = 0;
						foreach($data as $item){
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
		            									<p>Sent from: $item->username</p>
		            									
		            									<article class='card1'>    		
								            
							";
							}
								echo"
											<div class='card-body row'>
								            	<div class='card-body row'>
													<div class='col'> <strong>Message:</strong><br>$item->message</div>
												    <div class='col'> <strong>Date:</strong><br>$item->date_time</div>
												</div>
								    		</div>
												
								            		
									";
							$product_id_saved = $item->product_id;
						}
						
		?>
	</div>

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
	</body>		
</html>