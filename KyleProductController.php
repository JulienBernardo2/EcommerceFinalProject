<?php
namespace jkn_bay\controllers;

class Product extends \jkn_bay\core\Controller{

	 public function indexAdmin(){

	 	//Get current SESSION profile id
		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->get($_SESSION['username']);
		$profile_id = $profile->profile_id;

		//Gets all of the products for that profile_id
	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->getAllProfile($profile_id);

	 	//Creates the view with those products
		$this->view('Product/indexAdmin', ['product'=>$products]);
 	 }

 	  public function indexBuyer(){

	 	//Gets all of the products for that profile_id
	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->getAll();

	 	//Creates the view with those products
		$this->view('Product/indexBuyer', ['product'=>$products]);
 	 }

 	 public function add(){
		if(isset($_POST['action'])){
			$profile = new \jkn_bay\models\Profile();
			$profile = $profile->get($_SESSION['username']);
			$profile_id = $profile->profile_id;

			$filename = $this->saveFile($_FILES['image']);

			$product = new \jkn_bay\models\Product();
			$product->profile_id = $profile_id;
			$product->name = $_POST['name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->quantity = $_POST['quantity'];
			$product->state = $_POST['state'];
			$product->image = $filename;

			$product->insert();	
			header('location:/Product/indexAdmin?message=Product Created');
		}else{
			$this->view('Product/add');
		}
	}

	public function delete($product_id){
			$product = new \jkn_bay\models\Product();
			$product = $product->get($product_id);
			$product->deleteMessages();
			$product->delete();
			
			header('location:/Product/indexAdmin?message=Product Deleted');
	}

	public function addRating($product_id){
		echo "hello";
			if(isset($_POST['action'])){
			$profile = new \jkn_bay\models\Profile();
			$profile = $profile->get($_SESSION['username']);
			$profile_id = $profile->profile_id;

			$product = new \jkn_bay\models\Product();
			$product->profile_id = $profile_id;
			$product->rating = 1;

			$product->addRatingData($product->profile_id);	
			header('location:/Product/indexBuyer?message=Rating Added');

		}else{
			
			$this->view('Product/indexBuyer');
		}
	}
}