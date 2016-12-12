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
			echo "<script>location.href='../MedConsumir/formularios.php'</script>";
			 $medico=$_REQUEST['medico']; 
			 $enfermera=$_REQUEST['enfermera'];
			 $paciente=$_REQUEST['paciente']; 
			 $obser=$_REQUEST['obser'];
			 $citanew=$_REQUEST['citanew'];
			 $enfermedad=$_REQUEST['enfermedad'];
			   
           $time = time();
            echo $fecha= date("Y/m/d",$time);

           
               $query= mysql_query("SELECT MAX(Id_Signosvitales) AS sv FROM signosvitales");
             if ($row = mysql_fetch_row($query)) 
            {
             $sv = trim($row[0]);
              }
             
            
             
             $variable1="insert into citas"; 
				$campos=" (Fecha_Hora,Observaciones,Cedula_ProfecionalR,CedulaProfecional_R,Id_SignosVitalesR,CitaProxima)";
				echo $valores=" values('$fecha','$obser','$medico','$enfermera',$sv,'$citanew')";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				echo "confirm('Esta seguro que los datos son correctos');";

				 $query= mysql_query("SELECT MAX(Id_Citas) FROM citas");
             if ($row = mysql_fetch_row($query)) 
            {
             echo $cita = trim($row[0]);
              }
                
				$variable1="insert into atiende"; 
				$campos=" (CurpR,Id_EnfermedadR,Id_CitasR)";
				echo $valores=" values('$paciente',$enfermedad,$cita)";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				echo "confirm('Esta seguro que los datos son correctos');";



 				# Contenido del archivo
		       
				

				if(!$rs){
						echo $error="Error al guardar ".mysql_error();
						session_start();
						$_SESSION['medico']=$medico;
						$_SESSION['endermera']=$enfermera;
						$_SESSION['paciente']=$paciente;
						$_SESSION['obser']=$obser;
						
						$_SESSION['error']=$error;
						//header("location:index2.php?ncapa=$ncapa");exit();
				}
			}
			

		}//FIN CAPA 3 PARA GUARDAR DATOS
		if ($ncapa==5 && $g==1){//CAPA 5 PARA ACTUALIZAR DATOS
			echo $clave5=$_REQUEST['clave5']; 
			echo $lote5=$_REQUEST['lote5']; 
			echo $nombre5=$_REQUEST['nombre5'];
			echo $fecha5=$_REQUEST['fecha5'];
			echo $laboratorio5=$_REQUEST['lab5'];
			echo $tipo5=$_REQUEST['tipo5'];
			echo $clasificacion5=$_REQUEST['clasif5'];
			echo $aplicacion5=$_REQUEST['aplic5'];
			echo $cantidad5=$_REQUEST['cant5'];
			echo $unidad5=$_REQUEST['udm5'];
             include("../conexion.php");
			//$variable1="  "; 
			//$campos="";
			//$criterio="'";

			$rs=mysql_query("update medicamentos 
				iner join laboratorio 
				inner join tipo
				inner join clasificacion
				inner join aplicacion
				inner join unidadmedida
				set Id_Clave='$clave5', Numero_Lote='$lote5', Nombre_Medicamento='$nombre5', Caducidad='$fecha5', Id_LaboratorioR=$laboratorio5,	
				Id_ClasificacionR=$clasificacion5, Id_AplicacionR=$aplicacion5, Id_TipoR=$tipo5, Cantidad=$cantidad5, Id_UnidadMedidaR=$unidad5  where Id_Clave='$clave5'");
			
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
					echo "$error";
					session_start();
					$_SESSION['clave5']=$clave5;
					$_SESSION['error']=$error;
					//header("location:busqueda.php?ncapa=$ncapa");exit();
			}
		}//FIN CAPA 5 PARA ACTUALIZAR DATOS
		
		if ($ncapa==5 && $b==1){//CAPA 5 PARA ELIMINAR DATOS
			$rfc5=$_REQUEST['clave5']; 
			$variable="delete from medicamentos where Id_Clave='$Clave5'"; 
			@$rs=mysql_query($variable,$conexion);
			//echo $rs=mysql_affected_rows($rs);
			if($rs==1)
			{
				$ncapa='4';
				header("location:busqueda.php?ncapa=$ncapa");exit();
			}
			else
			{
				$ncapa='5';
				$error="Error al Eliminar ";
				session_start();
				$_SESSION['error']=$error;
				header("location:busqueda.php?ncapa=$ncapa");exit();
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
	
	mysql_close($conexion);
?>

