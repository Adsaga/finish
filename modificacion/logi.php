<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">  
<title>Usuario</title>
<meta description="Venta de madera;n"/> 
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div id="agrupar">
		<header>

		</header>
        <div>
            <div id="envoltura">
                <div id="contenedor">
                    <div id="cabecera" >
                        <h2>Iniciar sesión</h2>
                    </div>
                    <div id="cuerpo">
                        <form id="form-login" action="logi.php" method="post" autocomplete="off"name="form1"  >
                            <label >Usuario:</label>
                            <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" autofocus="" required=""></p>
                            <label>Password:</label>
                            <input name="contrasena" type="password" id="contrasena" placeholder="Ingresa Password" required=""></p>
                            <p><input type="submit" id="submit" name="submit" value="Ingresar" class="boton"></p> 
                            <p>o<a href="Registro.php">Registrarse</a></p>
                        </form>
                        <?php
                        @$user = $_REQUEST['usuario'];
                        @$pass= $_REQUEST['contrasena']; 
                        if (isset($user) and isset($pass)) { 
                            if ($user=="root"and $pass=="123456") {
                                header("Location:admon.html");
                            }
                            require('validar.php'); 
                            $consulta = "SELECT usuario, contrasena from usuarios where
                             usuario='$user' and contrasena='$pass'";
                            @$rs = mysql_query($consulta);
                            @$r = mysql_num_rows($rs);
                            if ($r > 0) {
                                session_start();
                                $_SESSION["usuario"] = $user;
                                header("Location:usa.html");
                                exit();
                            }else{
                                echo "usuario o contraseña incorecto";
                            }
                        }
                        ?>
                    </div>
                    <div id="pie"></div>
                </div>
            </div>
        </div>
	</div>       
</body>
</html>