<?php
  session_start();
  if(!isset($_SESSION['division'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['division'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosdivision;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>
<?php
require 'con_db.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
require 'mail/Exception.php';
require 'mail/OAuth.php';
if(isset($_POST['ingresar'])){
    if (strlen($_POST['matricula']) >= 1 &&
        strlen($_POST['Nombre_p']) >= 1 &&
        strlen($_POST['programa']) >= 1 &&
        strlen($_POST['resultado']) >= 1 &&
        strlen($_POST['fecha']) >= 1) {
            $matricula = trim($_POST['matricula']);
            $Nombre_p = trim($_POST['Nombre_p']);
            $programa = trim($_POST['programa']);
            $resultado = trim($_POST['resultado']);
            $fecha = trim($_POST['fecha']);
            $carrera = $_POST['carrera'];
            $estatus = 'Dual';
            $sentencia = $conn->prepare('SELECT * FROM datosalumnos WHERE matricula = ?;');
            $sentencia->execute([$matricula]);
            $datos = $sentencia->fetch(PDO::FETCH_OBJ);
            if($datos === false){
            echo '<script language="javascript">';
            echo 'alert("La matricula ingresada no está registrada.")';
            echo '</script>';
            }elseif($sentencia->rowCount()==1){
              $consulta = "INSERT INTO padron(matricula, Nombre_p, programa,  resultado, fecha, carrera, estatus) VALUES ('$matricula', '$Nombre_p','$programa','$resultado','$fecha','$carrera', '$estatus')";
              $resultado = $conn->prepare($consulta);
              if($resultado->execute()){
                ?>
                '<script type="text/javascript">
                alert("El registro al padron se ha realizado exitosamente.");
                window.location.assign("padrondivision.php");
                </script>';
                <?php
            } else {
                ?>
                '<script type="text/javascript">
                alert("El alumno ingresado ya está registrado.");
                window.location.assign("ingresapadron.php");
                </script>';
                <?php
            }
            $_SESSION['correo'] = $datos->correo;
            $_SESSION['matricula'] = $datos->matricula;
            try {
                    $emailTo = $_SESSION['correo'];
                    $subject = utf8_decode('Evaluación psicométrica de Educación Dual');
                    $body = utf8_decode('Buen día.<br>Ya ha sido agregado al padrón de aceptados por parte del jefe de su división.<br>El usuario y la contraseña con los que ingresará al sistema como alumno aceptado son:<br><br>Usuario: ' . $_SESSION['matricula'] . '<br>Contraseña: ' . $_SESSION['matricula'] . '<br><br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
                    $fromemail = 'modelodual21@gmail.com';
                    $fromname = utf8_decode('Eduación DUAL');
                    $passwordemail = 'Modelo2021Dual';
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPDebug = 1;                                  
                    $mail->Host = 'smtp.gmail.com';                           
                    $mail->Port = 587; 
                    $mail->SMTPAuth = 'login';
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth=true;
                    $mail->Username = $fromemail;
                    $mail->Password = $passwordemail;
                    $mail->setFrom($fromemail, $fromname);
                    $mail->addAddress($emailTo);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->addAttachment($enviararchivo);
                    $mail->SMTPDebug = 0;
                    if(!$mail->send()){
                        echo '<script language="javascript">';
                        echo 'alert("El correo no pudo ser enviado.")';
                        echo '</script>';
                    }else{
                        ?>
                        '<script type="text/javascript">
                        alert("El correo se envió exitosamente.");
                        window.location.assign("verpadron.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
            }
          }
  }else{
      echo '<script language="javascript">';
      echo 'alert("Hay campos vacíos")';
      echo '</script>';
      } 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Padrón</title>
        <link rel="stylesheet" type="text/css" href="css/ingresados (1).css"/>        
        <link rel="stylesheet" type="text/css" href="css/calen.css"/>
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
    <body  class="grid-container">
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <a href="index.php"><img title="Inicio" src="img/tesi.png" alt=""></a>
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <div class="main">
                <form class="registro" method="post">
                  <h4>Registrar alumnos al padrón de preselección</h4>
                  <input class="controls" type="text" name="matricula" placeholder="Matricula del preseleccionado">
                    <input class="controls" type="text" name="Nombre_p" placeholder="Nombre del preseleccionado">
                    <input class="controls" type="text" name="programa" placeholder="Programa educativo">
                    <input class="controls" type="text" name="resultado" placeholder="Resultado de las evaluaciones">
                    <h5>Fecha de incorporación al padrón:</h5>
                    <input class="controls" type="date" id="campofecha" name="fecha" placeholder="Fecha de incorporación al padrón">
                    <h5>Seleccione la carrera:</h5>
                    <select class="controls" name="carrera">
                        <option>Ing. Sistemas Computacionales<br></option>
                        <option>Ing. Biomedica<br></option>
                        <option>Ing. Informatica<br></option>
                        <option>Ing. Electronica<br></option>
                        <option>Ing. Ambiental<br></option>
                        <option>Lic. Administracion<br></option>
                        <option>Lic. Arquitectura<br></option>
                    </select>
                    <h5>El estatus predeterminado del alumno será "Dual".</h5>
                    <input class="botons" name="ingresar" type="submit" value="Registrar">
                </form>
            </div>
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
            <div class="usuario"><i class="fas fa-users fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['division'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciodivision.php">Inicio</a></div>
              <div class="items"><i class="far fa-file-alt"></i></i><a href="Padrondivision.php">Padrón</a></div>
              <div class="items"><i class="fas fa-user-graduate"></i><a href="aceptados.php">Aceptados</a></div>
              <div class="items"><i class="fas fa-user-graduate"></i><a href="postulados.php">Postulados</a></div>
               <div class="items"><i class="fas fa-clipboard"></i><a href="listadecotejo.php">Lista de cotejo</a></div>
              <div class="items"><i class="fas fa-chalkboard-teacher"></i><a href="asignacion.php">Asignación</a></div>
              <div class="items"><i class="far fa-file-word"></i><a href="areporte.php">Ver reportes </a></div>
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
    </body>
</html>