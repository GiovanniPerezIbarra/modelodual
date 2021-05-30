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
$id=$_GET['id'];
if(isset($_POST['ingresar'])){
    if (
        strlen($_POST['matricula']) >= 1 &&
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['programa']) >= 1 &&
        strlen($_POST['resultado']) >= 1 &&
        strlen($_POST['fecha']) >= 1) {
            $matricula = trim($_POST['matricula']);
            $nombre = trim($_POST['nombre']);
            $programa = trim($_POST['programa']);
            $resultado = trim($_POST['resultado']);
            $fecha = trim($_POST['fecha']);
            $carrera = $_POST['carrera'];
            $consulta = $conn->prepare("UPDATE padron SET matricula='$matricula', Nombre_p= '$nombre', programa= '$programa',  resultado= '$resultado', fecha= '$fecha', carrera='$carrera' WHERE id=?;");
            $consulta->execute([$id]);
            if($consulta->rowCount()==1){
                ?>
                '<script type="text/javascript">
                alert("Se han realizado los cambios exitosamente.");
                window.location.assign("verpadron.php");
                </script>';
                <?php
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
        <title>Actualizar alumno de padrón</title>
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
                  <h4>Actualizar alumnos del padron de preseleccion</h3>
                    <?php 
                      $sql="SELECT * from padron where id='$id'";
                      $result=mysqli_query($conexion,$sql);
                      $row=$result->fetch_assoc();
                    ?>  
                    <input class="controls" type="text" name="matricula" placeholder="Matricula del preseleccionado" value="<?php echo $row['matricula'];?>">
                    <input class="controls" type="text" name="nombre" placeholder="Nombre del preseleccionado" value="<?php echo $row['Nombre_p'];?>">
                    <input class="controls" type="text" name="programa" placeholder="Programa educativo" value="<?php echo $row['programa'];?>">
                    <input class="controls" type="text" name="resultado" placeholder="Resultado de evaluaciones" value="<?php echo $row['resultado'];?>">
                    <input class="controls" type="date" id="campofecha" name="fecha" placeholder="Fecha de incorporación al padrón" value="<?php echo $row['fecha'];?>">
                    <h5>Seleccione la carrera:</h5>
                    <select class="controls" name="carrera">
                         <option>Ing.  Sistemas Computacionales<br></option>
                  <option>Ing. Biomedica<br></option>
                  <option>Ing. Informatica<br></option>
                  <option>Ing. Electronica<br></option>
                  <option>Ing. Ambiental<br></option>
                  <option>Lic. Administracion<br></option>
                  <option>Lic. Arquitectura<br></option>
                    </select>
                    <input class="botons" name="ingresar" type="submit" value="Actualizar">
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