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
$conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
require 'con_db.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
require 'mail/Exception.php';
require 'mail/OAuth.php';
 if(isset($_POST["submit"])){
        if( strlen($_POST['nombre']) >= 1) {
          if(!empty($_FILES['file']['name'])){
         

            $pname = rand(1,1000)."-".$_FILES["file"]["name"];
              

            $destinatario =($_POST['nombre']);
         


            $tname = $_FILES["file"]["tmp_name"];
            $uploads_dir = 'archivos';
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            
                $enviararchivo='archivos/'.$pname;

             

                try {

                    $emailTo = $destinatario;
                    $subject = utf8_decode('Oficio Mentor');
                    $body = utf8_decode('Buen día, un placer saludarl@, me comunico con usted para hacer la entrega del documento oficial  que avala la asignación y el compromiso al ser  mentor acedémico. Sin más por el momento, reciba un cordial saludo
<br><br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
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
                        window.location.assign("asignacion.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
            } 
            
  }
    }else{
            ?>
            '<script type="text/javascript">
            alert("Faltan archivos.");
            window.location.assign("generayenviar.php");
            </script>';
            <?php
        }
        }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Generar y enviar oficio</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/asignacion2.css"/>
    <link rel="stylesheet" type="text/css" href="fonts.css"/>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="hojas-estilo/estilos.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Archivos de estilo-->
    
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="scripts/main.js"></script>

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
            <div class="usuario"><i class="fas fa-users fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['division'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciodivision.php">Inicio</a></div>
              <div class="items"><i class="far fa-file-alt"></i></i><a href="Padrondivision.php">Padrón</a></div>
              <div class="items"><i class="fas fa-user-graduate"></i><a href="aceptados.php">Aceptados</a></div>
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
  
<main class="main">
 
  <form target="_blank" class="registro" method="post" action='ex1.php'>
    <h4>Generar oficio</h4>
    <h5 >Seleccione mentor:</h5>
    <?php 
      $sql="SELECT nombre_completo from datostutores";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="mentor">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo utf8_decode($mostrar['nombre_completo'])?></option>
    <?php
      }
    ?>
    </select>
    <h5 >Seleccione la carrera:</h5>
    <?php 
      $sql="SELECT DISTINCT carrera from datostutores";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="carrera">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo $mostrar['carrera']?></option>
    <?php
      }
    ?>
    </select>
    <input class="controls" type="text" name="fecha" placeholder="Ingrese la fecha" id="campofecha">
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
            $( function() {
              $( "#campofecha" ).datepicker({
                numberOfMonths: 2,
                showButtonPanel: true
              });
            } );
            </script>
    <input class="botons" name="generar" type="submit" value="Generar">
  </form>					

                <form class="registro" method="POST" enctype="multipart/form-data">
                    <div>
                    <h4>Contactar con mentor</h4>
                   <h5 >Seleccione el correo del mentor:</h5>

                    <?php 
      $sql="SELECT correo from datostutores";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="nombre">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo utf8_decode($mostrar['correo'])?></option>
    <?php
      }
    ?>
    </select>

                   
                    
  <h5 >Seleccione el archivo:</h5>
                  
                    <input class="controls" type="file" name="file" >
                  
                    <input class="botons" type="submit" name="submit" value="Enviar"/>
                    </div>
                </form>     


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