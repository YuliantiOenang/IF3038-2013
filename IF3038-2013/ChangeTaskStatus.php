<?php
require_once('connectDB.php');
if(isset($_GET['id']))
	{
	$getid = $_GET['id'];
	$db = new DB();
	$getStatus = 'SELECT status FROM tugas WHERE  `IDTask` = "'.$getid.'";';
	$db->query($getStatus);
	$db->singleRecord();
	if($db->Record['status'] == 0){
		$change = 'UPDATE `tugas` SET  `status` =  1 WHERE  `IDTask` = "'.$getid.'";';
	}
	else
		$change = 'UPDATE `tugas` SET  `status` =  0 WHERE  `IDTask` = "'.$getid.'";';
	$db->query($change);
	echo $db->Record['status'];
	}
	else
	echo ("gagal");
?> 