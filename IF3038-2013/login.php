<?php
include 'connectDB.php';

class Login {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
	
	public function canLogin($username, $pass) {
		$result = $this->db->query('SELECT COUNT(*) FROM pengguna WHERE username="' . $username . '" AND password="' . $pass . '"');
		$result = mysql_fetch_assoc($result);
		$result = $result['COUNT(*)'];
		if($result > 0) {
			session_start();
			$_SESSION['bananauser'] = $username;
			echo 'success';
		}
		else
			echo 'notsuccess';
	}
}

$logger = new Login();
$logger->canLogin($_POST['user'], $_POST['pass']);