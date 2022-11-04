<?php
namespace jkn_bay\controllers;

class Profile extends \jkn_bay\core\Controller{

	 public function index(){
		if(isset($_POST['action'])){
			$profile = new \jkn_bay\models\Profile();
			$profile = $profile->get($_POST['username']);
			if(password_verify($_POST['password'], $profile->password_hash)){
				$_SESSION['username'] = $profile->username;
				$_SESSION['profile_id'] = $profile->profile_id;
				$_SESSION['role'] = $profile->role;

				if($_SESSION['role'] == 'seller'){
					header('location:/Product/indexAdmin?message=You have been successfully logged in');
				}else{
					header('location:/Product/indexBuyer?message=You have been successfully logged in');
				}
			}else{
				header('location:/Profile/index?error=Incorrect username or password');
			}

		}else{
			$this->view('Profile/index');
		}
 	 }

	 public function register(){
		 if(isset($_POST['action'])){
			if($_POST['password'] == $_POST['password_confirmation']){
			 		$profile = new \jkn_bay\models\Profile();

			 		if($profile->get($_POST['username'])){
			 			header('location: Profile/register?error=The Username already exists, Choose another');
			 		}else{
			 			$profile->username = $_POST['username'];
			 			$profile->first_name = $_POST['first_name'];
			 			$profile->last_name = $_POST['last_name'];
			 			$profile->postal_code = $_POST['postal_code'];
			 			$profile->city = $_POST['city'];
			 			$profile->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 			$profile->role = $_POST['role'];
			 			$profile_id =  $profile->insert();
			 			$_SESSION[$_POST['username']] =  $profile->username;
						$_SESSION['profile_id'] = $profile_id;
						header('location:/Profile/index?message=Your profile is set up, login when ready');
			 		}
			} 	 	
		 }else{
		 	$this->view('Profile/register');
		 }
	 }

	public function logout(){
		session_destroy();
		header('location:/Product/indexBuyer?message=You\'ve been successfully logged out');
	}
}