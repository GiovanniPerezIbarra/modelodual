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
if(isset($_POST['register'])){
    if (strlen($_POST['matricula']) >= 1 &&
        strlen($_POST['nombres']) >= 1 &&
        strlen($_POST['nombre_ue']) >= 1 &&
          strlen($_POST['carrera']) >= 1 &&
        strlen($_POST['fecha']) >= 1 &&
        strlen($_POST['semestre']) >= 1){
           $matricula = trim($_POST['matricula']);
            $nombres = trim($_POST['nombres']);
            $nombre_ue = trim($_POST['nombre_ue']);
            $carrera = trim($_POST['carrera']);
            $fecha = trim($_POST['fecha']);
            $semestre = trim($_POST['semestre']);
            $consulta = "INSERT INTO incoporacion  (matricula, nombre_alumno, nombre_ue,  carrera, fecha, semestre) VALUES ('$matricula','$nombres','$nombre_ue','$carrera','$fecha','$semestre')";     
           $resultado = $conn->prepare($consulta);
                    if($resultado->execute()){
                        ?>
                        '<script type="text/javascript">
                        alert("El registro se ha realizado exitosamente.\nPorfavor, inicie sesión.");
                        window.location.assign("incorporacion.php");
                        </script>';
                        <?php
                    }
                       else{
                        echo '<script language="javascript">';
                        echo 'alert("ocurrio un error")';
                        echo '</script>';
                        }
          } else{
                        echo '<script language="javascript">';
                        echo 'alert("Hay campos vacíos")';
                        echo '</script>';
            } 
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Incorporación </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/calen.css"/>
    <link rel="stylesheet" type="text/css" href="css/asignacion.css"/>
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
<main class="main">
  <form class="registro" method="post">
                    <h4>Incoporación de Alumno</h4>
                    <input class="controls" type="text" name="matricula" placeholder="Ingrese la matricula">
                    <input class="controls" type="text" name="nombres" placeholder="Ingrese el nombre del estudiante">
                    <input class="controls" type="text" name="nombre_ue" placeholder="Ingrese mentor">
               
                    <h5>Seleccione la carrera</h5>   
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
                    <input class="controls" type="date" id="campofecha" name="fecha" placeholder="Fecha de incorporación al padrón">
                    <select class="controls" name="semestre">
                        <option>Sexto</option>
                        <option>Septimo</option>
                        <option>Octavo</option>
                    </select>
                    <input class="botons" name="register" type="submit" value="Registrar"> 
                </form>
     <h3><br>Ver alumnos incorporados:<br></h3>
    <form class="formulari" method="POST">
      <h4>Alumno:
      <?php 
        $sql="SELECT DISTINCT nombre_alumno FROM incoporacion";
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
    $query = "SELECT * FROM incoporacion WHERE nombre_alumno LIKE '%".$nombre."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    ?>
    <table border="1" >
      <p>I N C O R P O R A C I Ó N  D E  A L U M N O S </p>
    <tr>
      <th>MATRICULA</th>
      <th>ALUMNO</th>
      <th>MENTOR</th>
      <th>CARRERA</th>
      <th>FECHA</th>
      <th>SEMESTRE</th>
      <th>EDITAR</th>
      <th>ELIMINAR</th

    </tr>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
          ?>
          
            <tr>
              <td><center><?php echo $mostrar['matricula'] ?></center></td> 
              <td><center><?php echo $mostrar['nombre_alumno'] ?></center></td>
              <td><center><?php echo $mostrar['nombre_ue'] ?></center></td>
               <td><center><?php echo $mostrar['carrera'] ?></center></td>
              <td><center><?php echo $mostrar['fecha'] ?></center></td>
              <td><center><?php echo $mostrar['semestre'] ?></center></td>
                <td><a href="actualizaincorporacion.php?id=<?php echo $mostrar['id'];?>" style="text-decoration:none"><button class="boton1">
         Editar</button></a></td>
      <td><a href="eliminarincorporado.php" style="text-decoration:none"><button class="boton1">
        Eliminar</button></a></td>
              
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
  <p>I N C O R P O R A C I Ó N   D E  A L U M N O S  </p>
    <tr>

      <th>MATRICULA</th>
      <th>ALUMNO</th>
      <th>MENTOR</th>
      <th>CARRERA</th>
      <th>FECHA</th>
      <th>SEMESTRE</th>
      <th>EDITAR</th>
      <th>ELIMINAR</th

    </tr>
<?php 
    $sql="SELECT * from incoporacion";
    $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){

     ?>
    <tr>
      <td><center><?php echo $mostrar['matricula'] ?></center></td> 
              <td><center><?php echo $mostrar['nombre_alumno'] ?></center></td>
              <td><center><?php echo $mostrar['nombre_ue'] ?></center></td>
               <td><center><?php echo $mostrar['carrera'] ?></center></td>
              <td><center><?php echo $mostrar['fecha'] ?></center></td>
              <td><center><?php echo $mostrar['semestre'] ?></center></td>
     <td><a href="actualizaincorporacion.php?id=<?php echo $mostrar['id'];?>" style="text-decoration:none"><button class="boton1">
         Editar</button></a></td>
      <td><a href="eliminarincorporado.php" style="text-decoration:none"><button class="boton1">
        Eliminar</button></a></td>    
          
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
<script>
  
  function typeEffect(element, speed) {
  var text = element.innerHTML;
  element.innerHTML = "";
  
  var i = 0;
  var timer = setInterval(function() {
    if (i < text.length) {
      element.append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}


// application
var speed = 75;
var h1 = document.querySelector('h1');
var p = document.querySelector('p');
var delay = h1.innerHTML.length * speed + speed;

// type affect to header
typeEffect(h1, speed);


// type affect to body
setTimeout(function(){
  p.style.display = "inline-block";
  typeEffect(p, speed);
}, delay);

</script>