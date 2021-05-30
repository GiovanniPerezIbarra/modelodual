<?php
    session_start();
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    require 'mail/Exception.php';
    require 'mail/OAuth.php';
    include_once 'con_db.php';
    if(!isset($_SESSION['alumno'])){
        header('Location: index.php');
    }elseif(isset($_SESSION['alumno'])){
        $sentencia = $conn->query('SELECT * FROM datosalumnos;');
        $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    if(isset($_POST["submit"])){
        $correo = $_POST['nombre'];
        $sentenciadivision = $conn->prepare('SELECT * FROM datosdivision WHERE nombre = ?;');
        $sentenciadivision->execute([$correo]);
        $datosdivision = $sentenciadivision->fetch(PDO::FETCH_OBJ);
        $matricula = $_POST["matricula"];
        $sentencia = $conn->prepare('SELECT * FROM datosalumnos WHERE matricula = ?;');
        $sentencia->execute([$matricula]);
        $datos = $sentencia->fetch(PDO::FETCH_OBJ);
        $sentenciaarchivo = $conn->prepare('SELECT * FROM archivosalumnos WHERE matricula = ?;');
        $sentenciaarchivo->execute([$matricula]);
        $datosarchivo = $sentenciaarchivo->fetch(PDO::FETCH_OBJ);
        if($datos === false){
            echo '<script language="javascript">';
            echo 'alert("La matricula ingresada no está asociada a ninguna cuenta.")';
            echo '</script>';
        }elseif($sentencia->rowCount()==1){
            $pname = $matricula."-".rand(1,1000)."-".$_FILES["file"]["name"];
            $tname = $_FILES["file"]["tmp_name"];
            $uploads_dir = 'archivos';
            move_uploaded_file($tname, $uploads_dir.'/'.$pname);
            if(!empty($_FILES['file']['name'])){
                $sql = "INSERT into archivosalumnos(matricula, archivo) VALUES('$matricula','$pname')";
                $resultado = $conn->prepare($sql); 
                if($resultado->execute()){
                    echo '<script language="javascript">';
                    echo 'alert("El archivo se subió exitosamente.")';
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("No se seleccionó ningún archivo.")';
                    echo '</script>';
                }
                $_SESSION['correo'] = $datosdivision->correo;
                $_SESSION['nombre_completo'] = $datos->nombre_completo;
                $_SESSION['matricula'] = $datos->matricula;
                $enviararchivo='archivos/'.$pname;
                try {
                    $emailTo = $_SESSION['correo'];
                    $subject = utf8_decode('Evaluación psicométrica de Educación Dual');
                    $body = utf8_decode('El nombre del alumno es: ' . $_SESSION['nombre_completo'] .', con matricula: ' . $_SESSION['matricula'] . '. El archivo de la evaluación psicométrica es el siguiente: ');
                    $fromemail = 'modelodual21@gmail.com';
                    $fromname = utf8_decode('Eduación DUAL');
                    $passwordemail = 'Modelo2021Dual';
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPDebug = 1;                                  
                    $mail->Host = 'smtp.gmail.com';                           
                    $mail->Port = 587; 
                    $mail->SMTPAuth = 'login';
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth=true;
                    $mail->Username = $fromemail;
                    $mail->Password = $passwordemail;
                    $mail->setFrom($fromemail, $fromname);
                    $mail->addAddress($emailTo);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->addAttachment($enviararchivo);
                    $mail->SMTPDebug = 0;
                    if(!$mail->send()){
                        echo '<script language="javascript">';
                        echo 'alert("El correo no pudo ser enviado.")';
                        echo '</script>';
                    }else{
                        ?>
                        '<script type="text/javascript">
                        alert("El correo se envió exitosamente.");
                        window.location.assign("procesoalumno.php");
                        </script>';
                        <?php
                    }
                } catch (Exception $e) {       
            }        
        }else{
            ?>
            '<script type="text/javascript">
            alert("No se seleccionó ningún archivo.");
            window.location.assign("comprobantealumno.php");
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
                <h3>Subir documentos:</h3>
                <form class="formulario" method="POST" enctype="multipart/form-data">
                    <div>
                    <h3>Evaluación psicométrica</h3>
                    <input class="controls" type="text" name="matricula" placeholder="Ingrese su matricula"/>
                    <h4>Seleccione su división académica</h4>
                    <select class="controls" name="nombre">
                        <option>Division de Sistemas</option>
                        <option>Division de Arquitectura</option>
                        <option>Division de Administracion</option>
                        <option>Division de Biomedica</option>
                        <option>Division de Electronica</option>
                        <option>Division de Ambiental</option>
                        <option>Division de Informatica</option>
                    </select>
                    <input class="controls" type="file" name="file" />
                    <input class="botons" type="submit" name="submit" value="Subir"/>
                    </div>
                </form>
                <ul class="boton">
                <li><a href="subiralumno.php">Atrás</a></li>
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