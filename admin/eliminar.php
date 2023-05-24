<?php  
	include ("conexion.php");
	if (!isset($_GET['Id_cita'])) {
		exit();
	}
	$codigo = $_GET['Id_cita'];
	$elim="DELETE FROM citas WHERE Id_cita = '$codigo'";
	//$sentencia = $conn->prepare("DELETE FROM citas WHERE Id_cita = '$codigo;'");
	//$resultado = $sentencia->execute([$codigo]);
	$data = mysqli_query($conn, $elim);
	if ($data) {
		echo "<script>document.location.href='citas.php'</script>";
	}
?>