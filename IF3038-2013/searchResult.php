<!DOCTYPE html>
<html>	
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
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
			
			<div id="isi">
				<div id="leftsidebar">
					<ul>
						<li><a onClick="">Tugas</a></li>
						<li><a onClick="">Kategori</a></li>
						<li><a onClick="">User</a></li>
					</ul>
					<img src="leftmenu.png"/>
				</div>
				
				<div id="rightsidebar">
					<ul class="kegiatan">
						<li class="Task1">
							<div>
							<b class="design1">Daftar Tugas</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>tugas1</a>
									<p>22/02/12</p>
								</div>
							</div>
						</li>
					</ul>
					<ul class="kegiatan">
						<li id="lala">
							<div>
							<b class="design1">Daftar User</b>
							</div>
							<div>
								<div>
									<p>tugas1</p>
								</div>
							</div>
						</li>
					</ul>
					<ul class="kegiatan">
						<li id="lala">
							<div>
							<b class="design1">Daftar Kategori</b>
							</div>
							<div>
								<div>
									<p>tugas1</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			
			
			
			<div id="footer" class="home">
				<p>&copy Copyright 2013. All rights reserved<br>
				Chalkz Team<br>
				Yulianti - Adriel - Amelia</p>			
			</div>
		</div>

			
	</body>
</html>
