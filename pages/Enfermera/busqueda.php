  		<link rel="stylesheet" type="text/css" href="estilos.css">
  		<script type="text/javascript" src="javascript/validaciones.js"></script>
  		<form name="form3" method="POST" action="">
		<center>
			<h1>Busqueda de Enfermeras</h1>
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
				
					
				<tr><td ><h4>Cedula Profesional</h4></td><td ><h4>Nombre</h4></td><td ><h4>Apellido paterno</h4></td><td ><h4>Apellido materno</h4></td>
                </td><td ><h4>Especialidad</h4></td></td><td ><h4>Sexo</h4></td></td><td ><h4>Edad</h4></td></td><td ><h4>Tipo de sangre</h4></td><td ><h4>Direccion</h4></td>
				</tr>
				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=='Todos'  ) {
					   if ($criterios=='Nombre') {
							//$_pagi_sql="SELECT rfc,nombre FROM clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc";
							$_pagi_sql=" select a.CedulaProfecional,a.Nombre_Enfermera,a.Apellido_P,a.Apellido_M,a.Sexo,a.Edad,b.TipoSangre,a.Direccion,c.Nombre_Especialidad from enfermera a
							inner join tipo_sangre b on a.IdTipo_SangreR=b.IdTipo_Sangre
							inner join especialidadenfermera c on a.Id_EspecialidadR=c.Id_Especialidad 
                           where  a.Nombre_Enfermera LIKE '$buscar1%' ;" ;
					   }
					   if ($criterios=='Todos') {
							$_pagi_sql=" select a.CedulaProfecional,a.Nombre_Enfermera,a.Apellido_P,a.Apellido_M,a.Sexo,a.Edad,b.TipoSangre,a.Direccion,c.Nombre_Especialidad from enfermera a
							inner join tipo_sangre b on a.IdTipo_SangreR=b.IdTipo_Sangre
							inner join especialidadenfermera c on a.Id_EspecialidadR=c.Id_Especialidad;"; 
					   }
						include("../conexion.php"); 
						$result1=mysql_query($_pagi_sql,$conexion);
						//if (mysql_num_rows($result1)>=1) {
							//$_pagi_cuantos = 5;
							//$_pagi_nav_num_enlaces = 5;
							//include("paginator.inc.php");
							while ($row=mysql_fetch_array($result1))
							{
								echo '<tr><td data-label="Cedula Profesional"><a href="modificaclientes.php?cedProf5='.$row["CedulaProfecional"].'">'.$row["CedulaProfecional"].'</a></td>
								<td data-label="Nombre">'.$row["Nombre_Enfermera"].'</td>
								<td data-label="Apellido_Paterno">'.$row["Apellido_P"].'</td>
								<td data-label="Apellido_Materno">'.$row["Apellido_M"].'</td>
								<td data-label="Especialidad">'.$row["Nombre_Especialidad"].'</td>
								<td data-label="Sexo">'.$row["Sexo"].'</td>
								<td data-label="Edad">'.$row["Edad"].'</td>
								<td data-label="TipoSangre">'.$row["TipoSangre"].'</td>
                                 <td data-label="Direccion">'.$row["Direccion"].'</td>
								</tr>';
							   
							}
							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="9" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="9" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				</table>
                </div>
                </div>
                <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="rfc5" value="<?php echo $cedProf5;?>" />
            </td>
          </tr>
        </table>	
        </form>	