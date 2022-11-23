<?php
namespace jkn_bay\controllers;

class Profile extends \jkn_bay\core\Controller{

	//Allows people to login to JKN_Bay
	public function index(){
		
		//Check if the person has clicked on the "Login" button
		if(isset($_POST['action'])){
			
			//Gets the profile which the person has entered
			$profile = new \jkn_bay\models\Profile();
			$profile = $profile->get($_POST['username']);

			//If the password matches the saved password in the database then create a session
			if(password_verify($_POST['password'], $profile->password_hash)){
				$_SESSION['username'] = $profile->username;
				$_SESSION['profile_id'] = $profile->profile_id;
				$_SESSION['role'] = $profile->role;

				//Checks which main page to create depending on the profile role
				if($_SESSION['role'] == 'seller'){
					header('location:/Product/indexSeller?message=You have been successfully logged in');
				}else{
					header('location:/Product/indexBuyer?message=You have been successfully logged in');
				}

			}else{
				//The person has inputted the wrong password
				header('location:/Profile/index?error=Incorrect username or password');
			}
		}else{
			$this->view('Profile/index');
		}
 	}

 	//Allows sellers or buyers to logout
 	public function logout(){
		
		//Destorys the current session
		session_destroy();
		header('location:/Product/indexBuyer?message=You\'ve been successfully logged out');
	}

 	//Allows people to create a profile
 	public function register(){
		
		//Checks if the person has clicked the "Create profile" button
		if(isset($_POST['action'])){

			//Check if the inputted password matches the password confirmation input 
			if($_POST['password'] == $_POST['password_confirmation']){
			 	
			 	//Creates the profile
			 	$profile = new \jkn_bay\models\Profile();

			 	//Checks if the username is already taken
			 	if($profile->get($_POST['username'])){
			 		header('location: Profile/register?error=The Username already exists, Choose another');
			 	}else{

			 		//Sets the inputted values to the new profile
			 		$filename = $this->saveFile($_FILES['image']);
			 		$profile->username = $_POST['username'];
			 		$profile->first_name = $_POST['first_name'];
			 		$profile->last_name = $_POST['last_name'];
			 		$profile->postal_code = $_POST['postal_code'];
			 		$profile->city = $_POST['city'];
			 		$profile->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 		$profile->role = $_POST['role'];		
					$profile->image = $filename;

			 		//Creates the profile and sets it to the current session
			 		$profile =  $profile->insert();
			 		
			 		$new_profile = new \jkn_bay\models\Profile();
			 		$new_profile = $new_profile->getProfileId($profile);

			 		if($new_profile->role == 'buyer'){
			 			$message = new \jkn_bay\models\Message();
			 			$message = $this->createDiscountMessage($new_profile->profile_id);
			 		}
					header('location:/Profile/index?message=Your profile is set up, login when ready');
			 	}
			} else{
				header('location:/Profile/register?error=The passwords do not match');
			} 	 	
		}else{
			$this->view('Profile/register');
		}
	 }

