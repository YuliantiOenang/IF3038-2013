<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Banana Board - New Task </title>
		<link rel="stylesheet" type="text/css" href="style.css"/>   
		<script type="text/javascript" src="datetimepicker.js"></script>		
</head>
    
<body>
	<div id="content">
		<div id="header">
			<div id="logo">
				<a href="home.php" class="header">
				<img src="logo.png"/></a>
			</div>
			<div id="menu">
				<ul>
					<li> <a href="home.php"> DASHBOARD </a> </li>
					<li> <a href="profile.php"> PROFILE </a> </li>
					<li> <a href="index.php"> LOGOUT </a> </li>
				</ul>
				<form action="index.html">
					<input class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">	
					<input class="button" type="submit" value="">
				</form>
			</div>
		</div>

		<div id="isi">
			<div id="leftsidebar">
					<b>CREATE NEW TASK</b>
					<img src="leftmenu.png"/>
			</div>
		
			<div id="rightsidebar">
				<div id="wrapper-left">
					<form class="task" name="MakeForm" onsubmit="submitThis()">
						<h1>Fill Details</h1>
						<ul>
							<li>
								<label for="tugas" >Nama Tugas</label>
								<input id="tugas" name="tugas" type="text" maxlength="25"/><br>
							</li>
							<li>
								<label for="filebutton">Attachment</label>
								<input id="filebutton" name="filebutton" type="file" onChange="loadAttachment()"/><br>
							</li>		
							
							<li>
								<label for="asignee">Assignee</label>
								<input id="asignee" name="asignee" type="text"/>
							</li>
							<li>
								<label for="tag">Tag</label>
								<input id="tag" name="tag" type="text" size="20"/><br>
								<span>*dipisahkan dengan ","</span>
							</li>							
							<li>
								<label for="deadline">Deadline</label>
									<input id="demo1" type="text" size="25"/>
									<a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="image/cal.gif" alt="Pick a date"/></a>
							</li>
							<li>
								<button class="task" name="submitbutton" type="submit" onClick="checkSubmission(event)"><b>Submit</b></button>
							</li>
						</ul>
					</form>
				</div>
				<div id="wrapper-right">
					<img id="suatu_gambar" src="Troll.png" alt="Gambar tidak dapat di-load"/>    
					<video id="suatu_video" width="320" height="240" controls>
						<source src="A_Caterpillar.mp4" type="video/mp4">
						<source src="A_Caterpillar.ogg" type="video/ogg">
						Your browser does not support the video tag.
					</video>
				</div>
			</div>
		</div>
		<div id="footer" class="home">
				<p>&copy; Copyright 2013. All rights reserved<br>
				Chalkz Team<br>
				Yulianti - Adriel - Amelia</p>			
		</div>
    </div>
	
		<script type="text/javascript">
		function loadAttachment()
		{
			var x = document.getElementById("filebutton").value;
			var y = x.split(".");
			var z = y[y.length-1];
			if (z == "jpg" || z == "jpeg" || z == "png" || z == "gif")
			{
				document.getElementById("suatu_video").style.display = "none";
				document.getElementById("suatu_gambar").style.display = "block";
				
			}
			else if (z == "avi" || z == "mp4" || z == "mkv" || z == "3gp" || z == "flv" || z == "ogg")
			{
				document.getElementById("suatu_gambar").style.display = "none";
				document.getElementById("suatu_video").style.display = "block";
			}
			else
			{
				document.getElementById("suatu_gambar").style.display = "none";
				document.getElementById("suatu_video").style.display = "none";
			}
		}
		function checkSubmission(e)
		{
			var isValid = true;
			
			var a = document.getElementById("tugas").value;
			if (a.length != 0)
			{
				var index = 0;
				while (index < a.length && isValid == true)
				{
					if ((a[index] >= '0' && a[index] <= '9') || (a[index] >= 'a' && a[index] <= 'z') || (a[index] >='A' && a[index] <='Z'))
					{}
					else
					{
						isValid = false;
					}
					index++;
				}
				
				if (isValid == false)
				{
					alert("Nama tugas tidak boleh menggunakan karakter khusus!")
				}
			}
			else
			{
				isValid = false;
				alert("Nama tugas tidak boleh kosong!");
			}
			
			if (isValid == true)
			{
				e.preventDefault();
				alert("Tugas berhasil ditambahkan!");
				window.location = "home.html";
			}
		}
	</script>

</body>

</html>