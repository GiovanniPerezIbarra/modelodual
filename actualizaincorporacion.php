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
$conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
require 'con_db.php';
$id=$_GET['id'];
if(isset($_POST['ingresar'])){
    if (
        strlen($_POST['matricula']) >= 1 &&
        strlen($_POST['nombre_alumno']) >= 1 &&
        strlen($_POST['nombre_ue']) >= 1 &&
          strlen($_POST['carrera']) >= 1 &&
        strlen($_POST['fecha']) >= 1 &&
        strlen($_POST['semestre']) >= 1){
           $matricula = trim($_POST['matricula']);
            $nombre = trim($_POST['nombre_alumno']);
            $nombre_ue = trim($_POST['nombre_ue']);
            $carrera = trim($_POST['carrera']);
            $fecha = trim($_POST['fecha']);
            $semestre = trim($_POST['semestre']);
            $consulta = $conn->prepare("UPDATE incoporacion SET matricula= '$matricula', nombre_alumno= '$nombre',  nombre_ue='$nombre_ue',  carrera='$carrera', fecha= '$fecha' WHERE id=?;");
                  $consulta->execute([$id]);
            if($consulta->rowCount()==1){
                ?>
                '<script type="text/javascript">
                alert("Se han realizado los cambios exitosamente.");
                window.location.assign("incorporacion.php");
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
        <title>Actualizar alumno de incorporación</title>
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
            <div class="main">
                <form class="registro" method="post">
                  <h4>Actualizar alumnos </h3>
                    <?php 
                      $sql="SELECT * from incoporacion where id='$id'";
                      $result=mysqli_query($conexion,$sql);
                      $row=$result->fetch_assoc();
                    ?>
                    <input class="controls" type="text" name="matricula" placeholder="Ingrese la matricula" value="<?php echo $row['matricula'];?>"/>
                    <input class="controls" type="text" name="nombre_alumno" placeholder="Ingrese el nombre" value="<?php echo $row['nombre_alumno'];?>"/>
                    <input class="controls" type="text" name="nombre_ue" placeholder="Ingrese mentor" value="<?php echo $row['nombre_ue'];?>">
                    <h5>Seleccione su carrera</h5>   
                     <select class="controls" name="carrera">
                        <option>Ing. Sistemas Computacionales</option>
                        <option>Lic. Administracion</option>
                        <option>Lic. Arquitectura</option>
                        <option>Ing. Biomedica</option>
                        <option>Ing. Electronica</option>
                        <option>Ing. Ambiental</option>
                        <option>Ing. Informatica</option>
                    </select>
                    <h5>Fecha de incorporacion al padron</h5> 
                    <input class="controls" type="date" id="campofecha" name="fecha" placeholder="Fecha de incorporación al padrón" value="<?php echo $row['fecha'];?>">
                    <select class="controls" name="semestre" value="<?php echo $row['semestre'];?>">
                        <option>Sexto</option>
                        <option>Septimo</option>
                        <option>Octavo</option>
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