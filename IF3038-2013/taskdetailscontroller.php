<?php
include 'connectDB.php';
class task{
	var $name;
	var $deadline;
	var $status;
	var $attachment;
	var $assignee;
	var $comment;
	var $tag;
	
	function __construct(){
		$db=new DB();
		$db->connectDB();
		$hasil=$db->query('select * from tugas where IDTask=1');
		$array = mysql_fetch_assoc($hasil);
		$this->name=$array['name'];
		$this->status=$array['status'];
		$this->deadline=$array['deadline'];
		$this->tag=$array['tag'];
		$this->attachment=$db->query('select lampiran from pelampiran where IDTugas=1');
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$task=new task();
	if($task->status==1)
	{
		$query="UPDATE tugas SET status='0' WHERE IDTask='1'";
	}
	else
	{
		$query="UPDATE tugas SET status='1' WHERE IDTask='1'";
	}
			$hasil=mysql_query($query);

}

?>