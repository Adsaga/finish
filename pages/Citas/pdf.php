<?php
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
       if ($criterios=='Nombre') {
            $sql="SELECT rfc,nombre,edad,sexo FROM clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc"; 
       }
        if ($criterios=='Todos') {
                $sql="SELECT rfc,nombre,edad,sexo FROM clientes ORDER BY rfc"; 
        }
}
require('fpdf/fpdf.php');//fpdf path
require('conexion.php');
$rs = mysql_query($sql);
$header="RFC\t\tNOMBRE\t\tEDAD\t\tSEXO\n";
$c_rfc = "";
$c_nombre = "";
$c_edad = "";
$c_sexo = "";
while($row = mysql_fetch_array($rs)){
   $rfc =$row['rfc'];
   $nombre = $row['nombre'];
   $edad = $row['edad'];
    $sexo = $row['sexo'];
  
 $c_rfc = $c_rfc.$rfc."\n";
 $c_nombre = $c_nombre.$nombre."\n";
 $c_edad = $c_edad.$edad."\n";
 $c_sexo = $c_sexo.$sexo."\n";


}
mysql_close();

$pdf=new FPDF();
$pdf->AddPage();


//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY(20);
$pdf->SetX(45);
$pdf->MultiCell(120,6,$header,1);
$pdf->SetY(26);
$pdf->SetX(45);
$pdf->MultiCell(40,6,$c_rfc,1);
$pdf->SetY(26);
$pdf->SetX(85);
$pdf->MultiCell(40,6,$c_nombre,1);
$pdf->SetY(26);
$pdf->SetX(125);
$pdf->MultiCell(20,6,$c_edad,1);
$pdf->SetY(26);
$pdf->SetX(145);
$pdf->MultiCell(20,6,$c_sexo,1);

$filename="invoice.pdf";
$pdf->Output($filename,'F');
echo'<a href="invoice.pdf">Descargar</a>';
?>