<?php
    session_start();
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    require 'mail/Exception.php';
    require 'mail/OAuth.php';
    include_once 'con_db.php';
    if(!isset($_SESSION['alumno'])){
        header('Location: index.php');
    }elseif(isset($_SESSION['alumno'])){
        $sentencia = $conn->query('SELECT * FROM datosalumnos;');
        $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
    if(isset($_POST["submit"])){
        if (strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['telefono']) >= 1 &&
        strlen($_POST['textarea']) >= 1) {
        $correo = $_POST['correo'];
        $sentencia = $conn->prepare('SELECT * FROM datosalumnos WHERE correo = ?;');
        $sentencia->execute([$correo]);
        $datos = $sentencia->fetch(PDO::FETCH_OBJ);
        $datos2=$datos->matricula;
            $datos3=$datos->nombres;
         $correo1 = $_POST['correoue'];
        $sentencia1 = $conn->prepare('SELECT * FROM convenios WHERE correo = ?;');
        $sentencia1->execute([$correo1]);
        $datos1 = $sentencia1->fetch(PDO::FETCH_OBJ);
    $datos4=$datos1->asociacion;
        if($datos === false){
            echo '<script language="javascript">';
            echo 'alert("El correo ingresado no está asociado a ninguna cuenta.")';
            echo '</script>';
        }elseif($sentencia->rowCount()==1){
                 $consulta = "INSERT INTO alumnoempresa(matricula, nombre_alumno, empresa) VALUES ('$datos2', '$datos3','$datos4')";

        $resultado = $conn->prepare($consulta);
        if($resultado->execute()){
          ?>
          
          <?php
      } else {
          ?>
          '<script type="text/javascript">
          alert("Ocurrió un error.");
          window.location.assign("asignacion.php");
          </script>';
          <?php
      }
                $correoue = $_POST['correoue'];
                $nombre = $_POST['nombre'];
                $telefono = $_POST['telefono'];
                $mensaje = $_POST['textarea'];
                try {
                    $emailTo = $correoue;
                    $subject = utf8_decode('Postulación de alumno para Educación Dual');
                    $body = utf8_decode('Hola, buen día.<br>Es un placer poder saludarlos.<br><br>El alumno ' . $nombre . ', perteneciente al Tecnológico de Estudios Superiores de Ixtapaluca (TESI), desea agendar una cita con motivo de obtener una entrevista para la incorporación al sistema de modelo dual.<br><br>Los datos de contacto del alumno son:<br>Correo: <span style="color:darkred";>' . $correo . '</span><br>Teléfono: <span style="color:darkred";>' . $telefono . '</span><br>Mensaje: "' . $mensaje . '"<br><br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
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
                    $mail->SMTPDebug = 0;
                    if(!$mail->send()){
                        echo '<script language="javascript">';
                        echo 'alert("El correo no pudo ser enviado.")';
                        echo '</script>';
                    }else{
                        ?>
                        '<script type="text/javascript">
                        alert("El correo se envió exitosamente.");
                        window.location.assign("inicioalumno.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
            }        
        }
    }else{
        ?>
        '<script type="text/javascript">
        alert("Hay campos vacíos.");
        window.location.assign("correocita.php");
        </script>';
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Contacto con la empresa</title>
        <link rel="stylesheet" type="text/css" href="css/correocita.css"/>
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
                <form class="formulario" method="POST" enctype="multipart/form-data">
                    <div>
                    <h3>Contactar con la empresa</h3>
                    <input class="controls" type="text" name="nombre" placeholder="Ingrese su nombre completo"/>
                    <input class="controls" type="text" name="correo" placeholder="Ingrese su correo"/>
                    <h5>Seleccione el correo de la empresa:</h5>
                    <?php 
                      $sql="SELECT correo from convenios";
                      $result=mysqli_query($conexion,$sql);
                    ?>
                    <select class="controls" name="correoue">
                    <?php
                      while($mostrar=mysqli_fetch_array($result)){
                    ?>
                      <option><?php echo $mostrar['correo']?></option>
                    <?php
                      }
                    ?>
                    </select>
                    <input class="controls" type="text" name="telefono" placeholder="Ingrese su teléfono"/>
                    <textarea name="textarea" rows="6" cols="50" placeholder="Ingrese su mensaje"></textarea>
                    <input class="botons" type="submit" name="submit" value="Enviar"/>
                    </div>
                </form>
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