<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Issue {

	private $db;



	public function __construct($db_conn) {
		$this->db = $db_conn;
	}

	public function getTotalCount() {
		$sql = "SELECT * FROM issue";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->rowCount();

	}


	public function getWaitingCount() {
		$sql = "SELECT * FROM issue where status = '0'";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->rowCount();

	}

	public function getActualIssue(){
		$sql = 'SELECT issue.name as issue_name, DATE_FORMAT(issue.date, "%m/%Y") as issue_date, issue.id as issue_id FROM issue WHERE YEAR(issue.date) = YEAR(CURDATE()) ORDER BY issue.id DESC;';
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<div class="col-lg-4">';
				echo '<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">';
				echo '<div class="col-xs-1" align="center">';
				echo '<img src="img/vydani.png" alt="Girl in a jacket">';
				echo '</div>';
				echo '<h3>' .$returned_row["issue_name"].'</h3>';
				echo '<p>Vydáno: ' .$returned_row["issue_date"]. '</p>';
				echo '<button type="button" class="btn btn-primary">Stáhnout</button>';
				echo '</div>';
				echo '</div>';
				
			}
		} else echo "Nenalezeno žádné aktuální vydání";
	}

	public function getOldIssue(){
		$sql = 'SELECT issue.name as issue_name, DATE_FORMAT(issue.date, "%m/%Y") as issue_date, issue.id as issue_id FROM issue WHERE YEAR(issue.date) != YEAR(CURDATE()) ORDER BY issue.id DESC;';
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				echo '<p>';
				echo $returned_row["issue_name"]. ' | '. $returned_row["issue_date"].'</br>';
				echo '<a href="#">Stáhnout</a></br>';
				echo '</p>';
				
			}
		} else echo "Nenalezeno žádné starší vydání";
	}	

	public function getAllIssue(){
		$sql = 'SELECT issue.name as issue_name, DATE_FORMAT(issue.date, "%m/%Y") as issue_date, issue.id as issue_id, issue.status as issue_status FROM issue ORDER BY issue.id DESC;';
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				$randomNumber = rand(5,30);
				echo '<tr>';
				echo '<td>'.$returned_row["issue_name"].'</td>';
				echo '<td>'. $returned_row["issue_date"].'</td>';
				echo '<td>'. $returned_row["issue_status"].'</td>';
				echo '<td>'. $randomNumber.'</td>';
				echo '<td><button class="btn-xs btn-success">Zobrazit</button></td>';
				echo '</tr>';
			}
		} else echo "Nenalezeno žádné starší vydání";
	}	

	public function getAllIssueManage(){
		$sql = 'SELECT issue.name as issue_name, DATE_FORMAT(issue.date, "%m/%Y") as issue_date, issue.id as issue_id, issue.status as issue_status FROM issue ORDER BY issue.id DESC;';
		$query = $this->db->prepare($sql);
		$query->execute();
		if ($query->rowCount() > 0) {
			foreach ($query as $returned_row) {
				$randomNumber = rand(5,30);
				echo '<tr>';
				echo '<td>'.$returned_row["issue_name"].'</td>';
				echo '<td>'. $returned_row["issue_date"].'</td>';
				echo '<td>'. $returned_row["issue_status"].'</td>';
				echo '<td>'. $randomNumber.'</td>';
				echo '<td><button class="btn-xs btn-success">Zobrazit</button> <button class="btn-xs btn-primary">Upravit</button> <button class="btn-xs btn-danger">Odstranit</button></td>';
				echo '</tr>';
			}
		} else echo "Nenalezeno žádné starší vydání";
	}	

}