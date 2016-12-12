
<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Registro de sisgnos vitales</H1></td></tr>
				<tr align="right"><td>Presion:</td><td align="left"><input name="presion"  type="number" step="any" value="<?php if (isset($presion))echo $presion; ?>" maxlength="18" required/></td></tr>
				<tr align="right"><td>Temperatura:</td><td align="left"><input name="temp"  type="number" step="any" value="<?php if (isset($temp))echo $temp; ?>" maxlength="30" required/></td></tr>
				<tr align="right"><td>Peso: </td><td align="left"><input name="peso"  type="number" step="any" value="<?php if (isset($peso))echo $peso; ?>" maxlength="30" required/></td></tr>
				<tr align="right"><td>Talla:</td><td align="left"><input name="talla"  type="number" step="any" value="<?php if (isset($talla))echo $talla; ?>" maxlength="30" required/></td></tr>
				<tr align="right"><td>Frecuencia cardiaca:</td><td align="left"><input name="frecard"  type="number" step="any" value="<?php if (isset($frecard))echo $frecard; ?>" maxlength="30" required/></td></tr>
				<tr align="right"><td>Frecuencia respiratoria:</td><td align="left"><input name="freres" type="number"  type="number" step="any" value="<?php if (isset($freres))echo $freres; ?>" maxlength="30" required/></td></tr>
								
				<tr align="center">
				<td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
				<input type="submit" name="enviar" value="Enviar" />
				<input type="reset" name="reestablecer"/>
				<input type="hidden" name="ncapa" value="3" />

				</td></tr>	
			</table>
		<a href="javascript:window.history.back();">&laquo; Volver atrás</a>


