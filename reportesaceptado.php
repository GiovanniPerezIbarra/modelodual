<?php
    session_start();
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    require 'mail/Exception.php';
    require 'mail/OAuth.php';
    include_once 'con_db.php';
    if(!isset($_SESSION['aceptado'])){
        header('Location: index.php');
    }elseif(isset($_SESSION['aceptado'])){
        $sentencia = $conn->query('SELECT * FROM padron;');
        $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    if(isset($_POST["submit"])){
        $matricula = $_POST["matricula"];
        $carrera = $_POST["carrera"];
        $extension = 'application/pdf';
        $sentencia = $conn->prepare('SELECT * FROM padron WHERE matricula = ?;');
        $sentencia->execute([$matricula]);
        $datos = $sentencia->fetch(PDO::FETCH_OBJ);
        if($datos === false){
            echo '<script language="javascript">';
            echo 'alert("La matricula ingresada no está asociada a ninguna cuenta.")';
            echo '</script>';
        }elseif($sentencia->rowCount()==1){
            $pname = 'reporte-'.$matricula."-".rand(1,1000)."-".$_FILES["file"]["name"];
            $tname = $_FILES["file"]["tmp_name"];
            $ruta = 'archivos/reportes-'.$_POST["matricula"];
                    if(!file_exists($ruta)){
                        mkdir($ruta, 0777); 
                    }
            $uploads_dir = 'archivos/reportes-'.$_POST["matricula"];
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            if(!empty($_FILES['file']['name'])){
                $sql = "INSERT INTO reportesaceptados(matricula, carrera, archivo, extension) VALUES('$matricula','$carrera','$pname','$extension')";
                $resultado = $conn->prepare($sql); 
                if($resultado->execute()){
                    ?>
                    '<script type="text/javascript">
                    alert("El archivo se subió exitosamente.");
                    window.location.assign("inicioaceptado.php");
                    </script>';
                    <?php
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("No se seleccionó ningún archivo.")';
                    echo '</script>';
                }
        }else{
            ?>
            '<script type="text/javascript">
            alert("No se seleccionó ningún archivo.");
            window.location.assign("reportesaceptado.php");
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
        <title>Subir reportes</title>
        <link rel="stylesheet" type="text/css" href="css/comprobantealumno.css"/>
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
                <h3>Subir reportes:</h3>
                <form class="formulario" method="POST" enctype="multipart/form-data">
                    <div>
                    <h3>Reporte</h3>
                    <input class="controls" type="text" name="matricula" placeholder="Ingrese su matricula"/>
                    <h4>Seleccione su carrera</h4>
                    <select class="controls" name="carrera">
                        <option>ING. EN SISTEMAS</option>
                        <option>LIC. EN ARQUITECTURA</option>
                        <option>LIC. EN ADMINISTRACION</option>
                        <option>ING. BIOMEDICA</option>
                        <option>ING. ELECTRONICA</option>
                        <option>ING. INFORMATICA</option>
                        <option>ING. AMBIENTAL</option>
                    </select>
                    <input class="controls" type="file" name="file" />
                    <input class="botons" type="submit" name="submit" value="Subir"/>
                    </div>
                </form>
                <ul class="boton">
                <li><a href="inicioaceptado.php">Inicio</a></li>
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