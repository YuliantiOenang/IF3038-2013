<?php
include 'connectDB.php';

class CategoryAdder {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
	
	public function addCategory($nama, $user) {
		$flag = true;
		$users = explode(',', $user);
		$flaf &&= $this->db->query("INSERT INTO kategori (judul,username) VALUES ('" . $nama . ", '" . $user . "')");
		for($i = 0; $i < count($users); $i++)
			$flag &&= $this->db->query("INSERT INTO usercateg VALUES ((SELECT IDKategori FROM kategori WHERE username='" . $user . "'), '" . $users[$i] . "')");
		if($flag)
			echo 1;
		else
			echo 0;
	}
}

$adder = new CategoryAdder();
$adder->addCategory($_POST['name'], $_POST['users']);
?>