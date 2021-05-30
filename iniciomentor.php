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
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/iniciotutor.css"/>
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
           <div class="usuario"><i class="fas fa-user-edit
"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['mentor'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciomentor.php">Inicio</a></div>
              <div class="items"><i class="far fa-file-alt"></i></i><a href="subirmentor.php"> Seguimiento y evaluación</a></div>
               <div class="items"><i class="fas fa-clipboard"></i><a href="ingresacali.php">Subir calificaciones</a></div>
              <div class="items"><i class="fas fa-chalkboard-teacher"></i><a href="vercali.php">Ver calificaciones</a></div>
              <div class="items"><i class="far fa-file-word"></i><a href="verreportesm.php">Ver reportes</a></div>
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
    
      <h2>Bienvenido <?php echo $_SESSION['mentor']; ?> </h2>
       <h4>Ya has iniciado sesión.</h4>
                                            <br><br>

    <h3>La asignacion de mentores la otorga el jefe de división académica.
    Una vez finalizado  el trámite, deberá contactar con uno o mas alumnos asginados.</h3>
          <figure class="snip1566">
          <img src="img/subir.jpg" alt="sq-sample14" />
          <figcaption><i>Seguimiento y evaluacion</i></figcaption>
          <a href="subirmentor.php"></a>
          </figure>
      
          </figure>
          <figure class="snip1566">
          <img src="img/calificacion2.png" alt="sq-sample14" />
          <figcaption><i>Subir calificaciones</i></figcaption>
          <a href="ingresacali.php"></a>
          </figure>
              <figure class="snip1566">
          <img src="img/bajar.jpg" alt="sq-sample14" />
          <figcaption><i>Ver calificaciones</i></figcaption>
          <a href="vercali.php"></a>
              </figure>
          <figure class="snip1566"><img src="img/seguimiento.png" alt="sq-sample20" />
            <figcaption><i>Ver reportes</i></figcaption>
            <a href="verreportesm.php"></a>

          </figure>
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