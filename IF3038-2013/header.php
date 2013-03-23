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
		echo("<body onLoad=\"doSearch('<?php echo $filter;?>', '<?php echo $keyword;?>')\">");
		}
		else
		{
		echo("<body>");
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
						<li> <a href="index.php"> LOGOUT </a> </li>
					</ul>
					<form method="post" action="searchResult.php">
						<input class="button" type="submit" value="">
						<img src="image/avatar.jpg" id="profPic"></img>
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