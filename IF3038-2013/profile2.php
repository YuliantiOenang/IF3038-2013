<?
include 'connectDB.php';
	class profile{
	var $username;
	var $fullname;
	var $email;
	var $birthday;
	var $avatar;
	var $tugasSelesai;
	var $tugasBelumSelesai;
	var $password;
	function __construct($username){
		$db=new DB();
		$db->connectDB();
		$hasil=$db->query('select * from pengguna where username=\''.$username.'\'');
		$array = mysql_fetch_assoc($hasil);
		$this->username=$array['username'];
		$this->fullname=$array['fullname'];
		$this->email=$array['email'];
		$this->birthday=$array['birthday'];
		$this->avatar=$array['avatar'];
		$this->password=$array['password'];
		$hasil=$db->query('SELECT name FROM tugas natural join  penugasan WHERE username=\''.$username.'\' and stat=1');
		$this->tugasSelesai=$hasil;
		$hasil2=$db->query('SELECT name FROM tugas natural join  penugasan WHERE username=\''.$username.'\' and stat=0');
		$this->tugasBelumSelesai=$hasil2;
		
	}
	function getTugasSelesai(){
	$list="";
		while($info = mysql_fetch_array( $this->tugasSelesai )) 
		{ 
		 Print $info['name'] . "<br>";
		 $list .= '"'.$info['name'].'", ';
		} 
	}
	
	function getTugasBelumSelesai(){
	$list="";
		while($info = mysql_fetch_array( $this->tugasBelumSelesai )) 
		{ 
		 Print $info['name'] . "<br>";
		} 
	}
	/*
	function getFullname(){
		$db=new DB();
		$db->connectDB();
		
	}
	function getEmail(){
		
	}*/
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		$currentuser=$_SESSION['bananauser'];
		$profile=new profile($currentuser);
		$namalengkap=$_POST['namalengkap'];
		$birthday=$_POST['birthday'];
		$password=$_POST['password'];
		$confirmedpass=$_POST['confirmedpass'];		
		$avatar=$_FILES['avatar']['name'];
		$picavatar=$profile->avatar;
		$array= explode("/", $picavatar);		
		$picavatar=$array[1];
		echo $namalengkap;
		echo $birthday;
		echo $password;
		echo $confirmedpass;
		echo $avatar;
		if($profile->fullname==$namalengkap && $profile->birthday==$birthday && $profile->password==$password && ($picavatar==$avatar || $avatar==""))
		{
			$_SESSION['flag']=1;
		}
		else
		{
			$_SESSION['flag']=0;
			$profile->fullname=$namalengkap;
			$profile->birthday=$birthday;
			$profile->password=$password;
			if($avatar=="")
			{
				$query="UPDATE pengguna SET fullname='$namalengkap',birthday='$birthday', password='$password' WHERE username='$currentuser'";
			}
			else
			{
				$target_path = "avatar/";

				$target_path = $target_path . basename( $_FILES['avatar']['name']); 

				if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
					$_SESSION['uploadsukses']=1;
				} else{
					$_SESSION['uploadsukses']=0;
				}
				$profile->avatar="avatar/".$avatar;
				$query="UPDATE pengguna SET fullname='$namalengkap',birthday='$birthday', password='$password', avatar='$profile->avatar' WHERE username='$currentuser'";
			}
		
			$hasil=mysql_query($query);
			
			if($hasil)
			{
				$_SESSION['flagquery']=1;
			}
			else
			{
				$_SESSION['flagquery']=0;
			}
		}
		
		header('location:profile.php');
	}
		
	
?>