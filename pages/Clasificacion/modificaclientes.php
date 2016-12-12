<script type="text/javascript" src="javascript/validaciones.js"></script>
<form name="form5" action="datos.php" method="POST" enctype="multipart/form-data">
			  <?php
			  	if(isset($_REQUEST['aplicar5'])){
				$aplicar5=$_REQUEST['aplicar5'];
				include("../conexion.php"); 
				$result1=mysql_query("select * from clasificacion where Id_Clasificacion='$aplicar5'",$conexion); 
				if (mysql_num_rows($result1)>=1) {
					while ($row=mysql_fetch_array($result1))
					{
                        $aplicar5=$row['Id_Clasificacion'];
						$nombre5=$row['Nombre_Clasificacion'];
					}?>
					<table cols="3" border="0" align="center">
					<tr align="center"><td colspan="3"><H1>Actualizar clasificacion de medicamentos</H1></td></tr>

					<tr align="right"><td>Numero Progresivo:</td><td align="left"><input type="text" maxlength="3" name="aplicar5" value="<?php echo $aplicar5;?>"/></td>
					</tr>
					<tr align="right"><td>Clasificacion:</td><td align="left"><input type="text" maxlength="30" name="nombre5" value="<?php echo $nombre5;?>"/></td>
					</tr>
					<tr align="center"><td colspan="2">
					<input type="button" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
					<input type="button" name="Eliminar" value="Eliminar Registro" onclick="baja()"/>
						
					<tr align="center"><td colspan="2">					
					<input type="hidden" name="ncapa" value="5" />
					<input type="hidden" name="curp5" value="<?php echo $aplicar5;?>" />
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