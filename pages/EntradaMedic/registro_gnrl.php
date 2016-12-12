<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BD JORyA</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   <form class="form-horizontal" role="form">
    <center> <h3>Registros Generales</h3></center>
  <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="nombre"
             placeholder="Nombre (s)">
    </div>
  </div>
  
  <div class="form-group">
    <label for="apellido" class="col-lg-2 control-label">Apellido</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="apellido"
             placeholder="Apellido">
    </div>
  </div>

  <div class="form-group">
    <label for="curp" class="col-lg-2 control-label">Curp</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="curp"
             placeholder="CURP">
    </div>
  </div>

  <div class="form-group">
    <label for="domicilio" class="col-lg-2 control-label">Ubicacion:</label>
    
    <table>
      <tr>
        <td  >Estado: </td><td>
    <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM estado"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Estado']?>"><?php echo $row['Nombre_Estado']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>

    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>

<!---->
<label>Distrito: </label>
<?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM distrito"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_distrito']?>"><?php echo $row['Nombre_Distrito']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
          
    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>

<label>Municipio: </label>
<?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM municipio"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['CodPostal']?>"><?php echo $row['Nombre_Municipio']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
          
    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>

<label>Localidad: </label>
<?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM localidad"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Localidad']?>"><?php echo $row['Nombre_Localidad']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
          
    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>


  </td>

       
      </tr>
      <tr>
        <td
      </tr>
    </table>

    <!-- <div class="col-lg-10">
      <input type="text" class="form-control" id="domicilio"
             placeholder="Domicilio">
    </div>-->
  </div>
  <div class="form-group">
    <label for="sangre" class="col-lg-2 control-label"></label>
    <div class="col-lg-10">
    <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM tipode_sangre"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_TipoSangre']?>"><?php echo $row['Tipo_Sangre']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>

<div class="form-group">
    <label for="sexo" class="col-lg-2 control-label">Sexo</label>
    <!-- <div class="col-lg-10">
        <div class="radio"> 
        <div>
       <!--     <label>
                <input type="radio" name="opciones" id="opciones_1" value="opcion_1" checked>
                H
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="opciones" id="opciones_2" value="opcion_2">
                M
            </label>
        </div>-->
         <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM sexo"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Sexo']?>"><?php echo $row['Tipo_Sexo']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
         </select>
    <!-- </div>
</div>-->
</div>

 <div class="form-group">
    <label for="edad" class="col-lg-2 control-label">Edad</label>
    <div class="col-lg-10">
      <select name="edad">
          <?php for($i=1;$i<=100;$i++){?>
          <option value="<?php echo $i ;?>"><?php echo $i ;?>
          <?php } ?>
        </select>
    </div>
  </div>

  <div class="form-group">
    <label for="sangre" class="col-lg-2 control-label">Tipo de Sangre</label>
    <div class="col-lg-10">
    <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM tipode_sangre"); 
      $row=mysql_fetch_array($result);?>  
          <select name="t_sangre" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_TipoSangre']?>"><?php echo $row['Tipo_Sangre']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
    <!--  <input type="text" class="form-control" id="sangre"
             placeholder="Tipo de sangre">-->
    </div>
  </div>

 <div class="form-group">
    <label for="estudio" class="col-lg-2 control-label">Alergias</label>
    <div class="col-lg-10">
       <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM alergias"); 
      $row=mysql_fetch_array($result);?>  
          <select name="g_studio" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_Alergias']?>"><?php echo $row['Nombre_Alergia']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
    </div>
  </div>

  <div class="form-group">
    <label for="folio" class="col-lg-2 control-label">Folio</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="folio"
             placeholder="Folio">
    </div>
  </div>

   <div class="form-group">
    <label for="estudio" class="col-lg-2 control-label">Grado de estudio</label>
    <div class="col-lg-10">
       <?php 
include('../../conexion.php');
    $result=mysql_query("select * FROM gradoestudio"); 
      $row=mysql_fetch_array($result);?>  
          <select name="g_studio" id="s"> 
            <?php 
        do {   
      ?> 
            <option value="<?php echo $row['Id_GradoEstudio']?>"><?php echo $row['GradoEstudio']?></option> 
            <?php 
        } while ($row = mysql_fetch_assoc($result)); 
      ?> 
          </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Guardar</button>
       <ul class="nav navbar-top-links navbar-right">
       <a href="index.php"><button type="submit" class="btn btn-default">Cancelar</a></button>
     </ul>
    </div>
  </div>
</form>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

</body>

</html>
