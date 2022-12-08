<html>
	<head>

		<!-- Imports -->
    		<?php $this->view('header'); ?>

			<link rel="stylesheet" href="/css/Message/messageView.css"/>
			<link rel="stylesheet" href="/css/modal.css"/>

			<title>Message Seller History</title>
	</head>
		
	<body>	
	<div class='mainContainer'>
		<!-- Nav -->
	   		<?php $this->view('nav'); ?>

		<h1 class='title'> <?= _("My Messages") ?> </h1>	

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
	            						<h5> " . _("Buyer:") . "$item->username</h5>
	            						<h6> " . _("Product:") . "$item->name</h6>					
	            								<article class='card1'>		            
						";
					} 
						echo"
							<div class='card-body row'>
				            	<div class='card-body row'>
									<div class='col'> <strong> " . _("Message:") . "</strong><br>$item->message</div>
								    <div class='col'> <strong> " . _("Date:") . "</strong><br>$item->date_time</div>
								</div>
				    		</div>
						";

						
						$product_id_saved = $item->product_id;
						$message_id = $item->message_id;
				}

				if($data != null){
					echo '
						<button class="mbtn btn btn-primary turned-button" message_id= "' . $message_id . '" style="width: 120px; margin-left: 80%; margin-bottom: 3%;"> ' . _("Reply") . '</button>';
				}

			?>
		</div>
	</div>
	
	<!-- Modal -->
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
	</body>		
</html>