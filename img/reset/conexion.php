<?php 
$server = "127.0.0.1";
$user = "u383156267_Daniel";
$pass = "5*TaLzySm";
$baseD = "u383156267_gestoria";
$conexion = mysqli_connect($server, $user, $pass, $baseD);
if (!$conexion) {
    die("<script>alert('ERROR :(')</script>");
}
?>