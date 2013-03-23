<?php
require_once('connectDB.php');

if((isset($_GET['filter'])) && (isset($_GET['keyword'])) && $_GET['keyword'] != "Enter search query"){
	$display='';
	$user = $_GET['user'];
	$filter = $_GET['filter']; 
	$keyword = $_GET['keyword']; 
	$i = $_GET['id'];
	$awal = 10*($i-1);
	$akhir = (10 * $i) - 1 ;
	$db=new DB();
	$queryUser = "SELECT username FROM pengguna WHERE username LIKE('" .$keyword. "%') ORDER BY username LIMIT {$awal},{$akhir};";
	$queryAllTugas = "SELECT IDTask, name, deadline, stat, username, tag FROM `tugas` WHERE name LIKE '%$keyword%' OR tag LIKE '%$keyword%' LIMIT {$awal},{$akhir};";
	$queryKategori = "SELECT judul FROM kategori WHERE judul LIKE('" .$keyword. "%') ORDER BY judul LIMIT {$awal},{$akhir};";
	if($filter == "semua"){
		$res = $db->query($queryAllTugas);
		$satu = mysql_num_rows($res);
		if($satu > 0){
			$display .=	"<input type='text' id='tugas' class='hidden' value='{$keyword}'><li class='Task1'>";
			$display .=	"<div>";
			$display .=	"<b class='design1'>Daftar Tugas</b>";
			while($db->nextRecord()){
				$display .=	"<div>";
				if($user == "{$db->Record['username']}"){
			$display .=	"</div>";
					$display .= "<input type='checkbox' value='None' id='checklist{$db->Record['IDTask']}' name='check' onchange='changevalues({$db->Record['IDTask']})'" ;
					if($db->Record['stat'] == 1)
						$display .= "checked";
					$display .= "/>";
				}
				$display .= "<a class='list' href='taskdetails.php?id='{$db->Record['IDTask']}'><span>Tag: {$db->Record['tag']}</span>{$db->Record['name']}</a>";
				$display .=	"<p>{$db->Record['deadline']}</p>";
				$display .=	"</div>";
			}
				$display .=	"</li>";
		}
		$res = $db->query($queryKategori);
		$dua = mysql_num_rows($res);
		if($dua>0){
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
		}
		$res = $db->query($queryUser);
		$tiga = mysql_num_rows($res);
		if($tiga > 0){
			$display .=	"<input type='text' id='user' class='hidden' value='{$keyword}'><li class='Task1'>";
			$display .=	"<div>";
			$display .=	"<b class='design1'>Daftar User</b>";
			$display .=	"</div>";
			while($db->nextRecord()){
				$display .=	"<div>";
				$display .=	"<p>{$db->Record['username']}</p>";
				$display .=	"</div>";
			}
				$display .=	"</li>";
		}
	}
	if($filter == "username"){
		$res = $db->query($queryUser);
		$tiga = mysql_num_rows($res);
		if($tiga > 0){
			$display .=	"<input type='text' id='user' class='hidden' value='{$keyword}'><li class='Task1'>";
			$display .=	"<div>";
			$display .=	"<b class='design1'>Daftar User</b>";
			$display .=	"</div>";
			while($db->nextRecord()){
				$display .=	"<div>";
				$display .=	"<p>{$db->Record['username']}</p>";
				$display .=	"</div>";
			}
		$display .=	"</li>";
		}
	}
	if($filter == "judul"){
		$res = $db->query($queryKategori);
		$dua = mysql_num_rows($res);
		if($dua>0){
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
		}
	}
	if($filter == "task"){
		$res = $db->query($queryAllTugas);
		$satu = mysql_num_rows($res);
		if($satu > 0){
			$display =	"<input type='text' id='tugas' class='hidden' value='{$keyword}'><li class='Task1'>";
			$display .=	"<div>";
			$display .=	"<b class='design1'>Daftar Tugas</b>";
			$display .=	"</div>";
			while($db->nextRecord()){
				$display .=	"<div>";
				if($user == "{$db->Record['username']}"){
					$display .= "<input type='checkbox' value='None' id='checklist{$db->Record['IDTask']}' name='check' onchange='changevalues({$db->Record['IDTask']})'" ;
					if($db->Record['stat'] == 1)
						$display .= "checked";
					$display .= "/>";
				}
				$display .= "<a class='list' href='taskdetails.php'><span>Tag: {$db->Record['tag']}</span>{$db->Record['name']}</a>";
				$display .=	"<p>{$db->Record['deadline']}</p>";
				$display .=	"</div>";
			}
				$display .=	"</li>";
		}
	}
		if(isset($satu)){
			if($satu > 0)
				echo ($display);
		}
		else if(isset($dua)){
			if($dua > 0 ||$tiga > 0)
				echo ($display);
		}else if(isset($tiga)){
			if($tiga > 0)
				echo ($display);
		}else if(isset($satu) && isset($dua)){
			if($satu > 0 || $dua > 0 )
				echo ($display);
		}else if(isset($satu) && isset($tiga)){
			if($satu > 0 || $tiga > 0)
				echo ($display);
		}else if(isset($dua) && isset($tiga)){
			if($dua > 0 ||$tiga > 0)
				echo ($display);
		}else if(isset($dua) && isset($tiga)&& isset($satu)){
			if($satu > 0 || $dua > 0 ||$tiga > 0)
				echo ($display);
		}
		//$insertTugas = "INSERT INTO tugas (`IDKategori`, `deadline`, `name`, `tag`) VALUES ({$kategori}, '{$deadline}', '{$nama}', '{$tag}')";
		//$db->query($insertTugas);
	
}

else{
	//echo "Anauthorized Access!!";
}

?>