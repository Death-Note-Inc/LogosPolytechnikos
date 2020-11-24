<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class User {
	private $db;

	//get user info using database
	function getUserInfo($information) {
		if ($this->is_logged_in()) {
			$session = ($_SESSION["user_session"]);
			$sql = "SELECT * FROM users WHERE email = '$session'";
			$query = $this->db->prepare($sql);
			$query->execute();
			$returned_row = $query->fetch(PDO::FETCH_ASSOC);
			switch ($information) {
				case 'name':
					return $returned_row["name"];
					break;
				case 'surname':
					return $returned_row["surname"];
					break;
				case 'email':
					return $returned_row["email"];
					break;
				case 'hash_password':
					return $returned_row["hash_password"];
					break;
				case 'role':
					return $returned_row["role"];
					break;
				
				default:
					return false;
					break;
			}

		}
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


	public function getUsersCount() {
		$sql = "SELECT id FROM users";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->rowCount();

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

	public function allUsers(){
		return "null"; //todo
	}
}