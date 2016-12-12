  		<link rel="stylesheet" type="text/css" href="estilos.css">
  		<script type="text/javascript" src="javascript/validaciones.js"></script>
  		<form name="form3" method="POST" action="">
		<center>
			<h1>Busqueda de Pacientes</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
            <option value="Nombre">Nombre</option>
		    <option value="Todos">Todos</option
          ></select>
		  </p>
		  <p>
			Ingrese el nombre del paciente:
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
				
				<tr><td ><h4>Curp</h4></td><td ><h4>Nombre</h4></td><td ><h4>Apellido paterno</h4></td><td ><h4>Apellido materno</h4></td>
                </td><td ><h4>Sexo</h4></td></td><td ><h4>Edad</h4></td></td><td ><h4>Tipo de sangre</h4></td><td ><h4>Direccion</h4></td>
				</tr>
				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				$buscar1=$_REQUEST['buscar1'];
				$criterios=$_REQUEST['criterios'];  
			    if ($buscar1!="" or $criterios=='Todos'  ) {
					   if ($criterios=='Nombre') {
							//$_pagi_sql="SELECT rfc,nombre FROM clientes WHERE nombre LIKE '$buscar1%' ORDER BY rfc";
							$_pagi_sql="select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,a.Direccion,b.TipoSangre from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre and a.Nombre LIKE '$buscar1%' ;" ;
					   }
					   if ($criterios=='Todos') {
							$_pagi_sql=" select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,b.TipoSangre,a.Direccion from pacientes a,tipo_sangre b where
                             a.IdTipo_SangreR=b.IdTipo_Sangre"; 
					   }
						include("../conexion.php"); 
						$result1=mysql_query($_pagi_sql,$conexion);
						//if (mysql_num_rows($result1)>=1) {
							//$_pagi_cuantos = 5;
							//$_pagi_nav_num_enlaces = 5;
							//include("paginator.inc.php");
							while ($row=mysql_fetch_array($result1))
							{
								echo '<tr><td data-label="Curp"><a href="modificaclientes.php?curp5='.$row["Curp"].'">'.$row["Curp"].'</a></td>
								<td data-label="Nombre">'.$row["Nombre"].'</td>
								<td data-label="Apellido_Paterno">'.$row["Apellido_Paterno"].'</td>
								<td data-label="Apellido_Materno">'.$row["Apellido_Materno"].'</td>
								<td data-label="Sexo">'.$row["Sexo"].'</td>
								<td data-label="Edad">'.$row["Edad"].'</td>
								<td data-label="TipoSangre">'.$row["TipoSangre"].'</td>
                                <td data-label="Direccion">'.$row["Direccion"].'</td>

								</tr>';
							   
							}
							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="8" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="7" align="center"><h4>No hay Datos </h4></td></tr>';						
				}}
				?>								
				</table>
                </div>
                <center><a href="javascript:imprimir('pp')">Imprimir Consulta</a></center>
				<input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />	
				<input type="hidden" name="Curp5" value="<?php echo $Curp5;?>" />
            </td>
          </tr>
        </table>	
        </form>	