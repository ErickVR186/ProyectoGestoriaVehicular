<?php 
	include 'conexion.php';

	error_reporting(0);

	$email = $_POST['email'];
	$sql = "SELECT * FROM usuarios WHERE Correo='$email'";
	$result = mysqli_query($conn, $sql);
	$filaCorreo = mysqli_num_rows($result);
	
	echo $filaCorreo;

	


?>