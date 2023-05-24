<?php 
	include("conexion.php");
	error_reporting(0);

	$correo=$_POST['email'];
	$pass=$_POST['password'];
	$sql = "SELECT * FROM usuarios WHERE Correo='$correo'";
	$query = $conn->query($sql);
	$filas = mysqli_num_rows($query);

	

	/*if($filas==0) {
		$valor = 1;
		//echo "<script>swal('¡Atención!', 'Usuario No Encontrado', 'error')</script>";
		//Este correo no esta asociado a ninguna cuenta
	}*/
	if($correo == ""){
		$valor1 = 1;
	}
	if($pass == ""){
		$valor2 = 2;
	}
		while( $fila = $query->fetch_array()){    
			if(isset($fila[2])){ //fila[2] Es el correo	
				$valor1 = 3;
				if($pass != ""){
					if($fila[3] == md5($pass)){ //
						$valor1 = 4;
						if($fila[5]==1){
							session_start();

							//echo "<script>swal('¡Felicitaciones!', 'Ingreso exitoso', 'success')</script>";	
							$_SESSION['correo']=$fila["Correo"];
							$_SESSION['usuario']=$fila["Usuario"];
							$_SESSION['nombreC']=$fila["Nombre"];
							$_SESSION['nivel']=$fila["Nivel"];

							$tramite = $_SESSION['trami'];

							if($fila[4]==1){	//Cliente
								if($_SESSION['datos']==2){  //Dentro del apartado tramites
									$valor1 = 12;
								}
								if($_SESSION['datos']==1){  //Dentro del apartado citas
									$valor1 = 5;
									//echo "<script>document.location.href='formulario.php'</script>";
								}

								else if($_SESSION['datos']==null){  //Fuera de citas
									$valor1 = 6;
									//echo "<script>document.location.href='index.php'</script>";
								}
							}
							else if($fila[4]==0){ //Administrador
								if(($_SESSION['datos']==1)||($_SESSION['datos']==2)){  //Dentro del apartado citas
									$valor1 = 7;
									//echo "<script>document.location.href='index.php'</script>";
								}
								else if($_SESSION['datos']==null){  //Fuera de citas
									$valor1 = 8;
									//echo "<script>document.location.href='admin/citas.php'</script>";
								}
							}
						}
						else if($fila[5]==0){
							$valor1 = 9;
							//echo "<script>alert('Su cuenta esta deshabilitada')</script>";
						}
					}else{
						$valor1 = 10;
						//echo "<script>swal('¡Atención!', 'La contraseña que ingresaste es incorrecta', 'error')</script>";
						//echo "<script>alert('Incorrecta')</script>";
		  			}//Fin comprobacion de password
		  		}
			}else{
				$valor1 = 11;
				//echo "<script>swal('¡Atención!', 'Verifica tu usuario', 'error')</script>";
			}
 		}
 	
 	$valores = [$valor1, $valor2, $tramite];

	echo json_encode($valores);
?>