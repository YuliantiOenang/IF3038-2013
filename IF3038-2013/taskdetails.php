<!DOCTYPE html>
<html>
    <head>
		<title> Banana Board - Home </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="Dashboard.js" type="text/javascript" language="javascript"> </script>
		<script src="Raymond.js" type="text/javascript" language="javascript"> </script>
		<script src="datetimepicker_css.js" type="text/javascript" language="javascript"> </script>
	</head>

    <body>
	<?php
		session_start();
		if(!isset ($_SESSION['bananauser']))
		{
			header('location:index.php');
		}
		else
		{
				$username=$_SESSION['bananauser'];
				if($_GET['id'])
				{
					$_SESSION['id']=$_GET['id'];
				}
				else
				{
					header('location:index.php');
				}
		}
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
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
    <?php include 'taskdetailscontroller.php'; ?>
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
					<b>TASK DETAILS</b>
					<img src="image/leftmenu.png"/>
				</div>
				<div id="rightsidebar">
					<div id="wrapper-left">
						<ul class="task">
							<h1>Details</h1>
							<li>
								<label for="tugas">Nama Tugas</label>
								<div class="text"><?php $task=new task($id);echo $task->name;?></div>
							</li>
                            <li>
								<label for="tugas">Status</label>
								<div class="text"><?php echo $task->status;?></div>
                                <form method="get" action="taskdetailscontroller.php?id=<?php $id?>>
                                <button>ubah status</button>
                                </form>
							</li>
							<li>
								<label for="attach">Attachment</label>
								<br>
								<br>
                                <?php
                                 while($info = mysql_fetch_array($task->attachment)) 
								 { 
									$array= explode(".", $info['lampiran']);
									$ext=$array[1];
									if($ext=='jpg' || $ext=='jpeg' || $ext=='png')
									{
										Print "<img src=".$info['lampiran']." style=\"width: 220px;height: 230px;\"><br>"; 
									}
									else if($ext=='ogg')
									{
										Print "<video width=\"320\" height=\"240\" controls autoplay><source src=".$info['lampiran']." type=\"video/".$ext."\"></video><br>"; 
									}
									else
									{
										Print "<a href=\"".$info['lampiran']."\" target=\"_blank\">".substr($info['lampiran'],7)."</a><br>";
									}
								 } 
								 ?>
							</li>
							<li>
								<label for="deadline">Deadline</label>
								<input id="deadline" type="text" size="25"/ value="<?php $array= explode("-",$task->deadline);echo $array[2]."-".$array[1]."-".$array[0];?>"readonly>
								<a id="tanggal" href="javascript:NewCal('deadline','ddmmyyyy')" onclick="return false"><img src="image/cal.gif" alt="Pick a date"/></a>
							</li>
							<li>
								<label for="assignee">Assignee</label>
								<div id="anggota">
								<?php
								$i=1;
								$num_rows = mysql_num_rows($task->assignee);
								if($num_rows==0)
								{
									print "<br>";
								}
								else{
								while($info = mysql_fetch_array($task->assignee))
								{	print "<div id=\"".$info['username']."\">";
									print "<a  href=\"profile.php?username=".$info['username']."\">". $info['username']."</a>";
									print "<a id=\"r".$i."\" href=\"#\" style=\"visibility:hidden\" onclick=\"removeA('".$info['username']."')\">(remove)</a><br>";
									$i++;
									print"</div>";
								}
								}
								
								?>
								</div>
								<div id="assignee">
								
								</div>
								<li id="layer1">
								</li>
									
							</li>							
							<li>
								<label>Tag</label>
								<div id="data">
								<?php
									$pieces = explode(",", $task->tag);
									for($i=0;$i<count($pieces);$i++)
									{
										
										if($i==count($pieces)-1)
										{
											print $pieces[$i];
										}
										else
										{
											print $pieces[$i].",";
										}
									}
								?>
								</div>
								<input id="inputtag" type="text" style="visibility:hidden;" placeholder="example1,example2"></input>
							</li>
							<button id="edit" name="edit" type="button" onclick="editTask(<?php echo $task->jumlahA?>)"><b>Edit</b></button><br>
						<div class="task">
						<?php
							print "<li>";
								print "<label id=\"a\"  for=\"komentar\">Komentar(".$task->jumlah.")</label>";
								print
								"</li>";
								print "<br>";
								
								while($info = mysql_fetch_array($task->comment))
								{
								print "<div id=\"".$info['IDKomentar']."\">";
								print "<div class=\"headerComment\">";
								print "<div class=avatar style=\"float:left;\">";
								if($info['avatar']=="")
								{
									print "<img src=\"image\/profpic.jpg\" height=\"42\" width=\"42\">";
								}
								else
								{
									print "<img src=".$info['avatar']." height=\"42\" width=\"42\">";
								}
								print "</div>";
								print "<div class=username style=\"float:left;\"><b>".$info['username'];
								
								print "</b></div>";
								print "<div class=waktu><b>".$info['waktu'];
								print "</b></div>";
								print "<div>";
								if($info['username']!=''.$username.'')
								{}
								else
								{
								print "<a class=\"remove\" href=\"\" onClick=\"removeComment(".$info['IDKomentar'].");return false;\" >remove";
								
								print "</a>";
								}
								print "</div>";
								
								print "</div>";
								print "<li>".$info['isi']."</li>";
								print "</div>";
								//echo "aaa";
								}
								?>
							
								
								
							<form id="commentform">
								<input class="task" id="commentfield" name="commentfield" type="text" size="1000"/> 

								<input id="commentbutton" name="commentbutton" type="submit" value="Comment" onClick="addcomment(<?php echo "'".$username."'"?>);return false;"/>
							</form>
						</div>
						
						</ul>
						
					</div>
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
