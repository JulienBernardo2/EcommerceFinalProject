<?php
namespace jkn_bay\controllers;

class Message extends \jkn_bay\core\Controller{

	#[\jkn_bay\filters\Login]
	public function index(){
		$message = new \jkn_bay\models\Message();
		$messages = $message->getAllProfile($_SESSION['profile_id']);

		$this->view('Message/index', $messages);
	}
	
	public function add(){

	}

	public function delete(){

	}
}