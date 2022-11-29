<html>
	<header>
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

			<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/indexBuyer.css"/>
			<link rel="stylesheet" href="/css/nav.css"/>
			<link rel="stylesheet" href="/css/contactSeller.css"/>
		
		<!-- Scripts -->
			<!-- Timeout the message -->
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
		
		<title>View Seller</title>
		
		
	</header>
<!-- Nav -->
			<div class="navbar">
				<?php {
			    	echo '
			     		<a class="active" href ="/Product/indexBuyer">Home</a>
		        		<a  href ="/Profile/viewCart">Cart</a>
		        		<a  href ="/Message/indexBuyerMes">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Profile/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
			    }?>	
			</div>
			
	<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div id = "profileMenu" class=" border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" style ="width: 200px; height: 200px;" src="/images/<?= $data['profile']->image?>"><span class="firstName"><?=$data['profile']->first_name?></span><span class="text-black-50"><?=$data['profile']->last_name?></span><span> </span></div>
            <div class="mt-5 text-center"><a href = "/Profile/viewSeller/<?=$data['profile']->profile_id?>" class="btn btn-primary profile-button" type="button"><i class='fas fa-comment'></i> View Seller</a>
            </div>
        </div>
       
<form action='' method='post'>
<div class="form-group">
                  
 <h4 class="text-right">Send Message</h4>

    			<label for="enter_message">Enter message</label>
    		<textarea class="form-control" id="enter_message" name="enter_message" placeholder="Enter Message"></textarea>
  		
  		<br>
				<button type="submit" name='action' value='Register' class="btn btn-secondary">Send Message</button>
  			<br>		
    
               </div>
           </form>
                   

								<div id='container'>	
									<div class='product-details'>					
										<h1><?=$data['product']->name?></h1>
								
			
							
										<p class = 'ratingNum'>Test</p>
							 			
										<span class='desc'><?=$data['product']->description?></span>
										
										
									
									</div>
								
									<div class='product-image'>
										<img src='/images/$item->image' alt=''>
								
										<div class='info'>
											<h2>Details</h2>
											
											<ul>
												<li><strong>Quality: </strong><?=$data['product']->state?> </li>
												<li><strong>In stock: </strong><?=$data['product']->quantity?></li>
												<li><strong>Price: </strong>$<?=$data['product']->price?></li>
											</ul>
										</div>
									</div>
								</div>
							
</div>
</div>
</div>