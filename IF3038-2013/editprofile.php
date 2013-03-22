<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Banana Board - Edit Profile </title>
		<link rel="stylesheet" style="text/css" href="style.css">
        <script src="editprofile.js" type="text/javascript" language="javascript"> </script>
	</head>

<body>
<?php include 'profile2.php'; ?>
	<div id="content">
		<div id="header">
			<div id="logo">
				<a href="home.php" class="header">
				<img src="image/logo.png"/></a>
			</div>
			<div id="menu">
				<ul>
					<li> <a href="home.php"> DASHBOARD </a> </li>
					<li> <a href="profile.php"> PROFILE </a> </li>
					<li> <a href="index.php"> LOGOUT </a> </li>
				</ul>
				<form action="index.html">
					<input class="box" type="text" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">
					<input class="button" type="submit" value="">
				</form>
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
						<input type="text" value="<?$profile=new profile();echo $profile->fullname;?>" onchange="checkNamaLengkap()" id="namalengkap" name="namalengkap"></input>
					</li>
                    <li>
						<label style="width:230px; display:inline-block">Tanggal Lahir:</label>
						<input type="date" value="<?$profile=new profile();echo $profile->birthday;?>" name="birthday"></input>
					</li>
					<li>
						<label style="width:230px; display:inline-block">New Password:</label>
						<input type="password" value="<?$profile=new profile();echo $profile->password;?>" onchange="checkPassword('<?$profile=new profile();echo $profile->username;?>')" name="password" id="pass"></input>
					</li>
					<li>
						<label style="width:230px; display:inline-block">Confirmed New Password:</label>
						<input type="password" value="<?$profile=new profile();echo $profile->password;?>" name="confirmedpass" onchange="checkConfirmedPass()" id="passconfirmed"></input>
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
			Yulianti - Adriel - Amelia</p>			
		</div>	
	</div>
	
</body>
</html>
