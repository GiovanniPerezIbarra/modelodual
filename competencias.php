<?php
  session_start();
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    require 'mail/Exception.php';
    require 'mail/OAuth.php';
  if(!isset($_SESSION['vinculacion'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['vinculacion'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosvinculacion;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>

<?php 
  $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
 if(isset($_POST["enviar"])){
        if (strlen($_POST['correoue']) >= 1 &&
        strlen($_POST['correovin']) >= 1){
        $correoue = $_POST['correoue'];
        $correovin = $_POST['correovin'];
        $mensaje = $_POST['textarea'];
              try {
                    $emailTo = $correoue;
                    $subject = utf8_decode('Aprobación de convenio');
                    $body = utf8_decode('Hola, buen día.<br>Es un placer poder saludarlos.<br><br>El Departamento de Gestión Tecnológica perteneciente al Tecnológico de Estudios Superiores de Ixtapaluca (TESI), ha aprobado tu solicitud y desea agendar una cita para la firma de convenio con motivo de obtener un acuerdo para establecer las condiciones y clausulas que se deben de conocer y cumplir.<br><br>Los datos de contacto del Departamento de Gestión Tecnológica :<br>Correo: <span style="color:darkred";>' . $correovin .'</span><br>Mensaje: "' . $mensaje . '"<br><br><p style="color:darkgreen";>Este mensaje fue enviado automáticamente, no responder a este correo.</p>');
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
                        window.location.assign("competencias.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
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
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Ver competencias</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/competencias.css"/>
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
            <div class="usuario"><a>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['vinculacion'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciovinculacion.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="subirempresas.php">Agregar</a></div>
              <div class="items"><i class="fas fa-edit"></i><a href="editarempresas.php">Editar</a></div>
              <div class="items"><i class="fas fa-trash-alt"></i><a href="eliminarempresas.php">Eliminar</a></div>
              <div class="items"><i class="fas fa-eye"></i><a href="verempresas.php">Ver</a></div>
              <div class="items"><i class="fas fa-book"></i><a href="competencias.php">Competencias</a></div>
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
    <h3>Ver competencias :<br><br></h3>
    <form class="registro" method="post">
    <h4>Enviar correo de aprobación</h4>
    <h5 >Seleccione el correo:</h5>
    <?php 
      $sql="SELECT correo from datosempresas";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="correoue">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo utf8_decode($mostrar['correo'])?></option>
    <?php
      }
    ?>
    </select>
    <?php 
      $sql="SELECT correo from datosvinculacion";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="correovin">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo $mostrar['correo']?></option>
    <?php
      }
    ?>
    </select>
    <textarea name="textarea" rows="5" cols="50" placeholder="Ingrese su mensaje"></textarea>
    <input class="botons" name="enviar" type="submit" value="Enviar">
  </form>         


     <h3>Ver competencias de la UE:<br><br></h3>
    <form class="formulari" method="POST">
      <h4>RFC:
      <?php 
        $sql="SELECT rfc FROM compemp";
          $result=mysqli_query($conexion,$sql);
        ?>
        <select class="control" name="rfc">
        <?php
          while($mostrar=mysqli_fetch_array($result)){
        ?>
          <option><?php echo $mostrar['rfc']?></option>
        <?php
          }
        ?>
      </select>
      <button class="boton" name="buscar">Buscar</button></h4>
    </form><br><br>
<?php
  if (isset($_POST['buscar'])) {
    $rfc = $_POST["rfc"];
    $query = "SELECT * FROM compemp WHERE rfc LIKE '%".$rfc."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    ?>
    <table border="1" >
      <p>C O M P E T E N C I A S   2 0 2 1  T E S I</p>
    <tr>
      <th>RFC</th>
      <th>ARCHIVO</th> 
    </tr>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
          $ruta='archivosempresas/'.$mostrar['rfc'].'/'.$mostrar['archivo'];
          ?>
          
            <tr>
              <td><center><?php echo $mostrar['rfc'] ?></center></td>
              <td><a  target="_blank" href=<?php echo $ruta ?>><center><?php echo 'archivo' ?></center></a></td>

           
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
  <p>C O M P E T E N C I A S   2 0 2 1  T E S I</p>
    <tr>
      <th>RFC</th>
      <th>ARCHIVO</th> 
    </tr>
<?php 
    $sql="SELECT * from compemp";
    $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){

     $ruta='archivosempresas/'.$mostrar['rfc'].'/'.$mostrar['archivo'];
          ?>
          
            <tr>
              <td><center><?php echo $mostrar['rfc'] ?></center></td>
              <td><a  target="_blank" href=<?php echo $ruta ?>><center><?php echo 'archivo' ?></center></a></td>
               
           
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