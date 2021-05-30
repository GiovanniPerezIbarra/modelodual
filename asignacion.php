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
if(isset($_POST['asignar'])){
      $alumno = trim($_POST['alumno']);
      $sentencia = $conn->prepare('SELECT * FROM padron WHERE Nombre_p = ?;');
      $sentencia->execute([$alumno]);
      $datos = $sentencia->fetch(PDO::FETCH_OBJ);
      $matricula = $datos->matricula;
      $mentor = trim($_POST['mentor']);
      $consulta = "INSERT INTO asignacion(matricula, nombre_alumno, nombre_mentor) VALUES ('$matricula', '$alumno','$mentor')";
        $resultado = $conn->prepare($consulta);
        if($resultado->execute()){
          ?>
          '<script type="text/javascript">
          alert("La asignación se ha realizado exitosamente.");
          window.location.assign("asignacion.php");
          </script>';
          <?php
      } else {
          ?>
          '<script type="text/javascript">
          alert("Ocurrió un error.");
          window.location.assign("asignacion.php");
          </script>';
          <?php
      }
      $sentenciaalumno = $conn->prepare('SELECT * FROM datosalumnos WHERE matricula = ?;');
      $sentenciaalumno->execute([$matricula]);
      $datoscorreo = $sentenciaalumno->fetch(PDO::FETCH_OBJ);
      $correoalumno = $datoscorreo->correo;
      $sentenciamentor = $conn->prepare('SELECT * FROM datostutores WHERE nombre_completo = ?;');
      $sentenciamentor->execute([$mentor]);
      $datoscorreom = $sentenciamentor->fetch(PDO::FETCH_OBJ);
      $correomentor = $datoscorreom->correo;
      try {
              $emailTo = $correoalumno;
              $subject = utf8_decode('Asignación de mentor');
              $body = utf8_decode('Buen día.<br>El mentor que se le fue asignado es: ' . $mentor . '<br>Pongase en contancto con el.<br>Su correo electrónico es: '. $correomentor .'<br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
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
      }try {
              $emailTo = $correomentor;
              $subject = utf8_decode('Asignación de alumno');
              $body = utf8_decode('Buen día.<br>El alumno que se le fue asignado es: ' . $alumno . '<br>Pongase en contancto con el.<br>Su correo electrónico es: '. $correoalumno .'<br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
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
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Asignar mentor</title>
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

    
<main class="main">
 
 <ul>
          
          <li><a href="generaryenviar.php"><span class="material-icons" style="font-size:25px">picture_as_pdf</span>Generar pdf de<br>mentor y enviarlo.
             <li><a href="generaryenviarcarta.php"><span class="material-icons" style="font-size:25px">picture_as_pdf</span>Generar pdf de<br>alumno y enviarlo.
      
      
          </a>
       </li>
         
          
        </ul>
  
  <form class="registro" method="post">
    <h4>Asignar mentor a alumno</h4>
    <h5 >Seleccione el alumno:</h5>
    <?php 
      $sql="SELECT Nombre_p from padron";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="alumno">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo utf8_decode($mostrar['Nombre_p'])?></option>
    <?php
      }
    ?>
    </select>
    <h5 >Seleccione el mentor:</h5>
    <?php 
      $sql="SELECT nombre_completo from datostutores";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="mentor">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo $mostrar['nombre_completo']?></option>
    <?php
      }
    ?>
    </select>
    <input class="botons" name="asignar" type="submit" value="Asignar">
  </form>					


     <h3>Ver alumnos y mentores asignados:<br><br></h3>
    <form class="formulari" method="POST">
      <h4>Alumno:
      <?php 
        $sql="SELECT DISTINCT nombre_alumno FROM asignacion";
          $result=mysqli_query($conexion,$sql);
        ?>
        <select class="control" name="nombre_alumno">
        <?php
          while($mostrar=mysqli_fetch_array($result)){
        ?>
          <option><?php echo $mostrar['nombre_alumno']?></option>
        <?php
          }
        ?>
      </select>
      <button class="boton" name="buscar">Buscar</button></h4>
    </form><br><br>
<?php
  if (isset($_POST['buscar'])) {
    $nombre = $_POST["nombre_alumno"];
    $query = "SELECT * FROM asignacion WHERE nombre_alumno LIKE '%".$nombre."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    ?>
    <table border="1" >
      <p>A S I G N A C I Ó N   2 0 2 1  T E S I</p>
    <tr>
      <th>ALUMNO</th>
      <th>MENTOR</th> 
    </tr>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
          ?>
          
            <tr>
              <td><center><?php echo $mostrar['nombre_alumno'] ?></center></td>
               <td><center><?php echo $mostrar['nombre_mentor'] ?></center></td>
           
        </tr>
      
   
      <?php
    }
    ?>
         </table>
         <?php
       }
}else{
?>
<table border="1" >
  <p>A S I G N A C I Ó N   2 0 2 1  T E S I</p>
    <tr>
      <th>ALUMNO</th>
      <th>MENTOR</th>
    </tr>
<?php 
    $sql="SELECT * from asignacion";
    $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){

     ?>
    <tr>
                      <td><center><?php echo $mostrar['nombre_alumno'] ?></center></td>
               <td><center><?php echo $mostrar['nombre_mentor'] ?></center></td>
           
        </tr>

      

   
  <?php 
}
}
   ?>
  </table> 	
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