<!DOCTYPE html>
<html>	
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
	</head>
	<body>
	
		<div id="content">
			<div id="popup">
	       	</div>
    	    <div id="popupform">
        	    <form class="centerV">
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
							<button id="add" onClick="AddKategori()"><b>Add</b></button>
							<button id="cancel" onClick="DelPopUp()"><b>Cancel</b></button>
						</li>						
					</ul>
				</form>
            </div>
			
			<div id="header">
				<div id="logo">
					<img src="logo.png"/>
				</div>
				<div id="menu">
					<ul>
						<li> <a href="home.php"> DASHBOARD </a> </li>
						<li> <a href="profile.php"> PROFILE </a> </li>
						<li> <a href="index.php"> LOGOUT </a> </li>
					</ul>
					<form action="index.php">
						<input class="button" type="submit" value="">
						<select name="filter">
							<option value="semua">Semua</option>
							<option value="username">User Name</option>
							<option value="judul">Judul Kategori</option>
							<option value="task">Task</option>
						</select>
						<input class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">
						
					</form>
				</div>
			</div>