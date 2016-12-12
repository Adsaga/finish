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
			echo "<script>location.href='../Citas/formularios.php'</script>";
			 $presion=$_REQUEST['presion']; 
			 $temp=$_REQUEST['temp']; 
			 $peso=$_REQUEST['peso'];
			 $talla=$_REQUEST['talla'];
			$frecard=$_REQUEST['frecard'];
			 $freres=$_REQUEST['freres'];
			 
				$variable1="insert into signosvitales"; 
				$campos="(Presion,Temperatura,Peso,Talla,Frecuencia_Cardiaca,Frecuencia_Respiratoria)";
				 $valores=" values($presion,$temp,$peso,$talla,$frecard,$freres)";
				$rs=mysql_query($variable1.$campos.$valores,$conexion);
				if(!$rs){
						echo $error="Error al guardar ".mysql_error();
						session_start();
						$_SESSION['presion']=$presion;
						$_SESSION['temp']=$temp;
						$_SESSION['peso']=$talla;
						$_SESSION['talla']=$talla;
						$_SESSION['frecard']=$frecard;
						$_SESSION['freres']=$freres;
						
						
						$_SESSION['error']=$error;
						//header("location:index2.php?ncapa=$ncapa");exit();
				}else
				{
						//header("location:index2.php?ncapa=$ncapa");exit();
				}
			}
					
		//FIN CAPA 3 PARA GUARDAR DATOS
		}
	mysql_close($conexion);
?>

