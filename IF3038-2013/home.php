<?php
	session_start();
	if(!isset($_SESSION['bananauser']))
		header('location:index.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"></script>
	</head>
	<body onload='initDashboard("<?php $_SESSION['bananauser'] ?>")'>
		<div id="content">
			<div id="header">
				<div id="logo">
					<img src="image/logo.png"/>
				</div>
				<div id="menu">
					<ul>
						<li> <a href="home.php"> DASHBOARD </a> </li>
						<li> <a href="profile.php"> PROFILE </a> </li>
						<li> <a href="logout.php"> LOGOUT </a> </li>
					</ul>
					<form action='index.php' method='get'>
						<input class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">
						<button id='searchbutton' type='submit'></button>
					</form>
				</div>
			</div>
			
			<div id="isi">
				<div id="leftsidebar">
					<ul id='categlist'>
						<a href='#addcategory' id="addcateg"><i>Add new category...</i></a>
					</ul>
					<img src="image/leftmenu.png"/>
				</div>
				
				<div id="rightsidebar">
					<a href='MakeTask.php' id='addtask'><i></i></a>
					<ul id="kegiatan">
						<li>
							<a class='list' href="taskdetails.php">tugas1</a>
							<form>
								<label for='deadline'>Deadline</label>: 22-02-2012<br />
								<label for='tag'>Tag</label>: kelompok, 3 orang<br />
								<label for='status'>Status</label>: Belum Selesai <br />
								<input type="checkbox"><i class='status'> Buat selesai?</i></input>
							</form>
							<a href=''><div class='hapus'></div></a>
						</li>
					</ul>
				</div>
			
			<div id="footer" class="home">
				<p>&copy Copyright 2013. All rights reserved<br>
				Chalkz Team<br>
				Yulianti - Raymond - Devin</p>			
			</div>
		</div>

		<a href='#' class='overlay' id='addcategory'></a>
		<div class="popup">
			<form method='post'>
				<ul>
					<li>
						<label>Nama Kategori</label>
						:<input id="namakategori" type="text" name="namakategori" id="namakategori"/><br/>
					</li>
					<li>
						<label>Daftar Pengguna</label>
						:<input type="text" name="daftarpengguna"id="daftarpengguna"/><br/>
					</li>
					<li>
						<button id="add" type='submit' onclick='addCategory()'><b>Add</b></button>
						<button id="cancel" onclick='location.href="#"'><b>Cancel</b></button>
					</li>						
				</ul>
			</form>
		</div>	
	</body>
</html>
