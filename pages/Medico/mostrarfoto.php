<?php
  include("conexion.php");
 $rfc=$_REQUEST['rfc'];
 $con="SELECT tipo, foto, nfoto FROM clientes WHERE rfc='$rfc' ";
 $res = mysql_query($con,$conexion); 
 $tipo = mysql_result($res, 0, "tipo"); 
 $contenido = mysql_result($res, 0, "foto"); 
 $nombre= mysql_result($res, 0, "nfoto"); 
 header("Content-type: $tipo"); 
 header("Content-Disposition: ; filename=\"$nombre\""); 
 print $contenido;  
?>



