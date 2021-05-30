<?php
	session_start();
	if(!isset($_SESSION['aceptado'])){
		header('Location: index.php');
	}elseif(isset($_SESSION['aceptado'])){
		include 'con_db.php';
		$sentencia = $conn->query('SELECT * FROM padron;');
		$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	}
  $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Ver calificacion</title>
        <link rel="stylesheet" type="text/css" href="css/calialum.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <style>
         body {
      background-image: url("img/fondotesi.png");
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
            <h3><br>Ver mentor:<br><br><br></h3>
      <?php 
?>
<table border="1" >
    <tr>
      <th>MATRICULA</th>
      <th>NOMBRE</th>
      <th>MENTOR</th>
    </tr>
<?php 
    $sql="SELECT * from asignacion where matricula=".$_SESSION['yo']."";
      $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
     ?><tr>
        <td><center><?php echo $mostrar['matricula'] ?></center></td>
        <td><center><?php echo $mostrar['nombre_alumno'] ?></center></td>
        <td><center><?php echo $mostrar['nombre_mentor'] ?></center></td>
      </tr>
  <?php 
}
   ?>
  </table> 
      	    <br><br><h3>Ver calificaciones:<br><br><br></h3>
      <?php 
?>
<table border="1" >
    <tr>
      <th>MATRICULA</th>
      <th>NOMBRE</th>
      <th>PARCIAL</th>
      <th>CALIFICACION</th>
    </tr>
<?php 
    $sql="SELECT * from calificaciones where matricula=".$_SESSION['yo']."";
      $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
     ?><tr>
              <td><center><?php echo $mostrar['matricula'] ?></center></td>
              <td><center><?php echo $mostrar['nombre'] ?></center></td>
              <td><center><?php echo $mostrar['parcial'] ?></center></td>
              <td><center><?php echo $mostrar['calificacion'] ?></center></td>
            </tr>
  <?php 
}
   ?>
  </table>  
  </div>
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
            <div class="usuario"><i class="fas fa-user-check fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['aceptado'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="inicioaceptado.php">Inicio</a></div>
              <div class="items"><i class="fas fa-upload"></i><a href="subircartas.php">Subir archivos</a></div>
              <div class="items"><i class="fas fa-file-pdf"></i><a href="reportesaceptado.php">Subir reportes</a></div>
              <div class="items"><i class="fas fa-eye"></i><a href="vercalificaciones.php">Ver mentor y calificaciones</a></div>
              <div class="items"><i class="fas fa-sign-out-alt"></i><a href="logout.php">Cerrar sesión</a></div>
            </div>
          </div>
     </div>
    </div>
  </div>
</navbar>
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