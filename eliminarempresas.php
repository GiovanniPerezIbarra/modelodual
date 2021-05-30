<?php
    session_start();
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
require 'con_db.php';
if(isset($_POST['eliminar'])){
  $convenio = $_POST["convenio"];
  $resultado = $conn->prepare("DELETE FROM convenios WHERE asociacion=?;");
  $resultado->execute([$convenio]);
  if($resultado->rowCount()==1){
      ?>
      '<script type="text/javascript">
      alert("Los datos se han eliminado exitosamente.");
      window.location.assign("iniciovinculacion.php");
      </script>';
      <?php
  } else {
      ?>
      '<script type="text/javascript">
      alert("Ocurrió un error.\nVuelva a intentarlo.");
      window.location.assign("iniciovinculacion.php");
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
        <title>Eliminar convenios</title>
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
    <body class="grid-container">
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <img src="img/tesi.png" alt="">
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <div class="main">
                <form class="registro" method="post">
                    <h4>Eliminar convenio<p></h4>
                    <h5 >Seleccione la UE que desea eliminar:</h5>
                    <?php 
                      $sql="SELECT asociacion from convenios";
                      $result=mysqli_query($conexion,$sql);
                    ?>
                    <select class="controls" name="convenio">
                    <?php
                      while($mostrar=mysqli_fetch_array($result)){
                    ?>
                      <option><?php echo $mostrar['asociacion']?></option>
                    <?php
                      }
                    ?>
                    </select>
                    <input class="botons" name="eliminar" type="submit" value="Eliminar">
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
    </body>
</html>