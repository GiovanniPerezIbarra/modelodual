<?php
  session_start();
  if(!isset($_SESSION['mentor'])){
    header('Location: index.php');
  }elseif(isset($_SESSION['mentor'])){
    include 'con_db.php';
    $sentencia = $conn->query('SELECT * FROM datostutores;');
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
    <title>Ver calificaciones</title>
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
             <div class="usuario"><i class="fas fa-user-edit
"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['mentor'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciomentor.php">Inicio</a></div>
              <div class="items"><i class="far fa-file-alt"></i></i><a href="subirmentor.php"> Seguimiento y evaluación</a></div>
               <div class="items"><i class="fas fa-clipboard"></i><a href="ingresacali.php">Subir calificaciones</a></div>
              <div class="items"><i class="fas fa-chalkboard-teacher"></i><a href="vercali.php">Ver calificaciones</a></div>
              <div class="items"><i class="far fa-file-word"></i><a href="verreportesm.php">Ver reportes</a></div>
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
    <h3>Ver calificaciones :<br><br></h3>
    <form class="formulario" method="POST">
      <h4>Nombre:
      <?php 
        $sql= "SELECT DISTINCT nombre_alumno FROM asignacion WHERE nombre_mentor='".$_SESSION['mentor']."'";
          $result2=mysqli_query($conexion,$sql);
        ?>
        <select class="controls" name="nombre">
        <?php
          while($mostrar2=mysqli_fetch_array($result2)){
        ?>
          <option><?php echo $mostrar2['nombre_alumno']?></option>
        <?php
          }
        ?>
      </select>
      <button class="boton" name="buscar">Buscar</button>
    </h4>
    </form><br><br>
    <?php
  if (isset($_POST['buscar'])) {
    //Recogemos las claves enviadas
    $nombre = $_POST["nombre"];
    $query = "SELECT * FROM calificaciones WHERE nombre LIKE '%".$nombre."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    ?>
    <table border="1" >
  <p>C A L I F I C A C I O N E S  A L U M N O S  2 0 2 1  T E S I<p>
    <tr>
      <th>MATRICULA</th>
      <th>NOMBRE</th>
      <th>PARCIAL</th>
      <th>CALIFICACION</th>
    </tr>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
            ?>
            <tr>
              <td><center><?php echo $mostrar['matricula'] ?></center></td>
              <td><center><?php echo $mostrar['nombre'] ?></center></td>
              <td><center><?php echo $mostrar['parcial'] ?></center></td>
              <td><center><?php echo $mostrar['calificacion'] ?></center></td>
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
  <p>C A L I F I C A C I O N E S  A L U M N O S  2 0 2 1  T E S I<p>
    <tr>
      <th>MATRICULA</th>
      <th>NOMBRE</th>
      <th>PARCIAL</th>
      <th>CALIFICACION</th>
    </tr>
<?php 
    $men = "SELECT nombre_alumno FROM asignacion WHERE nombre_mentor='".$_SESSION['mentor']."'";
         $result=mysqli_query($conexion,$men);
while($mostrar=mysqli_fetch_array($result)){
        $sql= "SELECT * FROM calificaciones where nombre = '".$mostrar['nombre_alumno']."'";
          $result2=mysqli_query($conexion,$sql);
while($mostrar2=mysqli_fetch_array($result2)){
     ?><tr>
              <td><center><?php echo $mostrar2['matricula'] ?></center></td>
              <td><center><?php echo $mostrar2['nombre'] ?></center></td>
              <td><center><?php echo $mostrar2['parcial'] ?></center></td>
              <td><center><?php echo $mostrar2['calificacion'] ?></center></td>
            </tr>
  <?php 
}
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