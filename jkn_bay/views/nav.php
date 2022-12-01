<div class='navbar'>
	<?php 
	if(!isset($_SESSION['username'])){
			echo '
    		<a  href ="/Buyer/index">Home</a>
    		<a  href =""></a>
    		<a  href =""></a>
			<img src="/images/jknimage.png" alt="JKN" />
    		<a  href =""></a>
    		<a  href ="/Profile/index">Login</a>
    		<a href ="/Profile/register">Sign up</a>
    	';
	} else{
		if($_SESSION['role'] != null){
			if($_SESSION['role'] == 'seller'){
			echo '
				<a class="nav-link" href ="/Product/index">Home</a>
		        <a class="nav-link" href ="/Message/indexSellerMes">Messages</a>
		        <a class="nav-link" href ="/Product/add">New Product</a>
				<img src="/images/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
		        <a class="nav-link" href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
				<a class="nav-link" href ="/Product/soldHistory">History</a>
				<a class="nav-link" href ="/Profile/logout">Logout</a>
			';}
			if($_SESSION['role'] == 'buyer'){
				echo '
				<a class="active" href ="/Buyer/index">Home</a>
				<a  href ="/Buyer/viewCart">Cart</a>
				<a  href ="/Message/indexBuyerMes">Messages</a>
				<img src="/images/jknimage.png" alt="JKN" style="max-width: 150px; max-height: 150px;"/>
				<a  href ="/Profile/edit/<?= $_SESSION["profile_id"]?">My profile</a>
				<a  href ="/Buyer/orderHistory">History</a>
				<a  href ="/Profile/logout">Logout</a>
				';
			}
		}
	}
	?>
</div>