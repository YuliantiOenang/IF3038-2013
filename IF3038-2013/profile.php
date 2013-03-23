<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Banana Board - Profile </title>
		<link rel="stylesheet" style="text/css" href="style.css">
        <script src="editprofile.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
		<script src="datetimepicker_css.js" type="text/javascript" language="javascript"> </script>
	</head>

<body>
<?php include  'profile2.php'; ?>
	<div id="content">
    <?php
	session_start();
	if(isset ($_SESSION['bananauser']))
		{
			if(!isset($_GET['username']))
			{
				$username=$_SESSION['bananauser'];
				$editable=true;
			}
			else if($_GET['username']==$_SESSION['bananauser'])
			{
				$username=$_SESSION['bananauser'];
				$editable=true;
			}
			else if(isset($_GET['username']) && $_GET['username']!=$_SESSION['bananauser'])
			{
				$username=$_GET['username'];
				unset($_GET['username']);
				$editable=false;
			}
			
			if(isset ($_SESSION['flag']) && $_SESSION['flag']==1)
			{
				echo '<script type="text/javascript">'. 'notifikasi();'.'</script>';
				
			}
			if(isset ($_SESSION['flagquery']) && $_SESSION['flagquery']==1)
			{
				echo '<script type="text/javascript">'. 'notifikasiquery();'.'</script>';
				
			}
			else if(isset($_SESSION['flagquery'])){
				
				echo '<script type="text/javascript">'. 'notifikasiquery2();'.'</script>';
			}
			if(isset($_SESSION['flagquery']) && $_SESSION['flagquery']==0)
			{
				echo '<script type="text/javascript">'. 'notifikasigagalupload();'.'</script>';
			}
			unset($_SESSION['flag']);
			unset($_SESSION['flagquery']);
		}
	else
	{
		header('location:index.php');
	}
	
	?>
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
			<div id="leftsidebar">
				
			<img id="leftsidebar" class="foto" src=<?php $profile=new profile($username);echo $profile->avatar; ?> alt="Smiley face"/>
			<b><?php $profile=new profile($username);echo $profile->username;?></b>
			</div>
			
			<div id="rightsidebar">
				<ul class="prof">
					<h1 align="left">Profile</h1>
					<li>
						<label>Nama Lengkap:</label>
						<p id="namalengkap" class="prof1"><?php $profile=new profile($username);echo $profile->fullname;?></p>
					</li>
					<li>
						<label>Email:</label>
						<p class="prof1"><?php $profile=new profile($username);echo $profile->email;?></p>
					</li>
                    <li>
						<label>Tanggal Lahir:</label>
						<p class="prof1"><?php $profile=new profile($username);echo $profile->birthday;?></p>
					</li>
					<li>
						<label>On going tasks:</label>
						<p class="prof1"><?php $profile=new profile($username);echo $profile->getTugasBelumSelesai();?></p>
					</li>
					<li>
						<label>Tasks done:</label>
						<p class="prof1"><?php $profile=new profile($username);echo $profile->getTugasSelesai();?></p>
					</li>
					<?php
						if($editable==true)
						{
							print "<li>";
							print "<button class=\"reg\" type=\"button\" onclick=\"location.href='editprofile.php'\"><b>Edit</b></button>";
							print "</li>";
						}
					?>
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