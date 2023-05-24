<?php 
    
    
    include "conexion.php";
    $correo =$_POST['correo'];
    $password = $_POST['p1'];
    $cpassword = $_POST['p2'];
    if($password == $cpassword){
        echo'<script type="text/javascript"> alert($password);
        </script>';
        $encpass = md5($password);
        $conexion->query("UPDATE usuarios SET Password='$encpass' where Correo='$correo' ")or die($conexion->error);
        echo "Susses";
        echo'<script type="text/javascript"> alert("Conexion exitosa");
        window.location.href="http://gestoriae.uptex-vsc2.com/./login.php";</script>';
        session_start();
        session_destroy();
        
    }else{
        echo "no coinciden";
    }
?>