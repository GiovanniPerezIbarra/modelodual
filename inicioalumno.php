<?php
  session_start();
  if(!isset($_SESSION['alumno'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['alumno'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosalumnos;');
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
    <link rel="stylesheet" type="text/css" href="css/inicioalumno.css"/>
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
            <div class="usuario"><i class="fas fa-user-lock fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['alumno'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioalumno.php">Inicio</a></div>
              <div class="items"><i class="fas fa-book-reader"></i><a href="vermanual.php">Ver lineamiento</a></div>
              <div class="items"><i class="fas fa-download"></i><a href="descargaralumno.php">Bajar archivos</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="subiralumno.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-building"></i><a href="verconvenios.php">Ver convenios</a></div>
              <div class="items"><i class="fas fa-mail-bulk"></i><a href="correocita.php">Contactar UE</a></div>
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
    <div class="contenedor">
      <ul>
        <li>Registro al Modelo Educativo Dual:</li>
       <li>Los estudiantes no aceptados en la Unidad Económica se integran nuevamente al padrón de preseleccionados. Debes contar con caracteristicas suficientes de actitud, iniciativa y responsabilidad.</li>
       <li>La Institución Educativa determina el periodo de incorporación a la Educación Dual con duración de 1 a 3 años.</li>
       <li>Una vez terminado el trámite de registro, ponte en contacto con la división de tu carrera para la asignación de tu mentor.</li>
    </ul>
  </div>
          <figure class="snip1566">
          <img src="img/subir11.png" alt="sq-sample14" />
          <figcaption><i>Subir evaluación psicométrica</i></figcaption>
          <a href="comprobantealumno.php"></a>
          </figure>
          <figure class="snip1566">
          <img src="img/subir2.png" alt="sq-sample14" />
          <figcaption><i>Subir documentos de la lista de cotejo</i></figcaption>
          <a href="procesoalumno.php"></a>
          </figure>
          <figure class="snip1566"><img src="img/subir3.png" alt="sq-sample19" />
            <figcaption><i>Ver convenios</i></figcaption>
            <a href="verconvenios.php"></a>
          </figure>
          <figure class="snip1566"><img src="img/subir4.png" alt="sq-sample20" />
            <figcaption><i>Contactar con la empresa</i></figcaption>
            <a href="correocita.php"></a>
          </figure>
          <h4>Paso 1. Subir su evaluación psicométrica (si no ha subido su evaluación pscométrica, su postulación no será notificada ante su jefe de división académica).<br>Paso 2. Subir documentos de la lista de cotejo.<br>Paso 3. Seleccionar la UE (Unidad Económica) de interés y ponerse en contacto con ella.<br>Paso 4. Una vez terminados los pasos anteriores, espere a que su división de carrera lo agregue al padrón de aceptados y pueda iniciar sesión como alumno aceptado y continuar con el proceso. La confirmación se enviará al correo electrónico asociado a esta cuenta.</h4><h3>Se recomienda revisar el lineamiento.</h3>
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