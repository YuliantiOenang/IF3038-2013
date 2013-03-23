<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Banana Board - Your Task's Details</title>		
        <link rel="stylesheet" type="text/css" href="style.css"> 
		<script type="text/javascript" src="datetimepicker.js"></script>
		<script type="text/javascript" src="taskdetails.js"></script>
		<script type="text/javascript" src="raymond.js"></script>
    </head>

    <body>
	<?
		session_start();
		if(!isset ($_SESSION['bananauser']))
		{
			header('location:index.php');
		}
		else
		{
				$username=$_SESSION['bananauser'];
		}
	?>
    <?php include 'taskdetailscontroller.php'; ?>
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
                        <input class="box" type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter search query':this.value;" value="Enter search query">	
                        <input class="button" type="submit" value="">
                    </form>
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
								<div class="text"><?$task=new task();echo $task->name;?></div>
							</li>
                            <li>
								<label for="tugas">Status</label>
								<div class="text"><?echo $task->status;?></div>
                                <form method="post" action="taskdetailscontroller.php">
                                <button>ubah status</button>
                                </form>
							</li>
							<li>
								<label for="attach">Attachment</label>
								<br>
								<br>
                                <?
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
								<input id="deadline" type="text" size="25"/ value="<?$array= explode("-",$task->deadline);echo $array[2]."-".$array[1]."-".$array[0];?>"readonly>
								<a id="tanggal" href="javascript:NewCal('deadline','ddmmyyyy')" onclick="return false"><img src="image/cal.gif" alt="Pick a date"/></a>
							</li>
							<li>
								<label for="assignee">Assignee</label>
								<div id="anggota">
								<?
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
								<?
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
							<button id="edit" name="edit" type="button" onclick="editTask(<?echo $task->jumlahA?>)"><b>Edit</b></button><br>
						<div class="task">
						<?
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

								<input id="commentbutton" name="commentbutton" type="submit" value="Comment" onClick="addcomment(<?echo "'".$username."'"?>);return false;"/>
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
         <script	type="text/javascript">
			var temp = document.getElementById("commentform");
			temp.onsubmit = function()
			{
				postComment();
				return false;
			}
			
			
			
			function postComment()
			{
				var form = document.getElementById("commentform");
			
				var a = document.getElementById("commentbox");
				var b = document.getElementById("commentfield")
				a.value += "User: " + b.value + "\n\n";
				
				b.value = "";
			}
			
			
			
			
		</script>
        
    </body>
</html>
