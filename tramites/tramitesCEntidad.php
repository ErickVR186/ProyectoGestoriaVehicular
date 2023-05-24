<?php
	session_start();
	$usuario=" ";
	$usuario=$_SESSION['usuario'];
	

	include ("../conexion.php");
	$insertar3="SELECT `Precio_tramite` FROM `servicios` WHERE id_servicio=6";
	$query3 = mysqli_query($conn,$insertar3);
	$dato1 = mysqli_fetch_array($query3);
	$precioT =$dato1['Precio_tramite'];

	
	$_SESSION['datos'] = 2;
	$_SESSION['trami'] = "tramitesCEntidad";

	////////////////////////////////////////////////
	if (!isset($_SESSION['usuario'])) {
	    echo "<script>document.location.href='../login.php'</script>";
	}else{
		$mail=$_SESSION['correo'];
		$nombreC=$_SESSION['nombreC'];
		if(($_SESSION['datos'] == 2) and ($_SESSION['nivel'] == 0)){  //Dentro del apartado citas
	    echo "<script>document.location.href='../index.php'</script>";
	}
	}
	
	///////////////////////////////////////////////
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.form{
			height: 410px;
		}
		#precio_boton{
			position: absolute;
			top: 230px;
			width: 45%;
		}
		.modal-body{
		    text-align: center;
		}
		.QR img{
		    text-align: center;
		    margin: 15px auto;
		    padding-bottom: 5px;
		}
		@media screen and (max-width: 764px){
			.form{
				margin-top: 70px;
				height: 680px;
			}
			#precio_boton{
				position: absolute;
				top: 510px;
				width: 85%;
			}
			#main{
				background: url(../images/car2.jpg) no-repeat;
				  background-position: center;
				  background-size: cover;
				height: 112vh;
			}
		}
	</style>
</head>
<body>
	<section class="container forms">
		<div class="form login">
			<div class="form-content">
				<header>Cambio de Entidad</header>
				<form  id="formuTramites">
					<div id="columnas">
						<div class="columnsP">
							<div id="field nombres" class="field input-field nombres">
								<label for="formFileSm" class="form-label">Nombre Completo:</label>
								<input type="text" placeholder="" class="caja" name="nombre" id="nombre" value="<?php echo $nombreC ?>">
							</div>
							<div id="field telefono" class="field input-field telefono">
								<label for="formFileSm" class="form-label">Telefono:</label>
								<input type="tel" placeholder="" class="caja" name="telefono" id="telefono">
							</div>	
						</div>
						<div id="columna2" class="columnsP">
							<div class="file input-file">
								<label for="formFileSm" class="form-label">Identificación oficial:</label>
								<input type="file" class="form-control form-control-sm caja" name="idOficial" id="idOficial">
								<b id="tooltip1" class="tooltip1">
									<i class='bx bxs-help-circle'></i>
									<span class="tooltip1-box">Subir documentación en formato pdf</span>
								</b>
							</div>
							<div class="file input-file">
								<label for="formFileSm" class="form-label">Factura del Vehículo:</label>
								<input type="file" class="form-control form-control-sm caja" name="FacVehi" id="FacVehi">
								<b id="tooltip1" class="tooltip1">
									<i class='bx bxs-help-circle'></i>
									<span class="tooltip1-box">Subir documentación en formato pdf</span>
								</b>
							</div>
							<div class="file input-file">
								<label for="formFileSm" class="form-label">Tarjeta de Circulación:</label>
								<input type="file" class="form-control form-control-sm caja" name="tarCirculacion" id="tarCirculacion">
								<b id="tooltip1" class="tooltip1">
									<i class='bx bxs-help-circle'></i>
									<span class="tooltip1-box">Subir documentación en formato pdf</span>
								</b>
							</div>
							<div class="file input-file">
								<label for="formFileSm" class="form-label">Comprobante de Pago de Tenencia:</label>
								<input type="file" class="form-control form-control-sm caja" name="CompPagoT" id="CompPagoT">
								<b id="tooltip1" class="tooltip1">
									<i class='bx bxs-help-circle'></i>
									<span class="tooltip1-box">Subir documentación en formato pdf</span>
								</b>
							</div>
						</div>
					</div>
					<div id="precio_boton">
						<div id="precios">
							<h3><sup>$</sup><?php echo $precioT; ?></h3>
						</div>
						<div class="field button-field">
							<input type="submit" name="enviar" id="enviar" value="Entregar documentación">
						</div>
						<a href="http://gestoriae.uptex-vsc2.com/#servicios">
							<i class='bx bx-arrow-back'></i>
						</a>
						<a href="../logout.php">
							<i class='bx bx-log-out'></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</section>

	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          	<h4 class="modal-title">Visualiza tu ticket del tramite</h4>
        		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	        </div>
	        <div class="modal-body">
	          <button class="btn btn-primary" id="ticket_pdf">Ticket en PDF</button><br><br>
	          <button id="ticket_qr"   class="btn btn-success">Ticket en código QR</button><br>
	          <div class ="QR" style="display: none;"></div><br>
	        </div>
	        <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		      </div>
	      </div>
	    </div>
	  </div>
