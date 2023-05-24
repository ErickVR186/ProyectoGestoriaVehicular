<?php
	$id = $_GET['no'];
	include ("conexion.php");
  $sentencia="SELECT Servicios FROM servicios where id_servicio = '$id'";
  $resultado=mysqli_query($conn,$sentencia);
  $filas=mysqli_fetch_array($resultado);
  $ser=$filas['Servicios'];
	
?>

<!DOCTYPE html>
<head>
  <title>Actualizar Datos</title>
  <meta charset="utf-8"/>
</head>
<style>
body{
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	background-image: url("../img/car5.jpg");
}
form {
	padding: 50px 50px;
	border-radius:25px;
	background-color: #660000;
	margin: calc(18% + 100px);
	margin-top: 70px;
	padding-top: 20px;
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
form label{
	width:120px;
	font-weight:bold;
	display:inline-block;
	font-size:20px;
	color: #fff
}
</style>
<body>
<div>
<form action="modif.php" method="post" class="">
<h1>Modificar precios</h1>
        <label>ID:</label>
        <input name="id_servicio" type="text" class="" value="<?php echo $id ?>"readonly=readonly><br>
        <label >Servicio:</label>
        <input name="Servicios" type="text" class="" value="<?php echo $ser ?>" readonly=readonly><br>
      

        <label >Precio de tramite:</label>
        <input name="Precio_tramite" type="text" class=""><br>
		<button name="submit" class="btn">Actualizar</button>
		<p><a href="precios.php">Atras</a>.</p>
    </form>
</div>
</body>
</html>