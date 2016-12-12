  		<link rel="stylesheet" type="text/css" href="estilos.css">
  		<script type="text/javascript" src="javascript/validaciones.js"></script>
  		<form name="form3" method="POST" action="">
		<center>
			<h1>Busqueda de medicamentos</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
            <option value="Nombre">Nombre</option>
		    <option value="Todos">Todos</option
          ></select>
		  </p>
		  <p>
			Busqueda por Nombre:
		    <input type="text" name="buscar1" value="<?php if(isset($buscar1))echo $buscar1; ?>"/>
		  </p>
		  <p>
			<label>
			<input type="button" name="boton2" value="Buscar"  onclick="validaform3()"/>
            <input type="image" src="img/excel.gif" name="boton2" onclick="excel()"/> 
            <input type="image" src="img/word.gif" name="boton2" onclick="word()"/>
             <input type="image" src="img/pdf.gif" name="boton2" onclick="pdf()"/>           
			</label>
		  </p>
		  <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
		</center>
		</form>
        <form name="form4" method="post">
	    <table width="610px" border="0" align="center">
          <tr>
            <td>
            	<div id="pp">
				<table width="600" cols="3" border="1" cellpadding="0" cellspacing="0" align="center" class="tabla">
				<thead>
				
				<tr><td ><h4>Clave</h4></td><td ><h4>Nombre</h4></td><td ><h4>Fecha de Caducidad</h4></td><td ><h4>Laboratorio</h4></td><td ><h4>Clasificacion</h4></td>
				<td ><h4>Tipo</h4></td><td ><h4>Aplicacion</h4></td><td ><h4>Contenido neto</h4></td><td ><h4>Unidad</h4></td></tr>
				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=='Todos'  ) {
					   if ($criterios=='Nombre') {
							//$_pagi_sql="SELECT rfc,nombre FROM clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc";
							$_pagi_sql="SELECT a.Id_Clave,a.Numero_Lote,a.Nombre_Medicamento,a.Caducidad,b.Nombre_Laboratorio,c.Nombre_Clasificacion,d.Nombre_Tipo,e.Nombre_Aplicacion,a.Cantidad,g.Nombre_UnidadMedida FROM medicamentos a
            Inner Join laboratorio b ON a.Id_LaboratorioR =b.Id_Laboratorio  
            Inner Join clasificacion c ON a.Id_ClasificacionR = c.Id_Clasificacion 
            Inner Join tipo d ON a.Id_TipoR = d.Id_tipo 
            Inner Join aplicacion e ON a.Id_AplicacionR = e.Id_Aplicacion           
            Inner Join unidadmedida g ON a.Id_UnidadMedidaR = g.Id_UnidadMedida where a.Nombre_Medicamento LIKE '$buscar1%' ;" ;
					   }
					   if ($criterios=='Todos') {
							$_pagi_sql=" 
select b.Nombre, b.Apellido_Paterno,b.Apellido_Materno,b.Edad,c.Nombre_Enfermedad 
as EnfermedadCronica, d.Fecha_Hora,d.Observaciones,d.CitaProxima, e.Cedula_Profecional as
CedProfMedico,
e.Nombre_Medico,e.ApellidoPaterno,e.ApellidoMaterno,f.Nombre_Especialidad as EspecMedico,
g.CedulaProfecional as cedProfEnfer, g.Nombre_Enfermera,g.Apellido_P,g.Apellido_M,
h.Nombre_Especialidad as EspEnfer,i.Presion,i.Temperatura,i.Peso,i.Talla,i.Frecuencia_Cardiaca,i.Frecuencia_Respiratoria
 
 from atiende a
inner join pacientes b on a.CurpR=b.Curp
inner join enfermedad c on a.Id_EnfermedadR=c.Id_Enfermedad
inner join citas d on Id_CitasR=d.Id_Citas
inner join medico e on d.Cedula_ProfecionalR=e.Cedula_Profecional
inner join especialidadmedico f on e.Id_EspecialidadDoctorR=f.Id_Especialidad
inner join enfermera g on d.CedulaProfecional_R=g.CedulaProfecional
inner join especialidadenfermera h on g.Id_EspecialidadR=h.Id_Especialidad
inner join signosvitales i on d.Id_signosvitalesR=i.Id_signosvitales
;"; 
					   }
						include("../conexion.php"); 
						$result1=mysql_query($_pagi_sql,$conexion);
						//if (mysql_num_rows($result1)>=1) {
							//$_pagi_cuantos = 5;
							//$_pagi_nav_num_enlaces = 5;
							//include("paginator.inc.php");
							while ($row=mysql_fetch_array($result1))
							{
								echo '<tr><td data-label="Clave"><a href="modificaclientes.php?clave5='.$row["Id_Clave"].'">'.$row["Id_Clave"].'</a></td>
								<td data-label=" Nombre ">'.$row["Nombre_Medicamento"].'</td>
								<td data-label="Fecha de caducidad">'.$row["Caducidad"].'</td>
								<td data-label="Laboratorio">'.$row["Nombre_Laboratorio"].'</td>
								<td data-label="clasificacion ">'.$row["Nombre_Clasificacion"].'</td>
								<td data-label="Tipo">'.$row["Nombre_Tipo"].'</td>
								<td data-label="Edad de aplicacion ">'.$row["Nombre_Aplicacion"].'</td>
								<td data-label="Contenido neto ">'.$row["Cantidad"].'</td>
								<td data-label=" Unidad ">'.$row["Nombre_UnidadMedida"].'</td>

								</tr>';
							   
							}
							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="9" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="8" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				</table>
                </div>
                <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="clave5" value="<?php echo $clave5;?>" />
            </td>
          </tr>
        </table>	
        </form>	