	 #[\jkn_bay\filters\Login]
	 //Allows sellers or buyers to edit their profile
	 public function edit(){
		
		//Gets the profile for the current session
		$profile = new \jkn_bay\models\Profile;
		$profile = $profile->getProfileId($_SESSION["profile_id"]); 

		//Checks if the seller or buyer has clicked on the "Edit Profile" button
		if(isset($_POST['action'])){

			//Deletes the old profile picture and changes it with the new one
			$filename = $this->saveFile($_FILES['image']);
			if($filename){
				unlink("images/$profile->image");
				$profile->image = $filename;
			}


			//Sets all of the values from the form inputs for the profile
			$profile->username = $_POST['username'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->postal_code = $_POST['postal_code'];
			$profile->city = $_POST['city'];

			//updates the profile
			$profile->update();

			//Checks which page to go back to depending on the role of the current session
			if ($profile->role == 'buyer' ) {
				header('location:/Product/indexBuyer?message=Profile Updated');
			} else {
				header('location:/Product/indexSeller?message=Profile Updated');
			}
		}else{
			$this->view('Profile/edit', $profile);
		}	
	}

	#[\jkn_bay\filters\Login]
	//Allows buyers to add products to their cart
	public function addToCart($product_id){
 	 	
 	 	//Gets the cart for the buyer
 	 	$cart = new \jkn_bay\models\Order();
 	 	$cart = $cart->findProfileCart($_SESSION['profile_id']);

 	 	//Gets the product that the buyer wants to add
 	 	$product = new \jkn_bay\models\Product();
 	 	$product = $product->get($product_id);

 	 	//Checks if their is a cart created for the buyer and if not then creates it
 	 	if ($cart == null) {
 	 		$cart = new \jkn_bay\models\Order();
	 	 	$cart->profile_id = $_SESSION['profile_id'];
	 	 	$cart->status = 'cart';
 			$cart->total = 0;
	 	 	$cart->order_id = $cart->insert();
 	 	}

 	 	$product_order_detail = new \jkn_bay\models\Order_detail();
 	 	$product_order_detail = $product_order_detail->getProductForOrder($product->product_id);

 	 	//Checks if the product is already in the cart, and if the quantity is to much to add
 	 	if($product_order_detail != null){
 	 		if($product_order_detail->qty >= $product->quantity){
 	 			header('location:/Product/indexBuyer?error=Maximum quantity reached');	
 	 		} else{
 	 			$new_product = $this->newOrderDetail($cart->order_id, $product->price, $product->product_id);

		 		header('location:/Product/indexBuyer?message=The product was added to your cart');
 	 		}
 	 	}else{
	 		//Creates the order detail for the buyer
	 		$new_product = $this->newOrderDetail($cart->order_id, $product->price, $product->product_id);
	 		header('location:/Product/indexBuyer?message=The product was added to your cart');
	 	}

	 	$discount = new \jkn_bay\models\Discount();
 	 	$discount = $discount->get($_SESSION['profile_id']);

	 	if($discount->status == 'applied' || $discount == null){
	 		$original_total = ($cart->total) + ($cart->total * 0.25);
 	 		$cart->total = $total + $newProduct->price;
 	 		$cart->update();
 	 		$discount->status = 'created';
 	 		$discount->update();
	 		header('location:/Product/indexBuyer?message=The product was added to your cart, re-apply discount when ready');
	 	}
 	}

 	private function newOrderDetail($order_id, $product_price, $product_id){
 		$newProduct = new \jkn_bay\models\Order_detail();
		 		
		//Sets all of the values for the order detail
		$newProduct->order_id = $order_id;
		$newProduct->product_id = $product_id;
		$newProduct->price = $product_price;
		$newProduct->qty = 1;

		//Creates the order detail
		$newProduct->insert();
		return $newProduct;
 	}

 	#[\jkn_bay\filters\Login]
 	//Allows buyers to view their cart
 	public function viewCart(){

 		//Gets the cart for the buyer
 	 	$cart = new \jkn_bay\models\Order();
 	 	$cart = $cart->findProfileCart($_SESSION['profile_id']);
 	 	
 	 	//Checks if their is a cart created for that buyer and if not then creates it
 	 	if ($cart == null) {
 	 		$cart = new \jkn_bay\models\Order();
	 	 	$cart->profile_id = $_SESSION['profile_id'];
	 	 	$cart->status = 'cart';
 			$cart->total = 0;
	 	 	$cart->order_id = $cart->insert();
 	 	}

 	 	$order_detail = new \jkn_bay\models\Order_detail();
 	 	$order_detail = $order_detail->getForOrder($cart->order_id);
 	 	
 	 	$discount = new \jkn_bay\models\Discount();
 	 	$discount = $discount->get($_SESSION['profile_id']);
	
 	 	if($discount == null ||$discount->status == 'created'){
			$total = 0;
	 	 	if($order_detail != null){
	 	 		foreach($order_detail as $item){
	 	 			$total += $item->price * $item->qty;
	 	 		}
				$cart->total = $total;	
	 	 		$cart->update();
	 	 	}
 	 	}
 	 		
 	 	//Gets all of the products for that cart
 	 	$product = new \jkn_bay\models\Order_detail();
 	 	$products = $product->getForOrder($cart->order_id);


		$this->view('Profile/cart', ['product'=>$products, 'cart'=>$cart]);
	 	}

 	#[\jkn_bay\filters\Login]
 	//Allows buyers to delete products from their cart
  	public function removeFromCart($order_detail_id){
 	 	
 	 	//gets the order detail for the current buyer 
 	 	$product = new \jkn_bay\models\Order_detail();
 	 	$product = $product->get($order_detail_id);

 	 	//Gets the order for that order_detail
 	 	$cart = new \jkn_bay\models\Order();
 	 	$cart = $cart->get($product->order_id);

 	 	$discount = new \jkn_bay\models\Discount();
 	 	$discount = $discount->get($_SESSION['profile_id']);	

 	 	//Checks if the order profile matches the current profile logged in
 	 	if($cart->profile_id == $_SESSION['profile_id']){
 	 		$product->delete();
 	 		if($discount == null || $discount->status == 'created'){
 	 			$cart->total = $cart->total - $product->price;
 	 			$cart->update();
				header('location:/Profile/viewCart?message=The product was deleted from your cart');
 	 		} else{
 	 			$original_total = ($cart->total) + ($cart->total * 0.25);
 	 			$total = $original_total - $product->price;
 	 			$cart->total = $total;
 	 			$cart->update();
 	 			$discount->status = 'created';
 	 			$discount->update();
 	 			header('location:/Profile/viewCart?message=The product was deleted from your cart, re-apply discount when ready');
 	 		}
 	 	}else{
 	 		header('location:/Profile/viewCart?error=The product could not be deleted from the cart');
 	 	}
 	}


 	#[\jkn_bay\filters\Login]
 	//Allows buyers to checkout their cart
 	public function checkout(){

 		//Gets the cart for the buyer
 	 	$cart = new \jkn_bay\models\Order();
 	 	$cart = $cart->findProfileCart($_SESSION['profile_id']);
 	 	
 	 	$order_detail = new \jkn_bay\models\Order_detail();
 	 	$order_detail = $order_detail->getForOrder($cart->order_id);

 	 	$products_to_change = new \jkn_bay\models\Product();
 	 	$products_to_change = $products_to_change->productsToChangeQuantity($cart->order_id);

 	 	 foreach($order_detail as $order_details){
 	 	 	foreach($products_to_change as $products){
 	 	  		if($order_details->product_id == $products->product_id){
	 	  			$products->subtract($products->product_id, $order_details->qty);
		 			if($products->quantity == 0){
 		 						$products->status = 'sold';
 	 	  						$products->updateStatus();	
 	 	  			}
		 		} 
 	 	  	}
 	 	}
	 	 
	 	$discount = new \jkn_bay\models\Discount();
		$discount = $discount->get($_SESSION['profile_id']);
 	 	
 	 	if($discount->status == 'applied' || $discount != null){
			$message = new \jkn_bay\models\Message();
			$discount->delete();
			$message = $message->get($discount->message_id);
			$message->delete();
 	 	}

 	 	 $cart->status = 'paid';

 	 	 $cart->update();
 	 	 header('location:/Profile/viewCart?message=Your cart has been checked out');
 	}

 	#[\jkn_bay\filters\Login]
 	//Allows buyers to check their orders
 	public function orderHistory(){

 		//Gets the every order and order_detail for the buyer
 	 	$order = new \jkn_bay\models\Order();
 	 	$orders = $order->findProfileCartPaid($_SESSION['profile_id']);

 	 	$this->view('Profile/orderHistory', ['order'=>$orders]);
 	 }

 	#[\jkn_bay\filters\Login]
 	//Allows sellers to check their sold products
 	public function soldHistory(){
 		//Gets the every order and order_detail for the buyer
 	 	$order = new \jkn_bay\models\Order();
 	 	$orders = $order->findProductsPaid($_SESSION['profile_id']);
 	 	$this->view('Profile/soldHistory', ['order'=>$orders]);
 	}

	private function createDiscountMessage($profile_id){
		$message = new \jkn_bay\models\Message();
		$message->profile_id = $profile_id;
		
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 5; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

		$message->message = 'Welcome to JKN Bay, here is your discount code: ' . $randomString; 
		$message->flag = 'discount';
		$message->insert();

		$message = new \jkn_bay\models\Message();
		$message = $message->getDiscountMessage($profile_id);
		
		$discount_code = new \jkn_bay\models\Discount();
	    $discount_code->profile_id = $profile_id;
	    $discount_code->message_id = $message->message_id;
	    $discount_code->status = 'created';
	    $discount_code->code = password_hash($randomString, PASSWORD_DEFAULT);
	    $discount_code->insert();
	}
	
	public function applyDiscount($profile_id){
		$discount = new \jkn_bay\models\Discount();
		$discount = $discount->get($profile_id);
		
		//Gets the cart for the buyer
 	 	$cart = new \jkn_bay\models\Order();
 	 	$cart = $cart->findProfileCart($_SESSION['profile_id']);

 	 	$order_detail = new \jkn_bay\models\Order_detail();
 	 	$order_detail = $order_detail->getForOrder($cart->order_id);


		if(isset($_POST['action'])){
			if($order_detail == null){
 	 			header('location:/Profile/viewCart?error=Please add items to your cart');
 	 		}else{
 	 			if(password_verify($_POST['code'], $discount->code)  && $discount->status == 'created'){		
					$cart->total = ($cart->total) - ($cart->total * 0.2);
					$cart->update();
					$discount->status = 'applied';
					$discount->update();
					header('location:/Profile/viewCart?message=Your discount code was applied');
				} else{
					header('location:/Profile/viewCart?error=Your discount code has already been used');
				}
 	 		}
			
		}
	}

	#[\jkn_bay\filters\Login]
 	public function viewSeller($profile_id){

		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->getProfileId($profile_id);

 		$product = new \jkn_bay\models\Product();
	 	$products = $product->getAllProfile($profile_id);

	 	$this->view('Profile/viewSeller', ['products'=>$products, 'profile'=>$profile]);

 	}

#[\jkn_bay\filters\Login]
 	public function contactSeller($profile_id, $product_id){

 		if(isset($_POST['action'])){
 			$message = new \jkn_bay\models\Message();
		$message->message = $_POST['enter_message'];
		$message->sender_id = $_SESSION['profile_id'];
		$message->receiver_id = $profile_id;
		$message->product_id = $product_id;
		$message->insert();

		header('location:/Profile/viewSeller/ '. $profile_id . '?message=Your message was sent');

 		}

else{
		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->getProfileId($profile_id);

	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->get($product_id);

	 	$this->view('Profile/contactSeller', ['product'=>$products, 'profile'=>$profile]);
}
 	}
}