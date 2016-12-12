  		<link rel="stylesheet" type="text/css" href="estilos.css">
  		<script type="text/javascript" src="javascript/validaciones.js"></script>
  		<form name="form3" method="POST" action="">
		<center>
			<h1>Busqueda de especialidades de Medicos</h1>
		  <p>CRITERIOS:
          <select name="criterios" id="select">
            
		    <option value="Todos">Todos</option
          ></select>
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
				
				<tr><td ><h4>Numeracion</h4></td><td ><h4>Nombre de la especialidad</h4>
				</tr>
				</thead>
				<?php
			  if(isset($_REQUEST['buscar1'])or isset($_REQUEST['criterios'])){
				
				$criterios=$_REQUEST['criterios'];  
			    if ( $criterios=='Todos'  ) {
					  
					   if ($criterios=='Todos') {
							$_pagi_sql=" select * from especialidadmedico"; 
					   }
						include("../conexion.php"); 
						$result1=mysql_query($_pagi_sql,$conexion);
						//if (mysql_num_rows($result1)>=1) {
							//$_pagi_cuantos = 5;
							//$_pagi_nav_num_enlaces = 5;
							//include("paginator.inc.php");
							while ($row=mysql_fetch_array($result1))
							{
								echo '<tr><td data-label="Id_Especialidad"><a href="modificaclientes.php?aplicar5='.$row["Id_Especialidad"].'">'.$row["Id_Especialidad"].'</a></td>
								<td data-label="Nombre">'.$row["Nombre_Especialidad"].'</td>
								
								</tr>';
							   
							}
							//echo '<tr><td colspan="3" align="center"><h4>'.$_pagi_navegacion.' </h4></td></tr>';	
						//}
						echo '<tr><td colspan="2" align="center"><h4>'.mysql_num_rows($result1).' filas en la tabla </h4></td></tr>';
				}else{
						echo '<tr><td colspan="2" align="center"><h4>No hay Datos </h4></td></tr>';						
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