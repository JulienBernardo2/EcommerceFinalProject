<?php
namespace jkn_bay\models;

class Order_detail extends \jkn_bay\core\Models{

	public function insert(){
		$SQL = "INSERT INTO order_detail (profile_id, name, description, price, quantity, state, image) VALUES (:profile_id, :name, :description, :price, :quantity, :state, :image)";
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

	public function getForOrder($order_id){
		//get all records from the owner table
		$SQL = "SELECT order_detail.order_detail_id, product.* FROM order_detail JOIN product ON order_detail.product_id = product.product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetchAll();
	}

	public function get($order_detail_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM 'order' WHERE order_id=:order_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['order_id'=>$order_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Order");
		return $STMT->fetch();
	}

	public function update(){
		$SQL = "UPDATE product SET name=:name, description=:description, price=:price, quantity=:quantity, state=:state, image=:image WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['name'=>$this->name,
			 'description'=>$this->description, 
			 'price'=>$this->price, 
			 'quantity'=>$this->quantity, 
			 'state'=>$this->state,
			 'image'=>$this->image,
			 'product_id'=>$this->product_id]);
	}

		public function delete(){
		$SQL = "DELETE FROM product WHERE product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$this->product_id]);
	}
}
