<?php
namespace jkn_bay\filters;

#[\Attribute]
class Login extends \jkn_bay\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login?error=You must login to use these features!');
			return true;
		}
}