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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Inicio</title>
        <link rel="stylesheet" type="text/css" href="css/iniciovinculacion.css"/>
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
                <a href="index.php"><img title="Inicio" src="img/tesi.png" alt=""></a>
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
            <div class="main">
				<h4>Ya has iniciado sesión.</h4>
			     <br>
				 <figure class="snip1546">
          <img src="img/firmar.jpg" 
				  alt="firma" />
				  <figcaption>
				    <h3>Agregar convenios</h3><i class="fa fa-link"></i>
				  </figcaption>
				  <a href="subirempresas.php"></a>
				</figure>
				<figure class="snip1546"><img src="img/editarr.jpg" alt="sq-sample37" />
				  <figcaption>
				    <h3>Editar convenios</h3><i class="fa fa-link"></i>
				  </figcaption>
				  <a href="editarempresas.php"></a>
				</figure>
				<figure class="snip1546"><img src="img/verconve.jpg" alt="sq-sample35" />
				  <figcaption>
				    <h3>Ver convenios</h3><i class="fa fa-link"></i>
				  </figcaption>
				  <a href="verempresas.php"></a>
				</figure>
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
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
    </body>
</html>