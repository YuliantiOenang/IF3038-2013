<?php
include 'connectDB.php';

class Registerer {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
	
	public function registerUser($username, $pass, $name, $birth, $email) {
		$date = explode('-',$birth);
		$date = $date[2] . '-' . $date[1] . '-' . $date[0];
		$this->db->query("INSERT INTO pengguna VALUES ('" . $username . "', '" . $pass . "', '" . $name . "', '" . $date . "', '" . $email . "', 'avatar/" . $username . "')");
		move_uploaded_file($_FILES['avatar']['tmp_name'], 'avatar/' . $username . '.jpg');
	}
}

$Submit = new Registerer();
$Submit->registerUser($_POST['username'], $_POST['pass'], $_POST['name'], $_POST['birth'], $_POST['email']);
header('location:index.php');
?>