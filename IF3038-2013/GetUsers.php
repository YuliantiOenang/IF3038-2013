<?php
require_once('connectDB.php');

if (isset($_GET['nama']) && $_GET['nama'] != "" ){
$db = new DB();

$res = $db->query( "SELECT username FROM pengguna WHERE fullname LIKE('" .$_GET['nama']. "%') ORDER BY username");

while($db->nextRecord()){
 
echo $db->Record['username']."\n";
 
}
}
else
	echo"Parameter nama belum diset! Access prohibited!";
?>