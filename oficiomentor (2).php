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
<?php 
  $conexion=mysqli_connect('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
 ?>

 <?php
$mysqli = new mysqli('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
?>
<?php
if (isset($_POST['Generar'])) {


require('fpdf/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
     $this->Image('img/header.png',5,2,200);
     // Arial bold 15
    $this->SetFont('Helvetica','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,30,utf8_decode('MODELO DE EDUACION DUAL '),0,0,'C');
       $this->Ln(.1);
    $this->Cell(200,50,utf8_decode('LISTA DE COTEJO PARA LOS EXPEDIENTES DE LOS ALUMNOS ACEPTADOS  '),0,0,'C');
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
   $this->Image('img/imagen2.png',0,255,297);
}
}
$matricula = $_POST['lista'];
require 'con_db.php';
$consulta= 'SELECT Nombre_p FROM padron where matricula ='.$matricula.'';
$consulta2= 'SELECT empresa From alumnoempresa where matricula ='.$matricula.'';
$consulta3= 'SELECT nombre_mentor From asignacion where matricula ='.$matricula.'';

    
  $resultado = $mysqli->query($consulta);
  $resultado2 = $mysqli->query($consulta2);
  $resultado3 = $mysqli->query($consulta3);

while ($row = $resultado->fetch_assoc() AND $row2 = $resultado2->fetch_assoc() AND $row3 = $resultado3->fetch_assoc()      ) {
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(70, 10, "Nombre del Alumno: ".$row['Nombre_p'],0 ,1,'L', 0);
$pdf->Cell(70, 10, "Nombre de la Empresa: ".$row2['empresa'],0 ,1,'L', 0);
$pdf->Cell(70, 10, "Nombre del Mentor: ".$row3['nombre_mentor'],0 ,1,'L', 0);

}
$pdf->Ln(2);
$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',10);

    

$pdf->Cell(14, 15, 'No.' ,1 ,0,'C', true);
$pdf->Cell(130, 15,'Documentos', 1 ,0,'C', true);
$pdf->Cell(40, 10, 'EXPEDIENTE' ,1 ,1,'C', true);
$pdf->SetX(154);
$pdf->Cell(20, 5, 'SI', 1 ,0,'C', true);
$pdf->Cell(20, 5,'NO ', 1 ,1,'C', true);
$pdf->Cell(14, 6, '1' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, 'Lista de cotejo de requisitos de aspirante  requisitos 3.2' ,1 ,0,'c', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '2' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Evaluación Psicométrica anexo 3.1') ,1 ,0,'L', 0);

$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '3' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Carta de exposición de motivos') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '4' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Comprobante de inscripción y Kardex') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '5' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia del pago del seguro contra accidentes') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '6' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia del carnet de afiliación de seguro médico') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '7' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Carta compromiso') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '8' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Carta de aceptación por parte del responsable del PE a Vinculación') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '9' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Carta de aceptación por parte de la empresa') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '10' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia del convenio de aprendizaje Anexo 5.3') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '11' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Plan de formación Anexo 5.1') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '12' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Plan de Rotación') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '13' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Currículum Vitae') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '14' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Solicitud de trabajo Elaborada') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '15' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia de Identificación Oficial (INE)') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '16' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia de Credencial Escolar') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);



$pdf->Cell(14, 6, '17' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('CURP') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '18' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia de Acta de Nacimiento') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '19' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Copia de Comprobante de domicilio') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '20' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Reporte de actividades Anexo 5.4') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);


$pdf->Cell(14, 6, '21' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Reporte de visitas del Mentor Académico a la Unidad Económica') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '22' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Seguimiento y evaluación Anexo 5.5') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);

$pdf->Cell(14, 6, '23' ,1 ,0,'C', 0);
$pdf->Cell(130, 6, utf8_decode('Carta de Liberación por parte de la empresa') ,1 ,0,'L', 0);
$pdf->Cell(20, 6, '', 1 ,0,'C', 0);
$pdf->Cell(20, 6,' ', 1 ,1,'C', 0);




$pdf->Output();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Lista de cotejo</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/subirempresas.css"/>
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
      <img src="img/tesi.png" alt="" class="image">
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
 

 <main class="main">
					 	      <form class="registro" method="post">
                    <h4>Generar lista de cotejo<p></h4>
                    <h5 >Seleccione ela matricula del alumno:</h5>
                    <?php 
                      $sql="SELECT * from padron";
                      $result=mysqli_query($conexion,$sql);
                    ?>
                    <select class="controls" name="lista">
                    <?php
                      while($mostrar=mysqli_fetch_array($result)){
                    ?>
                      <option><?php echo $mostrar['matricula']?></option>
                    <?php
                      }
                    ?>
                    </select>
                  <input class="botons" name="Generar" type="submit" value="Generar">
                </form>




  </main>
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