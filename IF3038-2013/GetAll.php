<?php
require_once('connectDB.php');

if (isset($_GET['nama']) && $_GET['nama'] != "" ){
$db = new DB();

$res = $db->query( "SELECT DISTINCT * FROM tugas WHERE name LIKE('" .$_GET['nama']. "%') OR username LIKE('" .$_GET['nama']. "%')");

while($db->nextRecord()){
 
echo $db->Record['name']."\n";
echo $db->Record['username']."\n";
}
}
else
	echo"Parameter nama belum diset! Access prohibited!";
?>