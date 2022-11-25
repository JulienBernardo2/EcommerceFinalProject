<html>
	<head>
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

		<!-- CSS Styles -->
			<link rel="stylesheet" href="/css/orderHistory.css"/>

		<!-- Scripts -->

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


  xhttp2.open("GET", "/jscalls/myAsp.php?q=" + $test);
  xhttp2.send();

toggle3(button2, $oldRating, id2);

}
else{
	$oldRating = document.getElementById("myRating "+ id2).value = document.getElementById("myRating " + id2).innerText;
  	$test = $concat2 + $oldRating;


 xhttp2.open("GET", "/jscalls/myAspSub.php?q=" + $test);
  xhttp2.send();

  toggle3(button2, $oldRating, id2);
}
}
</script>


<script>
function toggle3(button3, oldRating3, id3) {
	
$concat3 = id3 + " S";
  const xhttp3 = new XMLHttpRequest();
  xhttp3.onload = function() {
    document.getElementById($concat3).innerHTML =
    this.responseText;
  }


if(button3.name == "ONN"){
  $mixture = $concat3 + oldRating3 + button3.name;
  xhttp3.open("GET", "/jscalls/myAsp2.php?q=" + $mixture);
  xhttp3.send();
}
else{

$mixture = $concat3 + oldRating3 + button3.name;
  xhttp3.open("GET", "/jscalls/myAsp2Sub.php?q=" + $mixture);
  xhttp3.send();

}
}
</script>

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
				<?php if(isset($_SESSION['username'])){
			    	echo '
			     		<a class="active" href ="/Product/indexBuyer">Home</a>
		        		<a  href ="/Profile/viewCart">Cart</a>
		        		<a  href ="/Message/index">Messages</a>
  						<img src="/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        		<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
		        		<a  href ="/Profile/orderHistory">History</a>
						<a  href ="/Profile/logout">Logout</a>
					';
			    }?>	
			</div>

		<h1 class='title'>My Orders</h1>	

		<div class="order">
		<?php


						
									

		
						$order_id = 0;
						 $new_count = 0;
						$count = 1;
						foreach($data['order'] as $item){


							if($order_id != $item->order_id){
$rate = "<div id = '$item->product_id P'>
	<button id = 'myBtn' type='button' class='fa fa-thumbs-o-up btn1' name= 'ONN' onclick='javascript:toggle(this, $item->product_id);'></button>
</div>";

if($_GET['message'] == "$item->product_id/NN"){

							$rate = "<div id = '$item->product_id P'>
	<button id = 'myBtnOff' type='button' class='fa fa-thumbs-up btn2' name= 'OFF' onclick='javascript:toggle(this, $item->product_id);'></button>
</div>";
}

									echo "
											<div class='container'>
		    									<article class='card'>
		        									<div class='card-body'>
		            									<h6>Order ID: $item->order_id</h6>
		            									
		            									<article class='card1'>
								                		
								                		<div class='card-body row'>
								                    		<div class='card-body row'>
								                    			<div class='col'> <strong>Status:</strong><br>$item->status</div>
								                    			<div class='col'> <strong>Total:</strong><br>$item->total</div>
								                    			<div class='col'> <strong>Date:</strong><br>$item->date</div>
								                    			<div class='col'> <strong>Leave Rating:</strong><br><div class = 'totalRating' id = '$item->product_id R'>
<a id ='myRating $item->product_id'> $item->rating </a>

</div>

$rate

<div id = '$item->product_id S'>
<a href ='/Profile/addRating/$item->product_id/$item->rating/FF' class=' btn btn-success btnSave' name='upvote'> Save
 </a>
</div>

								                			</div>
								                		</div>
								            	</article>
								            	<hr style='display:inline-block'>
									        	<ul class='row'>
									";
									$count++;
								}
								echo "
												
									            <ol class='col-md-4'>
												<figure class='itemside'>
							                        <div class='aside'><img src='/images/$item->image' class='img-sm border' style='max-width: 200px; max-height: 200px;'></div>
							                        <figcaption class='info align-self-center'>
							                            <p class='title'>$item->name</p> 
							                            <span class='text-muted'>($item->qty)</span>
							                        </figcaption>
							                    </figure>
									 				</ol>
									 											               
								";
								$order_id = $item->order_id;
								if($count >= $new_count){
									echo "
							          		</ul>
						 						</hr>
				        					</div>

							    			</article>
										</div><br> 	
									";
								}
						}
						if($count == 1){
									echo "
							          		</ul>
						 						</hr>
				        					</div>

							    			</article>
										</div><br> 	
									";
								}
		?>
	</div>
	</body>		
</html>