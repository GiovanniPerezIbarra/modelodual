<?php
    session_start();
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    require 'mail/Exception.php';
    require 'mail/OAuth.php';
    include_once 'con_db.php';
    if(!isset($_SESSION['empresa'])){
        header('Location: index.php');
    }elseif(isset($_SESSION['empresa'])){
        $sentencia = $conn->query('SELECT * FROM datosempresas;');
        $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
    if(isset($_POST["submit"])){
        if(strlen($_POST['correo']) >= 1 &&
        strlen($_POST['nombre']) >= 1) {
          if(!empty($_FILES['file']['name'])){
            if(!empty($_FILES['fil']['name'])){

            $pname = rand(1,1000)."-".$_FILES["file"]["name"];
              $pname2 = rand(1,1000)."-".$_FILES["fil"]["name"];

            $destinatario =($_POST['nombre']);
            $remitente =($_POST['correo']);


            $tname = $_FILES["file"]["tmp_name"];
            $uploads_dir = 'archivos';
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            
                $enviararchivo='archivos/'.$pname;

                $tname2 = $_FILES["fil"]["tmp_name"];
            $uploads_dir2 = 'archivos';
            move_uploaded_file($tname2, $uploads_dir2.'/'.$pname2);
            
                $enviararchivo2='archivos/'.$pname2;

                try {

                    $emailTo = $destinatario;
                    $subject = utf8_decode('Carta de aceptacion por parte de la UE y plan de rotación');
                    $body = utf8_decode('Buen día, un placer saludarte, me comunico con usted para hacer la entrega de la carta de aceptación por parte de la UE, estamos muy ansiosos de que sea parte de nuestra comunidad, asi mismo adjunto el plan de rotacion que ofrece la empresa. Pongase en contacto a este correo, para cualquier duda o aclaración: ' .$remitente.' <br><br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
                    $fromemail = 'modelodual21@gmail.com';
                    $fromname = utf8_decode('Eduación DUAL');
                    $passwordemail = 'Modelo2021Dual';
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;                                  
                    $mail->Host = 'smtp.gmail.com';                           
                    $mail->Port = 465; 
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
                     $mail->addAttachment($enviararchivo2);
                    if(!$mail->send()){
                        echo '<script language="javascript">';
                        echo 'alert("El correo no pudo ser enviado.")';
                        echo '</script>';
                    }else{
                        ?>
                        '<script type="text/javascript">
                        alert("El correo se envió exitosamente.");
                        window.location.assign("inicioempresa.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
            } 
            
  }else{
            ?>
            '<script type="text/javascript">
            alert("faltan archivos.");
            window.location.assign("correocarta.php");
            </script>';
            <?php
        }
    }else{
            ?>
            '<script type="text/javascript">
            alert("Faltan archivo.");
            window.location.assign("correocarta.php");
            </script>';
            <?php
        }
        }else{
            ?>
            '<script type="text/javascript">
            alert("No se seleccionó ningún archivo.");
            window.location.assign("correocarta.php");
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
        <title>Contacto con alumno</title>
        <link rel="stylesheet" type="text/css" href="css/correocarta.css"/>
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
                    <h3>Contactar con alumno</h3>
                    <input class="controls" type="text" name="nombre" placeholder="Ingrese el correo destinatario"/>
                    <input class="controls" type="text" name="correo" placeholder="Ingrese un correo de contacto"/>
                    
                  
                    <input class="controls" type="file" name="file" >
                    <input class="controls" type="file" name="fil" >
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
            <div class="usuario"><i class="fas fa-user-tie fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['empresa'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioempresa.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="vermanual.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-check-double"></i><a href="descargaralumno.php">Competencias</a></div>
              <div class="items"><i class="fas fa-envelope"></i><a href="correocarta.php">Enviar correos</a></div>
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