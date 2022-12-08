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


	
$rate = "<div id = '$item->product_id P'>
	<button id = 'myBtn' type='button' class='fa fa-thumbs-o-up btn1' name= 'ONN' onclick='javascript:toggle(this, $item->product_id);'></button>
</div>";




$rateSeller = "<div id = '$item->rate_seller_id L'>
	<button id = 'myBtn' type='button' class='fa fa-thumbs-o-up btn1' name= 'ONN' onclick='javascript:toggleSeller(this, $item->product_id);'></button>
</div>";


	if($item->r_product_id != NULL && $item->r_profile_id != NULL){
		$rate = "<div id = '$item->product_id P'>
	<button id = 'myBtnOff' type='button' class='fa fa-thumbs-up btn2' name= 'OFF' onclick='javascript:toggle(this, $item->product_id);'></button>
</div>";


}

if($item->rate_seller_id != NULL && $item->rate_profile_id != NULL){
		$rateSeller = "<div id = '$item->product_id L'>
	<button id = 'myBtnOff' type='button' class='fa fa-thumbs-up btn2' name= 'OFF' onclick='javascript:toggleSeller(this, $item->product_id);'></button>
</div>";


}
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
									                    			
									                		</div>
									            		</article>
								            	<hr style='display:inline-block'>
									        	<ul class='row'>
									";
							}
								echo '
									            <ol class="col-md-4" >
												<figure class="itemside">
							                        <div class="aside"><img src="/images/'. $item->image. '" class="img-sm border" style="max-width: 200px; max-height: 200px; min-height: 200px; min-width: 200px"></div>
							                        <figcaption class="info align-self-center">
							                            <p class="title" style="width: 200px; text-align: center; margin-left: 2px;">' . $item->name . '</p> 
							                            <span style="margin-left: 45%;">Quantity:'. $item->qty . '</span>

							                              <div class="col"> <strong>Rate Product:</strong><br><div id = "' . $item->product_id . ' R">

<a id ="myRating ' .$item->product_id . '"> '. $item->rating .' </a>
</div>
 '. $rate . '


							                              <div class="col"> <strong>Rate Seller: '. $item->username .'</strong><br><div id = "' . $item->product_id . ' J">

<a id ="myRatingSeller ' .$item->product_id . '"> '. $item->ratingSeller .' </a>
</div>
 '. $rateSeller . '




							                        </figcaption>
							               
							                    </figure>


									 				</ol>	 											               
								';
								$order_id = $item->order_id;
						}	
		?>
										
	</div>
	</body>




<script>
function toggle(button, id) {

$concat1 = id + " P";
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById($concat1).innerHTML =
    this.responseText;
  }
 
 
  if(button.name == "ONN"){

  xhttp.open("GET", "/jscalls/buttonOff.php?q=" + id);
  xhttp.send();
	toggle2(button, id);

}
else{

	 xhttp.open("GET", "/jscalls/buttonOn.php?q=" + id);
  xhttp.send();
toggle2(button, id);

}
}

</script>


<script>
function toggle2(button2, id2) {
	
$concat2 = id2 + " R";
  const xhttp2 = new XMLHttpRequest();
  xhttp2.onload = function() {
    document.getElementById($concat2).innerHTML =
    this.responseText;
  }


  if(button2.name == "ONN"){

  	$oldRating = document.getElementById("myRating "+ id2).value = document.getElementById("myRating " + id2).innerText;
	$test = $concat2 + $oldRating;


  xhttp2.open("GET", "/jscalls/addRating.php?q=" + $test);
  xhttp2.send();

  location.href = "/Rating/addRating/" + id2;


}
else{
	$oldRating = document.getElementById("myRating "+ id2).value = document.getElementById("myRating " + id2).innerText;
  	$test = $concat2 + $oldRating;


 xhttp2.open("GET", "/jscalls/subRating.php?q=" + $test);
  xhttp2.send();

  location.href = "/Rating/subRating/" + id2;



}
}
	</script>


<script>
function toggleSeller(button, id) {

$concat1 = id + " L";
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById($concat1).innerHTML =
    this.responseText;
  }
 
 
  if(button.name == "ONN"){

  xhttp.open("GET", "/jscalls/buttonOffSeller.php?q=" + id);
  xhttp.send();
	toggle2Seller(button, id);

}
else{

	 xhttp.open("GET", "/jscalls/buttonOnSeller.php?q=" + id);
  xhttp.send();
toggle2Seller(button, id);

}
}

</script>

<script>
function toggle2Seller(button2, id2) {
	
$concat2 = id2 + " J";
  const xhttp2 = new XMLHttpRequest();
  xhttp2.onload = function() {
    document.getElementById($concat2).innerHTML =
    this.responseText;
  }


  if(button2.name == "ONN"){

  	$oldRating = document.getElementById("myRatingSeller " + id2).value = document.getElementById("myRatingSeller " + id2).innerText;
	$test = $concat2 + $oldRating;


  xhttp2.open("GET", "/jscalls/addRatingSeller.php?q=" + $test);
  xhttp2.send();

  location.href = "/Rating/addRatingSeller/" + id2;


}
else{
	$oldRating = document.getElementById("myRatingSeller "+ id2).value = document.getElementById("myRatingSeller " + id2).innerText;
  	$test = $concat2 + $oldRating;


 xhttp2.open("GET", "/jscalls/subRatingSeller.php?q=" + $test);
  xhttp2.send();

  location.href = "/Rating/subRatingSeller/" + id2;



}
}
	</script>
</html>