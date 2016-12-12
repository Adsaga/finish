
<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Especialidad Enfermera</H1></td></tr>
				<tr align="right"><td>Especialidad:</td><td align="left"><input name="aplicar" type="text" value="<?php if (isset($aplicar))echo $aplicar; ?>" maxlength="18" required/></td></tr>
				
				<tr align="center">
				<td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
				<input type="submit" name="enviar" value="Enviar" onclick="valida()"/>
				<input type="reset" name="reestablecer"/>
			
				</td></tr>	
			</table>
		</form>	


