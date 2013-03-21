<?php
require_once('connectDB.php');

if (isset($_POST['tugas'])){
	$db = new DB();
	
	$nama = mysql_real_escape_string($_POST['tugas']);
	$assignee = mysql_real_escape_string($_POST['asignee']);
	$tag = mysql_real_escape_string($_POST['tag']);
	$deadline = mysql_real_escape_string($_POST['deadline']);
	$kategori = $_POST['kategori'];
	$insertTugas = "INSERT INTO tugas (`IDKategori`, `deadline`, `name`, `tag`) VALUES ({$kategori}, '{$deadline}', '{$nama}', '{$tag}')";
	$db->query($insertTugas);
	$maxIDTask = "SELECT max(IDTask) FROM tugas";
	$db->query($maxIDTask);
	$db->singleRecord();
	
	if (isset($_FILES['filebutton1'])){
	$attachment1 = mysql_real_escape_string($_FILES['filebutton1']["name"]);
	$insertPelampiran = "INSERT INTO pelampiran (`IDTugas`, `lampiran`) VALUES ({$db->Record[0]}, '{$attachment1}')";
	$db->query($insertPelampiran);
	move_uploaded_file($_FILES['filebutton1']["tmp_name"], "upload/" . $attachment1);
	}
	
	if (isset($_FILES['filebutton2'])){
	$attachment2 = mysql_real_escape_string($_FILES['filebutton2']["name"]);
	$insertPelampiran = "INSERT INTO pelampiran (`IDTugas`, `lampiran`) VALUES ({$db->Record[0]}, '{$attachment2}')";
	$db->query($insertPelampiran);
	move_uploaded_file($_FILES['filebutton1']["tmp_name"], "upload/" . $attachment2);
	}
	
	if (isset($_FILES['filebutton3'])){
	$attachment3 = mysql_real_escape_string($_FILES['filebutton3']["name"]);
	$insertPelampiran = "INSERT INTO pelampiran (`IDTugas`, `lampiran`) VALUES ({$db->Record[0]}, '{$attachment3}')";
	$db->query($insertPelampiran);
	move_uploaded_file($_FILES['filebutton1']["tmp_name"], "upload/" . $attachment3);
	}
	
	
	$insertPenugasan = "INSERT INTO penugasan (`username`, `IDTask`) VALUES ('devin', {$db->Record[0]})";//NEED TO BE CHANGED!!
	$db->query($insertPenugasan);
	
	
}
else{
	echo("Unauthorized access!!");
}

?>