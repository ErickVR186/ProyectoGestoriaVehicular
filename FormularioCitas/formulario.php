<?php
session_start();
$usuario=" ";
$usuario=$_SESSION['usuario'];

$_SESSION['datos']=1;

$trami=$_GET['variable'];
$_SESSION['citas']=$trami;

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
}else{
    $mail=$_SESSION['correo'];
    $nombreC=$_SESSION['nombreC'];
    if(($_SESSION['datos']==1) and ($_SESSION['nivel']==0)){  //Dentro del apartado citas
        echo "<script>document.location.href='../index.php'</script>";
    }
}
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Información de la cita</title>
	<link rel="stylesheet" type="text/css" href="style_formuCitas.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--Otros-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        .modal-body{
            text-align: center;
        }
        .QR img{
            text-align: center;
            margin: 15px auto;
            padding-bottom: 5px;
        }
    </style>
	

</head>
<body>
	<!--Date JQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<section class="container forms">
		<div class="form login">
			<div class="form-content">
				<header>Información de la cita</header>
				<form id="formuCitas">
					<div id="field nombres" class="field input-field nombres">
						<input type="text" placeholder="Nombre Completo" id="nombre" name="nombre" class="input" readonly="readonly" value="<?php echo $nombreC ?>">
					</div>
					<div id="field telefono" class="field input-field telefono">
						<input type="tel" placeholder="Telefono" id="telefono" name="telefono" class="telefono">
					</div>
					<div id="field nombreCita" class="field input-field nombreCita">
						<input type="text" placeholder="Citas" id="nombreCitas" class="input" readonly="readonly" value="<?php echo $trami;?>">
					</div>
					<div id="field select" class="field input-field select">
						<select name="select" id="select" class="input">
			                <option value="1">Reposición de tarjeta de circulación</option>
			                <option value="2">Permisos de circulación</option>
			                <option value="3">Permiso polarizados</option>
			                <option value="4">Permiso para menores de edad</option>
			                <option value="5">Reemplacamiento</option>
			                <option value="6">Cambio de entidad</option>
			                <option value="7">Cambio de propietario</option>
			                <option value="8">Licencias</option>
			                <option value="9">Cambio de placa</option>
			            </select>
					</div>
					<div id="fechadiv" class="fechahora fecha">
						<input type="text" placeholder="dd/mm/aaaa" id="fecha"name="fecha" class="form-control" readonly required>
						<i class='bx bx-calendar'></i>
					</div>
					<div id="horadiv" class="fechahora hora">
						<input type="text" placeholder="--:--" id="hora"name="hora" class="time" readonly required>
						<i class='bx bx-time-five'></i>
					</div>

					<div class="botonMas">
						<div class="field button-field">
                            <input type="submit" name="enviar" id="enviar" value="Agendar Cita">
						</div>
						<a href="http://gestoriae.uptex-vsc2.com/#cita">
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

        //FECHA Y HORA
        
        $(document).ready(() =>{
            $('#fecha').datetimepicker({
                format:'Y/m/d',
                timepicker:false,
                minDate:'today',
                autoclose: true,
                beforeShowDay: $.datetimepicker.noWeekends
            });

            $('#hora').datetimepicker({
                format:'H:i',
                datepicker:false,
                autoclose: true,
                minTime:'10:00',
                maxTime:'18:00',
                step: 20,
            });
        });
        ////////////////////////////////////////////////////
        var formulario = document.getElementById('formuCitas');
        $(document).ready(function(){
            $('form').submit(function(e){
                e.preventDefault();
                var nombreC = $("#nombre").val();
                var telefono = $("#telefono").val();
                var nombreCitas = $("#nombreCitas").val();
                var select = $("#select").val();
                var fecha = $("#fecha").val();
                var hora = $("#hora").val();

                var valores = new FormData(formulario);
                valores.append('tramite', '<?php echo $trami;?>');

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
                if (nombreCitas=="") {
                    document.getElementById("field nombreCita").classList.add("error");
                }else{
                    document.getElementById("field nombreCita").classList.remove("error");
                }
                if (select=="") {
                    document.getElementById("field select").classList.add("error");
                }else{
                    document.getElementById("field select").classList.remove("error");
                }
                if (fecha=="") {
                    document.getElementById("fechadiv").classList.add("error");
                }else{
                    document.getElementById("fechadiv").classList.remove("error");
                }
                if (hora=="") {
                    document.getElementById("horadiv").classList.add("error");
                }else{
                    document.getElementById("horadiv").classList.remove("error");
                }

                

                if((nombreC != "") && (telefono != "") && (nombreCitas != "") && (select != "")  && (fecha != "") && (hora != "")){
                    $.ajax({                                
                        url: 'pdfCitas.php',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: valores
                    }).done(
                        function(datos){
                           $("#myModal").modal('show');

                           let btnPDF = document.getElementById("ticket_pdf");

                            btnPDF.onclick = function(){
                                window.open("../tickets.php?user="+nombreC+"&tram=<?php echo $trami;?>.pdf");
                            }

                            //Codigo QR
                            let btnsubmit = document.getElementById("ticket_qr"), 
                                qrfinal = document.querySelector(".QR"),           
                                qr_canvas = document.querySelector("canvas"),
                                qr_final = document.getElementsByClassName("QR img");
                                
                            btnsubmit.onclick = function(){
                                
                                qrfinal.style = " ";
                                var qrcode = new QRCode(qrfinal, {
                                    
                                    text: "http://gestoriae.uptex-vsc2.com/tickets.php?user="+nombreC+"&tram=<?php echo $trami;?>.pdf",
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
                }            
            });
        });

        
    </script>
</html>
