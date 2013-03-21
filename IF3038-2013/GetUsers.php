<?php
require_once('connectDB.php');

if (isset($_GET['nama']) && $_GET['nama'] != "" ){
$db = new DB();

$res = $db->query( "SELECT fullname FROM pengguna WHERE fullname LIKE('" .$_GET['nama']. "%') ORDER BY fullname");

while($db->nextRecord()){
 
echo $db->Record['fullname']."\n";
 
}
}
else
	echo"Parameter nama belum diset! Access prohibited!";
?>