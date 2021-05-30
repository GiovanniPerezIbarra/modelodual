<?php
  session_start();
  if(!isset($_SESSION['alumno'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['alumno'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datosalumnos;');
    $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  }
?>
<?php 
  $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Ver convenios</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/convenio.css"/>
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
            <div class="usuario"><i class="fas fa-user-lock fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['alumno'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioalumno.php">Inicio</a></div>
              <div class="items"><i class="fas fa-book-reader"></i><a href="vermanual.php">Ver lineamiento</a></div>
              <div class="items"><i class="fas fa-download"></i><a href="descargaralumno.php">Bajar archivos</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="subiralumno.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-building"></i><a href="verconvenios.php">Ver convenios</a></div>
              <div class="items"><i class="fas fa-mail-bulk"></i><a href="correocita.php">Contactar UE</a></div>
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
    <h3>Ver convenios vigentes:<br><br></h3>
    <form method="POST">
      <select class="controls" name="carrera">
        <option>ING. EN SISTEMAS</option>
        <option>ING. INFORMATICA</option>
        <option>ING. BIOMEDICA</option>
        <option>ING. ELECTRONICA</option>
        <option>ING. AMBIENTAL</option>
        <option>ARQUITECTURA</option>
        <option>ADMINISTRACION</option>
      </select>
      <button class="boton" name="buscar">Buscar</button>
    </form><br><br>
<?php
  if (isset($_POST['buscar'])) {
    //Recogemos las claves enviadas
    $carrera = $_POST["carrera"];
    $query = "SELECT * FROM convenios WHERE carrera LIKE '%".$carrera."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    ?>
    <table border="1" >
  <p>C O N V E N I O S  V I G E N T E S  2 0 2 1  T E S I<p>
    <tr>
      <th>ASOCIACIÓN</th>
      <th>PRESTACIÓN</th>
      <th>VIGENCIA</th>
      <th>UBICACIÓN</th>
      <th>SUSCRIPTOR</th> 
      <th>CARGO</th>
      <th>CARRERA</th>
      <th>CORREO ELECTRONICO</th>  
    </tr>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
            ?>
            <tr>
              <td><center><?php echo $mostrar['asociacion'] ?></center></td>
              <td><center><?php echo $mostrar['prestacion'] ?></center></td>
              <td><center><?php echo $mostrar['vigencia'] ?></center></td>
              <td><center><?php echo $mostrar['ubicacion'] ?></center></td>
              <td><center><?php echo $mostrar['suscriptor'] ?></center></td>
              <td><center><?php echo $mostrar['cargo'] ?></center></td>
              <td><center><?php echo $mostrar['carrera'] ?></center></td>
              <td><center><?php echo wordwrap($mostrar['correo'], 10, "<br>", true); ?></center></td>
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
  <p>C O N V E N I O S  V I G E N T E S  2 0 2 1  T E S I<p>
    <tr>
      <th>ASOCIACIÓN</th>
      <th>PRESTACIÓN</th>
      <th>VIGENCIA</th>
      <th>UBICACIÓN</th>
      <th>SUSCRIPTOR</th> 
      <th>CARGO</th>
      <th>CARRERA</th> 
      <th>CORREO ELECTRONICO</th> 
    </tr>
<?php 
    $sql="SELECT * from convenios";
    $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
     ?>
    <tr>
      <td><center><?php echo $mostrar['asociacion'] ?></center></td>
      <td><center><?php echo $mostrar['prestacion'] ?></center></td>
      <td><center><?php echo $mostrar['vigencia'] ?></center></td>
      <td><center><?php echo $mostrar['ubicacion'] ?></center></td>
      <td><center><?php echo $mostrar['suscriptor'] ?></center></td>
      <td><center><?php echo $mostrar['cargo'] ?></center></td>
      <td><center><?php echo $mostrar['carrera'] ?></center></td>
      <td><center><?php echo wordwrap($mostrar['correo'], 10, "<br>", true); ?></center></td>
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