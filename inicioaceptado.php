<?php
  session_start();
  if(!isset($_SESSION['aceptado'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['aceptado'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM padron;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/inicioaceptado.css"/>
    <link rel="stylesheet" type="text/css" href="fonts.css"/>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
     <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<style>
    body {
      background-image: url("img/fondotesi.png");
      background-size: 100%;
      -moz-background-size: cover;
      -ms-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: bottom center;
    }
  </style>
  </head>
<body class="grid-container">
  <header class="header">
      <img src="img/tecnm.png" alt="">
      <img src="img/tesi.png" alt="" class="image">
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
      <img src="img/edomex.png" alt="">
      <img src="img/gobierno.png" alt="">
  </header>
<navbar class="navbar">
  <div class="screen">
    <input type="checkbox" id="input">
    <div class="modal-container">
        <label id="label" for="input">
          <span class="hamburguer"></span>
          <span class="hamburguer"></span>
          <span class="hamburguer"></span>
        </label>
        <div class="modal"> 
          <div class="hidden-hamburger">
          </div>
          <div class="hidden-hamburger">
            <div class="usuario"><i class="fas fa-user-check fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['aceptado'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioaceptado.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="subircartas.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-file-pdf"></i><a href="reportesaceptado.php">Subir reportes</a></div>
              <div class="items"><i class="fas fa-eye"></i><a href="vercalificaciones.php">Ver mentor y calificaciones</a></div>
              <div class="items"><i class="fas fa-sign-out-alt"></i><a href="logout.php">Cerrar sesión</a></div>
            </div>
          </div>
     </div>
    </div>
  </div>
</navbar>
  <sidebar class="sidebar">
      <ul>
          <li><a href="https://www.facebook.com/TESIOficial/" target="_blank" class="icon-facebook"></a></li>
          <li><a href="https://www.instagram.com/tesioficial/" target="_blank" class="icon-instagram"></a></li>
          <li><a href="https://twitter.com/TESIOficial/" target="_blank" class="icon-twitter"></a></li>
          <li><a href="https://www.youtube.com/channel/UCBRZpGRpPlmOqv2c-OehMmA" target="_blank" class="icon-youtube"></a></li>
          <li><a href="https://www.linkedin.com/school/tesi-ixtapaluca/" target="_blank" class="icon-linkedin2"></a></li>
          <li><a href="mailto:dir_dixtapaluca@tesi.edu.mx" target="_blank" class="icon-mail2"></a></li>
      </ul>
  </sidebar>
  <div class="footer">
  </div>
  <main class="main">
<h2>Bienvenido <?php echo $_SESSION['aceptado']; ?> </h2>
    <h4>Ya has iniciado sesión.</h4>
    <br>
    <h3>Alumno, ha sido aceptado para concluir el proceso de Educación Dual. Te informamos que la evaluación ahora depende de la Unidad Económica.</h3>
    <figure class="snip1273">
  <img src="img/aceptado1.png" alt="sample72"/>
  <figcaption>
    <h3>Subir archivos</h3>
    <p>Paso 1. Subir carta de aceptación y plan de rotación.</p>
  </figcaption>
  <a href="subircartas.php"></a>
</figure>
<figure class="snip1273">
  <img src="img/aceptado2.png" alt="sample86"/>
  <figcaption>
    <h3>Mentor/calificaciones</h3>
    <p>Paso 2. Esperar a que su jefe de división de carrera le asigne un mentor. Una vez asignado, ese mentor subirá sus calificaciones.</p>
  </figcaption>
  <a href="vercalificaciones.php"></a>
</figure>
<figure class="snip1273">
  <img src="img/aceptado3.png" alt="sample86"/>
  <figcaption>
    <h3>Subir reportes</h3>
    <p>Paso 3. Subir reportes en el tiempo establecido por su mentor (semanal, quincenal o mensual).</p>
  </figcaption>
  <a href="reportesaceptado.php"></a>
</figure> 
<h5>______</h5>
    
        Descargar reporte de actividades:<br>
 <div id="container">
  <div id="loader"></div>
  <div id="loaderText">
   <span>D</span>
    <span>E</span>
    <span>S</span>
    <span>C</span>
    <span>A</span>
    <span>R</span>
    <span>G</span>
    <span>A</span>
     <span>R</span>
    
    <a href="manual/Actividades.docx" download="Reporte de actividades.docx">
  </div>
  <div id="loaderText2">
    <span>D</span>
    <span>E</span>
    <span>S</span>
    <span>C</span>
    <span>A</span>
    <span>R</span>
    <span>G</span>
    <span>A</span>
     <span>R</span>
    
   
  </div>
  
  <div id="finalText">
    LISTO!
  </div>
</div>

  </main>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js'></script><script  src="./script.js"></script>
    </body>
</body>
</html>
<script>
    /* Demo purposes only */
    $(".hover").mouseleave(
      function () {
        $(this).removeClass("hover");
      }
    );
</script>
<script>
  
  function typeEffect(element, speed) {
  var text = element.innerHTML;
  element.innerHTML = "";
  
  var i = 0;
  var timer = setInterval(function() {
    if (i < text.length) {
      element.append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}


// application
var speed = 75;
var h1 = document.querySelector('h1');
var p = document.querySelector('p');
var delay = h1.innerHTML.length * speed + speed;

// type affect to header
typeEffect(h1, speed);


// type affect to body
setTimeout(function(){
  p.style.display = "inline-block";
  typeEffect(p, speed);
}, delay);

</script>
<script>
    /* Demo purposes only */
    $(".hover").mouseleave(
      function () {
        $(this).removeClass("hover");
      }
    );
</script>
<script>
  
  function typeEffect(element, speed) {
  var text = element.innerHTML;
  element.innerHTML = "";
  
  var i = 0;
  var timer = setInterval(function() {
    if (i < text.length) {
      element.append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}


// application
var speed = 75;
var h1 = document.querySelector('h1');
var p = document.querySelector('p');
var delay = h1.innerHTML.length * speed + speed;

// type affect to header
typeEffect(h1, speed);


// type affect to body
setTimeout(function(){
  p.style.display = "inline-block";
  typeEffect(p, speed);
}, delay);

</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>