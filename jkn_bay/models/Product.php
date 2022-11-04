<?php
namespace jkn_bay\models;

class Product extends \jkn_bay\core\Models{

	public function insert(){
		$SQL = "INSERT INTO product (profile_id, name, description, price, quantity, state, image) VALUES (:profile_id, :name, :description, :price, :quantity, :state, :image)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id, 
			 'name'=>$this->name,
			 'description'=>$this->description, 
			 'price'=>$this->price,
			 'quantity'=>$this->quantity,
			 'state'=>$this->state,
			 'image'=>$this->image]);
	}

	public function getAllProfile($profile_id){
		$SQL = "SELECT * FROM product WHERE profile_id = :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Product");
		return $STMT->fetchAll();
	}

}