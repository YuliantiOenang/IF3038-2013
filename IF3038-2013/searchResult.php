<?php
	if((isset($_POST['filter'])) && (isset($_POST['keyword'])) && !empty($_POST['keyword']) && $_POST['keyword'] != "Enter search query"){
		$filter = $_POST['filter'];
		$keyword = $_POST['keyword'];
?>
<!DOCTYPE html>
<html>	
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
	</head>
	<body onLoad="doSearch('<?php echo $filter;?>', '<?php echo $keyword;?>')">
	
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
					<form method="post" action="searchResult.php">
						<input class="button" type="submit" value="">
						<select name="filter">
							<option value="semua">Semua</option>
							<option value="username">User Name</option>
							<option value="judul">Judul Kategori</option>
							<option value="task">Task</option>
						</select>
						<input name="keyword" class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">
						
					</form>
				</div>
			</div>
			
			<div id="isi">
				<div id="leftsidebar">
					<ul>
						<li><a onClick="doSearch('semua', '<?php echo document.getElementById('tugas').value;?>'); return false;">Tugas</a></li>
						<li><a onClick="doSearch('judul', '<?php echo document.getElementById('kategori').value;?>'); return false;">Kategori</a></li>
						<li><a onClick="doSearch('username', '<?php echo document.getElementById('user').value;?>'); return false;">User</a></li>
					</ul>
					<img src="leftmenu.png"/>
				</div>
				
				<div id="rightsidebar1">
					<ul class="user" id="searchAll">
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
<?php
}else{
		echo "Anauthorized Access!!";
	}
?>
