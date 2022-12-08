<html>
	<header>
		<!-- Imports -->
    		<?php $this->view('header'); ?>

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/Buyer/contactSeller.css"/>
		
		<title>Contact Seller</title>
		
		
	</header>
	<body>
	<!-- Nav -->
      		<?php $this->view('nav'); ?>

	<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div id = "profileMenu" class=" border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" style ="width: 200px; height: 200px;" src="/images/<?= $data['profile']->image?>"><span class="firstName"><?=$data['profile']->first_name?></span><span class="text-black-50"><?=$data['profile']->last_name?></span><span> </span></div>
            <div class="mt-5 text-center"><a href = "/Buyer/viewSeller/<?=$data['profile']->profile_id?>" class="btn btn-primary profile-button" type="button"><i class='fas fa-comment'></i> <?= _("Back") ?></a>
            </div>
        </div>
       
<form action='' method='post'>
<div class="form-group">
                  
 <h4 class="text-right"><?= _("Send Message") ?> </h4>

    			<label for="enter_message"> <?= _("Enter message") ?> </label>
    		<textarea class="form-control" id="enter_message" name="enter_message" placeholder="Enter Message"></textarea>
  		
  		<br>
				<button type="submit" name='action' value='Register' class="btn btn-secondary"> <?= _("Send Message") ?> </button>
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
											<h2> <?= _("Details") ?> </h2>
											
											<ul>
												<li><strong> <?= _("Quality:") ?> </strong><?=$data['product']->state?> </li>
												<li><strong> <?= _("In stock:") ?> </strong><?=$data['product']->quantity?></li>
												<li><strong> <?= _("Price:") ?>  </strong>$<?=$data['product']->price?></li>
											</ul>
										</div>
									</div>
								</div>
							
</div>
</div>
</div>