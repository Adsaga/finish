
<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Datos del Proveedor</H1></td></tr>
				<tr align="right"><td>Codigo:</td><td align="left"><input name="ccdigo" type="text" value="<?php if (isset($codigo))echo $codigo; ?>" maxlength="17"  title="Ejemplo: PP-DEF-95-1234567" pattern="[A-Z]{2}[-]{1}[A-Z]{3}[-]{1}[0-9]{2}[-]{1}[0-9]{7}" required/></td></tr>
				<tr align="right"><td>Nombre compañia:</td><td align="left"><input name="n_company" type="text" value="<?php if (isset($n_company))echo $n_company; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
				<tr align="right"><td>telefoto: </td><td align="left"><input name="tel" type="tel" value="<?php if (isset($tel))echo $tel; ?>" maxlength="10" pattern="[0-9]{10}"  required/></td></tr>
				<tr align="right"><td>Calle:</td><td align="left"><input name="calle" type="text" value="<?php if (isset($calle))echo $calle; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
				<tr align="right"><td>Localidad:</td><td align="left"><input name="loc" type="text" value="<?php if (isset($loc))echo $loc; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
				<tr align="right"><td>Codigo postal:</td><td align="left"><input name="cp" type="text" value="<?php if (isset($cp))echo $cp; ?>" maxlength="5" placeholder="71146" title="Ejemplo: 71146" pattern="[0-9]{5}" required/></td></tr>
				<tr align="right"><td>Estado :</td><td align="left"><input name="edo" type="text" value="<?php if (isset($edo))echo $edo; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
			    <tr align="right"><td>Pais:</td><td align="left"><input name="pais" type="text" value="<?php if (isset($pais))echo $pais; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
			    <tr align="right"><td>Persona a contactar:</td><td align="left"><input name="persona" type="text"   value="<?php if (isset($persona))echo $persona; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z ]*" required/></td></tr>
                <tr align="right"><td>Correo electronico:</td><td align="left"><input name="correo" type="email" value="<?php if (isset($correo))echo $correo; ?>" maxlength="30" placeholder="ejemplo@hotmail.com" required/></td></tr>

                <tr align="right"><td>Observaciones:</td><td align="left"><textarea name="obser" type="text" value="<?php if (isset($obser))echo $obser; ?>" maxlength="30" rows="6" cols="30" required> </textarea></td></tr>

				
				<tr align="center">
				<td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
				<input type="submit" name="enviar" value="Enviar" "/>
				<input type="reset" name="reestablecer"/>
				<input type="hidden" name="ncapa" value="3" />
				</td></tr>	
			</table>
		</form>	


