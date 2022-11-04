<?php
namespace jkn_bay\core;

class Models{
	protected static $_connection;

	public function __construct(){
		$username = 'root';
		$password = '';
		$server = 'localhost';
		$dbname = 'jkn';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname", 
				$username, $password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		}catch(\Exception $e){
			exit(0);
		}


	}
}