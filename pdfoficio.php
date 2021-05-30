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
if (isset($_POST['generar'])) {


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
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
   $this->Image('img/imagen2.png',0,255,297);
}
}

require 'con_db.php';
$pdf = new PDF();
    
  $mentor = $_POST['mentor'];
  $carrera = $_POST['carrera'];
  $fecha = $_POST['fecha'];
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->SetY(35);
$pdf->SetX(130);
$pdf->Cell(70, 10, utf8_decode("Ixtapaluca, Estado de México,"),0 ,1,'L', 0);
  $pdf->SetY(40);
  $pdf->SetX(130);
  $pdf->Cell(70, 10, $fecha,0 ,1,'L', 0);
  $pdf->SetY(60);
  $pdf->SetX(28);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->Cell(70, 10, $mentor,0 ,1,'L', 0);
  $pdf->SetY(65);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("Docente de la División de ") .$carrera,0 ,1,'L', 0);
  $pdf->SetY(70);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("P R E S E N T E "),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','',11);
  $pdf->SetY(80);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("Por este medio hago de su conocimiento que de acuerdo al Nuevo Modelo de Educación "),0 ,1,'L', 0);
  $pdf->SetY(87);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("Dual, usted ha sido asignado como "),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->SetY(87);
  $pdf->SetX(90);
  $pdf->Cell(70, 10, utf8_decode("MENTOR ACADÉMICO "),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','',11);
  $pdf->SetY(87);
  $pdf->SetX(133);
  $pdf->Cell(70, 10, utf8_decode("de ésta División."),0 ,1,'L', 0);
  $pdf->SetY(103);
  $pdf->SetX(28);
  $pdf->Cell(80, 10, utf8_decode("Como tal, será responsable de la formación y evaluación de las competencias "),0 ,1,'L', 0);
  $pdf->SetY(110);
  $pdf->SetX(28);
  $pdf->Cell(80, 10, utf8_decode("desarrolladas por el estudiante dual en la institución educativa,  y del seguimiento del "),0 ,1,'L', 0);
  $pdf->SetY(117);
  $pdf->SetX(28);
  $pdf->Cell(80, 10, utf8_decode("aprendizaje y evaluación del mismo dentro de la unidad económica. "),0 ,1,'L', 0);
  $pdf->SetY(133);
  $pdf->SetX(28);
  $pdf->Cell(80, 10, utf8_decode("Sin más por el momento, reciba un cordial saludo. "),0 ,1,'L', 0);

  $pdf->SetY(160);
  $pdf->SetX(85);
  $pdf->Cell(80, 10, utf8_decode("A T E N T A M E N T E"),0 ,1,'L', 0);

  $pdf->SetY(170);
  $pdf->SetX(66);
  $pdf->Cell(80, 10, utf8_decode('"Cultura Tecnológica para el Nuevo Milenio"'),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->SetY(190);
  $pdf->SetX(80);
  $pdf->Cell(80, 10, utf8_decode('JEFE DE LA DIVISION DE'),0 ,1,'L', 0);

  $pdf->SetY(200);
  $pdf->SetX(60);
  $pdf->Cell(80, 10, $_SESSION['yo'],0 ,1,'C', 0);
}
$pdf->Ln(2);
$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',10);

    








$pdf->Output();

?>

