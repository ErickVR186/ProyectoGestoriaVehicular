<?php 
$server = "127.0.0.1";
$user = "u383156267_Daniel";
$pass = "5*TaLzySm";
$baseD = "u383156267_gestoria";
$conn = mysqli_connect($server, $user, $pass, $baseD);
if (!$conn) {
    die("<script>alert('ERROR :(')</script>");
}
?>