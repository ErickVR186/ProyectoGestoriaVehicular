<?php 

include 'conexion.php';

error_reporting(0);





if (isset($_POST['submit'])) {
	$username = $_POST['nombres'];
	$nombreC = $_POST['nombres']." ".$_POST['apellidos'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM usuarios WHERE Correo='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO usuarios (Usuario, Nombre, Correo, Password, Nivel, Estatus)
					VALUES ('$username', '$nombreC', '$email', '$password', 0, 1)";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo"<script>alert('Usuario registrado.')</script>";
				$nombreC = "";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Algo malo pasó.')</script>";
			}
		} else {
			echo "<script>alert('El correo ya existe.')</script>";
		}
		
	} else {
		echo "<script>alert('Las contraseñas no coinciden.')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar administrador</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<style>
body{
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	background-image: url("fondo.jpg");
}
form {
	padding: 55px 30px;
	border-radius:25px;
	background-color: #660000;
	margin: calc(18% + 100px);
	margin-top: 50px;
	padding-top: 28px;
	margin-bottom: 30px
}
h1 {
	text-align: center;
	padding: 12px;
	color: #fff
}
a {
	color: #fff
}
input {
	border-radius:8px;
	width: calc(100% - 150px);
	padding: 9px;
	margin: auto;
	margin-top: 12px;
	font-size: 16px
	
}
button{
	padding: 9px;
	background-color: #000;
	color: #fff;
	width: calc(90% - 190px);
	margin: 0 10%;
	margin-top: 22px;
	border: none;
	border-radius:25px;
}
</style>
<body>
	<form method="POST">
        <h1>Crear Cuenta Para Administrador </h1>
			<input type="text" placeholder="Nombres" name="nombres" value="<?php echo $username; ?>" required>
			<input type="text" placeholder="Apellidos" name="apellidos" value="<?php echo $apellidos; ?>" required>
			<input type="email" placeholder="Correo" name="email" value="<?php echo $email; ?>" required>
			<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
			<input type="password" placeholder="Confirma tu contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			<button name="submit" class="btn">Registrate</button>
			<br> <br>
			<a href="citas.php">Atras</a>
		</form>
</body>
</html>