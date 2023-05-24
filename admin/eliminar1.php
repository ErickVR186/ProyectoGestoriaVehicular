<?php  
	include ("conexion.php");
	if (!isset($_GET['id'])) {
		exit();
	}
	$codigo = $_GET['id'];
	$elim="DELETE FROM tramite WHERE id_tramite= '$codigo'";

	//$sentencia = $conn->prepare("DELETE FROM citas WHERE Id_cita = '$codigo;'");
	//$resultado = $sentencia->execute([$codigo]);
	$data = mysqli_query($conn, $elim);
	if ($data) {
		echo "<script>document.location.href='tramites.php'</script>";
	}else{
		echo "Error";
	}
?>