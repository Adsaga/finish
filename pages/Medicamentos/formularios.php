
<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Datos del Medicamento</H1></td></tr>
				<tr align="right"><td>Clave:</td><td align="left"><input name="clave" type="text" value="<?php if (isset($clave))echo $clave; ?>" maxlength="10" title="Ejemplo: 03412RT1" pattern="[A-Z0-9]{10}" required/></td></tr>
        <tr align="right"><td>Lote No.: </td><td align="left"><input name="lote" type="text" value="<?php if (isset($lote))echo $lote; ?>" maxlength="6" title="Ejemplo: 15K005" pattern="[A-Z0-9]{6}" required/></td></tr>
				<tr align="right"><td>NOMBRE:</td><td align="left"><input name="nombre" type="text" value="<?php if (isset($nombre))echo $nombre; ?>" maxlength="30" title="Solo texto" pattern="[A-Za-z]*" required/></td></tr>
				<tr align="right"><td>Fecha de Caducidad : </td><td align="left">
				<input name="fecha" type="date" value="<?php if (isset($fecha))echo $fecha; ?>" maxlength="10" required/>
				
				<tr align="right"><td>Laboratorio:</td>
				  <td align="left"><label>
				  <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM laboratorio"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="lab" id="lab" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Laboratorio']?>"><?php echo $row['Nombre_Laboratorio']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>



<label>Tipo: </label>
 <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM tipo"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="tipo" id="tipo" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Tipo']?>"><?php echo $row['Nombre_Tipo']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>


				  </label></td>
				</tr>
				<tr align="right"><td>Clasificacion:</td><td align="left">
					
					 <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM clasificacion"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="clasif" id="clas" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Clasificacion']?>"><?php echo $row['Nombre_Clasificacion']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>



         <label>Aplicacion recomendada: </label>

          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM aplicacion"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="aplic" id="aplic" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Aplicacion']?>"><?php echo $row['Nombre_Aplicacion']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>

				</td></tr>				
				<tr align="right"><td>Contenido:</td><td align="left">
					
              <select name="cant" required>
               <option value="" required>Seleccione </option>
					<?php for($i=1;$i<=1000;$i++){?>
				  <option value="<?php echo $i ;?>"><?php echo $i ;?>
				  <?php } ?>
				  </select>


          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM unidadmedida"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="udm" id="udm" required> 
                <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_UnidadMedida']?>"><?php echo $row['Nombre_UnidadMedida']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>


				</td></tr>				
				
								
				<tr align="center"><td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
        <input type="submit" name="enviar" value="Enviar" />
        <input type="reset" name="reestablecer"/>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
        </td></tr>  
        			</table>
		</form>	


