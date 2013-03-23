<?php
include 'connectDB.php';

class TaskDeleter {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
	
	public function deleteTask($id) {
		if($this->db->query('DELETE FROM komentar WHERE IDTask=' . $id) &&
			$this->db->query('DELETE FROM pelampiran WHERE IDTugas=' . $id) &&
			$this->db->query('DELETE FROM penugasan WHERE IDTask=' . $id) &&
			$this->db->query('DELETE FROM tugas WHERE IDTask=' . $id))
			echo 1;
		else
			echo 0;
	}
}

$deleter = new TaskDeleter();
$deleter->deleteTask($_POST['id']);