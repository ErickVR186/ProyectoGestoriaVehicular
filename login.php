<?php 
session_start();

if((isset($_SESSION['correo'])) and ($_SESSION['nivel']==1)){
	echo "<script>document.location.href='perfilUsu.php'</script>";
}
if((isset($_SESSION['correo'])) and ($_SESSION['nivel']==0)){
	echo "<script>document.location.href='admin/citas.php'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" type="text/css" href="style_signuplogin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<section class="container forms">
		<div class="form login">
			<div class="form-content">
				<header>Iniciar Sesión</header>
				<form id="formu_IS">
					<div id="field email" class="field input-field email">
						<input type="email" placeholder="Email" id="correo" class="input">
						<i class='bx bxs-error-circle'></i>
						<small id="correoAlert">No ha introducido un correo electrónico valido.</small>
					</div>
					<div id="field passConfir" class="field input-field passConfir">
						<input type="password" placeholder="Contraseña" id="password" class="password">
						<i id="mostrarPass" class='bx bx-hide eye-icon'></i>
						<i class='bx bxs-error-circle'></i>
						<small id="passAlert">No se ha introducido de nuevo la contraseña.</small>
					</div>
					<div class="form-link">
						<a href="recuperarPass.php" class="forgot-pass">¿Olvidastes la contraseña?</a>
					</div>
					<div class="field button-field">
						<button name="submit" id="submit">Entrar</button>
					</div>
					<div class="form-link">
						<span>¿Aún no tienes una cuenta?<a href="registro.php" class="link signup-link"> Registrarse</a></span>
					</div>
				</form>
			</div>
		</div>
	</section>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		const forms = document.querySelector(".forms"),
			pwShowHide = document.querySelectorAll(".eye-icon"),
			links = document.querySelectorAll(".link");

		pwShowHide.forEach(eyeIcon => {
			eyeIcon.addEventListener("click", () => {
				let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

				pwFields.forEach(password => {
					if(password.type === "password"){
						password.type = "text";
						eyeIcon.classList.replace("bx-hide", "bx-show");
						return;
					}
					password.type = "password";
					eyeIcon.classList.replace("bx-show", "bx-hide");
				})

			})
		});

		var formu = document.getElementById('formu_IS');
		
		formu.addEventListener('submit', function(e){      //Detecta el boton del formulario Iniciar Sesión
			e.preventDefault();
			$.ajax({										//Envia el correo por ajax al php para verificar correo que no este
				url: 'datosIniciar.php',
				type: 'post',
				data:{
					email:$("#correo").val(),
					password:$("#password").val()
				} 
			}).done(
				function(data){
					var valores = JSON.parse(data);
					
					var valor1 = valores[0];
					var valor2 = valores[1];
					var tramite = valores[2]

					console.log(valor1, valor2);
					if(valor1 == 1){
						document.getElementById("correoAlert").innerHTML = "No ha introducido un correo electrónico.";
						document.getElementById("field email").classList.add("error");
					}
					if(valor2 == 2){
						document.getElementById("passAlert").innerHTML = "No ha introducido una contraseña.";
						document.getElementById("field passConfir").classList.add("error");
					}
					if(valor1 == 3){
						document.getElementById("field email").classList.remove("error");
					}
					if(valor1 == 4){
						document.getElementById("field passConfir").classList.remove("error");
					}
					if(valor1 == 5){
						document.getElementById("field passConfir").classList.remove("error");
						document.getElementById("field email").classList.remove("error");
						window.location.href='FormularioCitas/formulario.php?variable=<?php echo $_SESSION['citas'];?>';
					}
					if(valor1 == 6){
						document.getElementById("field passConfir").classList.remove("error");
						document.getElementById("field email").classList.remove("error");
						window.location.href='index.php';
					}
					if(valor1 == 7){
						document.getElementById("field passConfir").classList.remove("error");
						document.getElementById("field email").classList.remove("error");
						window.location.href='index.php';
					}
					if(valor1 == 8){
						document.getElementById("field passConfir").classList.remove("error");
						document.getElementById("field email").classList.remove("error");
						window.location.href='admin/citas.php';
					}
					if(valor1 == 9){
						swal('¡Atención!', 'Su cuenta esta deshabilitada', 'error');
						document.getElementById("field passConfir").classList.remove("error");
					}
					if(valor1 == 10){
						document.getElementById("passAlert").innerHTML = "La contraseña que ingresaste es incorrecta";
						document.getElementById("field passConfir").classList.add("error");
					}
					if(valor1 == 12){
						document.getElementById("field passConfir").classList.remove("error");
						document.getElementById("field email").classList.remove("error");
						window.location.href="tramites/index.php?variable='"+tramite+".php'";
					}
					if(valor1 == null){
						document.getElementById("correoAlert").innerHTML = "Este correo no esta asociado a una cuenta.";
						document.getElementById("field email").classList.add("error");
					}

				}
			);
		})
	</script>
	

</body>
</html>
