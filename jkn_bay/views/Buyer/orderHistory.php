<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- Css -->
			<link rel="stylesheet" href="/css/Buyer/orderHistory.css"/>
		
		<!-- Nav -->
	   		<?php $this->view('nav'); ?>
		
		<title>Order History</title>
	</head>
		
	<body>	
		<h1 class='title'>My Orders</h1>	

		<div class="order">
		<?php
						$order_id = 0;
						foreach($data['order'] as $item){
							if($order_id != $item->order_id){
								echo '
									</ul>
										</hr>
										</div>
									</article>
									</div>
									<br>
								';
							}
							if($order_id != $item->order_id){
									echo "
												<div class='container'>
													<article class='card' style='margin-bottom: 2%; width: 80%; margin-left: 10%;'>
		        									<div class='card-body'>
		            									<h6>Order: $item->order_id</h6>
		            									
		            									<article class='card1'>
									                		
									                		<div class='card-body row'>
									                    		<div class='card-body row'>
									                    			<div class='col'> <strong>Status:</strong><br>$item->status</div>
									                    			<div class='col'> <strong>Total:</strong><br>$$item->total</div>
									                    			<div class='col'> <strong>Date:</strong><br>$item->date</div>
									                    			<div class='col'> <button class='mbtn btn btn-primary'>Leave rating</button></div>
									                			</div>
									                		</div>
									            		</article>
								            	<hr style='display:inline-block'>
									        	<ul class='row'>
									";
							}
								echo "
									            <ol class='col-md-4' >
												<figure class='itemside'>
							                        <div class='aside'><img src='/images/$item->image' class='img-sm border' style='max-width: 200px; max-height: 200px; min-height: 200px; min-width: 200px'></div>
							                        <figcaption class='info align-self-center'>
							                            <p class='title' style='width: 200px; text-align: center; margin-left: 2px;'>$item->name</p> 
							                            <span style='margin-left: 45%;'>($item->qty)</span>
							                        </figcaption>
							                    </figure>
									 				</ol>	 											               
								";
								$order_id = $item->order_id;
						}	
		?>
										
	</div>
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
					<?php
					foreach($data['order'] as $item){ 
								echo '<label>Rate Product: <?= $data["order"]->name ?></label>
								
								';
					}?>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" name='action' id="submit" class="btn btn-success">Rate</button>
				</div>	
			</form>
		</div>
	</div>

	<script>
		var modal = $('#modalDialog');
		var span = $("#close");

		$(document).ready(function(){
			$('.mbtn').click(function(e){
				// $('#replyFrm').attr('action', '/Message/reply/');
				//location.href = "Rating/populateModal";
				modal.show();
			});

			span.on('click', function(){
				modal.hide();
			});
		});
	</script>

</html>