<?php
ob_start();
$buscar1=strtoupper($_REQUEST['buscar1']);
$criterios=$_REQUEST['criterios'];
if ($buscar1!="" or $criterios=='Todos'  ) {
       if ($criterios=='Nombre') {
            $sql="select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,a.Direccion,b.TipoSangre from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre and a.Nombre LIKE '$buscar1%'"; 
       }
        if ($criterios=='Todos') {
                $sql="select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,a.Direccion,b.TipoSangre from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre "; 
        }
}
require('fpdf/fpdf.php');//fpdf path
require('../conexion.php');
$rs = mysql_query($sql);
$header="Curp\tNombre\tA. paterno\tA. materno\tSexo\tEdad\tTipo de sangre\tDireccion";
$c_curp = "";
$c_nombre = "";
$c_apaterno = "";
$c_amaterno = "";
$c_sexo = "";
$c_edad = "";
$c_sangre= "";
$c_direc = "";
while($row = mysql_fetch_array($rs)){
   $curp=$row['Curp'];
   $nombre = $row['Nombre'];
   $apaterno=$row['Apellido_Paterno'];
   $amaterno=$row['Apellido_Materno'];
   $edad = $row['Edad'];
   $sexo = $row['Sexo'];
   $sangre=$row['TipoSangre'];
   $direc=$row['Direccion'];
  
 $c_curp = $c_curp.$curp."\n";
 $c_nombre = $c_nombre.$nombre."\n";
 $c_apaterno=$c_apaterno.$apaterno."\n";
 $c_amaterno=$c_amaterno.$amaterno."\n";
 $c_edad = $c_edad.$edad."\n";
 $c_sexo = $c_sexo.$sexo."\n";
 $c_sangre=$c_sangre.$sangre."\n";
 $_direc=$c_direc.$direc."\n";


}
mysql_close();

$pdf=new FPDF();
$pdf->AddPage();


//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY(20);
$pdf->SetX(400);
$pdf->MultiCell(120,6,$header,1);
$pdf->SetY(26);
$pdf->SetX(45);
$pdf->MultiCell(40,6,$c_curp,1);
$pdf->SetY(26);
$pdf->SetX(85);
$pdf->MultiCell(40,6,$c_nombre,1);
$pdf->SetY(26);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$c_apaterno,1);
$pdf->SetY(26);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$c_amaterno,1);
$pdf->SetY(26);
$pdf->SetX(125);
$pdf->MultiCell(20,6,$c_edad,1);
$pdf->SetY(26);
$pdf->SetX(145);
$pdf->MultiCell(20,6,$c_sexo,1);
$pdf->SetY(26);
$pdf->SetX(145);
$pdf->MultiCell(20,6,$c_sangre,1);
$pdf->SetY(26);
$pdf->SetX(145);
$pdf->MultiCell(20,6,$c_direc,1);


$filename="invoice.pdf";
$pdf->Output($filename,'F');
echo'<a href="invoice.pdf">Descargar</a>';
?>