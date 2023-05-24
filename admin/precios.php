<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Precios</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c46cf820ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/4352606bc5.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name"><img src="../img/logo.jpg"; style="height: 60px; width: 150px; border-radius:10px;"></div>
      <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
    <li>
       <a href="../index.php">
          <i class="fa-solid fa-house"></i>
          <span class="links_name">Inicio</span>
        </a>
         <span class="tooltip">Inicio</span>
      </li>
      <li>
        <a href="citas.php">
        <i class="fa-solid fa-address-book"></i>
          <span class="links_name">Citas</span>
        </a>
         <span class="tooltip">Tabla de citas</span>
      </li>
      <li>
       <a href="tramites.php">
       <i class="fa-solid fa-pen"></i>
         <span class="links_name">Tramites</span>
       </a>
       <span class="tooltip">Tabla de tramites</span>
     </li>
     <li>
       <a href="precios.php">
       <i class="fa-solid fa-money-check-dollar"></i>
         <span class="links_name">Precios</span>
       </a>
       <span class="tooltip">Tabla de precios</span>
     </li>
     <li>
       <a href="clientes.php">
       <i class="fa-solid fa-ghost"></i>
         <span class="links_name">Clientes</span>
       </a>
       <span class="tooltip">Tabla de clientes</span>
     </li>
     <li>
       <a href="cuenta.php">
       <i class="fa-solid fa-skull"></i>
         <span class="links_name">Crear cuentas</span>
       </a>
       <span class="tooltip">Crear cuenta para admin</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.png" alt="profileImg">
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
         <i class='bx bx-log-out' id="log_out" onclick="location.href='../logout.php';"></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">
      <h2>Precios</h2>
      <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Servicios</th>
          <th>Precio de tramite</th>
          <th>Modificar</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        include ("conexion.php");
        $sentencia="SELECT * FROM servicios";
        $resultado=mysqli_query($conn,$sentencia);
        while($filas=mysqli_fetch_array($resultado))
        {
          echo "<tr>";
          echo "<td>"; echo $filas['id_servicio']; echo "</td>";
          echo "<td>"; echo $filas['Servicios']; echo "</td>";
          echo "<td>"; echo "$ ".$filas['Precio_tramite']; echo "</td>";
          echo "<td>  <a href='update.php?no=".$filas['id_servicio']."''> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
          //echo "<td> <a href='eliminar2.php?id_servicio=".$filas['id_servicio']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
        }
        ?>
      </tbody>
    </table> 
      </div>
  </section>
  <script src="script.js"></script>
</body>
</html>
