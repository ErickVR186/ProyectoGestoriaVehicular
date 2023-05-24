<?php 
session_start();

$mail=$_SESSION['correo'];


include ("../conexion.php");
require('../fpdf/fpdf.php');

$nombre = $_POST['nombre'];

$carpetaDestino="../Documentos/$nombre/";
$email = $mail;
$telefono = $_POST['telefono'];
$fechaActual = date('Y-m-d');
$fechaEntrega = date('Y-m-d', strtotime($fechaActual. ' + 15 days'));

$title = utf8_decode($_POST['tramite']);
$title1 = utf8_decode($_POST['tramite']);
$title2 = 'Cita para la finalizacion del tramite:';
$nota1 = '*Llevar documentacion en original cuando se vaya a finalizar el tramite.';
$pdf = new FPDF();
$pdf -> AddPage();
$pdf->SetTitle($title);
// Arial bold 15
$pdf->SetFont('Arial','B',15);
// Calculate width of title and position
$pdf->Ln(35);
$w = $pdf->GetStringWidth($title1)+6;
$pdf->SetX((210-$w)/2);
$w1 = $pdf->GetStringWidth($title2)+16;
$pdf->SetX((210-$w1)/2);
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
$pdf->Image('../img/espinoza.png',5,0,200,35);
// Line break
$pdf->Ln(20);
$pdf->SetTextColor(0,0,0,1);
$w = $pdf->GetStringWidth($nombre)+2;
$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Nombre:', 1, 0, 'C');
$pdf->Cell(100, 10, utf8_decode($nombre), 1, 1, 'C');

$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Correo:', 1, 0, 'C');
$pdf->Cell(100, 10, $email, 1, 1, 'C');

$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Telefono:', 1, 0, 'C');
$pdf->Cell(100, 10, $telefono, 1, 1, 'C');

$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Tipo de tramite:', 1, 0, 'C');
$pdf->Cell(100, 10, 'En linea', 1, 1, 'C');

$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Fecha del tramite:', 1, 0, 'C');
$pdf->Cell(100, 10, $fechaActual, 1, 1, 'C');

$pdf->SetX((95-$w)/2);
$pdf->Cell(60, 10, 'Fecha de entrega:', 1, 0, 'C');
$pdf->Cell(100, 10, $fechaEntrega, 1, 1, 'C');

$pdf->SetFont('Arial','B',12);
$w3 = $pdf->GetStringWidth($nota1)+6;
$pdf->SetX((250-$w3)/2);
$pdf->Cell($w1, 15, $nota1, 0, 0, 'C', true);

$pdf->Image('../img/car 3.jpg',20,160,180,120);
$pdf->Output('F', $carpetaDestino.$_POST['tramite'].".pdf");

$insertar = "INSERT INTO tramite (Correo,Tipo_tramite, Servicio, Telefono, Fecha) VALUES ('$mail','En linea','1','$telefono','$fechaActual')";
$query= mysqli_query($conn,$insertar);
$insertar1= "SELECT MAX(Id_tramite) AS Id_tramites FROM tramite";
$query1 = mysqli_query($conn,$insertar1);
$dato = mysqli_fetch_array($query1);
$idTramite =$dato['Id_tramites']; 

$insertar2 = "INSERT INTO `cliente` (`Correo`, `Id_cita`, `Id_tramite`, `Fecha_entrega`) VALUES ('$mail', '0', '$idTramite', '$fechaEntrega')";
$query2 = mysqli_query($conn,$insertar2);
?>