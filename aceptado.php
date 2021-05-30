<?php
  session_start();
  if(!isset($_SESSION['mentor'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['mentor'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datostutores;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/descargararchivomentor.css"/>
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
        <div class="usuario"><i class="fas fa-user-edit"></i><a><br>Bienvenid@</a></div>

        <div class="usuari"><a>
        <?php echo $_SESSION['mentor'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciomentor.php">Inicio</a></div>
              <div class="items"><i class="fas fa-book-reader"></i><a href="#">Seguimiento y evaluación</a></div>
      
              <div class="items"><i class="fas fa-upload"></i><a href="ingresacali.php">Subir calificaciones</a></div>
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
   <div class="main">
 <h3>Descargar reporte de actividades:<br><br></h3>
       <h4>Ambos documentos se deben de llenar/imprimir en hoja membretada oficial del Tecnológico.</h4>  <br>

<form class="formulario" method="POST" enctype="multipart/form-data">
                    <div>
                    <h3>Competencias:</h3>
                    <input class="controls" type="text" name="rfc" placeholder="Ingrese su RFC"/>
                    <input class="controls" type="file" name="file" />
                    <input class="botons" type="submit" name="submit" value="Subir"/>
                    </div>
                </form>
     <div id="container">
  <div id="loader"></div>
  <div id="loaderText">
   <span>D</span>
    <span>E</span>
    <span>S</span>
    <span>C</span>
    <span>A</span>
    <span>R</span>|
    <span>G</span>
    <span>A</span>
     <span>R</span>
    
    <a href="manual/carta_compromiso.docx" download="Carta Compromiso.docx">
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
<br><br>

<img src="img/psicometrica.png" alt="">
           
</div>
            
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js'></script><script  src="./script.js"></script>
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