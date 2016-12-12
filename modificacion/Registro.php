<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">  
<title>REGISTRO</title>
<meta description="Venta de madera;n"/> 
 <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div id="agrupar">
		<header > 
		</header>
        <div>
            <div id="envoltura">
                <div id="contenedor">
                    <div id="cabecera" >
                        <h2>Registro</h2>
                    </div>
                    <div id="cuerpo">
                        <form id="form-login" action="" method="post" autocomplete="off"name="form1"  >
                            <label >Usuario:</label>
                            <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario" autofocus="" required=""></p>
                            <label>Contrase&ntilde;a: :</label>
                            <input name="contrasena" type="password" id="contrasena" placeholder="Ingresa Password" required=""></p>
                            <p><label for="passb">Confirmar Contrase&ntilde;a: <span class="obligatorio">*<span> </label>
                                <input type="password" name="pasb" id="pasb"></p>
                                <p><label for="email">Ingrese su email: <span class="obligatorio">*<span> </label>
                                    <input type="email" name="email" id="email"></p>
                                    <p><label><span class="obligatorio">*</span> Todos los datos son obligatorios</label> 
                             <p><input type="submit" id="submit" name="submit" value="registrar" class="boton"></p>
                        </form>
                        </div>
                        <?php
                        include_once('class.phpmailer.php');
                         include_once('class.smtp.php');
                        @$para=$_POST['email'];
                       @$user = $_POST['usuario'];
                        @$pass = $_POST['contrasena'];
                         @$pas= $_POST['pasb'];  

                        if (isset($user) and isset($pass)) {
                            require('validar.php');
                            $consulta = "SELECT * from usuarios where usuario='$user' and contrasena='$pas'";
                            $rs = mysql_query($consulta);
                            $r= mysql_num_rows($rs);
                            if($r>0){
                            echo "usuario existente";
                            }
                            else if($pass!=$pas){
                             echo "password distintas";
                            }
                            else{ 
                                 $mail = new PHPMailer();
                                 $mail->IsSMTP();
                                 $mail->SMTPAuth = true;
                                $mail->SMTPSecure = "ssl";
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 465;

                                $mail->Username ='orlago.94@gmail.com';
                                $mail->Password = 'dany1263';
                                $mail->AddAddress($para);
                               $mail->Subject ="Datos para acceder a la pagina ";
                               $mail->Body = $pass;
                               $mail->MsgHTML("puedes acceder desde hoy mismo <br>a nuestra pagina con los siguientes datos <br><br>Usario: ".$user."<br> <br> Password: ".$pass."<br>");
                               if($mail->Send())
                               {
                                echo "Enviado Correctamente";
                                      }
                                      else{
                                       echo "No fue enviado";
                                     }
                                $in= "INSERT INTO  usuarios VALUES ('row()', '$user','$pass')";
                                @$r = mysql_query($in); 
                                session_start();
                                $_SESSION["usuario"] = $user; 
                                header("Location:logi.php");
                                exit(); 
                            }
                        };
                        ?>
                       
                    <div id="pie"></div>
                </div>
            </div>
        </div>
	</div>       
</body>
</html>

   