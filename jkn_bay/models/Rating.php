<?php
namespace jkn_bay\models;

class Rating extends \jkn_bay\core\Models{

	//Gets all of the ratings
	public function getRatingStatus($profile_id){
		//get all records from the rating table
		$SQL = "SELECT * FROM rating WHERE r_profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Rating");
		return $STMT->fetchAll();
	}

	public function addRatingStatus(){
		$SQL = "INSERT INTO rating (r_product_id, r_profile_id) VALUES (:product_id, :profile_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['product_id'=>$this->product_id, 
			 'profile_id'=>$this->profile_id]);
	}

	public function subRatingStatus(){
		$SQL = "DELETE FROM rating WHERE r_product_id=:product_id AND r_profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['product_id'=>$this->product_id, 
			 'profile_id'=>$this->profile_id]);
	}


	public function changeRatingData(){
		$SQL ="UPDATE product SET rating=:rating WHERE product_id =:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['rating'=>$this->rating,
						'product_id'=>$this->product_id]);
		
	}

	//Gets a specific product
	public function get($product_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Rating");
		return $STMT->fetch();
	}
}