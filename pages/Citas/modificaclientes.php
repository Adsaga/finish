<script type="text/javascript" src="javascript/validaciones.js"></script>
<form name="form5" action="datos.php" method="POST" enctype="multipart/form-data">
			  <?php
			  	if(isset($_REQUEST['clave5'])){
				$clave5=$_REQUEST['clave5'];
				include("../conexion.php"); 
				$result1=mysql_query("SELECT a.Id_Clave,a.Numero_Lote,a.Nombre_Medicamento,a.Caducidad,b.Nombre_Laboratorio,c.Nombre_Clasificacion,d.Nombre_Tipo,e.Nombre_Aplicacion,a.Cantidad,g.Nombre_UnidadMedida FROM medicamentos a
            Inner Join laboratorio b ON a.Id_LaboratorioR =b.Id_Laboratorio  
            Inner Join clasificacion c ON a.Id_ClasificacionR = c.Id_Clasificacion 
            Inner Join tipo d ON a.Id_TipoR = d.Id_tipo 
            Inner Join aplicacion e ON a.Id_AplicacionR = e.Id_Aplicacion           
            Inner Join unidadmedida g ON a.Id_UnidadMedidaR = g.Id_UnidadMedida where Id_Clave='$clave5'",$conexion); 
				if (mysql_num_rows($result1)>=1) {
					while ($row=mysql_fetch_array($result1))
					{
						$clave5=$row["Id_Clave"];
             $lote5=$row['Numero_Lote'];
						$nombre5=$row["Nombre_Medicamento"];
						echo $fecha5=$row["Caducidad"];
						$lab5=$row["Nombre_Laboratorio"];
						$tipo5=$row["Nombre_Tipo"];
						$clasificacion5=$row["Nombre_Clasificacion"];
						$aplicacion5=$row["Nombre_Aplicacion"];
						$cant5=$row["Cantidad"];
						$udm5=$row["Nombre_UnidadMedida"];
					}?>
					<table cols="3" border="0" align="center">

					<tr align="center"><td colspan="2"><H1>Datos del Medicamento</H1></td></tr>
           <tr align="right"><td>Clave:</td><td align="left"><input name="clave5" type="text" value="<?php if (isset($clave5))echo $clave5; ?>" maxlength="10" required/></td></tr>
            <tr align="right"><td>lote:</td><td align="left"><input name="lote5" type="text" value="<?php if (isset($lote5))echo $lote5; ?>" maxlength="10" required/></td></tr>
				
				<tr align="right"><td>NOMBRE:</td><td align="left"><input name="nombre5" type="text" value="<?php if (isset($nombre5))echo $nombre5; ?>" maxlength="30" required/></td></tr>
				<tr align="right"><td>Fecha de Caducidad : </td><td align="left">
				<input name="fecha5" type="date" value="<?php if (isset($fecha5))echo $fecha5; ?>" maxlength="15"/>
				
				<tr align="right"><td>Laboratorio:</td>
          <td align="left"><label>
          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM laboratorio"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="lab5" id="lab"> 
                 <option value="<?php echo $row['Id_Laboratorio']?>" selected><?php echo $lab5; ?> </option>
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
                <select name="tipo5" id="tipo"> 
                <option selected  value="<?php echo $row['Id_Tipo']?>"><?php echo $tipo5; ?> </option>
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
                <select name="clasif5" id="clas"> 
                 <option selected value="<?php echo $row['Id_Clasificacion']?>"><?php echo $clasificacion5; ?> </option>
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
                <select name="aplic5" id="aplic"> 
                <option selected value="<?php echo $row['Id_Aplicacion']?>"><?php echo $aplicacion5; ?> </option>
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
          
              <select name="cant5">
              <option selected><?php echo $cant5; ?> </option>
          <?php for($i=1;$i<=100;$i++){?>
          <option value="<?php echo $i ;?>"><?php echo $i ;?>
          <?php } ?>
          </select>


          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM unidadmedida"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="udm5" id="udm"> 
                <option selected value="<?php echo $row['Id_UnidadMedida']?>"><?php echo $udm5; ?> </option>
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
          <input type="submit" name="Actualizar" value="Actualizar Datos" onclick="actualiza()"/>
          <input type="button" name="Eliminar" value="Eliminar Registro" onclick="baja()"/>
          </td></tr>
        <tr align="center"><td colspan="2">        
          <input type="hidden" name="ncapa" value="5" />
          <input type="hidden" name="clave5" value="<?php echo $clave5;?>" />
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