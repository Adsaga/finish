<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Modo de aplicacion</H1></td></tr>
				<tr align="right"><td>Aplicar:</td><td align="left"><input name="aplicar" type="text" value="<?php if (isset($aplicar))echo $aplicar; ?>" maxlength="30" title="Ingresar solo letras" pattern="[A-Za-z ]*" required/></td></tr>
				
				<tr align="center">
				<td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
				<input type="submit" name="enviar" value="Enviar" />
				<input type="reset" name="reestablecer"/>
				<input type="hidden" name="ncapa" value="3" />
				</td></tr>	
			</table>
		</form>	


