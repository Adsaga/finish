<?php
$value="";
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
	   if ($criterios=='Nombre') {
			$sql="select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,b.TipoSangre,a.Direccion from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre and a.Nombre LIKE '$buscar1%'  "; 
	   }
		if ($criterios=='Todos') {
				$sql="select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,b.TipoSangre,a.Direccion from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre"; 
		}
}
require('../conexion.php');
$rs = mysql_query($sql);
$header="Curp\tNombre\tA. paterno\tA. materno\tSexo\tEdad\tTipo de sangre\tDireccion";
while($row = mysql_fetch_array($rs)){
	
	$value .=$row[0];
   	$value .= "\t".$row[1];
   	$value .= "\t".$row[2];
   	$value .= "\t".$row[3];
   	$value .= "\t".$row[4];
   	$value .= "\t".$row[5];
   	$value .= "\t".$row[6];
   	$value .= "\t".$row[7];
   	$value .= "\n";
}
$data=$value;
$data = str_replace("\r", "", $data);
if ($data == "") {
	$data = "\nNo Hay Registros que Mostrar\n";
}
header('Content-Type: application/x-octet-stream');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Disposition: attachment; filename= datos.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo utf8_decode($header."\n".$data);
ob_end_flush();
?>