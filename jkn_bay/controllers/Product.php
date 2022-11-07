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

	public function edit($product_id){

		$product = new \jkn_bay\models\Product();
		$product = $product->get($product_id);
		
		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->get($_SESSION['username']);
		
		if(isset($_POST['action'])){

			
			$product->name = $_POST['name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->quantity = $_POST['quantity'];
			$product->state = $_POST['state'];
			$product->image = $_POST['image'];

			//$product->update();

			//header('location:/Product/indexAdmin/' . $profile_id);
		}else{
			
			$this->view('/Product/edit', $product, $profile);
		}
	}

	public function delete($product_id){
			$product = new \jkn_bay\models\Product();
			$product = $product->get($product_id);
			$product->deleteMessages();
			$product->delete();
			
			header('location:/Product/indexAdmin?message=Product Deleted');
	}
}