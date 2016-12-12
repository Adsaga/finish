<?php
$value="";
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
	   if ($criterios=='Nombre') {
			$sql="SELECT a.Id_Clave,a.Numero_Lote,a.Nombre_Medicamento,a.Caducidad,b.Nombre_Laboratorio,c.Nombre_Clasificacion,d.Nombre_Tipo,e.Nombre_Aplicacion,a.Cantidad,g.Nombre_UnidadMedida FROM medicamentos a
            Inner Join laboratorio b ON a.Id_LaboratorioR =b.Id_Laboratorio  
            Inner Join clasificacion c ON a.Id_ClasificacionR = c.Id_Clasificacion 
            Inner Join tipo d ON a.Id_TipoR = d.Id_tipo 
            Inner Join aplicacion e ON a.Id_AplicacionR = e.Id_Aplicacion           
            Inner Join unidadmedida g ON a.Id_UnidadMedidaR = g.Id_UnidadMedida where a.Nombre_Medicamento LIKE '$buscar1%' ;"; 
	   }
		if ($criterios=='Todos') {
				$sql="SELECT a.Id_Clave,a.Numero_Lote,a.Nombre_Medicamento,a.Caducidad,b.Nombre_Laboratorio,c.Nombre_Clasificacion,d.Nombre_Tipo,e.Nombre_Aplicacion,a.Cantidad,g.Nombre_UnidadMedida FROM medicamentos a
            Inner Join laboratorio b ON a.Id_LaboratorioR =b.Id_Laboratorio  
            Inner Join clasificacion c ON a.Id_ClasificacionR = c.Id_Clasificacion 
            Inner Join tipo d ON a.Id_TipoR = d.Id_tipo 
            Inner Join aplicacion e ON a.Id_AplicacionR = e.Id_Aplicacion           
            Inner Join unidadmedida g ON a.Id_UnidadMedidaR = g.Id_UnidadMedida ;"; 
		}
}
require('../conexion.php');
$rs = mysql_query($sql);
$header="Clave\tN. lote\tNombre\tCaducidad\tLaboratorio\tClasificacion\tTipo\tAplicacion\tContenido\tUnidad";
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
   	$value .= "\t".$row[9];
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