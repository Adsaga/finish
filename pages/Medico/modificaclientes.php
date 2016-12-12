<script type="text/javascript" src="javascript/validaciones.js"></script>
<form name="form5" action="datos.php" method="POST" enctype="multipart/form-data">
			  <?php
			  	if(isset($_REQUEST['cedProf5'])){
				$cedProf5=$_REQUEST['cedProf5'];
				include("../conexion.php"); 
				$result1=mysql_query(" select a.Cedula_Profecional,a.Nombre_Medico,a.ApellidoPaterno,a.ApellidoMaterno,a.Sexo,a.Edad,b.TipoSangre,c.Nombre_Especialidad, a.Direccion from medico a
                            inner join tipo_sangre b on a.IdTipo_SangreR=b.IdTipo_Sangre
                            inner join especialidadmedico c on a.Id_EspecialidadDoctorR=c.Id_Especialidad where Cedula_Profecional='$cedProf5'",$conexion); 
				if (mysql_num_rows($result1)>=1) {
					while ($row=mysql_fetch_array($result1))
					{
						$cedProf5=$row["Cedula_Profecional"];$nombre5=$row["Nombre_Medico"];$apellidoP5=$row["ApellidoPaterno"];$apellidoM5=$row["ApellidoMaterno"];
						$sexo5=$row["Sexo"];$edad5=$row["Edad"];
						$sangre5=$row["TipoSangre"];$espec5=$row["Nombre_Especialidad"];$direccion5=$row["Direccion"];
					}?>
					<table cols="3" border="0" align="center">
					<tr align="center"><td colspan="3"><H1>Actualizar datos del Medico</H1></td></tr>
					
                    <tr align="right"><td>Cedula Profesional:</td><td align="left"><input name="cedProf5" type="text" value="<?php if (isset($cedProf5))echo $cedProf5; ?>" maxlength="15"/></td></tr>
				<tr align="right"><td>Nombre:</td><td align="left"><input name="nombre5" type="text" value="<?php if (isset($nombre5))echo $nombre5; ?>" maxlength="30"/></td></tr>
				<tr align="right"><td>Apellido Paterno:</td><td align="left"><input name="apellidoP5" type="text" value="<?php if (isset($apellidoP5))echo $apellidoP5; ?>" maxlength="30"/></td></tr>
				<tr align="right"><td>Apellido Materno:</td><td align="left"><input name="apellidoM5" type="text" value="<?php if (isset($apellidoM5))echo $apellidoM5; ?>" maxlength="30"/></td></tr>
			
				<tr align="right"><td>Sexo:</td>
				  <td align="left"><label>
				  <select name="sexo5">
				     <option selected><?php echo $sexo5; ?> </option>
				        <option value="M">M</option>
				        <option value="H">H</option>
		              </select>
				  </label></td>
				</tr>

					</td></tr>
				
				
				<tr align="right"><td>Edad:</td><td align="left">
                     <select name="edad5">
                        <option selected><?php echo $edad5; ?> </option>
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
                <select name="sangre5" id="sangre"> 
                	 <option selected value="<?php echo $row['IdTipo_Sangre']?>"><?php echo $sangre5; ?> </option>
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
                   $result=mysql_query("select * FROM especialidadmedico"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="espec5" id="espec5"> 
                	 <option selected value="<?php echo $row['Id_Especialidad']?>"><?php echo $espec5; ?> </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Especialidad']?>"><?php echo $row['Nombre_Especialidad']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
				</td></tr>
 <tr align="right"><td>Direccion :</td><td align="left"><input name="direccion5" type="text" value="<?php if (isset($direccion5)) echo $direccion5; ?>" maxlength="200"/></td></tr>
						




					<tr align="center"><td colspan="2">
					<input type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
					<input type="button" name="Eliminar" value="Eliminar Registro" onclick="baja()"/>
					
					<tr align="center"><td colspan="3">					
					<input type="hidden" name="ncapa" value="5" />
					<input type="hidden" name="rfc5" value="<?php echo $rfc5;?>" />
					<input type="hidden" name="g" value="1" />
					<input type="hidden" name="b" value="<?php echo $b;?>" />
					<input type="hidden" name="af"  />
					</td></tr>	
					</table>
				<?php }
				else{
					echo"<BR><CENTER><H3>NO HAY DATOS</CENTER></H3>";
				}
				mysql_close($conexion);
				}
?>
		</form>	