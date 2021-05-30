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
 

 if(isset($_POST['submit'])){
    if (strlen($_POST['calificacion']) >= 1) {
            $matricula = trim($_POST['matricula']);
            $nombre = trim($_POST['nombre']);
            $parcial = trim($_POST['parcial']);
            $calificacion = trim($_POST['calificacion']);
            $consulta = "INSERT INTO calificaciones(matricula, nombre, parcial, calificacion) VALUES ('$matricula','$nombre','$parcial','$calificacion')";
            $resultado = $conn->prepare($consulta);
            if($resultado->execute()){
                ?>
                '<script type="text/javascript">
                alert("La calificacion se ha subido exitosamente.");
                window.location.assign("vercali.php");
                </script>';
                <?php
            } else {
                ?>
                '<script type="text/javascript">
                alert("Ocurrió un error.\nVuelva a intentarlo.");
                window.location.assign("ingresacali.php");
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
        <title>subir calificaciones</title>
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
            <div class="main">
                <form class="registro" method="post">
                  <h4>Registrar Calificaciones</h4>
                    <h5>Seleccione la matricula del alumno asignado:</h5>
                    <?php
                    $sql= "SELECT DISTINCT matricula FROM asignacion WHERE nombre_mentor='".$_SESSION['mentor']."'";
                    $result=mysqli_query($conexion,$sql);
                    ?>
                    <select class="controls" name="matricula">
                      <?php
                       while ($mostrar=mysqli_fetch_array($result)){
                        ?>                                      }               
                        <option> <?php echo $mostrar['matricula'] ?> </option>;
                        <?php
                        }
                        ?>
                    </select>
                    <h5>Seleccione el nombre del alumno:</h5>
                    <?php
                    $sql= "SELECT DISTINCT nombre_alumno FROM asignacion WHERE nombre_mentor='".$_SESSION['mentor']."'";
                    $result=mysqli_query($conexion,$sql);
                    ?>
                    <select class="controls" name="nombre">
                      <?php
                       while ($mostrar=mysqli_fetch_array($result)){
                        ?>                                      }               
                        <option> <?php echo $mostrar['nombre_alumno'] ?> </option>;
                        <?php
                        }
                        ?>
                    </select>
                    <h5>Seleccione el parcial:</h5>
                    <select class="controls" name="parcial">
                      <option>1</option>;
                      <option>2</option>;
                      <option>3</option>;
                    </select>
                    <input class="controls" type="text" name="calificacion" placeholder="Ingrese la calificación del alumno">
                    <input class="botons" name="submit" type="submit" value="Subir">
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
    </body>
</html>