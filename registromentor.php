<?php
    session_start();
    require 'con_db.php';
    if(isset($_SESSION['alumno'])){
        header('Location: inicioalumno.php');
    }
    else if(isset($_SESSION['empresa'])){
        header('Location: inicioempresa.php');
    }
    else if(isset($_SESSION['mentor'])){
        header('Location: iniciomentor.php');
    }
    else if(isset($_SESSION['division'])){
        header('Location: iniciodivision.php');
    }
    else if(isset($_SESSION['vinculacion'])){
        header('Location: iniciovinculacion.php');
    }
    else if(isset($_SESSION['aceptado'])){
        header('Location: inicioaceptado.php');
    }
?>
<?php
$message='';
require 'con_db.php';
if(isset($_POST['register'])){
    if (strlen($_POST['id_trabajador']) >= 1 &&
        strlen($_POST['nombre_completo']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['contra']) >= 1 &&
        strlen($_POST['confirmar']) >= 1 &&
        strlen($_POST['carrera']) >= 1 &&
        strlen($_POST['perfil']) >= 1) {
            $id_trabajador = trim($_POST['id_trabajador']);
            $nombre_completo = trim($_POST['nombre_completo']);
            $correo = trim($_POST['correo']);
            $contra = trim($_POST['contra']);
            $contra = base64_encode($contra);
            $confirmar = trim($_POST['confirmar']);
            $confirmar = base64_encode($confirmar);
            $carrera = trim($_POST['carrera']);
            $perfil = trim($_POST['perfil']);
            $consulta = "INSERT INTO datostutores(id_trabajador, nombre_completo, correo, contra, confirmar, carrera, perfil) VALUES ('$id_trabajador','$nombre_completo','$correo', '$contra', '$confirmar', '$carrera','$perfil')";
            if($contra == $confirmar){
                if($perfil == 'No'){
                    echo '<script language="javascript">';
                    echo 'alert("Tiene que ser mentor para incorporarse al Sistema Dual.")';
                    echo '</script>';
                }else{
                    $resultado = $conn->prepare($consulta);
                    if($resultado->execute()){
                        ?>
                        '<script type="text/javascript">
                        alert("El registro se ha realizado exitosamente.\nPorfavor, inicie sesión.");
                        window.location.assign("loginmentor.php");
                        </script>';
                        <?php
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("El ID de trabajador o el correo ingresados ya están registrados.\nVuelva a intentarlo.")';
                        echo '</script>';
                    }
                }
            }else{
                echo '<script language="javascript">';
                echo 'alert("Las contraseñas no coinciden")';
                echo '</script>';
            }
            
    }   else{
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
        <title>Registrarse - Mentor</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/registro.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
          <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
    </head>
    <body background="img/registro.png" class="grid-container">
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <a href="index.php"><img title="Inicio" src="img/tesi.png" alt=""></a>
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
                 <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
            </header>
            <div class="main">
                <form class="registro" method="post">
                    <h4>Crear una cuenta de<br>mentor</h4>
                    <input class="controls" type="text" name="id_trabajador" placeholder="Ingrese su ID de trabajador">
                    <input class="controls" type="text" name="nombre_completo" placeholder="Ingrese su nombre completo">
                    <input class="controls" type="mail" name="correo" placeholder="Ingrese su correo electrónico">
                    <input class="controls" type="password" name="contra" placeholder="Ingrese una contraseña">
                    <input class="controls" type="password" name="confirmar" placeholder="Confirme la contraseña">
                    <h5>Seleccione su carrera</h5>
                    <select class="controls" name="carrera">
                         <option>Ing. Sistemas Computacionales</option>
                        <option>Lic. Administracion</option>
                        <option>Lic. Arquitectura</option>
                        <option>Ing. Biomedica</option>
                        <option>Ing. Electronica</option>
                        <option>Ing. Ambiental</option>
                        <option>Ing. Informatica</option>
                    </select>
                    <h5>¿Cumple con el perfil de mentor?</h5>
                    <select class="controls" name="perfil">
                        <option>Si</option>
                        <option>No</option>
                    </select>
                    <input class="botons" name="register" type="submit" value="Registrarse">
                    <h6><a href="logintutor.php">Ya tengo una cuenta</a></h6>
                </form>
            </div>
            <div class="footer">
            </div>     
    </body>
</html>