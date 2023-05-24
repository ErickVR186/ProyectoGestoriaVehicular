<?php
	include 'conexion.php';
	error_reporting(0);

	$username = $_POST['nombres'];
	$nombreC = $_POST['nombres']." ".$_POST['apellidos'];
	$email = $_POST['email'];
	$password = $_POST['contra'];
	$passwordMD5 = md5($_POST['contra']);
	$cpassword = md5($_POST['contra2']);
	if (isset($username)&&isset($nombreC)&&isset($email)&&isset($password)) {
		$sql = "INSERT INTO usuarios (Usuario, Nombre, Correo, Password, Nivel, Estatus) VALUES ('$username', '$nombreC', '$email', '$passwordMD5', 1, 1)";
		$result = mysqli_query($conn, $sql);

		//$variables = array("Correo" => $email, "Contraseña" => $password);
		$variables = [$email, $password];
		echo json_encode($variables);
	}
	
?>