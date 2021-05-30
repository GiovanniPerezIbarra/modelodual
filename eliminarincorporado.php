<?php
  session_start();
  if(!isset($_SESSION['empresa'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['empresa'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosempresas;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>
<?php
require 'con_db.php';
$conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
if(isset($_POST['ingresar'])){
            $convenio = trim($_POST['padron']);
            $resultado = $conn->prepare("DELETE FROM incoporacion WHERE nombre_alumno=?;");
            $resultado->execute([$convenio]);
            if($resultado->rowCount()==1){
                ?>
                '<script type="text/javascript">
                alert("El alumno se ha eliminado exitosamente.");
                window.location.assign("incorporacion.php");
                </script>';
                <?php
            } 
            else {
                ?>
                '<script type="text/javascript">
                alert("Ha ocurrido un error.");
                window.location.assign("eliminar.php");
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
        <title>Eliminar alumno de padrón</title>
        <link rel="stylesheet" type="text/css" href="css/subirempresas.css"/>
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
                  <h4>Eliminar alumnos </h4>
                  <h5 >Seleccione el alumno que desea eliminar:</h5>
                  <?php 
                    $sql="SELECT nombre_alumno from incoporacion";
                    $result=mysqli_query($conexion,$sql);
                  ?>
                  <select class="controls" name="padron">
                  <?php
                    while($mostrar=mysqli_fetch_array($result)){
                  ?>
                    <option><?php echo $mostrar['nombre_alumno']?></option>
                  <?php
                    }
                  ?>
                  </select>
                  <input class="botons" name="ingresar" type="submit" value="Eliminar">
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
            <div class="usuario"><i class="fas fa-user-tie fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['empresa'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioempresa.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="documentosconvenio.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-check-double"></i><a href="compe.php">Competencias</a></div>
              <div class="items"><i class="fas fa-envelope"></i><a href="correocarta.php">Enviar correos</a></div>
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