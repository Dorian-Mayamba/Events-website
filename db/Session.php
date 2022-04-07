<?php

class Session{
	private $userName;
	public function __construct(){
		session_start();
	}

	public function setUserName($userName){
		$_SESSION['name']=$userName;
		$this->userName=$userName;
	}
	
}

?>