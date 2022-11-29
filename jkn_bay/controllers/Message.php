<?php
namespace jkn_bay\controllers;

class Message extends \jkn_bay\core\Controller{

	#[\jkn_bay\filters\Login]
	public function indexBuyerMes(){
		$message = new \jkn_bay\models\Message();

		$messages = $message->getSender($_SESSION['profile_id']);
		$discountM = $message->getForDiscount($_SESSION['profile_id']);
		
		$this->view('Message/indexBuyerMes', ['messages'=>$messages, 'discountM'=>$discountM]);
	}

	#[\jkn_bay\filters\Login]
	public function indexSellerMes(){
		$message = new \jkn_bay\models\Message();

		$messages = $message->getReceiver($_SESSION['profile_id']);

		$this->view('Message/indexSellerMes', $messages);
	}

	#[\jkn_bay\filters\Login]
 	public function contactSeller($profile_id, $product_id){
 		$message = new \jkn_bay\models\Message();
		$messages = $message->getSender($_SESSION['profile_id']);
	 	$check = false;
	 	

 		if(isset($_POST['action'])){
 			foreach($messages as $item){	
		 		if($item->product_id == $product_id){
		 			$check = true;
		 		}	
	 		}
 			if($check){
 				header('location:/Profile/viewSeller/ '. $profile_id . '?error=You have already sent the seller a message about this product');
 			} else{
 			$message = new \jkn_bay\models\Message();
			$message->message = $_POST['enter_message'];
			$message->sender_id = $_SESSION['profile_id'];
			$message->receiver_id = $profile_id;
			$message->product_id = $product_id;
			$message->insert();

			header('location:/Profile/viewSeller/ '. $profile_id . '?message=Your message was sent');
			}
 		}

		else{
				$profile = new \jkn_bay\models\Profile();
				$profile = $profile->getProfileId($profile_id);

			 	$product = new \jkn_bay\models\Product();
			 	$products = $product->get($product_id);

			 	$this->view('Profile/contactSeller', ['product'=>$products, 'profile'=>$profile]);
		}
 	}

	#[\jkn_bay\filters\Login]
	public function reply($message, $message_id, $product_id, $profile_id){

			$message = new \jkn_bay\models\Message();
			$message->message = $message;
			$message->reply_to = $intMessage_id;
			$message->sender_id = $_SESSION['profile_id'];
			$message->receiver_id = $intProfile_id;
			$message->product_id = $intProduct_id;
			$message->insert();

			header('location:/Message/indexSellerMes/?message=Your message was sent');
	}
}