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
			$cedProf=$_REQUEST['cedProf']; 
			$nombre=$_REQUEST['nombre']; 
			$apellidoP=$_REQUEST['apellidoP'];
			$apellidoM=$_REQUEST['apellidoM'];
			$sexo=$_REQUEST['sexo'];
			$edad=$_REQUEST['edad'];
			$sangre=$_REQUEST['sangre'];
			$espec=$_REQUEST['espec'];
			 $direccion=$_REQUEST['direccion'];
			 
				$variable1="insert into medico"; 
				$campos=" (Cedula_Profecional,Nombre_Medico,ApellidoPaterno,ApellidoMaterno,Edad,Sexo,IdTipo_SangreR,Id_EspecialidadDoctorR,Direccion)";
				$valores=" values('$cedProf','$nombre','$apellidoP','$apellidoM',$edad,'$sexo',$sangre,$espec,'$direccion')";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				if(!$rs){
						echo $error="Error al guardar ".mysql_error();
						session_start();
						$_SESSION['cedProf']=$cedProf;
						$_SESSION['nombre']=$nombre;
						$_SESSION['apellidoP']=$apellidoP;
						$_SESSION['apellidoM']=$apellidoM;
						$_SESSION['sexo']=$sexo;
						$_SESSION['edad']=$edad;
						$_SESSION['sangre']=$sangre;
						$_SESSION['espec']=$espec;
						$_SESSION['direccion']=$direccion;
						$_SESSION['error']=$error;
						//header("location:index2.php?ncapa=$ncapa");exit();
				}else
				{
						//header("location:index2.php?ncapa=$ncapa");exit();
				}
			}
			}			
		//FIN CAPA 3 PARA GUARDAR DATOS
		if ($ncapa==5 && $g==1){//CAPA 5 PARA ACTUALIZAR DATOS
           	$cedProf5=$_REQUEST['cedProf5']; 
			$nombre5=$_REQUEST['nombre5']; 
			$apellidoP5=$_REQUEST['apellidoP5'];
			$apellidoM5=$_REQUEST['apellidoM5'];
			$sexo5=$_REQUEST['sexo5'];
			$edad5=$_REQUEST['edad5'];
			$sangre5=$_REQUEST['sangre5'];
			$espec5=$_REQUEST['espec5'];
			$direccion5=$_REQUEST['direccion5'];
			$variable1="update medico set "; 
			echo $campos="Cedula_Profecional='$cedProf5',Nombre_Medico='$nombre5',ApellidoPaterno='$apellidoP5',ApellidoMaterno='$apellidoM5',Sexo='$sexo5',Edad=$edad5,IdTipo_SangreR=$sangre5,Id_EspecialidadDoctorR=$espec5,Direccion='$direccion5'";
			$criterio=" where Cedula_Profecional='$cedProf5'";
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
					echo $error="Error al Guardar ".mysql_error();
					session_start();
					$_SESSION['cedProf5']=$cedProf5;
					$_SESSION['error']=$error;
					//header("location:index2.php?ncapa=$ncapa");exit();
			}
		
		//FIN CAPA 5 PARA ACTUALIZAR FOTOS
		if ($ncapa==5 && $b==1){//CAPA 5 PARA ELIMINAR DATOS
			$rfc5=$_REQUEST['rfc5']; 
			$variable="delete from Medico where cedProf='$cedProf5'"; 
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

