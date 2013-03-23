<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="editprofile.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
		<script src="datetimepicker_css.js" type="text/javascript" language="javascript"> </script>
		
	</head>

<body>
<?php
session_start();
	if(isset ($_SESSION['bananauser']))
	{
		$username=$_SESSION['bananauser'];
	}
	else
	{
		header('location:index.php');
	}
?>
<?php include 'profile2.php'; ?>
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
    
		<!-- Foto profile -->
		<div id="isi">
			<div id="leftsidebaredit">
			</div>
			
			<div id="rightsidebar">
			<ul>
				<form class="prof" action="profile2.php" method="post" enctype="multipart/form-data">
					<h1 align="left">Edit Profile</h1>
					<li>
						<label style="width:230px; display:inline-block">Nama Lengkap:</label>
						<input type="text" value="<?php $profile=new profile($username);echo $profile->fullname;?>" onchange="checkNamaLengkap()" id="namalengkap" name="namalengkap"></input>
					</li>
                    <li>
						<label style="width:230px; display:inline-block">Tanggal Lahir:</label>
						<input type="date" value="<?php echo $profile->birthday;?>" name="birthday"></input>
					</li>
					<li>
						<label style="width:230px; display:inline-block">New Password:</label>
						<input type="password" value="<?php echo $profile->password;?>" onchange="checkPassword('<?php echo $profile->username;?>')" name="password" id="pass"></input>
					</li>
					<li>
						<label style="width:230px; display:inline-block">Confirmed New Password:</label>
						<input type="password" value="<?php echo $profile->password;?>" name="confirmedpass" onchange="checkConfirmedPass()" id="passconfirmed"></input>
					</li>
					<li>
						<label style="width:230px; display:inline-block">Change Avatar:</label>
						<input type="file" name="avatar" id="avatar" accept="image/jpeg, image/jpg" id="avatar" onchange="fileallowed()"></input>
					</li>
					<li>
						<button class="reg" type="submit"><b> Ok</b></button>
					</li>
				</form>
				</ul>
			</div>
		</div>
		
		<div id="footer" class="home">
			<p>&copy Copyright 2013. All rights reserved<br>
			Chalkz Team<br>
			Yulianti - Raymond - Devin</p>			
		</div>	
	</div>
	
</body>
</html>
