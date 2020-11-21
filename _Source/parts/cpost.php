<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Post {

	private $db;



	public function __construct($db_conn) {
		$this->db = $db_conn;
	}

	public function getTotalCount() {
		$sql = "SELECT * FROM post";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->rowCount();

	}


	public function getWaitingCount() {
		$sql = "SELECT * FROM post where status = '0'";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->rowCount();

	}

	public function getAllPost($filtration){
		//todo

		switch ($filtration) {
			case 'value':
				# code...
				break;
			
			default:
				$sql = "SELECT * FROM post";
				$query = $this->db->prepare($sql);
				$query->execute();
				$returned_row = $query->fetch(PDO::FETCH_ASSOC);
				if ($query->rowCount() > 0) {
					foreach ($returned_row as $row) {
						echo "<th>Autor</th>
            <th>Název</th>
            <th>Vydání</th>
            <th>Status</th>
            <th>Počet verzí</th>
            <th>Akce</th></tr>"; //todo
					}
				} else echo "nenalezen žádný článek";
			}
		}
	}


/* 
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

}
*/