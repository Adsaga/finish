
<html lang="en" class="uno"> 
<head>
<meta charset="utf-8">
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>Login de ingreso</title>
<meta description="Login de usuario"/>
<!-- main css -->


<!--RESPONSIVO-->
<link rel="stylesheet" href="css/estilo_usuario.css">
</head>
<body>
<div id="pagewrap">

    <header id="header">
        <hgroup >
        
           <!-- <img src="images/JR.png"  width="120" height="120" >--><img src="images/imss.png"  width="120" height="120"/ >
            <h1 id="#site-logo" align="center">Base de datos </h1>
            <h2 id="site-description" align="center">Asuncion Atoyaquillo</h2>
            <div id="imagen">
                
            </div>
        </hgroup>
        
    </header>

 <div id="content">
<div id="envoltura">
        <div id="contenedor">
 
            <div id="cabecera" >
     <p id="p1"> <span class="icon-users"></span>  INICIO DE SESIÓN</p>
            </div>
 
            <div id="cuerpo">
                <form id="form-login" action="ingresar/validarlogin.php" method="POST" autocomplete="off" >
                
                    <p id="p"><label >Correo electronico:</label></p>
                        <input name="usuario" type="email" id="user" placeholder="Ingresa Usuario" autofocus="" required=""/></p>
 
                    <p id="p"><label>Contraseña:</label></p>
                        <input name="password" type="password" id="pass" placeholder="Ingresa Password" required=""/></p>
 
                    <p id="p"><input type="submit" id="enviar" name="enviar" value="Ingresar" class="boton"/><span class="icon-spinner"></span> </p>
                  
                   
                   <p id="aviso" style="color: red;"></p>     
                </form>
                </div>
                </div>
          

    </div>
    </div>


    <!-- /#header -->   
    <!-- /#footer -->   
<br><br>

<footer id="dautor" >

    <hr>
         <div id="dautor" style="text-align: center;">&copy; Derechos Reservados Clinica de Asuncion Atoyaquillo</div>
        <hr>
        </footer> 
    <footer id="fin" >
    <div style="text-align: center;">Asuncion Atoyaquillo, Putla Villa de Gro, Putla, Oaxaca<br>
    Tels. Dir. (953) 55 20788,  (953) 55 21322, fax: (953) 55 20405  e-mail:  a.s.g.1992@hotmail.com<br>
  </div>
</footer>
</div>

</body>
</html>