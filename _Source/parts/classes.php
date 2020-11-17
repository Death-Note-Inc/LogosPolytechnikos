<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class User {
	private $name;
	private $surname;
	private $email;
	private $role;
	private $password;
	private $db;

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

	public function is_admin() {
		if ($this->role == "1") return true;
		else return false;
	}


	public function __construct($db_conn) {
		$this->db = $db_conn;
	}


 	//register user
	public function register($name, $surname, $email, $role, $password) {
 		//check if user allready existu
		try {
			$hash_password = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users(name, surname, email, password, role) VALUES ('$name', '$surname', '$email', '$hash_password', '$role')";


			$query = $this->db->prepare($sql);



            // Execute the query
			$query->execute();

		} catch(PDOException $e) {
			echo $e;
		}
	}

	//login user
	public function login($email, $password) {
		try {
			$sql = "SELECT * FROM users WHERE email = '$email' ";
			$query = $this->db->prepare($sql);
			$query->execute();


			$returned_row = $query->fetch(PDO::FETCH_ASSOC);


			if ($query->rowCount() > 0) {
				if (password_verify($password, $returned_row["password"])) {
					$_SESSION["user_session"] = $returned_row["email"];
					return true;
				} else return false;
			}

		} catch (PDOException $e) {
			echo $e;
		}
	}	


	
	public function is_logged_in() {
		if (isset($_SESSION["user_session"])) {
			return true;
		}
	}

	public function redirect($url) {
		header("Location: $url");
	}

	public function log_out() {
		session_destroy();
		unset($_SESSION["user-session"]);
		return true;
	}
}