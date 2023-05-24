
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Gestoría vehicular</title>
    

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c46cf820ac.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        body{
            background-image: url("img/FondoNegro.jpg");
        }

        .tablas{
            color: white;
            margin-left: 0;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><img src="img/logo.jpg"; style="height: 60px; width: 150px; border-radius:10px;"></div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="index.php#inicio">
          <i class="fa-solid fa-house"></i>
          <span class="links_name">Inicio</span>
        </a>
         <span class="tooltip">Inicio</span>
         
      </li>
      <li>
       <a href="index.php#servicios">
         <i class="fa-solid fa-copy"></i>
         <span class="links_name">Servicios</span>
       </a>
       <span class="tooltip">Servicios</span>
     </li>
     <li>
       <a href="index.php#cita">
         <i class="fa-solid fa-calendar-days"></i>
         <span class="links_name">Haz una cita</span>
       </a>
       <span class="tooltip">Citas</span>
     </li>
     <li>
       <a href="index.php#contact">
         <i class="fa-solid fa-thumbs-up"></i>
         <span class="links_name">Redes sociales</span>
       </a>
       <span class="tooltip">Comunícate con nosotros</span>
     </li>
     <li>
       <a href="index.php#ubicacion">
       <i class="fa-solid fa-location-dot"></i>
         <span class="links_name">Ubicación</span>
       </a>
       <span class="tooltip">Ubicación</span>
     </li>
     <li>
       <a href="index.php#conocenos">
       <i class="fa-solid fa-car"></i>
         <span class="links_name">¿Quiénes somos?</span>
       </a>
       <span class="tooltip">Conocenos</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="img/profile.png" alt="profileImg">
           <div class="name_job"onclick="location.href='login.php';">
             <div class="name">
                <?php 
                    session_start();
                    $usu = $_SESSION['usuario'];
                    if (isset($_SESSION['correo'])) {
                      echo $usu;  
                    }
                    else{
                      echo 'INICIAR SESIÓN';  
                    }
                ?>
             </div>
             <div class="job">Usuario</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" onclick="location.href='logout.php';"></i>
     </li>
    </ul>
</div>
    <div class="home-section">
        <div class="tablas">
        <h1>Tramites y Citas Realizadas</h1><br><br>
        <table class="table">

            <tbody>
                <?php
                
                include ("conexion.php");
                $mail=$_SESSION['correo'];
                $nombreC=$_SESSION['nombreC'];

                $sentencia="SELECT Tipo_cita, Fecha, Hora FROM citas WHERE Correo = '$mail'";
                $resultado=mysqli_query($conn,$sentencia);
                while($filas=mysqli_fetch_array($resultado))
                {

                  echo "<tr>";
                  echo "<td>"; echo $filas['Tipo_cita']; echo "</td>";
                  echo "<td>"; echo $filas['Fecha']; echo "</td>";
                  echo "<td>"; echo $filas['Hora']; echo "</td>";
                  
                 echo "<td> <a href='tickets.php?user=".$nombreC."&tram=".$filas['Tipo_cita'].".pdf'><button type='button' class='btn btn-danger'>Descargar Ticket</button></a> </td>";
                 
                }
                ?>
            </tbody>
        </table> <br><br>

        <table class="table">
            

            <tbody>
                <?php
                
                include ("conexion.php");
                $mail=$_SESSION['correo'];
                $nombreC=$_SESSION['nombreC'];

                $sentencia="SELECT * FROM tramite WHERE Correo = '$mail'";
                $resultado=mysqli_query($conn,$sentencia);
                while($filas=mysqli_fetch_array($resultado))
                {   
                    $servicio = $filas['Servicio'];
                    $sentencia2="SELECT * FROM servicios WHERE id_servicio = '$servicio'";
                    $resultado2=mysqli_query($conn,$sentencia2);
                    while($filas2=mysqli_fetch_array($resultado2)){
                        echo "<tr>";
                        echo "<td>"; echo $filas2['Servicios']; echo "</td>";
                        echo "<td>"; echo $filas['Tipo_tramite']; echo "</td>";
                        echo "<td>"; echo $filas['Fecha']; echo "</td>";
                        echo "<td>"; echo $filas['Hora']; echo "</td>";
                        echo "<td> <a href='tickets.php?user=".$nombreC."&tram=".$filas2['Servicios'].".pdf'><button type='button' class='btn btn-danger'>Descargar Ticket</button></a> </td>"; 
                    }
                }
                ?>
             </tbody>
        </table>
             
        </div>
    </div>
    
    
    
    <script src="script.js"></script>
</body>
</html>














