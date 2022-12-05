<html>
	<head>

		<!-- Imports -->
    		<?php $this->view('header'); ?>

			<link rel="stylesheet" href="/css/Message/messageView.css"/>

			<title>Message Seller History</title>
	</head>
		
	<body>	

		<!-- Nav -->
	   		<?php $this->view('nav'); ?>

		<h1 class='title'>My Messages</h1>	

		<div class="order">
			<?php
				$profile_id_saved = 0;
				$product_id_saved = 0;
				$message_id = 0;
				$reply_to = 0;

				foreach($data as $item){
					if($message_id == 0){
						$message_id = $item->message_id;
					}

					if($reply_to == 0){
						$reply_to = $item->reply_to;
					}
					
					if($item->sender_id != $profile_id_saved && $profile_id_saved != 0 && $item->product_id != $product_id_saved && $product_id_saved != 0 || $item->sender_id != $profile_id_saved && $profile_id_saved != 0 && $item->product_id == $product_id_saved && $product_id_saved != 0){
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

					if($item->sender_id != $profile_id_saved && $item->product_id != $product_id_saved || $item->sender_id != $profile_id_saved && $item->product_id == $product_id_saved && $item->sender_id != $_SESSION['profile_id']){
						echo "
							<div class='container' style='margin-bottom: 15px'>
	    						<article class='card' style='width: 70%; margin-left: 15%;'>
	        						<div class='card-body'>
	            						<h5>Seller: $item->username</h5>
	            						<h6>Product: $item->name</h6>					
	            								<article class='card1'>		            
						";
					} 
						echo"
							<div class='card-body row'>
				            	<div class='card-body row'>
									<div class='col'> <strong>Message:</strong><br>$item->message</div>
								    <div class='col'> <strong>Reply to:</strong><br>$item->message_id</div>
								    <div class='col'> <strong>Date:</strong><br>$item->username</div>
								    <div class='col'> <strong>Date:</strong><br>$item->date_time</div>
								    <div class='col'> <strong>Reply to:</strong><br>$item->reply_to</div>
								    <div class='col'> <strong>Proudct:</strong><br>$item->product_id</div>
								</div>
				    		</div>
						";

					$profile_id_saved = $item->sender_id;
					$product_id_saved = $item->product_id;
					$message_id = $item->message_id;
				}

				if($data != null){
					echo '
						<button class="mbtn btn btn-primary turned-button" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;">Reply</button>';
				}

			?>
		</div>

	
	<!-- Modal -->
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
	</body>		
</html>