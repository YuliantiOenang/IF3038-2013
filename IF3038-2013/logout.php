<?php
session_start();
$_SESSION['bananauser'] = '';
session_destroy();
header('location:index.php');
?>