<?php
  session_start();
  if(!isset($_SESSION['empresa'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['empresa'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosempresas;');
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
    <link rel="stylesheet" type="text/css" href="css/inicioempresa.css"/>
    <link rel="stylesheet" type="text/css" href="fonts.css"/>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
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
            <div class="usuario"><i class="fas fa-user-tie fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['empresa'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioempresa.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="documentosconvenio.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-check-double"></i><a href="competenciasempresa.php">Competencias</a></div>
              <div class="items"><i class="fas fa-envelope"></i><a href="correocarta.php">Enviar correos</a></div>
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
    <div class="icon-cards-grid">
   <div>
     <a href="documentosconvenio.php">
     <i class="fas fa-upload fa-4x"></i>
     <h2>Subir archivos</h2>
      </a>
   </div>
   <div>
     <a href="competenciasempresa.php">
     <i class="fa fa-check-double fa-4x"></i>
     <h2>Competencias</h2>
     </a>
    </div>
    <div>
     <a href="incorporacion.php">
     <i class="fa fa-file-alt fa-4x"></i>
     <h2>Incorporación</h2>
     </a>
    </div>
       <div>
     <a target="_blank" href="https://www.tesi.org.mx/">
     <i class="fas fa-external-link-alt fa-4x"></i>
     <h2>Página oficial</h2>
      </a>
   </div>
  </div>
</div>
<main class="main">
  <h2>Bienvenido <?php echo $_SESSION['empresa'];?><br><br></h2>
 <iframe width="600" height="365" src="https://www.youtube.com/embed/-HqEuB_jGFU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  <h3><br>Contaco de Ingeniera Marisol Martínez Ortega:<br>Departamento de Gestión Tecnológica y Vinculación.<br>Correo electrónico: depto.gestiontec@tesi.edu.mx</h3>

  </main>
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