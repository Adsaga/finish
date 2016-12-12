<?php
session_start();
$usuarioi=$_SESSION["autentificado"];
if ($_SESSION["autentificado"] == "") {
	session_destroy();
	header("Location:index.php");
	exit();
}	
?>
