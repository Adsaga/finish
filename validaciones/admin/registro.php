<html >
<head>
 
    <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="estilo_registro.css">
</head>
<body >
<form action="insertUsers.php" method="post" class="login">
<fieldset>
<legend>Registrar Administrador</legend>
<div class="input">
Cedula/profesional: <input type="text" placeholder="Cedula profesional" required name="cedprof" value="<?php if (isset($cedprof))echo $cedprof; ?>" ></div>
<div class="input">

Nombre: <input type="text"  name="usuario" required value="<?php if (isset($usuario))echo $usuario; ?>" ></div>
<div class="input">
Apellido Paterno: <input type="text"  name="apepat" required value="<?php if (isset($apepat))echo $apepat; ?>" ></div>
<div class="input">
Apellido Materno: <input type="text"  name="apemat" required value="<?php if (isset($apemat))echo $apemat; ?>" ></div>
<div class="input">
Telefono: <input type="tel"  name="tel" required value="<?php if (isset($tel))echo $tel; ?>" ></div>
<div class="input">
email: <input type="email" placeholder="e-mail" required name="correo" value="<?php if (isset($correo))echo $correo; ?>" ></div>
<div class="input">
password:<input type="password" placeholder="password" required name="pass1" value="<?php if (isset($pass1))echo $pass1; ?>" ></div>
<div class="input">
repetir password: <input type="password"  name="pass2" required value="<?php if (isset($pass2))echo $pass2; ?>" ></div>
<center>
<input type="submit" value="Registrar" ><a href="../sesion.php"></a></input></center>
<center><input type="button" ><a href="login.html">Salir</a></input></center>
</fieldset>
</form> 
</body>
</html>