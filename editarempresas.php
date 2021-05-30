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
$id=$_GET['id'];
if(isset($_POST['editar'])){
    if (strlen($_POST['asociacion']) >= 1 &&
        strlen($_POST['prestacion']) >= 1 &&
        strlen($_POST['vigencia']) >= 1 &&
        strlen($_POST['ubicacion']) >= 1 &&
        strlen($_POST['suscriptor']) >= 1 &&
        strlen($_POST['cargo']) >= 1 &&
        strlen($_POST['correo']) >= 1) {
            $asociacion = trim($_POST['asociacion']);
            $prestacion = trim($_POST['prestacion']);
            $vigencia = trim($_POST['vigencia']);
            $ubicacion = trim($_POST['ubicacion']);
            $suscriptor = trim($_POST['suscriptor']);
            $cargo = trim($_POST['cargo']);
            $carrera = $_POST['carrera'];
            $json = json_encode($carrera, true);
            $correo = trim($_POST['correo']);
            $resultado = $conn->prepare("UPDATE convenios SET asociacion='$asociacion', prestacion='$prestacion', vigencia='$vigencia', ubicacion='$ubicacion', suscriptor='$suscriptor', cargo='$cargo', carrera='$json', correo='$correo' WHERE id=?;");
            $resultado->execute([$id]);
            if($resultado->rowCount()==1){
                ?>
                '<script type="text/javascript">
                alert("Los datos se han actualizado exitosamente.");
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
        <title>Editar convenios</title>
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
                    <h4>Editar convenio<p></h4>
                    <h5 >Seleccione la UE que desea editar:</h5>
                    <?php 
                      $sql="SELECT * from convenios where id='$id'";
                      $result=mysqli_query($conexion,$sql);
                      $row=$result->fetch_assoc();
                    ?>
                    <input class="controls" type="text" name="asociacion" placeholder="Ingrese el nombre de la asociación" value="<?php echo $row['asociacion'];?>">
                    <h5>Tipo de prestación:</h5>
                    <select class="controls" name="prestacion">
                        <option>EDUCACION DUAL</option>
                    </select>
                    <input class="controls" type="text" name="vigencia" placeholder="Ingrese la vigencia del convenio" value="<?php echo $row['vigencia'];?>">
                    <input class="controls" type="text" name="ubicacion" placeholder="Ingrese la ubicación de la UE" value="<?php echo $row['ubicacion'];?>">
                    <input class="controls" type="text" name="suscriptor" placeholder="Ingrese el nombre del suscriptor" value="<?php echo $row['suscriptor'];?>">
                    <input class="controls" type="text" name="cargo" placeholder="Ingrese el cargo del suscriptor" value="<?php echo $row['cargo'];?>">
                    <h5>Seleccione las carreras a las que va dirigido (Ctrl):</h5>
                    <select multiple="multiple" class="controls" name="carrera[]" size="7">
                        <option>ING. EN SISTEMAS<br></option>
                        <option>ING. BIOMEDICA<br></option>
                        <option>ING. INFORMATICA<br></option>
                        <option>ING. ELECTRONICA<br></option>
                        <option>ING. AMBIENTAL<br></option>
                        <option>LIC. EN ADMINISTRACION<br></option>
                        <option>LIC. EN ARQUITECTURA<br></option>
                    </select>
                    <input class="controls" type="text" name="correo" placeholder="Ingrese el correo de contacto de la UE" value="<?php echo $row['correo'];?>">
                    <input class="botons" name="editar" type="submit" value="Editar">
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