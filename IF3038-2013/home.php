<!DOCTYPE html>
<html>	
	<head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
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
						<input class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">
						
					</form>
				</div>
			</div>
			
			<div id="isi">
				<div id="leftsidebar">
					<ul>
						<a class="addcateg"><i class="addcateg" onClick="FormAddKategori()">Add new category...</i></a>
						<li><a onClick="ShowTask('1','8')">IMK</a></li>
						<li><a onClick="ShowTask('2','8')">Tubes Progin</a></li>
						<li><a onClick="ShowTask('3','8')">Inteligensia Buatan</a></li>
						<li><a onClick="ShowTask('4','8')">KAP</a></li>
						<li><a onClick="ShowTask('5','8')">Keamanan Informasi</a></li>
						<li id="kategori"></li>
					</ul>
					<img src="leftmenu.png"/>
				</div>
				
				<div id="rightsidebar">
					<ul id="kegiatan">
						<li id="Task1">
							<div>
							<b class="design2"><a href="MakeTask.html">+</a></b>
							<b class="design1">IMK</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.php"><span>Tag: kelompok, 3 orang</span>tugas1</a>
									<p>22/02/12</p>
								</div>
								<div>
								<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.php"><span>Tag: kelompok, 3 orang</span>tugas2</a>
									<p>22/02/12</p>
								</div>
							</div>
						</li>
						<li id="Task2">
							<div>
							<b class="design2"><a href="MakeTask.html">+</a></b>
							<b class="design1">Tubes Progin</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>design css</a>
									<p>15/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>index</a>
									<p>15/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>profile</a>
									<p>16/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>task</a>
									<p>16/02/12</p>
								</div>
							</div>
						</li>
						<li id="Task3">
							<div>
							<b class="design2"><a href="MakeTask.html">+</a></b>
							<b class="design1">Inteligensia Buatan</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>PR 1</a>
									<p>10/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>PR 2</a>
									<p>16/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>tubes 1</a>
									<p>22/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>baca bab 2</a>
									<p>25/02/12</p>
								</div>
							</div>
						</li>
						<li id="Task4">
							<div>
							<b class="design2"><a href="MakeTask.html">+</a></b>
							<b class="design1">KAP</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>self concept</a>
									<p>02/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>history</a>
									<p>09/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>percepts & assertiveness</a>
									<p>16/02/12</p>
								</div>								
							</div>
						</li>
						<li id="Task5">
							<div>
							<b class="design2"><a href="MakeTask.html">+</a></b>
							<b class="design1">Keamanan Informasi</b>
							</div>
							<div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>Sniffing</a>
									<p>13/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>install IRC</a>
									<p>11/02/12</p>
								</div>
								<div>
									<input type="checkbox" value="None" id="squaredTwo" name="check" /><a class="list" href="taskdetails.html"><span>Tag: kelompok, 3 orang</span>tugas c</a>
									<p>26/02/12</p>
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
