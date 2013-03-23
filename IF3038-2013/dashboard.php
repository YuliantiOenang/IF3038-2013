<?php
include 'connectDB.php';

class DashboardWriter {
	private $db;
	
	public function __construct() {
		$this->db = new DB();
		$this->db->connectDB();
	}
	
	public function writeCategory($user) {
		$result = '';
		$tuples = $this->db->query('SELECT kategori.IDKategori AS id, judul FROM kategori INNER JOIN tugas USING(IDKategori) INNER JOIN penugasan USING(IDtask) WHERE penugasan.username="' . $user . '"');
		while($array = mysql_fetch_assoc($tuples)) {
			$result = $result . '<idkategori>' . $array['id'] . '</idkategori>';
			$result = $result . '<kategori>' . $array['judul'] . '</kategori>';
		}
		$tuples = $this->db->query('SELECT kategori.IDKategori AS id, judul FROM kategori WHERE username="' . $user . '"');
		while($array = mysql_fetch_assoc($tuples)) {
			$result = $result . '<idkategori>' . $array['id'] . '</idkategori>';
			$result = $result . '<kategori>' . $array['judul'] . '</kategori>';
		}
		echo $result;
	}
	
	public function writeTask($user) {
		$result = '';
		$tuples = $this->db->query('SELECT tugas.IDTask AS ID, name, deadline, stat, tag, penugasan.username
			FROM tugas INNER JOIN penugasan USING (IDTask)
			WHERE penugasan.username="' . $user . '"');
		while($array = mysql_fetch_assoc($tuples)) {
			$result = $result . '<id>' . $array['ID'] . '</id>';
			$result = $result . '<nama>' . $array['name'] . '</nama>';
			$result = $result . '<deadline>' . $array['deadline'] . '</deadline>';
			$result = $result . '<status>' . $array['stat'] . '</status>';
			$result = $result . '<tag>' . $array['tag'] . '</tag>';
			if($array['pembuat'] == $user)
				$result = $result . '<canerase>true</canerase>';
			else
				$result = $result . '<canerase>false</canerase>';
		}
		$tuples = $this->db->query('SELECT IDTask, name, deadline, stat, tag, username
			FROM tugas WHERE username="' . $user . '"');
		while($array = mysql_fetch_assoc($tuples)) {
			$result = $result . '<id>' . $array['IDTask'] . '</id>';
			$result = $result . '<nama>' . $array['name'] . '</nama>';
			$result = $result . '<deadline>' . $array['deadline'] . '</deadline>';
			$result = $result . '<status>' . $array['stat'] . '</status>';
			$result = $result . '<tag>' . $array['tag'] . '</tag>';
			if($array['username'] == $user)
				$result = $result . '<canerase>true</canerase>';
			else
				$result = $result . '<canerase>false</canerase>';
		}
		echo $result;
	}
}

$writer = new DashboardWriter();
header('Content-type: text/xml');
echo("<?xml version=\"1.0\" encoding=\"utf-8\"?>");
echo("<root>");
session_start();
$writer->writeCategory($_SESSION['bananauser']);
$writer->writeTask($_SESSION['bananauser']);
echo("</root>");
?>