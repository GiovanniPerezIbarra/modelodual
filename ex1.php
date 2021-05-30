
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
require 'con_db.php';
require('force_justify.php');

$pdf = new PDF();

  $mentor = $_POST['mentor'];
  $carrera = $_POST['carrera'];
  $fecha = $_POST['fecha'];



$pdf->AddPage();

$pdf->SetFillColor(255,255,255);
// Print 2 Cells

$pdf->SetFont('Helvetica','',11);
$pdf->SetY(35);
$pdf->SetX(130);
$pdf->Cell(70, 10, utf8_decode("Ixtapaluca, Estado de México, a"),0 ,1,'L', 0);
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

$pdf->SetFont('Arial','',13);
$pdf->Ln();
// Print 2 MultiCells
$y = $pdf->GetY();
$pdf->SetXY(110,$y);
$pdf->SetX(25);

$pdf->SetFont('Helvetica','',11);
  $pdf->SetY(80);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("Por este medio hago de su conocimiento que de acuerdo al Nuevo Modelo de Educación  Dual,"),0 ,1,'L', 0);
  $pdf->SetY(87);
  $pdf->SetX(28);
  $pdf->Cell(70, 10, utf8_decode("usted ha sido asignado como "),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->SetY(87);
  $pdf->SetX(79);
  $pdf->Cell(70, 10, utf8_decode(" MENTOR ACADÉMICO "),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','',11);
  $pdf->SetY(87);
  $pdf->SetX(122);
  $pdf->Cell(70, 10, utf8_decode("de ésta División."),0 ,1,'L', 0);

$pdf->SetY(103);
  $pdf->SetX(28);
$pdf->MultiCell(170,6, utf8_decode("Como tal, será responsable de la formación y evaluación de las competencias esarrolladas por el estudiante dual en la institución educativa,  y del seguimiento del
aprendizaje y evaluación del mismo dentro de la unidad económica. "),0,'FJ',1);

  $pdf->SetY(128);
  $pdf->SetX(28);

$pdf->Cell(70, 10, utf8_decode("Sin mas por el momento, reciba un cordial saludo."),0 ,1,'L', 0);
$pdf->SetFont('Helvetica','B',11);
$pdf->SetY(185);
  $pdf->SetX(85);
  $pdf->Cell(80, 10, utf8_decode("A T E N T A M E N T E"),0 ,1,'L', 0);

  $pdf->SetY(193);
  $pdf->SetX(66);
  $pdf->Cell(80, 10, utf8_decode('"Cultura Tecnológica para el Nuevo Milenio"'),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->SetY(220);
  $pdf->SetX(82);
  $pdf->Cell(80, 10, utf8_decode('JEFE DE LA DIVISION DE'),0 ,1,'L', 0);

  $pdf->SetY(227);
  $pdf->SetX(65);
  $pdf->Cell(80, 10, $_SESSION['yo'],0 ,1,'C', 0);

$pdf->Ln(2);
$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',10);

$pdf->Output();
?>




