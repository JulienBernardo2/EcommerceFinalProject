<?php
namespace jkn_bay\filters;

#[\Attribute]
class Buyer extends \jkn_bay\core\AccessFilter{
	
	public function execute(){
		if($_SESSION['role'] != 'buyer'){
			header('location:/Product/indexSeller?error=Your account does not have the privelage to this page');
			return true;
		}
		return false;
	}
}