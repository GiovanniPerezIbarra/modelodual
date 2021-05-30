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
    if (strlen($_POST['nombre_completo']) >= 1 &&
        strlen($_POST['matricula']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['contra']) >= 1 &&
        strlen($_POST['confirmar']) >= 1 &&
        strlen($_POST['carrera']) >= 1 &&
        strlen($_POST['estatus']) >= 1 &&
        strlen($_POST['semestre']) >= 1 &&
        strlen($_POST['grupo']) >= 1){
            $nombre_completo = trim($_POST['nombre_completo']);
            $matricula = trim($_POST['matricula']);
            $correo = trim($_POST['correo']);
            $contra = trim($_POST['contra']);
            $contra =base64_encode($contra);
            $confirmar = trim($_POST['confirmar']);
            $confirmar = base64_encode($confirmar);
            $carrera = trim($_POST['carrera']);
            $estatus = trim($_POST['estatus']);
            $semestre = trim($_POST['semestre']);
            $grupo = trim($_POST['grupo']);
            $consulta = "INSERT INTO datosalumnos (nombre_completo, matricula, correo, contra, confirmar, carrera, estatus, semestre, grupo) VALUES ('$nombre_completo','$matricula','$correo','$contra','$confirmar','$carrera', '$estatus','$semestre', '$grupo')";
            if($contra == $confirmar){
                if($estatus == 'Irregular'){
                    echo '<script language="javascript">';
                    echo 'alert("Tienes que ser alumno regular para incorporarte al Sistema Dual.")';
                    echo '</script>';
                }else{
                    $resultado = $conn->prepare($consulta);
                    if($resultado->execute()){
                        ?>
                        '<script type="text/javascript">
                        alert("El registro se ha realizado exitosamente.\nPorfavor, inicie sesión.");
                        window.location.assign("loginalumno.php");
                        </script>';
                        <?php
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("La matricula o el correo ingresados ya están registrados.\nVuelva a intentarlo.")';
                        echo '</script>';
                    }
                }
            }else{
                echo '<script language="javascript">';
                echo 'alert("Las contraseñas no coinciden")';
                echo '</script>';
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
        <title>Registrarse - Alumno postulado</title>
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
            </header>

            <?php if(!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>

            <div class="main">
                <form class="registro" method="post">
                    <h4>Crear una cuenta de<br>alumno</h4>
                    <input class="controls" type="text" name="nombre_completo" placeholder="Ingrese su nombre completo">
                    <input class="controls" type="text" name="matricula" placeholder="Ingrese su matricula">
                    <input class="controls" type="mail" name="correo" placeholder="Ingrese su correo electrónico">
                    <input class="controls" type="password" name="contra" placeholder="Ingrese una contraseña">
                    <input class="controls" type="password" name="confirmar" placeholder="Confirme la contraseña">
                    <input class="controls" type="text" name="grupo" placeholder="Grupo">
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
                    <h5>Seleccione su estatus</h5>
                    <select class="controls" name="estatus">
                        <option>Regular</option>
                        <option>Irregular</option>
                    </select>
                    <h5>Seleccione su semestre actual</h5>
                    <select class="controls" name="semestre">
                        <option>Sexto</option>
                        <option>Septimo</option>
                        <option>Octavo</option>
                    </select>
                    <input class="botons" name="register" type="submit" value="Registrarse">
                    <h6><a href="loginalumno.php">Ya tengo una cuenta</a></h6>
                </form>
            </div>
            <div class="footer">
            </div> 
    </body>
</html>