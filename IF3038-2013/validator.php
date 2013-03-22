<?php
include 'connectDB.php';

class Validator {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
		
	public function checkUser($username) {
		if(!empty($username)) {
			$result = $this->db->query('select count(*) from pengguna where username=\'' . $username . '\'');
			$result = mysql_fetch_assoc($result);
			$result = $result['count(*)'];
			if($result > 0)
				echo 'notfree';
			else
				echo 'free';
		}
		else
			echo 'notfree';
	}
	
	public function checkEmail($email) {
		if(!empty($email)) {
			$result = $this->db->query('select count(*) from pengguna where email=\'' . $email . '\'');
			$result = mysql_fetch_assoc($result);
			$result = $result['count(*)'];
			if($result > 0)
				echo 'notfree';
			else
				echo 'free';
		}
		else
			echo 'notfree';
	}
}

$checker = new Validator();
if(isset($_POST['username']))
	$checker->checkUser($_POST['username']);
if(isset($_POST['email']))
	$checker->checkEmail($_POST['email']);
?>