<?php
namespace jkn_bay\controllers;

class Product extends \jkn_bay\core\Controller{

	 public function indexSeller(){

	 	//Get current SESSION profile id
		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->getProfileId($_SESSION['profile_id']);
		$profile_id = $profile->profile_id;

		//Gets all of the products for that profile_id
	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->getAllProfile($profile_id);

	 	//Creates the view with those products
		$this->view('Product/indexSeller', ['product'=>$products]);
 	 }

 	 public function search(){
	 	$product = new \jkn_bay\models\Product();

		$search_val = $_GET['searchbar'];

		$products = $product->getAllSimilar($search_val);
		$this->view('Product/indexBuyer', ['product'=>$products]);
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
			header('location:/Product/indexSeller?message=Product Created');
		}else{
			$this->view('Product/add');
		}
	}

	public function delete($product_id){
			$product = new \jkn_bay\models\Product();
			$product = $product->get($product_id);
			$product->deleteMessages();
			$product->delete();
			
			header('location:/Product/indexSeller?message=Product Deleted');
	}


	public function edit($product_id){

		$product = new \jkn_bay\models\Product();
		$product = $product->get($product_id);
		
		$profile = new \jkn_bay\models\Profile();
		$profile = $profile->getProfileId($_SESSION['profile_id']);

		
		
		if(isset($_POST['action'])){

			$filename = $this->saveFile($_FILES['image']);

			if($filename){
				//delete the old picture and then change the picture
				unlink("images/$product->image");
				$product->image = $filename;
			}
			
			$product->name = $_POST['name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->quantity = $_POST['quantity'];
			$product->state = $_POST['state'];

			$product->update();

			header('location:/Product/indexSeller/' . $profile_id);
		}else{
			
			$this->view('/Product/edit', $product, $profile);
		}
	}
}
