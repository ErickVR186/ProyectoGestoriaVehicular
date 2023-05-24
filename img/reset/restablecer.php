<?php
    session_start();
    include "conexion.php";
    $correo =$_POST['correo'];
    $_SESSION['correo']=$correo;
    $bytes = random_bytes(5);
    $token =bin2hex($bytes);

    include "mail_reset.php";
    if($enviado){
        $conexion->query(" insert into passwords(correo, token) 
         values('$correo','$token') ") or die($conexion->error);
         echo '<p>Verifica tu correo para restablecer tu cuenta</p>';
    }
?>