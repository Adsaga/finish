
<script type="text/javascript" src="../../js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="../../js/jquery-1.12.1.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/est_ven.css">
<style type="text/css">
#div1{

  width: 100px;
  height: 100px;
}
.escondido{
display: none; 
}
</style>
<script type="text/javascript">
var div1;
window.onload=function(){
  div1=document.getElementById("div1");
  var bt1=document.getElementById("bt1");
  bt1.onclick=mostrarDiv1;
  div1.classList.add("escondido");
}
function mostrarDiv1(){
  div1.classList.remove("escondido");
}
</script>

<script type="text/javascript"  src="javascript/validaciones.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<form name="form1" action="datos.php" method="post" enctype="multipart/form-data">
			<table cols="2" border="0" align="center">
				<tr align="center"><td colspan="2"><H1>Datos del Medicamento</H1></td></tr>
            <tr align="right"><td>Doctor:</td>
          <td align="left"><label>
          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM  medico"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="medico" id="lab" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Cedula_Profecional']?>"><?php echo $row['Nombre_Medico']; echo "  "; echo $row['ApellidoPaterno'];
            echo "  "; echo $row['ApellidoMaterno']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select></label></td></tr>
          
          <tr align="right">
            <td>Enfermera:</td>
          <td align="left"><label>
          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM  enfermera"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="enfermera" id="lab" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['CedulaProfecional']?>"><?php echo $row['Nombre_Enfermera']; echo "  "; echo $row['Apellido_P'];
            echo "  "; echo $row['Apellido_M']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select></label>
          </td>

        </tr>


     <tr align="right"><td>Paciente :</td>
          <td align="left"><label>
          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM pacientes"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="paciente" id="lab" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Curp']?>"><?php echo $row['Nombre']; echo "  "; echo $row['Apellido_Paterno'];
            echo "  "; echo $row['Apellido_Materno']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select></label></td></tr>
           

            <tr align="right"><td>Enfermedad cronica:</td>
          <td align="left"><label>
          <?php
                   include('../conexion.php');
                   $result=mysql_query("select * FROM enfermedad"); 
                   $row=mysql_fetch_array($result);?>  
                <select name="enfermedad" id="lab" required> 
                 <option value="" required>Seleccione </option>
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Enfermedad']?>"><?php echo $row['Nombre_Enfermedad'];?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select></label></td></tr>
          <tr align="right"><td >Signos vitales:</td>  <td align="left"> <input id="bt1" type="button" value="Tomar" required/></td></label>
          </tr>

				 <tr align="right"><td>Proxima cita:</td><td align="left"><input name="citanew" type="date" value="<?php if (isset($citanew))echo $citanew; ?>" maxlength="300" required/></td></tr>
				
        <tr align="right"><td>Observaciones : </td><td align="left">
        <input name="obser"  value="<?php if (isset($obser))echo $obser; ?>" maxlength="500" placeholder="Escriba aqui" required/>
       

												
				<tr align="center"><td colspan="2">
                <input name="error" type="hidden" id="error" value="<?php echo $error ?>">
        <input type="submit" name="enviar" value="Enviar" />
        <input type="reset" name="reestablecer"/>
        <input type="hidden" name="ncapa" value="<?php echo $ncapa;?>" />
        </td></tr>  
        			</table>

              <div id="div1">
         <a href="../SignosVitales/formularios.php">Mstrar</a>
         </div>
         
		</form>	
