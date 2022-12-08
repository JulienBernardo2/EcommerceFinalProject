<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

			<link rel="stylesheet" href="/css/Message/messageView.css"/>
			<link rel="stylesheet" href="/css/modal.css"/>

			<title>Message Buyer History</title>
	</head>
		
	<body>	
	<div class='mainContainer'>
		<!-- Nav -->
	   		<?php $this->view('nav'); ?>

		<h1 class='title'> <?= _("My Messages") ?> </h1>

		<?php
			foreach($data['discountM'] as $item){
				echo "
					<div class='container'>
		    			<article class='card' style='width: 70%; margin-left: 15%;'>
		    				<div class='card-body'>
		    					<h6> " . _("Discount") . "</h6>
		            									
		    					<article class='card1'>
							                		
			                		<div class='card-body row'>
			                    		<div class='card-body row'>
			                    			<div class='col'> <strong>Message:</strong><br>$item->message</div>
				                    			<div class='col'> <strong> " . _("Date and Time:") . "</strong><br>$item->date_time</div>
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
						<button class="mbtn btn btn-primary turned-button" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;"> ' . _("Reply") . '</button>
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
		            				<h6> " . _("Product:") . "$item->name</h6>
		            							
		            					<article class='card1'>    		
								            
					";
				}
				echo"
					<div class='card-body row'>
			           	<div class='card-body row'>
							<div class='col'> <strong> " . _("Message:") . " </strong><br>$item->message</div>
							    <div class='col'> <strong> " . _("Date:") . "</strong><br>$item->date_time</div>
								    <div class='col'> <strong> " . _("Sent from:") . "</strong><br>$item->username</div>
									</div>
					    		</div>				            		
				";
				$product_id_saved = $item->product_id;
				$message_id = $item->message_id;	
			}

			if($data['messages'] != null){
				echo '
					<button class="mbtn btn btn-primary" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;"> ' . _("Reply") . '</button>';					
			}
		?>
	</body>

	<!-- modal -->
		<?php $this->view('modal'); ?>

	<script>
		var message_id;
		var modal = $('.modal');
		var cancel = $("#cancel");

		$(document).ready(function(){
			$('.mbtn').click(function(e){
				message_id = $(this).attr('message_id');
				$('#replyFrm').attr('action', '/Message/reply/' + message_id);
				modal.show();
				$('.modal' ).addClass('open' ); 
			      if ( $('.modal' ).hasClass('open' ) ) {
			      }
			});

			cancel.on('click', function(){
		      modal.hide();
		       $( '.modal' ).removeClass( 'open' );
		       $( '.mainContainer' ).removeClass( 'blur' );
		    });
		});
	</script>	
		
</html>