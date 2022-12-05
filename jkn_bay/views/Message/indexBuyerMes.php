<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

			<link rel="stylesheet" href="/css/Message/messageView.css"/>

			<title>Message Buyer History</title>
	</head>
		
	<body>	

		<!-- Nav -->
	   		<?php $this->view('nav'); ?>

		<h1 class='title'>My Messages</h1>	

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
									</div>
									<br> 	
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
					<button class="mbtn btn btn-primary" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;">Reply</button>';					
			}
		?>
	</body>

	<!-- modal -->
		<?php $this->view('modal'); ?>

	<script>
		var message_id;
		var modal = $('#modalDialog');
		var span = $("#close");

		$(document).ready(function(){
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