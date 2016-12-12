<?php
$value="";
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
	   if ($criterios=='Nombre') {
			$sql="select a.CedulaProfecional,a.Nombre_Enfermera,a.Apellido_P,a.Apellido_M,a.Sexo,a.Edad,b.TipoSangre,c.Nombre_Especialidad,a.Direccion from enfermera a
							inner join tipo_sangre b on a.IdTipo_SangreR=b.IdTipo_Sangre
							inner join especialidadenfermera c on a.Id_EspecialidadR=c.Id_Especialidad 
                           where  a.Nombre_Enfermera LIKE '$buscar1%' ;"; 
	   }
		if ($criterios=='Todos') {
				$sql="select a.CedulaProfecional,a.Nombre_Enfermera,a.Apellido_P,a.Apellido_M,a.Sexo,a.Edad,b.TipoSangre,c.Nombre_Especialidad,a.Direccion from enfermera a
							inner join tipo_sangre b on a.IdTipo_SangreR=b.IdTipo_Sangre
							inner join especialidadenfermera c on a.Id_EspecialidadR=c.Id_Especialidad 
                           ;"; 
		}
}
require('../conexion.php');
$rs = mysql_query($sql);
$header="Ced prof.\tNombre\tA. paterno\tA. materno\tSexo\tEdad\tSangre\tEspecialidad\tDireccion";
while($row = mysql_fetch_array($rs)){
	$value .=$row[0];
   	$value .= "\t".$row[1];
   	$value .= "\t".$row[2];
   	$value .= "\t".$row[3];
   	$value .= "\t".$row[4];
   	$value .= "\t".$row[5];
   	$value .= "\t".$row[6];
   	$value .= "\t".$row[7];
   	$value .= "\t".$row[8];
   	
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