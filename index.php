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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Modelo de Educación Dual - Inicio</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/index.css"/>
       
        <link rel="stylesheet" type="text/css" href="fonts.css"/>
                <link rel="shortcut icon" type="image/x-icon" href="img/logotes.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <style>
    body {
      background-image: url("https://modelodual21.000webhostapp.com/img/inicio.png");
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
            <header class="header">
                <img src="img/tecnm.png" alt="">
                <a href="index.php"><img title="Inicio" src="img/tesi.png" alt=""></a> 
                    SISTEMA DE MODELO DE EDUCACIÓN DUAL
                <nav>     
                     <ul class="navegacion">
                        <li><a>Registrarse</a>
                            <ul>
                                <li><a href="registroalumno.php">Alumno</a></li>
                                <li><a href="registromentor.php">Mentor</a></li>
                                <li><a href="registroempresa.php">Empresa</a></li>
                            </ul>
                        </li> 
                        <li><a>Iniciar sesión</a>
                            <ul>
                                <li><a href="loginalumno.php">Alumno postulado</a></li>
                                <li><a href="loginaceptado.php">Alumno aceptado</a></li>
                                <li><a href="loginmentor.php">Mentor</a></li>
                                <li><a href="loginempresa.php">Empresa</a></li>
                                <li><a href="loginvinculacion.php">Vinculación</a></li>
                                <li><a href="loginjefatura.php">Jefatura</a></li>
                            </ul>
                        </li> 
                        <li><a href="callto:(101)13148150">Teléfono</a></li>            
                     </ul>
                </nav>
            </header>
          <div class="main">¿QUÉ ES LA EDUCACIÓN DUAL?<br><br>
                    Es la alternativa innovadora en que se alinean la necesidad, áreas de oportunidad de desarrollo económico, industrial, tecnológico, social y nodos educativos productivos en los perfiles de las instituciones educativas, mediante una colaboración de beneficio mutuo en donde se conjuntan las competencias adquiridas en los espacios educativos con la práctica laboral o profesional lo cual permite fortalecer y desarrollar aptitudes de los estudiantes dual propiciando mejores condiciones para su inserción laboral o profesional.<br><br><br>
                    REQUISITOS PARA INCORPORARSE AL SISTEMA:<br><br>
                    - Estar inscrito en la institución educativa (TESI).<br>
                    - Haber aprobado la totalidad de asignaturas (Estatus regular).<br>
                    - Cursar o haber cursado tu 6° semestre.<br>
                    - Presentar la Carta de Exposición de Motivos.<br>
                    - Contar con el Carnet Vigente de Servicios Médicos.<br>
                    - Contar con el Seguro Contra Accidentes.<br>
                    - Carta Compromiso aceptando cumplir su función como estudiante dual<br>
                    - Ser propuesto por la institución educativa.<br>
                    - Disponibilidad de tiempo.<br>
                    - Presentar las pruebas psicométricas.


                    
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="https://www.facebook.com/TESIOficial/" target="_blank" class="icon-facebook"></a></li>
                    <li><a href="https://www.instagram.com/tesioficial/" target="_blank" class="icon-instagram"></a></li>
                    <li><a href="https://twitter.com/TESIOficial/" target="_blank" class="icon-twitter"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCBRZpGRpPlmOqv2c-OehMmA" target="_blank" class="icon-youtube"></a></li>
                    <li><a href="https://www.linkedin.com/school/tesi-ixtapaluca/" target="_blank" class="icon-linkedin2"></a></li>
                    <li><a href="mailto:dir_dixtapaluca@tesi.edu.mx" target="_blank" class="icon-mail2"></a></li>
                </ul>
            </div>
            <div class="sidebar">
              <h4>EVIDENCIA DE ALUMNOS EN MODELO DUAL:</h4>
              <h6>La posesión y muestra de las fotografías y la información personal de los individuos fueron concedidas y aprobadas por los mismos para su uso dentro del sistema.</h6>
                <figure class="snip1477">
                  <img src="img/brandon.jpg" />
                  <div class="title">
                    <div>
                      <h2>Brandon</h2>
                      <h4>Hernandez</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: ING. EN SISTEMAS COMPUTACIONALES"<br>
                      "He crecido mucho no solo en el ámbito laboral si no también en el ámbito personal.
                    En cuestión de conocimiento técnico, me di cuenta que realmente sabía muy poco y tenía mucho por aprender y al transcurso de estos dos años he crecido técnicamente y en conocimientos básicos, pero sé que aún hay muchas cosas por aprender."</p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
                
                <figure class="snip1477">
                  <img src="img/monserrat.jpg" />
                  <div class="title">
                    <div>
                      <h2>Monserrat</h2>
                      <h4>Gonzalez</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: LIC. ADMINISTRACIÓN" <br>"Inicie con el modelo de educación dual desde 6to semestre con la finalidad de adquirir experiencia previa al terminar la carrera, Adquiri el conocimiento y el dominio  mediante la experiencia y el estudio, obtuve dos cursos con certificación que  me servirán a un futuro."</p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
                <figure class="snip1477"><img src="img/david.jpg" />
                  <div class="title">
                    <div>
                     <h2>Fernando</h2>
                      <h4>Dominguez</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: ING. BIOMEDICA" <br>
                       "El sistema dual te brinda como estudiante poner en practica todo lo que has desarrollado durante tu formacion acedemica, ademas de eso te aporta la opotunidad de adquirir conocimientos nuevo ".

                     </p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
                <figure class="snip1477"><img src="img/hurtado.jpg" />
                  <div class="title">
                    <div>
                      <h2>David</h2>
                      <h4>Hurtado</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: LIC. ARQUITECTURA" <br>"Adquire conocimientos nuevos en el hambito profesional aun siendo alumno me brindo la oportunidad de desmvolverme como profesionista."</p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
                 <figure class="snip1477"><img src="img/osbaa.jpg" alt="sample35" />
                  <div class="title">
                    <div>
                      <h2>Osbaldo</h2>
                      <h4>Bernal</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: iNG. AMBIENTAL" <br>"Al incorporame al sistema dual, estuve laborando en el departamento de calidad trabajando con normas internacionales como lo es ISO9001:2015, la instancia en la empresa me brindo la oportunidad de buscar las herramienta necesarias para desarrollarme como inginiero y aprender un mejor futuro,  ",</p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
                 <figure class="snip1477"><img src="img/edg.jpg" alt="sample35" />
                  <div class="title">
                    <div>
                      <h2>Edgar</h2>
                      <h4>Evangs</h4>
                    </div>
                  </div>
                  <figcaption>
                    <p>"CARRERA: LIC. ARQUITECTURA" <br>
                       "Es una buena experiencia ya que te da la oportunidad de poner en práctica los conocimientos adquiridos durante tu periodo de formación además que adquieres experiencia en campo profesional".</p>
                  </figcaption>
                  <a href="#"></a>
                </figure>
            </div>
          <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
      <div class="footer">
      </div>
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