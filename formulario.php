<?php
session_start();
$usuario=$_SESSION['usuario'];
$mail=$_SESSION['correo'];
$nombreC=$_SESSION['nombreC'];

$dato=$_GET['variable'];


include ("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    $_SESSION['datos'] = 1;
}
else if(($_SESSION['datos']==1) and ($_SESSION['nivel']==0)){  //Dentro del apartado citas
    echo "<script>document.location.href='index.php'</script>";
}
if(($_POST)&& ($dato=="Tramite Presencial")){
    
    require('fpdf/fpdf.php');
    $nombre = $_POST['nombre'];
    $email = $mail;
    $telefono = $_POST['telefono'];
    $fechaT = $_POST['fecha'];
    $horaT = $_POST['hora'];
    $selector = $_POST['select'];
    
    $fechaActual = date('Y-m-d');
    $fechaEntrega = date('Y-m-d', strtotime($fechaActual. ' + 15 days'));
    
    $title = 'Tramite Presencial';
    $title1 = 'Tramite Presencial';
    $title2 = 'Cita para realizar un tramite de manera presencial:';
    $nota1 = '*Llevar documentacion en original y copia cuando acuda a la surcusal.';
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $pdf->Ln(25);
    $w = $pdf->GetStringWidth($title1)+6;
    $pdf->SetX((210-$w)/2);
    $w1 = $pdf->GetStringWidth($title2)+16;
    $pdf->SetX((310-$w1)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);

    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 15, $title1, 0, 0, 'C', true);
    $pdf->Ln(20);
    $pdf->Cell($w1, 15, $title2, 0, 0, 'C', true);
    $pdf->Image('img/espinoza.png',5,0,200,35);
    // Line break
    $pdf->Ln(20);
    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($nombre)+2;
    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Nombre:', 1, 0, 'C');
    $pdf->Cell(100, 10, $nombre, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Correo:', 1, 0, 'C');
    $pdf->Cell(100, 10, $email, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Telefono:', 1, 0, 'C');
    $pdf->Cell(100, 10, $telefono, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Tipo de tramite:', 1, 0, 'C');
    $pdf->Cell(100, 10, 'Presencial', 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Fecha de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $fechaT, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Hora de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $horaT, 1, 1, 'C');

    $pdf->SetFont('Arial','B',10);
    $w3 = $pdf->GetStringWidth($nota1)+6;
    $pdf->SetX((250-$w3)/2);
    $pdf->Cell($w1, 15, $nota1, 0, 0, 'C', true);
    $pdf->Ln(10);
    //$nota2 = '*Acude con tus placas anteriores.';
    $pdf->SetFont('Arial','B',10);
    $w4 = $pdf->GetStringWidth($nota2)+6;
    $pdf->SetX((250-$w4)/2);
    $pdf->Cell($w1, 15, $nota2, 0, 0, 'C', true);

    $pdf->Image('img/car 3.jpg',20,160,180,120);
    $pdf->Output();

    $insertar = "INSERT INTO tramite (Correo,Tipo_tramite, Servicio, Telefono, Fecha, Hora) VALUES ('$mail','Presencial','$selector','$telefono','$fechaT', '$horaT')";
    $query= mysqli_query($conn,$insertar);
    $insertar1= "SELECT MAX(Id_tramite) AS Id_tramites FROM tramite";
    $query1 = mysqli_query($conn,$insertar1);
    $dato = mysqli_fetch_array($query1);
    $idTramite =$dato['Id_tramites']; 
    
    $insertar2 = "INSERT INTO `cliente` (`Correo`, `Id_cita`, `Id_tramite`, `Fecha_entrega`) VALUES ('$mail', '0', '$idTramite', '$fechaT')";
    $query2 = mysqli_query($conn,$insertar2);

    if($query) {
        echo "<script> alert('Guardado');
        location.href = 'reposicionOnline.php';
        </script>";
    }else{
        echo "<script> alert('Error');
        location.href = 'reposicionOnline.php';
        </script>";
    }
}

if(($_POST)&& ($dato=="Asesoria en Linea")){
    
    require('fpdf/fpdf.php');
    $nombre = $_POST['nombre'];
    $email = $mail;
    $telefono = $_POST['telefono'];
    $fechaT = $_POST['fecha'];
    $horaT = $_POST['hora'];
    $selector = $_POST['select'];
    
    $fechaActual = date('Y-m-d');
    $fechaEntrega = date('Y-m-d', strtotime($fechaActual. ' + 15 days'));
    
    $title = 'Asesoria en Linea';
    $title1 = 'Asesoria en Linea';
    $title2 = 'Cita para realizar un tramite de manera presencial:';
    $nota1 = '*Ingresa al siguiente enlace para su cita.';
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $pdf->Ln(25);
    $w = $pdf->GetStringWidth($title1)+6;
    $pdf->SetX((210-$w)/2);
    $w1 = $pdf->GetStringWidth($title2)+16;
    $pdf->SetX((310-$w1)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);

    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 15, $title1, 0, 0, 'C', true);
    $pdf->Ln(20);
    $pdf->Cell($w1, 15, $title2, 0, 0, 'C', true);
    $pdf->Image('img/espinoza.png',5,0,200,35);
    // Line break
    $pdf->Ln(20);
    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($nombre)+2;
    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Nombre:', 1, 0, 'C');
    $pdf->Cell(100, 10, $nombre, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Correo:', 1, 0, 'C');
    $pdf->Cell(100, 10, $email, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Telefono:', 1, 0, 'C');
    $pdf->Cell(100, 10, $telefono, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Tipo de tramite:', 1, 0, 'C');
    $pdf->Cell(100, 10, 'Presencial', 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Fecha de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $fechaT, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Hora de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $horaT, 1, 1, 'C');

    $pdf->SetFont('Arial','B',10);
    $w3 = $pdf->GetStringWidth($nota1)+6;
    $pdf->SetX((250-$w3)/2);
    $pdf->Cell($w1, 15, $nota1, 0, 0, 'C', true);
    $pdf->Ln(10);
    //$nota2 = '*Acude con tus placas anteriores.';
    $pdf->SetFont('Arial','B',10);
    $w4 = $pdf->GetStringWidth($nota2)+6;
    $pdf->SetX((250-$w4)/2);
    $pdf->Cell($w1, 15, $nota2, 0, 0, 'C', true);

    $pdf->Image('img/car 3.jpg',20,160,180,120);
    $pdf->Output();

    $insertar = "INSERT INTO citas (Correo, Telefono, Tipo_cita, Servicio, Fecha, Hora) VALUES ('$mail', '$telefono','Asesoria en Linea','$selector','$fechaT', '$horaT')";
    $query= mysqli_query($conn,$insertar);
    $insertar1= "SELECT MAX(Id_cita) AS Id_citas FROM citas";
    $query1 = mysqli_query($conn,$insertar1);
    $dato = mysqli_fetch_array($query1);
    $idCita =$dato['Id_citas']; 
    
    $insertar2 = "INSERT INTO `cliente` (`Correo`, `Id_cita`, `Id_tramite`, `Fecha_entrega`) VALUES ('$mail', '$idCita', '0', '$fechaT')";
    $query2 = mysqli_query($conn,$insertar2);

    if($query) {
        echo "<script> alert('Guardado');
        location.href = 'reposicionOnline.php';
        </script>";
    }else{
        echo "<script> alert('Error');
        location.href = 'reposicionOnline.php';
        </script>";
    }
}

if(($_POST)&& ($dato=="Asesoria Presencial")){
    
    require('fpdf/fpdf.php');
    $nombre = $_POST['nombre'];
    $email = $mail;
    $telefono = $_POST['telefono'];
    $fechaT = $_POST['fecha'];
    $horaT = $_POST['hora'];
    $selector = $_POST['select'];
    
    $fechaActual = date('Y-m-d');
    $fechaEntrega = date('Y-m-d', strtotime($fechaActual. ' + 15 days'));
    
    $title = 'Asesoria Presencial';
    $title1 = 'Asesoria Presencial';
    $title2 = 'Cita para realizar un tramite de manera presencial:';
    //$nota1 = '*Llevar documentacion en original y copia cuando acuda a la surcusal.';
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $pdf->Ln(25);
    $w = $pdf->GetStringWidth($title1)+6;
    $pdf->SetX((210-$w)/2);
    $w1 = $pdf->GetStringWidth($title2)+16;
    $pdf->SetX((310-$w1)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);

    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 15, $title1, 0, 0, 'C', true);
    $pdf->Ln(20);
    $pdf->Cell($w1, 15, $title2, 0, 0, 'C', true);
    $pdf->Image('img/espinoza.png',5,0,200,35);
    // Line break
    $pdf->Ln(20);
    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($nombre)+2;
    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Nombre:', 1, 0, 'C');
    $pdf->Cell(100, 10, $nombre, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Correo:', 1, 0, 'C');
    $pdf->Cell(100, 10, $email, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Telefono:', 1, 0, 'C');
    $pdf->Cell(100, 10, $telefono, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Tipo de tramite:', 1, 0, 'C');
    $pdf->Cell(100, 10, 'Presencial', 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Fecha de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $fechaT, 1, 1, 'C');

    $pdf->SetX((95-$w)/2);
    $pdf->Cell(60, 10, 'Hora de la cita:', 1, 0, 'C');
    $pdf->Cell(100, 10, $horaT, 1, 1, 'C');

    $pdf->SetFont('Arial','B',10);
    $w3 = $pdf->GetStringWidth($nota1)+6;
    $pdf->SetX((250-$w3)/2);
    $pdf->Cell($w1, 15, $nota1, 0, 0, 'C', true);
    $pdf->Ln(10);
    //$nota2 = '*Acude con tus placas anteriores.';
    $pdf->SetFont('Arial','B',10);
    $w4 = $pdf->GetStringWidth($nota2)+6;
    $pdf->SetX((250-$w4)/2);
    $pdf->Cell($w1, 15, $nota2, 0, 0, 'C', true);

    $pdf->Image('img/car 3.jpg',20,160,180,120);
    $pdf->Output();

    $insertar = "INSERT INTO citas (Correo, Telefono, Tipo_cita, Servicio, Fecha, Hora) VALUES ('$mail', '$telefono','Asesoria Presencial','$selector','$fechaT', '$horaT')";
    $query= mysqli_query($conn,$insertar);
    $insertar1= "SELECT MAX(Id_cita) AS Id_citas FROM citas";
    $query1 = mysqli_query($conn,$insertar1);
    $dato = mysqli_fetch_array($query1);
    $idCita =$dato['Id_citas']; 
    
    $insertar2 = "INSERT INTO `cliente` (`Correo`, `Id_cita`, `Id_tramite`, `Fecha_entrega`) VALUES ('$mail', '$idCita', '0', '$fechaT')";
    $query2 = mysqli_query($conn,$insertar2);

    if($query) {
        echo "<script> alert('Guardado');
        location.href = 'reposicionOnline.php';
        </script>";
    }else{
        echo "<script> alert('Error');
        location.href = 'reposicionOnline.php';
        </script>";
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
	
	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	

</head>
<body>
	<!--Date JQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<section class="container forms">
		<div class="form login">
			<div class="form-content">
				<header>Información de la cita</header>
				<form action="" method="POST">
					<div id="field nombre" class="field input-field nombre">
						<input type="text" placeholder="Nombre Completo" id="nombre" name="nombre" class="input" value="<?php echo $nombreC ?>">
						<i class='bx bxs-error-circle'></i>
						<small id="correoAlert">No ha introducido un correo electrónico valido.</small>
					</div>
					<div id="field tel" class="field input-field tel">
						<input type="tel" placeholder="Telefono" id="telefono" name="telefono" class="telefono">
						<i class='bx bxs-error-circle'></i>
						<small id="passAlert">No se ha introducido de nuevo la contraseña.</small>
					</div>
					<div id="field citas" class="field input-field citas">
						<input type="text" placeholder="Citas" id="nombreCitas" class="input" readonly=readonly value="<?php echo $dato?>">
						<i class='bx bxs-error-circle'></i>
						<small id="correoAlert">No ha introducido un correo electrónico valido.</small>
					</div>
					<div id="field citasList" class="field input-field citasList">
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
					<div id="fechadiv" class="fechahora">
						<input type="text" placeholder="dd/mm/aaaa" id="fecha"name="fecha" class="form-control" readonly required>
						<i class='bx bx-calendar'></i>
					</div>
					<div id="horadiv" class="fechahora">
						<input type="text" placeholder="--:--" id="hora"name="hora" class="time" readonly required>
						<i class='bx bx-time-five'></i>
					</div>

					<div class="botonMas">
						<div class="field button-field">
							<button type="submit" name="submit" id="submit">Agendar Cita</button>
						</div>
						<a href="http://gestoriae.uptex-vsc2.com/#servicios">
							<i class='bx bx-arrow-back'></i>
						</a>
						<a href="logout.php">
							<i class='bx bx-log-out'></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</section>

	

	<script>
		
		$(document).ready(() =>{
			$('#fecha').datetimepicker({
				format:'d/m/Y',
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
		})
	</script>
	

</body>
</html>
