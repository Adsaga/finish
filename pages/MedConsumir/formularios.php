
<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Medicamento que consumira el paciente</H1></td></tr>
				
				  <tr align="right"><td>Medicamento:</td><td align="left">

                       <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM medicamentos"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="med" id="espec" required> 
                <option value="" required>Seleccionar</option> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Clave']?>"><?php echo $row['Nombre_Medicamento']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
           </select>

    <tr align="right"><td>Modo de aplicacion:</td><td align="left"><input name="aplica" type="text" value="<?php if (isset($aplica))echo $aplica; ?>" maxlength="300" required/></td></tr>

				</td></tr>				
				<tr align="right"><td>Cajas asignadas:</td><td align="left">
					
              <select name="cajas" required>
               <option value="" required>Seleccione </option>
					<?php for($i=1;$i<=100;$i++){?>
				  <option value="<?php echo $i ;?>"><?php echo $i ;?>
				  <?php } ?>
				  </select>
   
			
				<tr align="center"><td align="right">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
        <input type="submit" name="enviar" value="Agregar" /></td>
        <td align="left"> <a href="../Citas/busqueda.php">
        <input type="button" name="terminar" value="Terminar registros" ></></td>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
        </td></tr>  
        			</table>
		</form>	


