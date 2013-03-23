<?

include 'connectDB.php';

class task{
	var $name;
	var $deadline;
	var $status;
	var $attachment;
	var $assignee;
	var $comment;
	var $tag;
	var $jumlah;
	var $jumlahA;
	
	function __construct(){
		$db=new DB();
$db->connectDB();
		$hasil=$db->query('select * from tugas where IDTask=1');
		$array = mysql_fetch_assoc($hasil);
		$this->name=$array['name'];
		$this->status=$array['stat'];
		$this->deadline=$array['deadline'];
		$this->tag=$array['tag'];
		$this->attachment=$db->query('select lampiran from pelampiran where IDTugas=1');
		$this->assignee=$db->query('select username from penugasan where IDTask=1');
		$this->comment=$db->query('select IDKomentar,avatar,username,isi,waktu from komentar natural join pengguna where IDTask=1 order by waktu DESC');
		$hasil=$db->query('SELECT count(*) as jumlah FROM komentar where IDTask=1');
		$array = mysql_fetch_assoc($hasil);
		$this->jumlah=$array['jumlah'];
		$hasil=$db->query('select count(*) as jumlah from penugasan where IDTask=1');
		$array=mysql_fetch_assoc($hasil);
		$this->jumlahA=$array['jumlah'];
		
	}
}

if(isset($_GET['idcomment']))
{
$db=new DB();
$db->connectDB();
	$hasil=$db->query('DELETE FROM komentar WHERE IDKomentar='.$_GET['idcomment'].'');
	$hasil=$db->query('SELECT count(*) as jumlah FROM komentar where IDTask=1');
	$array = mysql_fetch_assoc($hasil);
	$jumlah=$array['jumlah'];
	echo $jumlah;
}
if(isset($_POST['comment']) && isset($_POST['usernamecur'])){
	$db=new DB();
	$db->connectDB();
	$hasil=$db->query('INSERT INTO komentar(IDTask,username,isi) values(1,\''.$_POST['usernamecur'].'\', \''.$_POST['comment'].'\')');
}
if(isset($_POST['username'])){
	$db=new DB();
	$db->connectDB();
	$hasil=$db->query('DELETE FROM penugasan WHERE username=\''.$_POST['username'].'\' and IDTask=1');
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$task=new task();
	if($task->status==1)
	{
		$query="UPDATE tugas SET stat='0' WHERE IDTask='1'";
	}
	else
	{
		$query="UPDATE tugas SET stat='1' WHERE IDTask='1'";
	}
	$hasil=mysql_query($query);
	header('location:taskdetails.php');
}
if(isset($_POST['deadline']) && isset($_POST['tag']))
{
	if($_POST['deadline']!="" && $_POST['tag']!="")
	{
		$query='UPDATE tugas SET deadline=\''.$_POST['deadline'].'\', tag=\''.$_POST['tag'].'\' WHERE IDTask=1';
	}
	else if($_POST['deadline']!="")
	{
		$query='UPDATE tugas SET deadline=\''.$_POST['deadline'].'\' WHERE IDTask=1';
	}
	else if($_POST['tag']!="")
	{
		$query='UPDATE tugas SET deadline=\''.$_POST['tag'].'\' WHERE IDTask=1';
	}
	$hasil=mysql_query($query);
}
if (isset($_POST['assignee']))
{
	$query='INSERT INTO penugasan(IDTask,username) values(1,\''.$_POST['assignee'].'\')';
	$hasil=mysql_query($query);
}
?>