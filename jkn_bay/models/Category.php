<?php
namespace jkn_bay\models;

class Category extends \jkn_bay\core\Models{

	//needs to connect to the DB - through the Model base class

	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM category";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Category");
		return $STMT->fetchAll();
	}

	public function getAllSimilarCat($search_val){
		//get all records from the owner table
		$SQL = "SELECT * FROM category WHERE name LIKE '%$search_val%'";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Category");
		return $STMT->fetchAll();
	}
}