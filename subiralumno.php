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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Subir archivos</title>
        <link rel="stylesheet" type="text/css" href="css/subiralumno.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
                    <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">

<style>
   body {
      background-image: url("img/fondotesi.png");
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
                <img src="img/tesi.png" alt="">
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <div class="main">
                <h3>Envío de datos para completar el registro.</h3><br>
                <h5>Es necesario que tengas a la mano los siguientes documentos:</h5>
                <h6>° Carta de exposición de motivos.<br>
                ° Comprobante de inscripción y Kardex.<br>
                ° Copia de pago del seguro contra accidentes.<br>
                ° Copia del carnet de afiliación de seguro médico.<br>
                ° Carta compromiso.<br>
                ° Curriculum vitae.<br>
                ° Solicitud de trabajo elaborada.<br>
                ° Copia de identificación oficial (INE).<br>
                ° Copia de la credencial escolar.<br>
                ° CURP.<br>
                ° Copia del acta de nacimiento.<br>
                ° Copia de comprobante de domicilio.<br>
                </h6>
            <ul class="boton">
                <li><a href="comprobantealumno.php">Siguiente</a></li>
            </ul>
            </div>
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
<div class="footer"></div>
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