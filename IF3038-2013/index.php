<?php
	session_start();
	if(isset($_SESSION['bananauser']))
		header('location:home.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Banana Board - Your Online Do List</title>		
		<link rel="stylesheet" href="style.css" type="text/css">
		<script src="index.js" type="text/javascript" language="javascript"></script>
		<script type="text/javascript" src="datetimepicker.js"></script>
	</head>
	
	<body onload='initindex()'>
		<div id="indexheader">
			<img src="image/logo.png">					
			<form id="loginform" class="login" action="loginsubmitter.php" method="post">		
				<ul>
					<h1 align="left">Login</h1>
					<li>
						<label for="username">Username:</label>
						<input class="loginbox" id="userheader" type="text" />
					</li>
					<li>
						<label for="password">Password:</label>
						<input class="loginbox" id="password" type="password" />
					</li>
					<li>
						<button class="loginbutton" type="submit"><b>Login</b></button>
					</li>
					<li id='incorrect'></li>
				</ul>
			</form>	
		</div>		
		
		<div id="register">			
			<form class="reg" action="" method="post" name="registerform">
				<ul>
					<p><b>new to Banana Board?</b></p>
					<h1 align="left">Register now!</h1>
					<li>
						<label for="username">Username:</label>
						<input type="text" id="txUsername" onkeyup="vdUsername()"/>
						<img src="Image/false.png" id="icoUsername" alt="Not Accepted" /><br />
						<span>* Minimal 5 karakter</span>
					</li>
					<li>
						<label for="password">Password:</label>
						<input type="password" id="txPassword" onkeyup="vdPassword()"/>
						<img src="Image/false.png" id="icoPassword" alt="Not Accepted" /><br />
						<span>* Minimal 8 karakter, tidak boleh sama dengan username maupun email</span>
					</li>		
					<li>
						<label for="confirmpass">Confirmed Password:</label>
						<input type="password" id="txConfirmPassword" onkeyup="vdConfirmPassword()"/>
						<img src="Image/false.png" id="icoConfirmPassword" alt="Not Accepted" /><br />
						<span>* Harus sama dengan password</span>
					</li>
					<li>
						<label for="namalengkap">Nama Lengkap:</label>
						<input type="text" id="txName" onkeyup="vdName()" />
						<img src="Image/false.png" id="icoName" alt="Not Accepted" /><br />
						<span>* Minimal 2 kata (nama depan dan nama belakang)</span>
					</li>	
					<li>
						<label for="tgllahir">Tanggal Lahir:</label>
						<input id="tgllahir" type="text" size="25"/ readonly>
						<a href="javascript:NewCal('tgllahir','ddmmyyyy')"><img src="image/cal.gif" alt="Pick a date"/></a>
					</li>
					<li>
						<label for="email">Email:</label>
						<input type="text" id="txEmail" required onkeyup="vdEmail()"/>
						<img src="Image/false.png" id="icoEmail" alt="Not Accepted" /><br />
						<span>* Sesuai dengan format alamat surel (x@x.xx)</span>
					</li>
					<li>
						<label for="avatar">Avatar:</label>
						<input type="file" id="filename" onchange='vdAvatar()'> &nbsp;&nbsp;&nbsp;
						<img src="Image/false.png" id="icoAvatar" alt="Not Accepted" /><br />
						<span>* Hanya menerima berkas berekstensi .jpg atau .jpeg</span>
					</li>
					<li>
						<button type="submit" id="registerbutton">Register</button>
					</li>
				</ul>
			</form>
		</div>
		
		<div id="featuresbar">
			<ul id="features">
				<li>
					<b>Banana is here to remind you of your tasks</b>
				</li>
				<li>
					<b>Banana lets you synchronize your tasks with members</b>
				</li>
			</ul>
		</div>
		
		<div id="footer">
			<p>&copy Copyright 2013. All rights reserved<br>
			Chalkz Team<br>
			Yulianti - Adriel - Amelia</p>			
		</div>
	</body>
</html>