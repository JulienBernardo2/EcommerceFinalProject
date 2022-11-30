<?php
namespace jkn_bay\controllers;

class Message extends \jkn_bay\core\Controller{

	#[\jkn_bay\filters\Login]
	#[\jkn_bay\filters\Buyer]
	public function indexBuyerMes(){
		$message = new \jkn_bay\models\Message();

		$messages = $message->getMessages($_SESSION['profile_id']);
		$discountM = $message->getForDiscount($_SESSION['profile_id']);
		
		$this->view('Message/indexBuyerMes', ['messages'=>$messages, 'discountM'=>$discountM]);
	}

	#[\jkn_bay\filters\Login]
	#[\jkn_bay\filters\Seller]
	public function indexSellerMes(){
		$message = new \jkn_bay\models\Message();
		$messages = $message->getMessagesSeller($_SESSION['profile_id']);

		$this->view('Message/indexSellerMes', $messages);
	}

	#[\jkn_bay\filters\Login]
	#[\jkn_bay\filters\Buyer]
 	public function contactSeller($profile_id, $product_id){
 		
 		if(isset($_POST['action'])){
 			$message = new \jkn_bay\models\Message();
			$messages = $message->getMessages($_SESSION['profile_id']);
	 		$check = false;

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
			 	$product = $product->get($product_id);

			 	$this->view('Profile/contactSeller', ['product'=>$product, 'profile'=>$profile]);
		}
 	}

	#[\jkn_bay\filters\Login]
	public function reply($message_id){
		$old_message = new \jkn_bay\models\Message();
		$old_message = $old_message->get($message_id);
		
		if(!isset($_POST['message'])){
	 		header('location:/Message/indexSellerMes?error=Message was empty');
	 		return;
		} else{
			$message = new \jkn_bay\models\Message();
			$message->message = $_POST['message'];
			$message->reply_to = $message_id;
			$message->sender_id = $_SESSION['profile_id'];
			$message->receiver_id = $old_message->sender_id;
			$message->product_id = $old_message->product_id;
			$message->insert();

			header('location:/Message/indexSellerMes/?message=Your message was sent');
		}
	}
}