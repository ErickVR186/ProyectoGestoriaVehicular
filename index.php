<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Gestoría vehicular</title>
    
    <link rel="stylesheet" href="cards.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c46cf820ac.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><img src="img/logo.jpg"; style="height: 60px; width: 150px; border-radius:10px;"></div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#inicio">
          <i class="fa-solid fa-house"></i>
          <span class="links_name">Inicio</span>
        </a>
         <span class="tooltip">Inicio</span>
         
      </li>
      <li>
       <a href="#servicios">
         <i class="fa-solid fa-copy"></i>
         <span class="links_name">Servicios</span>
       </a>
       <span class="tooltip">Servicios</span>
     </li>
     <li>
       <a href="#cita">
         <i class="fa-solid fa-calendar-days"></i>
         <span class="links_name">Haz una cita</span>
       </a>
       <span class="tooltip">Citas</span>
     </li>
     <li>
       <a href="#contact">
         <i class="fa-solid fa-thumbs-up"></i>
         <span class="links_name">Redes sociales</span>
       </a>
       <span class="tooltip">Comunícate con nosotros</span>
     </li>
     <li>
       <a href="#ubicacion">
       <i class="fa-solid fa-location-dot"></i>
         <span class="links_name">Ubicación</span>
       </a>
       <span class="tooltip">Ubicación</span>
     </li>
     <li>
       <a href="#conocenos">
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
    <section id="inicio">
        <div class="text" style="text-align: center;">
            <h1>Gestoría Vehicular "Espinosa"</h1>
        </div>
        <div class="box1" style="text-align: center;">
        <br>
        <h1>¿Necesitas hacer algún tramite vehicular?</h1>
        <div class="titulo">
            <h1>Nosotros lo hacemos por ti.</h1><br>
        </div>
        </div>
        <div class="box4" style="text-align: center;">
            <p>
            Nos dedicamos a todo tipo de trámites 
            vehiculares, ofreciendo los mejores precios a nuestros clientes.</p><br><br><br>
        </div>
        <div class="box5" style="text-align: center;">
        <div class="titulo">
            <h1>¿Por qué hacer tus trámites con nosotros?</h1>
        </div><br>
        <p>
            -Agilizamos los trámites: Tus documentos los tendrás en menos de una semana. <br><br>
            -Costos y asesorías: Contamos con asesoría agratuita y los mejores precios.<br><br>
            -Beneficios: Ahorro de tiempo y dinero - confiabilidad y seguridad - satisfacción garantizada.<br>
        </p>
        </div>
        <div class="box6">
            <h1>!Somos tú mejor opción¡</h1>
            <img src="img/uno.png" style="height: 200px; width: 200px;">
        </div>
        <div class="info"><br>
            <h1>Que no se te pase. Estos son los autos que toca verificar en junio.</h1>
            <h1><a style="color:#780000;" href="http://gestoriae.uptex-vsc2.com/buscador/Dirverifi.php">Buscar verificentro</a></h1>
            <br>
            <img src="img/verificacion.png" style="height: 500px; width: 780px; border-radius:20px;">
        </div>
        <div class="info2">
            <h1>La licencia de conducir digital es una realidad y nosotros tenemos para ti el cómo sacarla de manera fácil y sencilla.</h1><br>
            <img src="img/licenciaD.png" style="height: 470px; width: 1000px; border-radius:20px;">
        </div>
        <div class="info"><br>
            <h1>¿Cómo saber si un auto o moto es robada?</h1>
            <h1><a style="color:#780000;" href="http://www2.repuve.gob.mx:8080/ciudadania/consulta/">Haz clic aquí</a></h1>
            <h1>Consulta Repuve</h1>
            <br>
        </div>
    </section>
    <section id="servicios">
        <div class="text" style="text-align: center;">
            <h1>Servicios</h1>
        </div>
        <div class="titulo2"><br>
            <h1>Contamos con  una amplia variedad de servicios para tu vehículo</h1><br>
            </div>
        <div class="container">
        <div class="box-container">
        <div class="box">
            <img src="img/tarjetaCirculacion.jpg" alt="">
            <p>Reposición de tarjeta de circulación </p>
            <a href="tramites/index.php?variable='tramiteReposicion.php'" class="btn">Iniciar trámite</a>
        </div>

        <div class="box">
            <img src="img/permisoSinPlacas.jpg" alt="">
            <p>Permisos de circulación</p>
            <a href="tramites/index.php?variable='tramitesPCircu.php'" class="btn">Iniciar trámite</a>
        </div>

        <div class="box">
            <img src="img/permisoPolarizado.png" alt="">
            <p>Permiso polarizados</p>
            <a href="tramites/index.php?variable='tramitesPolarizados.php'" class="btn">Iniciar trámite</a>
        </div>

        <div class="box">
            <img src="img/permisoMenores.jpg" alt="">
            <p>Permiso para menores de edad</p>
            <a href="tramites/index.php?variable='tramitesMEdad.php'" class="btn">Iniciar trámite</a>
        </div>

        <div class="box">
            <img src="img/renovacionPlacas.jpg" alt="">
            <p>Reemplacamiento</p>
            <a href="tramites/index.php?variable='tramitesReemplacamiento.php'" class="btn">Iniciar trámite</a>
        </div>

        <div class="box">
            <img src="img/cambioEntidad.jpg" alt="">
            <p>Cambio de entidad</p>
            <a href="tramites/index.php?variable='tramitesCEntidad.php'" class="btn">Iniciar trámite</a>
        </div>
        
        <div class="box">
            <img src="img/cambioPropietario.webp" alt="">
            <p>Cambio de propietario</p>
            <a href="tramites/index.php?variable='tramitesCPropietario.php'" class="btn">Iniciar trámite</a>
        </div>
                
        <div class="box">
            <img src="img/licencia.jpg" alt="">
            <p>Licencias</p>
            <a href="tramites/index.php?variable='tramitesLicencia.php'" class="btn">Iniciar trámite</a>
        </div>
                        
        <div class="box">
            <img src="img/cambioPlacas.jpg" alt="">
            <p>Cambio de placa</p>
            <a href="tramites/index.php?variable='tramitesCPlacas.php'" class="btn">Iniciar trámite</a>
        </div>
    </div>
    </section>
    <section id="cita">
    <div class="text" style="text-align: center;">
            <h1>Haz una cita</h1>
    </div>
    <div class="cards">
         <div class="services">
            <div class="content content-1">
               <h2>
                Trámite presencial
               </h2>
               <p><img class="imgCitas" src="img/tramitePresencial.png" style="border-radius: 5px;"></p>
               <p>
                  Agende una cita para tramitar un servicio de manera presencial.
               </p>
               <a href="FormularioCitas/formulario.php?variable=Tramite Presencial">Agendar cita</a>
            </div>
            <div class="content content-2">
               <h2>
                Asesoría presencial
               </h2>
               <p><img class="imgCitas" src="img/asesoriaP.jpg" style="border-radius: 5px;"></p>
               <p>
               Realice una cita para obtener una asesoría presencial en nuestra surcusal ubicada en el municipio de Texcoco.
               </p>
               <a href="FormularioCitas/formulario.php?variable=Asesoria Presencial">Agendar cita</a>
            </div>
            <div class="content content-3">
               <h2>
                Asesoría en línea
               </h2>
               <p><img class="imgCitas" src="img/asesoriaLinea.jpeg " style="border-radius: 5px;"></p>
               <p>
               Realice una cita para obtener una asesoría en línea por medio de una llamada en alguna plataforma.
               </p>
               <a href="FormularioCitas/formulario.php?variable=Asesoria en Linea">Agendar cita</a>
            </div>
         </div>
      </div>
    </div>
  </div>      
    </section>
    <section id="contact">
    <div class="text" style="text-align: center;">
        <h1>Nuestras redes sociales</h1>  
      </div>
      <div class="tituloc">
          <h1>Si tienes dudas envíanos un mensaje a nuestro WhatsApp  o vista nuestra página de Facebook.</h1>
      </div>
      <div class="social-btns">
        <div class="boxs">
        <a class="btn twitter" ><i class="fa fa-whatsapp"></i></a>
        <h1 style="text-shadow: 2px 2px 5px black;">+52 595 106 3693</h1>
        </div>
        <div class="boxs1">
        <a class="btn facebook" href="https://www.facebook.com/pages/category/Product-service/Gestor%C3%ADa-vehicular-Espinosa-103288404816557"><i class="fa fa-facebook"></i></a>
        <h1 style="text-shadow: 2px 2px 5px black;">Gestoria "Espinosa"</h1>
        </div>
     </div>
    </section>
    <section id="ubicacion">
    <div class="text" style="text-align: center;">
        <h1>¿Donde nos ubicamos?</h1>   
      </div>
      <div class="titulou">
        <h1>Ven y visítanos en nuestras oficinas</h1>
        <p>Nos ubicamos en Calle Juárez Norte #440-1, Colonia San Mateo, Texcoco (justamente frente a la nissan)</p><br>
      </div>
      <div class="google-maps">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4028.046812511201!2d-98.8840337241484!3d19.521332288797552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1e7b1b4b72603%3A0xa9043719dd718284!2sGestor%C3%ADa%20Vehicular%20Espinosa!5e0!3m2!1ses-419!2smx!4v1644984363097!5m2!1ses-419!2smx"
  style="border-radius: 20px;"></iframe>
