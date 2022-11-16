<?php
namespace jkn_bay\models;

class Message extends \jkn_bay\core\Models{

	//Create discounts
	public function insert(){
		$SQL = "INSERT INTO message(profile_id, message, flag) VALUES (:profile_id, :message, :flag)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$this->profile_id,
			 'message'=>$this->message,	
			 'flag'=>$this->flag]);
	}

	//Gets all the messages based for a profile
	public function getAllProfile($profile_id){
		$SQL = "SELECT * FROM message WHERE profile_id = :profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Message");
		return $STMT->fetchAll();
	}

	//Deletes all messages based on the product
	public function delete(){
		$SQL = "DELETE FROM message WHERE message_id=:message_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['message_id'=>$this->message_id]);
	}
	
	//Gets a specific product
	public function get($message_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM message WHERE message_id=:message_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['message_id'=>$message_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Message");
		return $STMT->fetch();
	}

	//Gets the specific order
	public function getDiscountMessage($profile_id){
		$SQL = "SELECT * FROM message WHERE profile_id=:profile_id && flag=:flag";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id, 'flag'=>'discount']);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Message");
		return $STMT->fetch();
	}
}