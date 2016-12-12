<?php
//@$conexion=pg_connect("user=postgres  password=qwerty port=5433  dbname=escuela host=localhost") or die('Error en la conexion'); 
	$conexion=mysql_connect("localhost","root","") or die("Error de conexion".mysql_error());
	if(!$conexion){
		header("location:verificacion.php?error=Error en la Conexion de la DB");exit();
	}
	$db=mysql_select_db("oficialjorya") or die ("Error al seleccionar la base de datos".mysql_error());
	if(!$db){
		header("location:verificacion.php?error=Error al Seleecionar la DB");exit();
	}
?>