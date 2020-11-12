<?php
 class User {
 	private $name;
 	private $surname;
 	private $email;
 	private $role;
 	private $password;

 	//getters
 	function getName() {
 		return $this->name;
 	}
 	function getSurname() {
 		return $this->surname;
 	}
 	function getEmail() {
 		return $this->email;
 	}
 	function getRole() {
 		return $this->role;
 	}

 	//create user
 	public function __construct($name, $surname, $email, $role, $password) {
 		$this->name = $name;
 		$this->surname = $surname;
 		$this->email = $email;
 		$this->role = $role;
 		$this->password = $password;

 		return true; //zalozen
 		//return false; //chyba
 		//die("Závažná chyba, nelze vytvořit uživatele")
 		//todo
 		//osetrit chybu, kdy uzivatelsky ucet jiz exituje

 	}
 	public function is_logged_in() {
 		if (isset($_SESSION["user_session"])) {
 			return true;
 		}
 	}

 	public function redirect($url) {
 		header("Location: $url")
 	}
 	
 	public function log_out() {
 		session_destroy();
 		unset($_SESSION["user-session"]);
 		return true;
 	}
 }