<html>
	<head>
		<!-- Imports -->
    		<?php $this->view('header'); ?>
		<!-- Css file -->
			<link rel="stylesheet" href="/css/Product/soldHistory.css"/>

		<title>Sold History</title>
	</head>
		
	<body>	

		<!-- Nav -->
    		<?php $this->view('nav'); ?>

		<h1 class='title'>My Sold Products</h1>	

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
    									<h6>Order ID: $item->order_id</h6>
    									
    									<article class='card1'>
				                		
				                		<div class='card-body row'>
				                    		<div class='card-body row'>
				                    			<div class='col'> <strong>Status:</strong><br>$item->status</div>
				                    			<div class='col'> <strong>Buyer:</strong><br>$item->username</div>
				                    			<div class='col'> <strong>Date:</strong><br>$item->date</div>
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
	</body>		
</html>