<?php
	$ncapa=$_REQUEST['ncapa'];
	//$af=$_REQUEST['af'];
	if(isset($_REQUEST['af']))$af=$_REQUEST['af'];
	if(isset($_REQUEST['g']))$g=$_REQUEST['g'];
	if(isset($_REQUEST['b']))$b=$_REQUEST['b'];
	include("../conexion.php"); 
	if(!$conexion)
	{
		    
			echo "No se pudo conectar con la base de datos";
	}else{
		if ($ncapa==3){//CAPA 3 PARA GUARDAR DATOS
			echo "<script>location.href='formularios.php'</script>";
			 $aplicar=$_REQUEST['aplicar']; 
			
				$variable1="insert into laboratorio"; 
				$campos=" (Nombre_Laboratorio)";
				$valores=" values('$aplicar')";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				if(!$rs){
						echo $error="Error al guardar ".mysql_error();
						session_start();
						$_SESSION['aplicar']=$aplicar;
						
						$_SESSION['error']=$error;
						//header("location:index2.php?ncapa=$ncapa");exit();
				}else
				{
						//header("location:index2.php?ncapa=$ncapa");exit();
				}
			}
					
		//FIN CAPA 3 PARA GUARDAR DATOS
		if ($ncapa==5 && $g==1){//CAPA 5 PARA ACTUALIZAR DATOS
             $Id=$_REQUEST['aplicar5'];
			$nombre5=$_REQUEST['nombre5']; 
			
			$variable1="update laboratorio set "; 
			 echo $campos="Nombre_Laboratorio='$nombre5'";
			$criterio=" where Id_Laboratorio='$Id'";
			$rs=mysql_query($variable1.$campos.$criterio,$conexion);
			//echo $rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='4';
					header("location:busqueda.php?ncapa=$ncapa");exit();
			}
			else
			{
					$ncapa='5';
					$error="Error al Guardar ".mysql_error();
					session_start();
					$_SESSION['nombre5']=$nombre5;
					$_SESSION['error']=$error;
					//header("location:index2.php?ncapa=$ncapa");exit();
			}
		}//FIN CAPA 5 PARA ACTUALIZAR DATOS
		//FIN CAPA 5 PARA ACTUALIZAR FOTOS
		if ($ncapa==5 && $b==1){//CAPA 5 PARA ELIMINAR DATOS
			$rfc5=$_REQUEST['rfc5']; 
			$variable="delete from Paciente  where Curp='$Curp5'"; 
			@$rs=mysql_query($variable,$conexion);
			//echo $rs=mysql_affected_rows($rs);
			if($rs==1)
			{
				$ncapa='4';
				header("location:index2.php?ncapa=$ncapa");exit();
			}
			else
			{
				$ncapa='5';
				$error="Error al Eliminar ";
				session_start();
				$_SESSION['error']=$error;
				header("location:index2.php?ncapa=$ncapa");exit();
			}
		}//FIN CAPA 5 PARA ELIMINAR DATOS
		//--USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS----USUARIOS--
		if ($ncapa==1){//CAPA 1 PARA GUARDAR DATOS DEL USUARIO
			$cuenta=$_REQUEST['cuenta']; 
			$password1=md5($_REQUEST['password1']);
			$con="SELECT cuenta FROM usuarios WHERE cuenta='".$cuenta."'";
			@$res = mysql_query($con,$conexion);
			@$nf = mysql_num_rows($res);  
			if($nf>0){
					$error="La cuenta ".$cuenta." ya existe, intente con otra cuenta ";
					session_start();
					$_SESSION['error']=$error;
					header("location:index2.php?ncapa=$ncapa");exit();
			}else{
				$variable1="insert into usuarios (cuenta,password) values('$cuenta','$password1')";
				@$rs=mysql_query($conexion,$variable1);
				if(!$rs){
						$error="Error al guardar la cuanta introduzca nuevamente los datos ";
						session_start();
						$_SESSION['error']=$error;
						header("location:index2.php?ncapa=$ncapa");exit();
				}else
				{
						header("location:index2.php?ncapa=$ncapa");exit();
				}
			}
		}
		if ($ncapa==6 && $gu==1){//CAPA 6 PARA ACTUALIZAR DATOS
			$cuenta=$_REQUEST['cuenta']; 
			$passwordmu=md5($_REQUEST['passwordmu']); 
			$variable1="update usuarios set password='$passwordmu' where cuenta='$cuenta'";
			@$rs=mysql_query($conexion,$variable1);
			@$rs=mysql_affected_rows($rs); 
			if($rs==1)
			{
					$ncapa='2';
					header("location:index2.php?ncapa=$ncapa");exit();
			}
			else
			{
					$ncapa='6';
					$error="Error al Guardar, vuelva a intentarlo";
					session_start();
					$_SESSION['cuenta']=$cuenta;
					$_SESSION['error']=$error;
					header("location:index2.php?ncapa=$ncapa");exit();
			}
		}//--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FINFIN--USUARIOS-FIN
		if($ncapa==20){//AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-AUTENTIFICACION-
			$cuentai=$_REQUEST['cuentai'];
			$passwordi=md5($_REQUEST['passwordi']);
			$consulta="select * from usuarios where  cuenta='$cuentai' and password='$passwordi'";
			@$rs=mysql_query($consulta,$conexion);
			$rs=mysql_num_rows($rs); 
			if($rs>0)
			{	session_start();
				$_SESSION["autentificado"]= $cuentai;
				header("Location: index2.php");	exit();
			}else {
				$error="Cuenta o Password incorrecto";
				session_start();
				$_SESSION['error']=$error;
				$ncapa=20;
				header("Location:index.php?ncapa=$ncapa");exit();
			}
		}
		if($ncapa==21){//CERRAR SESION
			session_start();
			session_destroy();
			header("Location: index.php");exit();			
		}
	}
	mysql_close($conexion);
?>