</body>

<script type="text/javascript">

	$(document).ready(function(){
		$('form').submit(function(e){
			e.preventDefault();
			var formulario = document.getElementById('formuTramites');
			var nombreC = $("#nombre").val();
			var telefono = $("#telefono").val();

			var idOficial = document.getElementById('idOficial');
			var FacVehi = document.getElementById('FacVehi');
			var tarjCircu = document.getElementById('tarCirculacion');
			var CompPagoT = document.getElementById('CompPagoT');
			
			

			if (nombreC=="") {
				document.getElementById("field nombres").classList.add("error");
			}else{
				document.getElementById("field nombres").classList.remove("error");
			}
			if (telefono=="") {
				document.getElementById("field telefono").classList.add("error");
			}else{
				document.getElementById("field telefono").classList.remove("error");
			}
			if ((idOficial.files.length == 0) || (tarjCircu.files.length == 0) || (FacVehi.files.length == 0) || (CompPagoT.files.length == 0)) {
				swal('¡Atención!', 'Los archivos no han sido seleccionado.', 'error');
			}
			if((nombreC != "") && (telefono != "") && (idOficial.files.length > 0) && (tarjCircu.files.length > 0) && (FacVehi.files.length > 0) && (CompPagoT.files.length > 0)){
				var valores = new FormData(formulario);
				valores.append('tramite', 'Cambio de Entidad');
				$.ajax({								
					url: 'guardarArchivos.php',
					type: 'POST',
					processData: false,
					contentType: false,
					data: valores
				}).done(
					function(datos){
						var mensajes = JSON.parse(datos);
						
						if (mensajes[0] == 1) {
							swal("¡Atención!", "Los archivos han sido enviados correctamente.", "success")
								.then((value) => {
									$.ajax({
										url: 'pdf.php',
										type: 'POST',
										processData: false,
										contentType: false,
										data: valores
									}).done(
										function(datos){
											$("#myModal").modal('show');
											
											let btnPDF = document.getElementById("ticket_pdf");

											btnPDF.onclick = function(){
												window.open("../tickets.php?user="+nombreC+"&tram=Cambio de Entidad.pdf");
											}

											//Codigo QR
									        let btnsubmit = document.getElementById("ticket_qr"), 
									            qrfinal = document.querySelector(".QR"),           
									            qr_canvas = document.querySelector("canvas"),
									            qr_final = document.getElementsByClassName("QR img");
									            
									        btnsubmit.onclick = function(){
									            
									            qrfinal.style = " ";
									            var qrcode = new QRCode(qrfinal, {
									                text: "http://gestoriae.uptex-vsc2.com/tickets.php?user="+nombreC+"&tram=Cambio de Entidad.pdf",
									                width: 200,
									                height: 200,
									                colorDark: "#000000",
									                colorLight: "#ffffff",
									                correctLevel: QRCode.CorrectLevel.H
									            });

									            /*let descargar = document.createElement("button");
									            descargar.setAttribute("id", "dscr");
									            qrfinal.appendChild(descargar);

									            let qr_a = document.createElement("a");
									            qr_a.setAttribute("download", "TicketQR.png");
									            qr_a.setAttribute("class", "btn btn-danger");
									            qr_a.innerText = "Descargar";
									            descargar.appendChild(qr_a);

									            let qr_ima = document.querySelector(".QR img");
									              
									            if(qr_ima.getAttribute("src") == null){
										            setTimeout(() => {
										                qr_a.setAttribute("href", '${qr_canvas.toDataURL()}');
										            }, 300);
									            } else{
										            setTimeout(() => {
										            	qr_a.setAttribute("href", '${qr_ima.getAttribute("src")}');
										             }, 300);
									            }*/
									        }	
										}
									);
								});
						}
						if (mensajes[0] == 0) {
							swal('¡Atención!', 'No se enviaron los archivos correctamente.', 'error');
						}
						if (mensajes[0] == 2) {
							swal('¡Atención!', mensajes[1], 'error');
						}
					}
				);
			}
		})
	})

</script>
</html>