<?php
	session_start();
	$usuario=" ";
	$usuario=$_SESSION['usuario']; 
	

	include ("../conexion.php");
	$insertar3="SELECT `Precio_tramite` FROM `servicios` WHERE id_servicio=1";
	$query3 = mysqli_query($conn,$insertar3);
	$dato1 = mysqli_fetch_array($query3);
	$precioT =$dato1['Precio_tramite'];

	
	$_SESSION['datos'] = 2;
	$_SESSION['trami'] = "tramiteReposicion";

	////////////////////////////////////////////////
	if (!isset($_SESSION['usuario'])) {
	    echo "<script>document.location.href='../login.php'</script>";
	}else{
		$mail=$_SESSION['correo'];
		$nombreC=$_SESSION['nombreC'];
		if(($_SESSION['datos'] == 2) and ($_SESSION['nivel'] == 0)){  //Dentro del apartado citas
	    echo "<script>document.location.href='../index.php'</script>";
	}
	}
	
	///////////////////////////////////////////////
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="icon" type="image/x-icon" href="../images/logo.jpg">
	<link rel="stylesheet" type="text/css" href="style_formularios.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--Librerias-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!--Otros-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"></script>
</head>
<body>
	
		<input type="checkbox" id="check">
		<label for="check">
			<i class="fa-solid fa-bars" id="btn"></i>
			<i class="fa-solid fa-times" id="cancel"></i>
		</label>
		<nav class="sidebar">
			<header>Gestoria</header>
			<ul>
				<li><a href="javascript:cargarPagina('tramiteReposicion.php')">Reposición De Tarjeta </a></li>
				<li><a href="#" onclick="cargarPagina('tramitesPCircu.php')">Permisos De Circulación</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesPolarizados.php')">Permisos Polarizados</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesMEdad.php')">Permisos Para Menores</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesReemplacamiento.php')">Reemplacamiento</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesCEntidad.php')">Cambio De entidad</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesCPropietario.php')">Cambio De Propietario</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesLicencia.php')">Licencias</a></li>
				<li><a href="#" onclick="cargarPagina('tramitesCPlacas.php')">Cambio De Placa</a></li>
			</ul>
		</nav>
		<div id="main">
			<section class="container forms">
				<div class="form login">
					<div class="form-content">
						<header>Reposición de Tarjeta de Circulación</header>
						<form  id="formuTramites">
							<form id="columnas">
								<div class="columnsP">
									<div id="field nombres" class="field input-field nombres">
										<label for="formFileSm" class="form-label">Nombre Completo:</label>
										<input type="text" placeholder="" class="caja" name="nombre" id="nombre">
									</div>
									<div id="field telefono" class="field input-field telefono">
										<label for="formFileSm" class="form-label">Telefono:</label>
										<input type="tel" placeholder="" class="caja" name="telefono" id="telefono">
									</div>	
								</div>
								<div id="columna2" class="columnsP">
									<div class="file input-file">
										<label for="formFileSm" class="form-label">Identificación oficial:</label>
										<input type="file" class="form-control form-control-sm caja" name="idOficial" id="idOficial">
										<b id="tooltip1" class="tooltip1">
											<i class='bx bxs-help-circle'></i>
											<span class="tooltip1-box">Subir documentación en formato pdf</span>
										</b>
									</div>
									<div class="file input-file">
										<label for="formFileSm" class="form-label">Tarjeta de circulación vigente:</label>
										<input type="file" class="form-control form-control-sm caja" name="tarCirculacion" id="tarCirculacion">
										<b id="tooltip1" class="tooltip1">
											<i class='bx bxs-help-circle'></i>
											<span class="tooltip1-box">Subir documentación en formato pdf</span>
										</b>
									</div>
								</div>
							</form>

							<div id="precio_boton">
								<div id="precios">
									<h3><sup>$</sup>100</h3>
								</div>
								<div class="field button-field">
									<input type="submit" name="enviar" id="enviar" value="Entregar documentación">
								</div>
								<a href="http://gestoriae.uptex-vsc2.com/#servicios">
									<i class='bx bx-arrow-back'></i>
								</a>
								<a href="logout.php">
									<i class='bx bx-log-out'></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
</body>

<script type="text/javascript">

	cargarPagina(<?php echo $_GET['variable']; ?>);

	function cargarPagina(pagina){
		$.get(pagina, function(htmlextermo){
			$("#main").html(htmlextermo)
		});
	}

</script>
</html>