</div>
    </section>
    <section id="conocenos">
    <div class="text" style="text-align: center;">
        <h1>¿Quiénes somos?</h1>
      </div>
      <div class="box10">
        <h1>Somos una empresa</h1>
        <p>
          Dedicada a la gestoría vehicular del Estado de México contamos con una amplia 
          experiencia, hemos cumplido con los más altos estándares de calidad, transparencia y 
          eficiencia. Nos especializamos en la gestoría de trámites vehiculares de Estado de México, 
          donde contamos con un equipo de gestores vehiculares que les ayudarán a realizar todos y 
          cada uno de los trámites que requiera su vehículo, todo ello de forma fácil, 
          transparente y desde la comodidad de su casa u oficina.</p>
        <p>
      </div>
      <div class="box11">
      <h1>Nuestro compromiso</h1>
        <p>Es ayudar a más personas como tú todos los días para que puedan 
        obtener los resultados que desean. Para simplificarlo, ¡existen muchas formas de 
        trabajar conmigo! La variedad de servicios que brindo puede adaptarse según 
        tus objetivos, tu negocio o tu proyecto. Y es importante tener en cuenta que me 
        especializo en trabajar con originalidad. Por lo tanto, si estás buscando nuevas 
        formas de darle vida a tu último proyecto, entonces te brindaré una solución 
        verdaderamente única para ti.
        </p>
      </div>
      <div class="box10">
        <h1>¿Quieres saber más acerca de los servicios que ofrecemos?</h1>
        <p>Écha un vistazo y descubre todas las posibilidades que tenemos para trabajar juntos.</p>
      </div>
    </section>
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div id="box_1" class="box">
                <figure>
                    <a href="#">
                        <img src="img/logo.jpg" alt="Logo">
                    </a>
                </figure>
            </div>
            <div id="box_2" class="box">
                <h2>Enlaces útiles</h2>
                <li><a href="avisoDePriva.php">Aviso de Privacidad</a></li>
                <li><a href="marcoLegal.php">Marco Legal</a></li>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Gestoria Vehicular "Espinosa"</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>














