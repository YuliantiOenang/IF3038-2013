<!DOCTYPE html>
<?php
	if(isset ($_GET['kategori'])){
		$kategori = $_GET('kategori');
	}
	else{
		$kategori = 1;
	}
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Banana Board - New Task </title>
	<link rel="stylesheet" type="text/css" href="style.css"/>   
	<script type="text/javascript" src="datetimepicker_css.js"></script>	
	<script src="Raymond.js" type="text/javascript" language="javascript"> </script>	
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
					<form class="task" name="MakeForm" method="post" onSubmit="checkSubmission(this, event)" enctype="multipart/form-data" action="AddTask.php">
						<h1>Fill Details</h1>
						<ul>
							<li>
								<label for="tugas" >Nama Tugas</label>
								<input id="tugas" name="tugas" onkeyup="checkNamaTugas()" type="text" maxlength="25"/><img src="image/false.png" alt="False04" id="nlengkappic"/><br>
							</li>
							<li>
								<label for="filebutton1">Attachment 1</label>
								<input id="filebutton1" name="filebutton1" type="file" onChange="checkFile('filebutton1')"/>
							</li>	
							<li>
								<label for="filebutton2">Attachment 2</label>
								<input id="filebutton2" name="filebutton2" type="file" onChange="checkFile('filebutton2')"/>
							</li>
							<li>
								<label for="filebutton3">Attachment 3</label>
								<input id="filebutton3" name="filebutton3" type="file" onChange="checkFile('filebutton3')"/>
							</li>
							<li>
								<label for="asignee">Assignee</label>
								<input id="asignee" name="asignee" type="text" onKeyUp="searchSuggest()"/>
							</li>
							<li id="layer1">
							</li>
							<li>
								<label for="tag">Tag</label>
								<input id="tag" name="tag" type="text" size="20"/><br>
								<span>*dipisahkan dengan ","</span>
							</li>							
							<li>
								<label for="deadline">Deadline</label>
									<input id="demo1" name="deadline" type="text" size="25"/>
									<a href="javascript:NewCssCal('demo1','yyyymmdd')"><img src="image/cal.gif" alt="Pick a date"/></a>
							</li>
							<li>
								<input type="text" name="kategori" class="hidden" value="<?php echo $kategori ?>"/>
								<button class="task" name="submitbutton" type="submit"><b>Submit</b></button>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
		<div id="footer" class="home">
				<p>&copy; Copyright 2013. All rights reserved<br>
				Chalkz Team<br>
				Yulianti - Adriel - Amelia</p>			
		</div>
    </div>
</body>

</html>