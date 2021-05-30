<?php
	session_start();
	if(!isset($_SESSION['division'])){
		header('Location: index.php');
	}elseif(isset($_SESSION['division'])){
		include 'con_db.php';
		$sentencia = $conn->query('SELECT * FROM datosdivision;');
		$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>Perfil</title>
        <link rel="stylesheet" type="text/css" href="css/iniciodivi.css"/>
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
                <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
    </head>
    <body background="img/fondotesi.png" class="grid-container">
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <img src="img/tesi.png" alt="">
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <img src="img/edomex.png" alt="">
                <img src="img/gobierno.png" alt="">
            </header>
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
            <div class="usuario"><i class="fas fa-users fa-lg"></i><a><br>Bienvenid@</a></div>
             <div class="usuari"><a><?php echo $_SESSION['division'];?> </p></a></div>
            <div class="items-container">
              <div class="items"><i class="fas fa-home"></i><a href="iniciodivision.php">Inicio</a></div>
              <div class="items"><i class="far fa-file-alt"></i></i><a href="Padrondivision.php">Padrón</a></div>
              <div class="items"><i class="fas fa-user-graduate"></i><a href="aceptados.php">Aceptados</a></div>
              <div class="items"><i class="fas fa-user-graduate"></i><a href="postulados.php">Postulados</a></div>
               <div class="items"><i class="fas fa-clipboard"></i><a href="listadecotejo.php">Lista de cotejo</a></div>
              <div class="items"><i class="fas fa-chalkboard-teacher"></i><a href="asignacion.php">Asignación</a></div>
              <div class="items"><i class="far fa-file-word"></i><a href="areporte.php">Ver reportes </a></div>
              <div class="items"><i class="fas fa-sign-out-alt"></i><a href="logout.php">Cerrar sesión</a></div>
            </div>
          </div>
     </div>
    </div>
  </div>
</navbar>
                   <div class="main">
                                            <h2>Bienvenido <?php echo $_SESSION['division']; ?> </h2>
                                            <h4>Ya has iniciado sesión.</h4>
                                            <br>

                             <div class="cards-list">
                              
                            <div class="card 1">
                              <div class="card_image"> <img src="img/alum.jpg" /> </div>
                              <div class="card_title title-white">

                             <a href="veralumnos.php"> Alumnos inscritos</a>

                              </div>
                               
                            </div>

                            <div class="card 2">
                              <div class="card_image"> <img src="img/tutorr.jpg" /> </div>
                              <div class="card_title title-white">

                             <a href="vermentor.php"> Mentor/Tutor</a>

                              </div>
                               
                            </div>

                            

                            <div class="card 3">
                              <div class="card_image">
                                <img src="img/conve.jpg" />
                              </div>
                              <div class="card_title title-white">
                                <a href="verconveniosdivi.php">Ver convenio </a>


                              </div>
                            </div>               
                        
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