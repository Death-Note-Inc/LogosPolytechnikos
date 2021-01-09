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

	
	public function getAllPost(){
		$sql = 'SELECT users.name as user_name, users.id as user_id, post.name as post_name, count(post.id) as versions, users.surname as user_surname, issue.name as issue_name, post.status, post.id as post_id, 
		post.reviewer_id as reviewer_id FROM post 
		LEFT JOIN issue on issue.id = post.issue_id LEFT JOIN users on users.id = post.author_id GROUP BY post.id;';		
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<td>' .$returned_row["user_name"] ." " .$returned_row["user_surname"] .'</td>';
				echo '<td>' .$returned_row["post_name"] .'</td>';
				echo '<td>' .$returned_row["issue_name"] .'</td>';
				echo '<td>' .$returned_row["status"] .'</td>';
				echo '<td>' .$returned_row["versions"] .'</td>';
				$user_id = $returned_row["reviewer_id"];
				echo $this->getReviewer($user_id);
				echo '<td><a href="">Zobrazit posudky</a></td>';
				//echo '<td><button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>';
				echo '<td><a href="./post-manage.php?id=' . $returned_row["post_id"] . '"><button class="btn-xs btn-success">Spravovat</button></a></td>';
				echo "</tr>"; //todo
			}
		} else echo "nenalezen žádný článek";
	}

	public function getReviewer($user_id){
		
		$sql = "SELECT name as user_name, surname as user_surname, users.id as users_id FROM users WHERE users.id='$user_id' ";	
		$query = $this->db->prepare($sql);
		$query->execute();
		
		foreach ($query as $returned_row) {
			echo '<td>' .$returned_row["user_name"] ." ".$returned_row["user_surname"] .'</td>';
			
		}
		if(!isset($returned_row['user_name']))
			echo '<td>-</td>';
	}	

	public function getAllPostReviewer($userID){
		$sql = 'SELECT users.name as user_name, users.id, post.name as post_name, post.id as post_id, count(post.id) as versions, users.surname as user_surname, issue.name as issue_name, post.status, post.reviewer_id as reviewer_id FROM post 
		LEFT JOIN users on post.author_id = users.id LEFT JOIN issue on issue.id = post.issue_id WHERE post.reviewer_id = '.$userID.'  GROUP BY post.id;';		
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<td>' .$returned_row["user_name"] ." " .$returned_row["user_surname"] .'</td>';
				echo '<td>' .$returned_row["post_name"] .'</td>';
				echo '<td>' .$returned_row["issue_name"] .'</td>';
				echo '<td>' .$returned_row["status"] .'</td>';
				echo '<td>' .$returned_row["versions"] .'</td>';
				$user_id = $returned_row["reviewer_id"];
				echo $this->getReviewer($user_id);
				echo '<td><a href="">Zobrazit posudky</a></td>';
				echo '<td><a href="./post-manage.php?id=' . $returned_row["post_id"] . '"><button class="btn-xs btn-success">Spravovat</button></a></td>';
				echo "</tr>"; //todo
			}
		} else echo "nenalezen žádný článek";
	}

	public function getAllPostUser($userID){
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
				$user_id = $returned_row["reviewer_id"];
				echo $this->getReviewer($user_id);
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

	public function create($id, $stav, $nazev){
		$sql = "INSERT INTO post(author_id, status, name) VALUES('$id','$stav','$nazev');";
		$query = $this->db->prepare($sql);
		$query->execute();
	}	

	function getPostInfo($information) {
		$ID = ($_GET['id']);
		$sql = "SELECT post.name as name, post.author_id as author_id, post.status as status, post.issue_id as issue_id, users.name as user_name, users.surname as user_surname, issue.name as issue_name FROM post LEFT JOIN users on post.author_id = users.id LEFT JOIN issue on issue.id = post.issue_id WHERE post.id = '$ID'";
		$query = $this->db->prepare($sql);
		$query->execute();
		$returned_row = $query->fetch(PDO::FETCH_ASSOC);
		switch ($information) {
			case 'name':
				return $returned_row["name"];
				break;
			case 'author_id':
				return $returned_row["user_name"]." ". $returned_row["user_surname"];
				break;
			case 'status':
				return $returned_row["status"];
				break;
			case 'issue_id':
				return $returned_row["issue_id"];
				break;				

			
			default:
				return false;
				break;

		}
	}


	public function getReviewers(){
		$sql = "SELECT name as user_name, surname as user_surname, users.id as users_id FROM users WHERE role='recenzent' ";
		
		$query = $this->db->prepare($sql);
		$query->execute();



		echo '<select name="reviewers" class="form-control">';
		echo '<option value="0">Vyberte recenzenta</option>';

				foreach ($query as $returned_row)
				{

				echo '<option value = "'.$returned_row['users_id'].'" >';
				echo $returned_row['user_name']. " " .$returned_row['user_surname'];
				echo '</option>';
				}               
			
		echo '</select>';

	}	

	public function getIssuesForPost(){
		$sql = "SELECT issue.name as issue_name, issue.id as issue_id FROM issue";
		
		$query = $this->db->prepare($sql);
		$query->execute();

		$test = "test";

		echo '<select name="issues" class="form-control">';
		//echo '<option value="0">Vyberte vydání</option>';

				foreach ($query as $returned_row)
				{

				echo '<option value = "'.$returned_row['issue_id'].'" >';
				echo $returned_row['issue_name'];
				echo '</option>';
				}               
			
		echo '</select>';

	}

	public function updatePost($test, $issue_id, $name, $status){
		$ID = ($_GET['id']);
		$sql = "UPDATE post SET reviewer_id='$test', issue_id='$issue_id', name='$name', status='$status' WHERE id=$ID";
		$query = $this->db->prepare($sql);
		$query->execute();
	}	

}

