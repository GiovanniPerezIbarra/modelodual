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
require 'con_db.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
require 'mail/Exception.php';
require 'mail/OAuth.php';
 if(isset($_POST["submit"])){
        if( strlen($_POST['nombre']) >= 1) {
          if(!empty($_FILES['file']['name'])){
         

            $pname = rand(1,1000)."-".$_FILES["file"]["name"];
              

            $destinatario =($_POST['nombre']);
         


            $tname = $_FILES["file"]["tmp_name"];
            $uploads_dir = 'archivos';
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            
                $enviararchivo='archivos/'.$pname;
                 
         
                        ?>
                        '<script type="text/javascript">
                        alert("El archivo se subio exitosamente.");
                        window.location.assign("iniciomentor.php");
                        </script>';
                        <?php
                    
               
            
  }
    }else{
            ?>
            '<script type="text/javascript">
            alert("Faltan archivos.");
            window.location.assign("generayenviar.php");
            </script>';
            <?php
        }
        }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Descargar y subir seguimiento</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/descargaaceptado.css"/>
    <link rel="stylesheet" type="text/css" href="fonts.css"/>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="hojas-estilo/estilos.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Archivos de estilo-->
    
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="scripts/main.js"></script>

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
<main class="main">
 
  <h3>Descargar y subir seguimiento y evaluación del estudiante en eduación dual:<br><br></h3>
  


 <div id="button-container" class="button-container">

    <button id="btn21" class="btn-21"><a download="Seguimiento y Evaluacion.docx" href="manual/Seguimiento_y_Evaluacion.docx" ><span>Descargar</span></button>
  </div>
<img src="img/evaluacion.png" alt="">
     <form class="registro" method="POST" enctype="multipart/form-data">
                    <div>
                    <h4>Subir archivo</h4>
                      <h5 >Seleccione el nombre del alumno:</h5>
                    <?php 
      $sql="SELECT DISTINCT nombre_alumno FROM asignacion WHERE nombre_mentor='".$_SESSION['mentor']."'";
      $result=mysqli_query($conexion,$sql);
    ?>
    <select class="controls" name="nombre">
    <?php
      while($mostrar=mysqli_fetch_array($result)){
    ?>
      <option><?php echo utf8_decode($mostrar['nombre_alumno'])?></option>
    <?php
      }
    ?>
    </select>
                    <h5 >Seleccione el archivo:</h5>
                    <input class="controls" type="file" name="file" >
                  
                    <input class="botons" type="submit" name="submit" value="Subir"/>
                    </div>
                </form>  
 
 
  </div>
</main>
  <script  src="./script2.js"></script>
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