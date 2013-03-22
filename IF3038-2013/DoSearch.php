<?php
require_once('connectDB.php');

if((isset($_GET['filter'])) && (isset($_GET['keyword'])) && $_GET['keyword'] != "Enter search query"){
	$filter = $_GET['filter']; 
	$keyword = $_GET['keyword']; 
	$db=new DB();
	$queryUser = "SELECT fullname FROM pengguna WHERE fullname LIKE('" .$keyword. "%') ORDER BY fullname;";
	$queryAllTugas = "SELECT IDTask, name, deadline, status, tag FROM `tugas` WHERE name LIKE '%$keyword%' OR tag LIKE '%$keyword%';";
	$queryKategori = "SELECT judul FROM kategori WHERE judul LIKE('" .$keyword. "%') ORDER BY judul;";
	if($filter == "semua"){
		$res = $db->query($queryAllTugas);
		$display =	"<input type='text' id='tugas' class='hidden' value='{$keyword}'><li class='Task1'>";
		$display .=	"<div>";
		$display .=	"<b class='design1'>Daftar Tugas</b>";
		$display .=	"</div>";
		while($db->nextRecord()){
			$display .=	"<div>";
			$display .= "<input type='checkbox' value='None' id='checklist{$db->Record['IDTask']}' name='check' onchange='changevalues({$db->Record['IDTask']})'" ;
			if($db->Record['status'] == 1)
				$display .= "checked";
			$display .= "/><a class='list' href='taskdetails.php'><span>Tag: {$db->Record['tag']}</span>{$db->Record['name']}</a>";
			$display .=	"<p>{$db->Record['deadline']}</p>";
			$display .=	"</div>";
		}
			$display .=	"</li>";
		
		$res = $db->query($queryKategori);
		$display .=	"<input type='text' class='hidden' id='kategori' value='{$keyword}'><li class='Task1'>";
		$display .=	"<div>";
		$display .=	"<b class='design1'>Daftar Kategori</b>";
		$display .=	"</div>";
		while($db->nextRecord()){
			$display .=	"<div>";
			$display .=	"<p>{$db->Record['judul']}</p>";
			$display .=	"</div>";
		}
			$display .=	"</li>";
		
		$res = $db->query($queryUser);
		$display .=	"<input type='text' id='user' class='hidden' value='{$keyword}'><li class='Task1'>";
		$display .=	"<div>";
		$display .=	"<b class='design1'>Daftar User</b>";
		$display .=	"</div>";
		while($db->nextRecord()){
			$display .=	"<div>";
			$display .=	"<p>{$db->Record['fullname']}</p>";
			$display .=	"</div>";
		}
			$display .=	"</li>";
			echo ($display);
		//$insertTugas = "INSERT INTO tugas (`IDKategori`, `deadline`, `name`, `tag`) VALUES ({$kategori}, '{$deadline}', '{$nama}', '{$tag}')";
		//$db->query($insertTugas);
	}
}
else{
	echo "Anauthorized Access!!";
}

?>