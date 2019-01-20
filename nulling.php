<?php 
session_start();
$_SESSION['admining'] = null;
header("Location: admining.php");
?>