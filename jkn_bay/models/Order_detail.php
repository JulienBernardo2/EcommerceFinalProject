<?php
namespace jkn_bay\models;

class Order_detail extends \jkn_bay\core\Models{

	public function insert(){
		$SQL = "INSERT INTO order_detail(order_id, product_id, qty, price) VALUES (:order_id, :product_id, :qty, :price) 
		ON DUPLICATE KEY UPDATE qty=qty+:qty";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['order_id'=>$this->order_id, 
			 'product_id'=>$this->product_id,
			 'qty'=>$this->qty, 
			 'price'=>$this->price]);
	}

	public function getForOrder($order_id){
		//get all records from the owner table
		$SQL = "SELECT order_detail.order_detail_id, order_detail.qty, product.* FROM order_detail JOIN product ON order_detail.product_id = product.product_id WHERE order_detail.order_id = :order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetchAll();
	}

	public function get($order_detail_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM order_detail WHERE order_detail_id=:order_detail_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_detail_id'=>$order_detail_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order_detail");
		return $STMT->fetch();
	}

	public function getForProduct($product_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM order_detail WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order_detail");
		return $STMT->fetch();
	}

	public function update(){
		$SQL = "UPDATE order_detail SET qty=:qty, price=:price WHERE order_detail_id=:order_detail_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['qty'=>$this->qty, 
			 'price'=>$this->price,
			 'order_detail_id'=>$this->order_detail_id
			]);
	}

	public function delete(){
		$SQL = "DELETE FROM order_detail WHERE order_detail_id=:order_detail_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_detail_id'=>$this->order_detail_id]);
	}

	public function deleteProductDetail(){
		$SQL = "DELETE FROM order_detail WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}
}
