<script type="text/javascript" src="javascript/validaciones.js"></script>
<form name="form5" action="datos.php" method="POST" enctype="multipart/form-data">
			  <?php
			  	if(isset($_REQUEST['curp5'])){
				$curp5=$_REQUEST['curp5'];
				include("../conexion.php"); 
				$result1=mysql_query("select a.Curp,a.Nombre,a.Apellido_Paterno,a.Apellido_Materno,a.Sexo,a.Edad,b.TipoSangre,a.Direccion from
 pacientes a,tipo_sangre b where  a.IdTipo_SangreR=b.IdTipo_Sangre and Curp='$curp5'",$conexion); 
				if (mysql_num_rows($result1)>=1) {
					while ($row=mysql_fetch_array($result1))
					{
						$Curp5=$row["Curp"];$nombre5=$row["Nombre"];$apellidoP5=$row["Apellido_Paterno"];$apellidoM5=$row["Apellido_Materno"];
						$sexo5=$row["Sexo"];$edad5=$row["Edad"];$direccion5=$row['Direccion'];
						$sangre5=$row["TipoSangre"];
					}?>
					<table cols="3" border="0" align="center">
					<tr align="center"><td colspan="3"><H1>Actualizar Paciente</H1></td></tr>
					<tr align="right"><td>NOMBRE:</td><td align="left"><input type="text" maxlength="30" name="nombre5" value="<?php echo $nombre5;?>"/></td>
					</tr>
					<tr align="right"><td>Apellido Paterno:</td><td align="left"><input type="text" maxlength="30" name="apellidoP5" value="<?php echo $apellidoP5;?>"/></td>
					</tr>
					<tr align="right"><td>Apellido Materno:</td><td align="left"><input type="text" maxlength="30" name="apellidoM5" value="<?php echo $apellidoM5;?>"/></td>
					</tr>
					<tr align="right"><td>Sexo:</td>
					  <td align="left"><label>
					  <select name="sexo5">
		                    <option selected><?php echo $sexo5; ?> </option>
							<option value="M">M</option>
							<option value="H">H</option>
						  </select>
					  </label></td>
					</tr>
					<tr align="right"><td>Edad:</td><td align="left">
					<select name="edad5">
					 <option selected><?php echo $edad5; ?> </option>
					<?php for($i=18;$i<=60;$i++){?>
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

				 <tr align="right"><td>Direccion :</td><td align="left"><input name="direccion5" type="text" value="<?php if (isset($direccion5)) echo $direccion5; ?>" maxlength="200"/></td></tr>
					<tr align="center"><td colspan="2">
					<input type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
					<input type="button" name="Eliminar" value="Eliminar Registro" onclick="baja()"/>
						
					<tr align="center"><td colspan="3">					
					<input type="hidden" name="ncapa" value="5" />
					<input type="hidden" name="curp5" value="<?php echo $curp5;?>" />
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