<?php
	session_start();
	if (!isset($_SESSION['bananauser']))
		header ('location:index.php');
	
?>
<!DOCTYPE html>
<html>	
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
		<script src="datetimepicker_css.js" type="text/javascript" language="javascript"> </script>
	</head>
	<?php
		if((isset($_POST['filter'])) && (isset($_POST['keyword'])) && !empty($_POST['keyword']) && $_POST['keyword'] != "Enter search query"){
		$filter = $_POST['filter'];
		$keyword = $_POST['keyword'];
		$i = 1;
		echo"<script type='text/javascript' language='javascript'> var i = 1;	</script>";
		echo("<body onLoad=\"doSearch('{$filter}', '{$keyword}', {$i}, '{$_SESSION['bananauser']}')\">");
		}
		else
		{
		echo("<body onload=\"initDashboard('{$_SESSION['bananauser']}')\">");
		}
	?>
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
					<form method="post" action="searchResult.php">
						<img src="image/avatar.jpg" id="profPic"></img>
						<select name="filter">
							<option value="semua">Semua</option>
							<option value="username">User Name</option>
							<option value="judul">Judul Kategori</option>
							<option value="task">Task</option>
						</select>
						<input name="keyword" id="keyword" class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query" onKeyUp="searchSuggestKeyword()">
						<input id="searchbutton" type="submit" value="">
					</form>
					<div id="layer"></div>
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
					<i>&nbsp;&nbsp;&nbsp;<a href='MakeTask.php' id='addtask'></a></i>
					<ul id="kegiatan">
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
			<form>
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
						<button id="add" onclick='addCategory()'><b>Add</b></button>
						<button id="cancel" onclick='location.href="#"'><b>Cancel</b></button>
					</li>						
				</ul>
			</form>
		</div>	
	</body>
</html>
