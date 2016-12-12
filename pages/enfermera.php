
<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="../jquery-1.12.3.min.js"></script>
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<title>JORyA</title>
<!-- main css -->
<link href="../css/style.css" rel="stylesheet" type="text/css">
<!-- media queries css -->
<link href="../css/media-queries.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../css/estilo_mc.css">
<script type="text/javascript" src="../jquery-1.12.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/est_ven.css">
<script type="text/javascript">
	function mostrar(){
		$(".ventana").slideDown("slow");
	}

	function cerrar(){
		$(".ventana").slideUp("past");
	}
	function mostrar1(){
		$(".ventana1").slideDown("slow");
	}

	function cerrar1(){
		$(".ventana1").slideUp("past");
	}
</script>
</head>
<body>
<div id="pagewrap">
	<header id="header">
<figure class="post-image"> 
		<img id="s" src="../images/imss.png">
	</figure> 
		<center><h1>JORyA</h1></center>
		<nav>
		<ul id="main-nav" class="clearfix">
			<li><a href="#"><img src="../icons/114-user.png"><img src="../icons/285-down.png"></a>
				<ul>
					<li><a href="perfil_usuario.php"><img src="../icons/114-user.png"> Perfil</a></li>
					<li><a href="ajustes.php"><img src="../icons/149-cog.png"> Ajustes</a></li><hr>
					<li><a href="../sesion.php"><img src="../icons/277-exit.png"> Cerrar Sesion</a></li>
				</ul>
			</li>
		</ul>
		
			<!-- /#main-nav --> 
		</nav>

		<form id="searchform">
			<input type="search" id="s" placeholder="Search">
		</form>
	</header>
	<!-- /#header -->	
	<div id="content">
		<article class="post clearfix">
			<header>
				<h1 class="post-title"><a href="#">Enfermera<hr></a></h1>
				Opciones...
			</header>
			<figure class="post-image"> 
				
			</figure> 
			<div class="menu_c">         
				<a href="javascript:mostrar();">
				<div class="conten" id="dos">
				<img class="icon" src="../icons/267-plus.png">
				 <p class="texto">Insertar</p> 
				 </div></a>
				
			 	<a href="javascript:mostrar1();"><div class="conten" id="cinco">
			 	<img class="icon" src="../icons/135-search.png">
			 	<p class="texto">Buscar</p>
			 	</div></a>
			</div> 
		</article>
		<!-- /.post -->
		<div class="ventana">
			<div class="form">
				<div class="cerrar"><a href="javascript:cerrar();">Cerrar X</a></div>
				<iframe name="zona1" width="100%" height="90%" src="Enfermera/formularios.php"></iframe>
			</div>
		</div>
		<div class="ventana1">
			<div class="form">
				<div class="cerrar"><a href="javascript:cerrar1();">Cerrar X</a></div>
				<iframe name="zona1" width="100%" height="90%" src="Enfermera/busqueda.php"></iframe>
			</div>
		</div>
	</div>
	<!-- /#content --> 	
	<aside id="sidebar">
		<section class="widget">
			<h4 class="widgettitle">MENU</h4>
			<ul>
				<li><a href="index_usuario.php"><img src="../icons/001-home.png "> Home</a></li>
				<li><a href="pacientes.php"><img src="../icons/221-man.png"> Paciente</a></li>
				<li><a href="medicamentos.php"><img src="../icons/bottle-icon.png"> Medicamentos</a></li>
				<li><a href="medico.php"><img src="../icons/sthetoscope-icon.png"> Medico</a></li>
				<li><a href="enfermera.php"><img src="../icons/nurse-icon.png"> Enfermera</a></li>
				<li><a href="consultas.php"><img src="../icons/clipboard-icon.png"> Consultas</a></li>
			</ul>
		</section>
		<!-- /.widget -->
	
		<!-- /.widget -->
		<section>

		</section>						
	</aside>
	<!-- /#sidebar -->
	<footer id="footer">	
		<p>Elaborado por: Jonathan, Orlando, Raul, Adrian</p>
		
	</footer>
	<!-- /#footer --> 	
</div>
<!-- /#pagewrap -->
</body>
</html>