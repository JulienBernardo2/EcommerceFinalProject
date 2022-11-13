<?php
namespace jkn_bay\controllers;

class Product extends \jkn_bay\core\Controller{

	//Creates the seller page with their products
	public function indexSeller(){
		
		//Gets all of the products for the current seller logged in
	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->getAllProfile($_SESSION['profile_id']);

		$this->view('Product/indexSeller', ['product'=>$products]);
 	}

 	//Allows sellers to add products to the catalog
 	public function add(){
		
		//Checks if seller pressed the "Add Product" button
		if(isset($_POST['action'])){
			
			//Creates the product and sets all of the values from the form inputs
			$product = new \jkn_bay\models\Product();
			$filename = $this->saveFile($_FILES['image']);
			$product->profile_id = $_SESSION['profile_id'];
			$product->name = $_POST['name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->quantity = $_POST['quantity'];
			$product->image = $filename;
			
			//Checks if seller selected the state of their object
			if($_POST['state'] == null){
				header('location:/Product/add?error=Please choose the state');
			} else{
				$product->state = $_POST['state'];
			}
			
			//Checks if the seller put a category or not
			if($_POST['category'] == 'None'){
				$product->category_id = null;
			} else{
				$product->category_id = $_POST['category'];
			}

			//Creates the product
			$product->insert();

			header('location:/Product/indexSeller?message=Product Created');
		}else{

			//Gets all of the categorys
	 		$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Product/add', ['categorys'=>$categorys]);
		}
	}

	//Allows sellers to edit their products
	public function edit($product_id){

		//Gets the product to edit
		$product = new \jkn_bay\models\Product();
		$product = $product->get($product_id);
		
		//Checks if seller pressed the "Edit Product" button
		if(isset($_POST['action'])){

			
			//Deletes the old product picture and changes it to the new one
			$filename = $this->saveFile($_FILES['image']);

			if($filename){
				unlink("images/$product->image");
				$product->image = $filename;
			}
			
			//Sets all of the values from the form inputs for the product
			$product->name = $_POST['name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->quantity = $_POST['quantity'];
			$product->state = $_POST['state'];
			$product->category_id= $_POST['category'];

			//Updates the product
			$product->update();

			header('location:/Product/indexSeller/' . $_SESSION['profile_id']);
		}else{
			
			//Gets all of the categorys
			$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();
			
			$this->view('/Product/edit', ['product'=>$product, 'categorys'=>$categorys]);
		}
	}

	//Allows seller to delete his product
	public function delete($product_id){
			
			//Gets the product to delete
			$product = new \jkn_bay\models\Product();
			$product = $product->get($product_id);

			//Gets the order details for the specified product incase buyers added them to their cart
			$order_detail = new \jkn_bay\models\Order_detail();
			$order_detail= $order_detail->getForProduct($product_id);

			//It deletes the order details for the product in the buyers cart
			if($order_detail != null){
				$order_detail->deleteProductDetail();	
			}
			
			//Deletes all messages between buyer and seller regarding the product
			$product->deleteMessages();

			//Deletes the product
			$product->delete();
				
			header('location:/Product/indexSeller?message=Product Deleted');
	}

 	//Creates the buyer page with the catalog
 	public function indexBuyer(){

 		//Gets all of the products for the catlog
	 	$product = new \jkn_bay\models\Product();
	 	$products = $product->getAll();
	 	
	 	//Gets all of the categorys for the catalog
	 	$category = new \jkn_bay\models\Category();
	 	$categorys = $category->getAll();

	 	$this->view('Product/indexBuyer', ['product'=>$products, 'categorys'=>$categorys]);
 	}

 	//Allows buyers to search through the catalog
 	public function search(){
	 	
		//Gets the value from the search box
	 	$search_val = $_GET['searchbar'];

	 	//Gets all of the products related to the search box value
	 	$product = new \jkn_bay\models\Product();
		$products = $product->getAllSimilar($search_val);

		//Sends an error that no products matched the search box value
		if($products == null){
			header('location:/Product/indexBuyer?error=No products match');
		}

		//Gets all of the categorys for the catalog
	 	$category = new \jkn_bay\models\Category();
	 	$categorys = $category->getAll();
	
		$this->view('Product/indexBuyer', ['product'=>$products, 'categorys'=>$categorys]);
	}

	//Allows buyers to filter ther catalog
	public function filterCategory($category_id){
		
		//If no filter is selected
		if($category_id == 'None'){
			
			//Gets all of the products for the catalog
			$product = new \jkn_bay\models\Product();
	 		$products = $product->getAll();
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Product/indexBuyer', ['product'=>$products, 'categorys'=>$categorys]);
		}else{
			
			//Gets all of the products for the specified category
			$product = new \jkn_bay\models\Product();
			$products = $product->getAllCategory($category_id);
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Product/indexBuyer', ['product'=>$products, 'categorys'=>$categorys]);
		}
	} 
}