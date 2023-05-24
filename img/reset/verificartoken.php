<?php 
    session_start();

    include "conexion.php";
    $correo =$_SESSION['correo'];
    $token =$_POST['token'];
    $res=$conexion->query("select * from passwords where 
        correo='$correo' and token='$token'")or die($conexion->error);
    $correcto=false;
    if(mysqli_num_rows($res) > 0){
        $fila = mysqli_fetch_row($res);
        $fecha =$fila[4];
        $fecha_actual=date("Y-m-d h:m:s");
        $seconds = strtotime($fecha_actual) - strtotime($fecha);
        $minutos=$seconds / 60;
        if($minutos > 10 ){
            echo "token vencido";
        }else{
            echo "todo correcto";
        }
        $correcto=true;
    }else{
        $correcto=false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
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
	background-color:#660000;
	margin: calc(18% + 100px);
	margin-top: -100px;
	padding-top: 20px;
	margin-bottom: 30px
}
h1 {
	text-align: center;
	padding: 12px;
	color: #fff
}
a{
	color: #fff
}
input {
	border-radius:8px;
	width: calc(100% - 150px);
	padding: 9px;
	margin: auto;
	margin-top: 10px;
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
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
                <form class="col-3" action="cambiarpassword.php" method="POST">
                    <h1>Restablecer contraseña</h1>
                    <input type="password"  placeholder="Contraseña nueva" class="form-control" id="c" name="p1">
                    <input type="password"  placeholder="Confirmar contraseña" class="form-control" id="c" name="p2">
                    <input type="text" class="form-control" id="c" name="correo" value="<?php echo $correo?>">
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>