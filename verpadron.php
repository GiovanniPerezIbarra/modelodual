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
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Padrón de preseleccionados</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/alum-mentor.css"/>
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


 <main class="main">
    <h3>Alumnos inscritos:<br><br></h3>
    <ul class="boto">
    <form method="POST">
      <select class="controls" name="carrera">
          <option>Ing.  Sistemas Computacionales<br></option>
          <option>Ing. Biomedica<br></option>
          <option>Ing. Informatica<br></option>
          <option>Ing. Electronica<br></option>
          <option>Ing. Ambiental<br></option>
          <option>Lic. Administracion<br></option>
          <option>Lic. Arquitectura<br></option>
      </select>
      <button class="boton" name="buscar">Buscar</button>

    </form><br><br>
    <p>SELECCIONE LA CARRERA A IMPRIMIR</p>
          <br>
            <a href="alumnosistemas.php" target="_blank" style="text-decoration:none"> <button  class="custom-btn btn-12"><span>Generar PDF</span><span>Ing. Sistemas</span></button><a>

            <a href="alumnoambiental.php" target="_blank" style="text-decoration:none"><button class="custom-btn btn-12"><span>Generar PDF</span><span>Ing. Ambiental</span></button> </a>

            <a href="alumnoinformatica.php" target="_blank" style="text-decoration:none"><button class="custom-btn btn-12"><span>Generar PDF</span><span>Ing. Informática</span></button></a>

            <a href="alumnoadministracion.php" target="_blank" style="text-decoration:none">
           <button class="custom-btn btn-12"><span>Generar PDF</span><span>Lic. Administración</span></button></a>

            <a href="alumnoarquitectura.php" target="_blank" style="text-decoration:none"><button class="custom-btn btn-12"><span>Generar PDF</span><span>Lic. Arquitectura</span></button></a>

            <a href="alumnobiomedica.php" target="_blank" style="text-decoration:none"> <button class="custom-btn btn-12"><span>Generar PDF</span><span>Ing. Biomédica</span></button></a>

            <a href="alumnoelectronica.php" target="_blank" style="text-decoration:none">
            <button class="custom-btn btn-12" ><span>Generar PDF</span><span>Ing. Electrónica</span></button></a>

  <table border=1 class='tabla_datos'>

<?php
  if (isset($_POST['buscar'])) {
    //Recogemos las claves enviadas
    $carrera = $_POST["carrera"];
    $query = "SELECT * FROM padron WHERE carrera LIKE '%".$carrera."%'";
    $query_searched = mysqli_query($conexion,$query);
    $count_results = mysqli_num_rows($query_searched);
    $_SESSION['buscar'] = 1;
    ?>

    <p>PADRÓN DE PRESELECCIONADOS <p>

  	<thead>
   <tr id='titulo'> 
    <td>MATRICULA</td>
          <td>NOMBRE</td>
          <td>PROGRAMA EDUCATIVO</td>
          <td>RESULTADO DE EVALUACIONES</td>
          <td>FECHA INICIO</td>
          <td>CARRERA</td>
          <td>ESTATUS</td>
          <td>CAMBIAR ESTATUS</td>  
          <td>EDITAR</td>
               </tr>
</thead>
    <?php
    //Si ha resultados
    if ($count_results > 0) {
        while ($mostrar = mysqlI_fetch_array($query_searched)) {
            ?>
     <tr>
      <td><center><?php echo $mostrar['matricula'] ?></center></td>
      <td><center><?php echo $mostrar['Nombre_p'] ?></center></td>
      <td><center><?php echo $mostrar['programa'] ?></center></td>
      <td><center><?php echo $mostrar['resultado'] ?></center></td>
      <td><center><?php echo $mostrar['fecha'] ?></center></td>
      <td><center><?php echo $mostrar['carrera'] ?></center></td>
      <td><center><?php echo $mostrar['estatus'] ?></center></td>
      <td><a href="cambiarestatus.php" style="text-decoration:none"><button class="boton1">
        Cambiar</button></a></td>
        <td><a href="actualiza.php?id=<?php echo $mostrar['id'];?>" style="text-decoration:none"><button class="boton1">
         Editar</button></a></td>
    </tr>
            </tr>        
          <?php 
        }
        ?>
        </table>
        <?php
    }
}else{
?>
<table border=1 class='tabla_datos'>
  <br>
 <p>PADRÓN DE PRESELECCIONADOS <p>
  	<thead>
   <tr id='titulo'>
        <td>MATRICULA</td>
          <td>NOMBRE</td>
          <td>PROGRAMA EDUCATIVO</td>
          <td>RESULTADO DE EVALUACIONES</td>
          <td>FECHA INICIO</td>
          <td>CARRERA</td>
          <td>ESTATUS</td>
          <td>CAMBIAR ESTATUS</td>  
          <td>EDITAR</td>
</tr>                  
</thead>
<?php 
    $sql="SELECT * from padron";
    $result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
     ?>
    <tr>

      <td><center><?php echo $mostrar['matricula'] ?></center></td>
      <td><center><?php echo $mostrar['Nombre_p'] ?></center></td>
      <td><center><?php echo $mostrar['programa'] ?></center></td>
      <td><center><?php echo $mostrar['resultado'] ?></center></td>
      <td><center><?php echo $mostrar['fecha'] ?></center></td>
      <td><center><?php echo $mostrar['carrera'] ?></center></td>
      <td><center><?php echo $mostrar['estatus'] ?></center></td>
      <td><a href="cambiarestatus.php" style="text-decoration:none"><button class="boton1">
         Cambiar</button></a></td>
         <td><a href="actualiza.php?id=<?php echo $mostrar['id'];?>" style="text-decoration:none"><button class="boton1">
         Editar</button></a></td>
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