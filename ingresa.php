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
if(isset($_POST['ingresar'])){
    if (strlen($_POST['Nombre_p']) >= 1 &&
        strlen($_POST['programa']) >= 1 &&
        strlen($_POST['resultado']) >= 1 &&
        strlen($_POST['fecha']) >= 1) {
            $Nombre_p = trim($_POST['Nombre_p']);
            $programa = trim($_POST['programa']);
            $resultado = trim($_POST['resultado']);
            $fecha = trim($_POST['fecha']);
            $carrera = $_POST['carrera'];
            $json = json_encode($carrera, true);
            $consulta = "INSERT INTO padron(Nombre_p, programa,  resultado, fecha, carrera) VALUES ('$Nombre_p','$programa','$resultado','$fecha','$json')";


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
                alert("El alumno ingresados ya están registrados.");
                window.location.assign("ingresa.php");
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
        <title>Inicio</title>
        <link rel="stylesheet" type="text/css" href="css/iniciovinculacion.css"/>
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
                    <h4>Ingresar alumnos en padron de preseleccion</h4>
                    <input class="controls" type="text" name="Nombre_p" placeholder="Nombre del preseleccionado">
                    <input class="controls" type="text" name="programa" placeholder="Progrma educativo">
                    <input class="controls" type="text" name="resultado" placeholder="Resultado de evaluaciones">
                    <input class="controls" type="text" name="fecha" placeholder="fecha de incorporación al padron">
                    <h5>Seleccione la carrera:</h5>
                    <select multiple="multiple" class="controls" name="carrera[]" size="7">
                        <option>ING. EN SISTEMAS<br></option>
                        <option>ING. BIOMEDICA<br></option>
                        <option>ING. INFORMATICA<br></option>
                        <option>ING. ELECTRONICA<br></option>
                        <option>ING. AMBIENTAL<br></option>
                        <option>LIC. EN ADMINISTRACION<br></option>
                        <option>LIC. EN ARQUITECTURA<br></option>
                    </select>
                    <input class="botons" name="ingresar" type="submit" value="Ingresar">
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