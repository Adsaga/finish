<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Slider</title>
		<meta charset="UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="javascript/modernizr.custom.17475.js"></script>
		<script type="text/javascript"  src="javascript/validaciones.js"></script>
    </head>
    <body>
		<div class="container demo-3">
				<div class="fixed-bar">
					<!-- Elastislide Carousel -->
					<ul id="carousel" class="elastislide-list">
						<?php
						include("conexion.php");
						$consulta="select rfc from clientes";
						$result1=mysql_query($consulta,$conexion);
						if (mysql_num_rows($result1)>=1) {$c=0;
							while ($row=mysql_fetch_array($result1) and $c<20){
								$c++;
								echo'<li><a href="modificaclientes.php?rfc5='.$row["rfc"].'">
								<img src="mostrarfoto.php?rfc='.$row["rfc"].'" 
								width="100" height="100" align="absmiddle"></a></li>';
							}
						}
						else{
							echo "<h1>No hay datos<h1>";
						}
						?>
					</ul>
					<!-- End Elastislide Carousel -->
				</div>
		</div>
		<script type="text/javascript" src="javascript/jquery.min.js"></script>
		<script type="text/javascript" src="javascript/jquerypp.custom.js"></script>
		<script type="text/javascript" src="javascript/jquery.elastislide.js"></script>
		<script type="text/javascript">
			$( '#carousel' ).elastislide( {
				minItems : 2
			} );			
		</script>
    </body>
</html>
