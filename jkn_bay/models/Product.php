<?php
namespace jkn_bay\models;

class Product extends \jkn_bay\core\Models{
	
	//Creates a product
	public function insert(){
		$SQL = "INSERT INTO product (profile_id, name, description, price, quantity, category_id, state, image) VALUES (:profile_id, :name, :description, :price, :quantity, :category_id, :state, :image)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id, 
			 'name'=>$this->name,
			 'description'=>$this->description, 
			 'price'=>$this->price,
			 'quantity'=>$this->quantity,
			 'state'=>$this->state,
			 'category_id'=>$this->category_id,
			 'image'=>$this->image]);
	}

	//Updates a product
	public function update(){
		$SQL = "UPDATE product SET name=:name, description=:description, price=:price, quantity=:quantity, state=:state, category_id=:category_id, image=:image WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['name'=>$this->name,
			 'description'=>$this->description, 
			 'price'=>$this->price, 
			 'quantity'=>$this->quantity, 
			 'state'=>$this->state,
			 'category_id'=>$this->category_id,
			 'image'=>$this->image,
			 'product_id'=>$this->product_id]);
	}

	//Updates a product quantity
	public function subtract($product_id, $quantity){
		$SQL = "UPDATE product SET quantity=-:quantity WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['quantity'=>$this->quantity,
			 'product_id'=>$this->product_id]);
	}

	//Deletes a specified product
	public function delete(){
		$SQL = "DELETE FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}

	//Deletes all messages based on the product
	public function deleteMessages(){
		$SQL = "DELETE FROM message WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}

	//Gets a specific product
	public function get($product_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetch();
	}

	//Gets username for a specific product
	public function getUsername($product_id){
		//get all records from the owner table
		$SQL = "SELECT profile.username FROM profile JOIN product ON profile.profile_id = product.profile_id WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetch();
	}

	//Gets all of the products
	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT product.*, profile.username FROM product INNER JOIN profile on product.profile_id = profile.profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	//Gets all the products based for a profile
	public function getAllProfile($profile_id){
		$SQL = "SELECT * FROM product WHERE profile_id = :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	//Gets all of the products for an order based on the category
	public function getForOrder($category_name){
		$SQL = "SELECT * FROM product JOIN category ON product.category_id = category.category_id WHERE category.nicename = :category_name AND category.category_id = product.category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	//Gets all of the products for a category
	public function getAllCategory($category_id){
		//$SQL = "SELECT * FROM product WHERE category_id =:category_id";
		$SQL = "SELECT product.*, profile.username FROM profile JOIN product ON profile.profile_id = product.profile_id WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$category_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	//Gets all of the products similar to the search value
	public function getAllSimilar($search_val){
		//get all records from the owner table
		$SQL = "SELECT * FROM product WHERE name LIKE '%$search_val%' ";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}
}