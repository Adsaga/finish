<?php
$cedula=$_REQUEST['cedprof'];
$nombre=$_POST['usuario'];
$apellidopat=$_POST['apepat'];
$apellidomat=$_POST['apemat'];
$tel=$_REQUEST['tel'];
$correo=$_REQUEST['correo'];
echo $pass1=$_POST['pass1'];
echo $pass2=$_POST['pass2'];


include('../../../conexion.php');
if($pass1==$pass2){
	$password=md5($pass1);
	echo $query="insert into usuarios(ced,Nombre,ApellidoPat,ApellidoMat,telefono,password,correo, cargo) 
values('$cedula','$nombre','$apellidopat','$apellidomat',$tel,'$password','$correo',1)";

	$insertar=mysql_query($query);
if(!$insertar){
echo $error="Error al guardar ".mysql_error();
	echo "<script type='text/javascript'>
    alert('Algo salio mal en el registro');window.location='InsertUsers.php'
	 </script>";
}else{

	echo "<script type='text/javascript'>
    alert('El usuario de ha registrado de manera exitosa');window.location='../../sesion.php'
	 </script>";
	
}
}else{
	echo "Las contraseñas no coinciden";
}

mysql_close($conexion);
?>