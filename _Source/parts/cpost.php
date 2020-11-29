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

		public function getLastestPost() {
		$sql = "SELECT MAX(id) FROM post";
		$query = $this->db->prepare($sql);
		$query->execute();

		$returned_row = $query->fetch(PDO::FETCH_ASSOC);
		return $returned_row["MAX(id)"];

	}

	public function getAllPost($userID){
		$sql = 'SELECT users.name as user_name, users.id, post.name as post_name, count(post.id) as versions, users.surname as user_surname, issue.name as issue_name, post.status FROM post 
		LEFT JOIN users on post.author_id = users.id LEFT JOIN issue on issue.id = post.issue_id WHERE users.id = '.$userID.'  GROUP BY post.id;';		
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<td>' .$returned_row["user_name"] ." " .$returned_row["user_surname"] .'</td>';
				echo '<td>' .$returned_row["post_name"] .'</td>';
				echo '<td>' .$returned_row["issue_name"] .'</td>';
				echo '<td>' .$returned_row["status"] .'</td>';
				echo '<td>' .$returned_row["versions"] .'</td>';
				echo '<td><a href="">Zobrazit recenzenty</td>';
				echo '<td><a href="">Zobrazit posudky</a></td>';
				echo '<td><button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>';
				echo "</tr>"; //todo
			}
		} else echo "nenalezen žádný článek";
	}

	public function getIssuePosts(){
		$ID = ($_GET['id']);
		$sql = 'SELECT users.name as user_name, users.surname as user_surname, post.name as post_name, count(post.id) as versions, post.status FROM post LEFT JOIN users on post.author_id = users.id WHERE post.issue_id = '.$ID.' GROUP BY post.id;';
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<td>' .$returned_row["user_name"] ." " .$returned_row["user_surname"] .'</td>';
				echo '<td>' .$returned_row["post_name"] .'</td>';
				//echo '<td>' .$returned_row["issue_name"] .'</td>';
				echo '<td>' .$returned_row["status"] .'</td>';
				echo '<td>' .$returned_row["versions"] .'</td>';
				echo '<td><a href="">Zobrazit recenzenty</td>';
				echo '<td><a href="">Zobrazit posudky</a></td>';
				echo '<td><button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>';
				echo "</tr>"; //todo
			}
		} else echo "nenalezen žádný článek";
	}

}

