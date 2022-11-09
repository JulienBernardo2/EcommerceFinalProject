<!doctype html>
<html lang="en">
	<link rel="stylesheet" href="/style2.css"/>

<style>
 #container{
	box-shadow: 0 15px 30px 1px grey;
	background: rgba(255, 255, 255, 0.90);
	text-align: center;
	border-radius: 2px;
	overflow: hidden;
	margin: 1em auto;
	height: 300px;
	width: 500px;
	float: left;
	padding: 10px;
  
	
}

.position1{

}

.product-details {
	position: inherit;
	text-align: left;
	overflow: hidden;
	padding: 0px;
	height: 100%;
	float: left;
	margin-left: 0px;
	width: 55%;
	margin-top: 0px;

}

#container .product-details h1{
	font-family: 'Bebas Neue', cursive;
	
	text-align: left;
	font-size: 25px;
	color: #344055;
	margin: 0;
	
}

.btn1{
	float: right;
	margin-right: 70px;
	margin-top: -70px;
}

.btn2{
	float: right;
	margin-right: 70px;
	margin-top: -40px;
}

.ratingNum{
	
	margin-top: -60px;
	
}

#container .product-details h1:before{
	position: absolute;
	content: '';
	right: 0%; 
	top: 0%;
	transform: translate(25px, -15px);
	font-family: 'Bree Serif', serif;
	display: inline-block;
	background: #ffe6e6;
	border-radius: 5px;
	font-size: 12px;
	padding: 5px;
	color: white;
	margin: 0;
	animation: chan-sh 6s ease infinite;

}


.hint-star {
	display: inline-block;
	margin-left: 0.5em;
	color: gold;
	width: 50%;
	margin-bottom: 0px;
}


#container .product-details > p {
font-family: 'EB Garamond', serif;
	text-align: center;
	font-size: 30px;
	color: black;
	float: left;
	margin-left: 100px;
	padding: 0;
	width: 90%;


}

.btn {

	transform: translateY(0px);
	transition: 0.3s linear;
	background:  #809fff;
	border-radius: 5px;
  position: relative;
  overflow: hidden;
	cursor: pointer;
	outline: none;
	border: none;
	color: #eee;
	padding: 0;
	margin: 0;
	
}

.btn:hover{transform: translateY(-6px);
	background: #1a66ff;}

.btn span {
	font-family: 'Farsan', cursive;
	transition: transform 0.3s;
	display: inline-block;
  padding: 10px 20px;
	font-size: 1.0em;
	margin:0;
	
}
.btn, .shopping-cart{
	background: #333;
	border: 0;
	margin: 0;
}

.price{
	margin-left: 20px;
	font-size: 20px;
}

.btn .shopping-cart {
	transform: translateX(-100%);
  position: absolute;
	background: #333;
	z-index: 1;
  left: 0;
  top: 0;
}

.btn .buy {z-index: 1; font-weight: bolder; font-size: 14px;}

.btn:hover .price {transform: translateX(-110%);}

.btn:hover .shopping-cart {transform: translateX(0%);}



.product-image {
	transition: all 0.3s ease-out;
	display: inline-block;
	position: relative;
	overflow: hidden;
	height: 100%;
	float: right;
	width: 45%;
	display: inline-block;
}

#container img {width: 100%;height: 100%;}

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Bree Serif', serif;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.8;
    text-align: left;
    font-size: 105%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}

.info h2 {text-align: center}
.product-image:hover .info{transform: translateX(0);}

.info ul li{transition: 0.3s ease;}
.info ul li:hover{transform: translateX(50px) scale(1.3);}

.product-image:hover img {transition: all 0.3s ease-out;}
.product-image:hover img {transform: scale(1.2, 1.2);}
</style>

	<head>
<script type="text/javascript">
            	window.setTimeout(function() {
                	$("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                    	$(this).remove(); 
                	});
            	}, 3000);
        	</script>
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
		bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
		Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
		<title>Home</title>


  <!-- Nav -->
            <div class="navbar">
                <?php 
                $check = "";
                if(isset($_SESSION['username'])){
                	
											
                    echo '
                        <a class="nav-link" href ="/Product/indexBuyer">Home</a>
                        <a class="nav-link" href ="/Profile/viewCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a> 
                          <img src="/jknimage.png" alt="JKN" />
                        <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
                        <a class="nav-link" href ="/Profile/logout">Logout</a>
                    ';
                }else{
                    echo '
                        <a class="nav-link" href ="/Product/indexBuyer">Home</a>
                        <a class="nav-link" href ="/Profile/index">Login</a>
                          <img src="/jknimage.png" alt="JKN" />
                        <a class="nav-link" href ="/Profile/register">Sign up</a>
                        <a class="nav-link" href ="">About</a>
                    ';
                } ?>
            </div>
</div>
	</head>
	
	<body>
		

 <form action='/Product/search/' method="get">
		<div class="container1">
				<div class="divSearchBar">
					<p class="text-white">
						Find Items:
						<input type="text" class="searchbar" class="form-control" name="searchbar" placeholder="Search for Item" />
						<button name ="action" class="btn btn-dark btn-sm">
							Search
							<i class="fa fa-search"></i>
						</button>
					</p>
			</div>
			  </form>
          

	

<?php
					foreach($data['product'] as $item)

					{
						if(isset($_SESSION['username'])){
						$check = "<a class='btn btn-success' href ='/Profile/addToCart/$item->product_id'>
						<i class='fa fa-shopping-cart'></i> Add To Cart
										</a>";
									}
						echo"
								<div id='container'>	
	
	<div class='product-details'>
		
	<h1>$item->name</h1>
	<button href ='/Product/addRating/$item->product_id' class='btn1' name='action'>
   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z'/>
</svg>

 </button>
 <button class='btn2'>
   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-down' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z'/>
</svg>
</button>
<p class = 'ratingNum'> $item->rating </p>
 

			<a class='btn btn-primary' href=''>
   <i class='fa fa-chat'></i>Contact Seller
 </a>

 <p class = 'price'> $$item->price </p>
$check
	
			
</div>
	
<div class='product-image'>
	 
	<img src=/images/$item->image alt=''>
	

<div class='info'>
	<h2>Description</h2>
	<ul>
		<li><strong>State : </strong>$item->state </li>
		<li><strong>Quantity : </strong>$item->quantity</li>
		<li><strong>Description: </strong>$item->description</li>
		<li><strong>Profile: </strong>$item->profile_id</li>
		
	</ul>
</div>
</div>

</div>

							";
					}
				?>
    <br><br><br><br><br><br><br>	
</div>
</body>
</html>
</html>

