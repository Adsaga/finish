
<script type="text/javascript" src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Datos de enfermedad</H1></td></tr>
				
				<tr align="right"><td>Cedula Profesional:</td><td align="left"><input name="cedProf" type="text" value="<?php if (isset($cedProf))echo $cedProf; ?>" maxlength="8" title="Ejemplo: AUS31O9A" pattern="[A-Z0-9]{8}" required/></td></tr>
				<tr align="right"><td>Nombre:</td><td align="left"><input name="nombre" id="nombre" type="text" value="<?php if (isset($nombre))echo $nombre; ?>" maxlength="30"  title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
				<tr align="right"><td>Apellido Paterno:</td><td align="left"><input name="apellidoP" type="text" value="<?php if (isset($apellidoP))echo $apellidoP; ?>" maxlength="30" required title="Solo texto" pattern="[A-Za-z]*" /></td></tr>
				<tr align="right"><td>Apellido Materno:</td><td align="left"><input name="apellidoM" type="text" value="<?php if (isset($apellidoM))echo $apellidoM; ?>" maxlength="30" required title="Solo texto" pattern="[A-Za-z]*"/></td></tr>
			
				<tr align="right"><td>Sexo:</td>
				  <td align="left"><label>
				  <select name="sexo">
				        <option value="M">M</option> 
				        <option value="H">H</option>
		              </select>
				  </label></td>
				</tr>

					</td></tr>
				
				
				<tr align="right"><td>Edad:</td><td align="left">
                     <select name="edad">
					<?php for($i=24;$i<=60;$i++){?>
				  <option value="<?php echo $i ;?>"><?php echo $i ;?>
				  <?php } ?>
				  </select>
				  </td></tr>
				<tr align="right"><td>Tipo de sangre:</td><td align="left">

                       <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM tipo_sangre"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="sangre" id="sangre" required>
                <option value="" required>Seleccione una opcion</option> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['IdTipo_Sangre']?>"><?php echo $row['TipoSangre']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
           </select>
				</td></tr>
				<tr align="right"><td>Especialidad:</td><td align="left">

                       <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM especialidadenfermera"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="espec" id="espec" required> 
                <option value="" required>Seleccionar especialidad</option> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Especialidad']?>"><?php echo $row['Nombre_Especialidad']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
           </select>
				</td></tr>
				 <tr align="right"><td>Direccion :</td><td align="left"><input name="direccion" type="text" value="<?php if (isset($direccion)) echo $direccion; ?>" maxlength="200" required/></td></tr>
						
				<tr align="center"><td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
				<input type="submit" name="enviar" value="Enviar" />
				<input type="reset" name="reestablecer"/>
				
				</td></tr>	
			</table>
		</form>	


