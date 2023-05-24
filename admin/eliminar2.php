<?php  
	include 'conexion.php';
	if (!isset($_GET['id_servicio'])) {
		exit();
	}
	$codigo = $_GET['id_servicio'];
	$elim="DELETE FROM servicios WHERE id_servicio = '$codigo'";
	$data = mysqli_query($conn, $elim);


	if ($data === TRUE) {
		echo "<script>document.location.href='precios.php'</script>";
	}

?>