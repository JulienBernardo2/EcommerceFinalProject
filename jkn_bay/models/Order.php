<?php
namespace jkn_bay\models;

class Order extends \jkn_bay\core\Models{

	public function insert(){
		$SQL = "INSERT INTO `order` (profile_id, status) VALUES (:profile_id, :status)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id, 
			 'status'=>$this->status]);
		$this->order_id = self::$_connection->lastInsertId();
	}

	public function delete(){
		$SQL = "DELETE FROM `order` WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$this->order_id]);
	}

	public function findProfileCart($profile_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM `order` WHERE profile_id=:profile_id && status=:status";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id, 'status'=>'cart']);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetch();
	}

	public function get($order_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM `order` WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetch();
	}

	public function getForProduct($product_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM `order` WHERE product_id = :product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetchAll();
	}

	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM `order`";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetchAll();
	}

	public function update(){
		$SQL = "UPDATE `order` SET status=:status WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['status'=>$this->status,
			 'order_id'=>$this->order_id]);
	}
}
