<?php
session_start();
session_unset();
session_destroy();
header('location:http://gestoriae.uptex-vsc2.com/#inicio.php');
?>