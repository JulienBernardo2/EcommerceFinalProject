<?php
namespace jkn_bay\models;

class Profile extends \jkn_bay\core\Models{

	public function get($username){
		//get all records from the owner table
		$SQL = "SELECT * FROM profile WHERE username LIKE :username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Profile");
		return $STMT->fetch();
	}

	public function getProfileId($profile_id){
		//get all records from the owner table
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "jkn_bay\\models\\Profile");
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO profile(username, first_name, last_name, postal_code, city, password_hash, role) VALUES (:username, :first_name, :last_name, :postal_code, :city, :password_hash, :role)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['username'=>$this->username,
			 'first_name'=>$this->first_name, 
			 'last_name'=>$this->last_name, 
			 'postal_code'=>$this->postal_code, 
			 'city'=>$this->city, 
			 'password_hash'=>$this->password_hash,
			 'role'=>$this->role]);
		$profile_id = self::$_connection->lastInsertId();
		return $profile_id;
	}

	public function update(){
		$SQL = "UPDATE profile SET username=:username, first_name=:first_name, last_name=:last_name, postal_code=:postal_code, city=:city WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['username'=>$this->username,
			 'first_name'=>$this->first_name, 
			 'last_name'=>$this->last_name, 
			 'postal_code'=>$this->postal_code, 
			 'city'=>$this->city,
			 'profile_id'=>$this->profile_id]);
	}
}