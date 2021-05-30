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
    include 'con_db.php';
    if(isset($_POST['submit'])){
        $rfc = $_POST["rfc"];
        $sentencia = $conn->prepare('SELECT * FROM datosempresas WHERE rfc = ?;');
        $sentencia->execute([$rfc]);
        $datos = $sentencia->fetch(PDO::FETCH_OBJ);
        if($datos === false){
            ?>
            '<script type="text/javascript">
            alert("El RFC ingresado no está asociado a ninguna cuenta.");
            window.location.assign("competenciasempresa.php");
            </script>';
            <?php
        }elseif($sentencia->rowCount()==1){
                if(!empty($_FILES['file']['name'])){
                    $pname = $rfc."-".rand(1,1000)."-".$_FILES["file"]["name"];
                    $tname = $_FILES["file"]["tmp_name"];
                    $tipo=$_FILES["file"]['type'];
                    $ruta = 'archivosempresas/'.$_POST["rfc"];
                    if(!file_exists($ruta)){
                        mkdir($ruta, 0777); 
                    }
                    $uploads_dir = 'archivosempresas/'.$_POST["rfc"];
                    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $sql = "INSERT into compemp(rfc, archivo, extension) VALUES('$rfc','$pname','$tipo')";
                    $resultado = $conn->prepare($sql); 
                    if($resultado->execute()){
                        ?>
                        '<script type="text/javascript">
                        alert("Los archivos se subieron exitosamente.");
                        window.location.assign("inicioempresa.php");
                        </script>';
                        <?php
                    }else{
                        echo '<script language="javascript">';
                        echo 'alert("Hubo un error.")';
                        echo '</script>';
                    }       
                }else{
                    ?>
                    '<script type="text/javascript">
                    alert("No se seleccionó alguno de los archivos.");
                    window.location.assign("competenciasempresa.php");
                    </script>';
                    <?php
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Subir archivos</title>
        <link rel="stylesheet" type="text/css" href="css/competenciasempresa.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">

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
                <h3>Subir competencias:</h3>
                <form class="formulario" method="POST" enctype="multipart/form-data">
                    <div>
                    <h3>Competencias:</h3>
                    <input class="controls" type="text" name="rfc" placeholder="Ingrese su RFC"/>
                    <input class="controls" type="file" name="file" />
                    <input class="botons" type="submit" name="submit" value="Subir"/>
                    </div>
                </form>
                <ul class="boton">
                <li><a href="inicioempresa.php">Inicio</a></li>
            </ul>
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
    </body>
</html>