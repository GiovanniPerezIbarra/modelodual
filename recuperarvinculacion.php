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
        <title>Recuperar contraseña</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/recuperar.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
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
                <form class="recu" action="recuperacionvinculacion.php" method="post">
                    <h4>Recuperar la contraseña</h4>
                    <input class="controls" type="mail" name="correo" placeholder="Ingrese su correo electrónico">
                    <input class="botons" name="enviar" type="submit" value="Enviar">
                </form>
            </div>
            <div class="footer">
            </div>     
    </body>
</html>