<?php
namespace jkn_bay\models;

class Product extends \jkn_bay\core\Models{

	public function insert(){
		$SQL = "INSERT INTO product (profile_id, name, description, price, quantity, state, rating, image) VALUES (:profile_id, :name, :description, :price, :quantity, :state, :rating :image)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id, 
			 'name'=>$this->name,
			 'description'=>$this->description, 
			 'price'=>$this->price,
			 'quantity'=>$this->quantity,
			 'state'=>$this->state,
			 'rating'=>$this->rating,
			 'image'=>$this->image]);
	}

	public function getAllProfile($profile_id){
		$SQL = "SELECT * FROM product WHERE profile_id = :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	public function delete(){
		$SQL = "DELETE FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}

	public function deleteMessages(){
		$SQL = "DELETE FROM message WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}

	public function get($product_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetch();
	}

	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM product";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

	public function addRatingData($profile_id){
		$SQL = "INSERT INTO product (rating) WHERE profile_id = :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['rating'=>$this->rating]);
	}

	// public function getSeller(){
	// 	//get all records from the owner table
	// 	$SQL = "SELECT * FROM product AND profile WHERE product.profile_id = profile.profile_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute();//pass any data for the query
	// 	$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
	// 	return $STMT->fetchAll();
	// }
}