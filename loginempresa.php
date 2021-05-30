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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Iniciar sesión - UE</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
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
                <a href="index.php"><img title="Inicio" src="img/tesi.png" alt=""></a>
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <div class="main">
                <form class="sesion" action="validarempresa.php" method="post">
                    <h4>Inicie sesión en su cuenta</h4>
                    <h5>¿No tiene una cuenta?... <a href="registroempresa.php">Crear una</a></h5>
                    <input class="controls" type="text" name="rfc" placeholder="RFC de la empresa">
                    <input class="controls" type="password" name="contra" placeholder="Contraseña">
                    <input class="botons" name="entrar" type="submit" value="Iniciar sesión">
                    <h5><a href="recuperarempresa.php">Olvidé la contraseña</a></h5>
                </form>
            </div>
            <div class="footer">
            </div>     
    </body>
</html>