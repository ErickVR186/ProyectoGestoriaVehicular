<?php
	session_start();
	if (isset($_SESSION['correo'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrarse</title>
	<link rel="stylesheet" type="text/css" href="style_signuplogin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
	<section class="container forms">
		<div class="form signup">
			<div class="form-content">
				<header>Crea Una Cuenta</header>
				<form id="formulario">
					<div id="field nombres" class="field input-field nombres">
						<input type="text" placeholder="Nombres" id="nombres" class="input">
						<i class='bx bxs-check-circle'></i>
						<i class='bx bxs-error-circle'></i>
						<small>No se ha introducido un nombre.</small>
					</div>
					<div id="field apellidos" class="field input-field apellidos">
						<input type="text" placeholder="Apellidos" id="apellidos" class="input">
						<i class='bx bxs-check-circle'></i>
						<i class='bx bxs-error-circle'></i>
						<small>No se ha introducido los apellidos.</small>
					</div>
					<div id="field email" class="field input-field email">
						<input type="email" placeholder="Email" id="email" class="input">
						<i class='bx bxs-check-circle'></i>
						<i class='bx bxs-error-circle'></i>
						<small id="correoAlert">No ha introducido un correo electrónico valido.</small>
					</div>
					<div id="field password" class="field input-field password">
						<input type="password" placeholder="Contraseña" id="password" class="password">
						<i class='bx bxs-check-circle'></i>
						<i class='bx bxs-error-circle'></i>
						<small>Ingresa mas de 8 caracteres con una mayuscula, una minuscula, un digito y un caracter especial.</small>
					</div>
					<div id="field passConfir" class="field input-field passConfir">
						<input type="password" placeholder="Confirmar contraseña" id="cpassword" class="password">
						<i id="mostrarPass" class='bx bx-hide eye-icon'></i>
						<i class='bx bxs-check-circle'></i>
						<i class='bx bxs-error-circle'></i>
						<small id="passAlert">No se ha introducido de nuevo la contraseña.</small>
					</div>
					<div id="link checkTerm" class="form-link checkTerm">
						<input type="checkbox" class="cajaterminos" id="checkt">
						<span>Acepto <a href="avisoDePriva.php" class="link terminos-link"> Terminos de privacidad</a></span><br>
						<small>Acepta el aviso privacidad.</small>
					</div>
					<div id="botonR" class="field button-field">
						<button name="submit" id="submit">Registrate</button>
					</div>
					<div class="form-link">
						<span>¿Ya tienes una cuenta?<a href="login.php" class="link login-link"> Inicia Sesión</a></span>
					</div>
				</form>
			</div>
		</div>
	</section>

	
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
		})

		
		var formu = document.getElementById('formulario');

		formu.addEventListener('submit', function(e){      //Detecta el boton del formulario Crear Cuenta
			e.preventDefault();
			var datos = new FormData(formu);
			$.ajax({										//Envia el correo por ajax al php para verificar correo que no este
				url: 'comprobarGuardar.php',
				type: 'post',
				data:{
					email:$("#email").val()
					
				} 
			}).done(
				function(data){
					var usernames = $("#nombres").val();
					var apellido = $("#apellidos").val();
					var correo = $("#email").val();
					let regExpC = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
					let correoOk = regExpC.test(correo);
					
					var password = $("#password").val();
					let regExpP =/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,})/gm;
					let passOk = regExpP.test(password);
					var cpassword = $("#cpassword").val();
					var checkTer = document.getElementById('checkt').checked;
					var filaCorreo = data;
					//console.log(filaCorreo);

					if(usernames==""){
						document.getElementById("field nombres").classList.add("error");	
					}else{
						document.getElementById("field nombres").classList.remove("error");
						document.getElementById("field nombres").classList.add("success");
					}
					if(apellido==""){
						document.getElementById("field apellidos").classList.add("error");
					}else{
						document.getElementById("field apellidos").classList.remove("error");
						document.getElementById("field apellidos").classList.add("success");
					}
					if(correoOk == false){
						document.getElementById("field email").classList.add("error");
					}else{
						if (filaCorreo > 0) {
							document.getElementById("correoAlert").innerHTML = "Este correo ya esta registrado.";
							document.getElementById("field email").classList.add("error");
						}else{
							document.getElementById("field email").classList.remove("error");
							document.getElementById("field email").classList.add("success");
						}
					}
					if(passOk == false){
						document.getElementById("field password").classList.add("error");
					}else{
						document.getElementById("field password").classList.remove("error");
						document.getElementById("field password").classList.add("success");
					}
					if(cpassword=="") {
						document.getElementById("field passConfir").classList.add("error");
					}else{
						if(password != cpassword){
							document.getElementById("passAlert").innerHTML = "No coincide la contraseña.";
							document.getElementById("field passConfir").classList.add("error");
						}else{
							document.getElementById("field passConfir").classList.remove("error");
							document.getElementById("field passConfir").classList.add("success");
						}
					}
					if(checkTer == false) {
						document.getElementById("link checkTerm").classList.add("error");
					}else{
						document.getElementById("link checkTerm").classList.remove("error");
						document.getElementById("link checkTerm").classList.add("success");
					}
					if((usernames!=" ")&&(apellido!=" ")&&(correoOk == true)&&(filaCorreo == 0)&&(passOk == true)&&(password == cpassword)&&(checkTer == true)){
						$.ajax({										
							url: 'guardarDatos.php',
							type: 'post',
							data:{
								nombres:usernames,
								apellidos:apellido,
								email:correo,
								contra:password,
								contra2:cpassword
							} 
						}).done
							(function(data){
								$("#nombres").val('');
								document.getElementById("field nombres").classList.remove("success");
								$("#apellidos").val('');
								document.getElementById("field apellidos").classList.remove("success");
								$("#email").val('');
								document.getElementById("field email").classList.remove("success");
								$("#password").val('');
								document.getElementById("field password").classList.remove("success");
								$("#cpassword").val('');
								document.getElementById("field passConfir").classList.remove("success");
								document.getElementById('checkt').checked = false;

								var datosUsuario = JSON.parse(data);
								//console.log(filaCorreo);

								$.ajax({										
									url: 'datosIniciar.php',
									type: 'post',
									data:{
										email:datosUsuario[0],
										password:datosUsuario[1]
									} 
								}).done
									(function(data){
										//window.location.href = "login.php";
										window.location.replace("login.php");
									}
								);
							}
						);
					}
				}
			);
		})
	
	</script>

</body>

</html>

