						
<?php
include('../../conexion.php');
echo $usuario=$_REQUEST['usuario'];
echo $password=$_REQUEST['password'];
 
echo $pas=md5($password);

$registro=mysql_query("select * from usuarios where correo='$_REQUEST[usuario]'  and password='$pas' ") or die("Error:".mysql_error());

$row=mysql_fetch_array($registro);
 if( $usuario=$row['correo'] and $pas=$row['password']  ){

 if ($row['cargo'] == 1) {
         session_start();
        //variable de sesion llamada validacion igual a 1
        //el valor de la sesion equivale a 1
        $_SESSION['validacion'] = 1 ;
        header("location:../bienvenidpadmin.php");
      //si es 2 hara lo siguiente mostrara vista clientes
      }
      else  if($row['cargo'] == 2){
        session_start();

       $_SESSION['validacion'] = 1 ;
        header("location:../bienvenidp.php");
        
       }else{
        if($row['cargo'] == 3){
        session_start();

       $_SESSION['validacion'] = 1 ;
        header("location:../bienvenidasig.php");
        
       }
       }

     }
       else{
        echo"  <script type='text/javascript'>
 alert('Datos Incorrectos');window.location='../sesion.php';
      </script>";

       }
       	

?>
