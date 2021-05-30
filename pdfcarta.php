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
    $this->Cell(93,40,utf8_decode('CARTA DE ACEPTACIÓN DE SISTEMA DE MODELO DUAL'),0,'C',0);
    $this->Ln(.1);
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
  $apellidos = $conn->prepare("SELECT * from padron where Nombre_p= ?;");
  $apellidos->execute([$mentor]);
  $datos = $apellidos->fetch(PDO::FETCH_OBJ);
  $fecha = $_POST['fecha'];
  $proyecto = $_POST['proyecto'];
  $_SESSION['ap'] = $datos->matricula;
  $_SESSION['app'] = $datos->carrera;

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->SetY(40);
$pdf->SetX(95);
$pdf->Cell(70, 10, utf8_decode("Ixtapaluca, Estado de México, a ").$fecha,0 ,1,'L', 0);
$pdf->SetFont('Helvetica','B',11);
$pdf->SetY(60);
$pdf->SetX(25);
$pdf->Cell(70, 10, utf8_decode("ING. MARISOL MARTÍNEZ ORTEGA"),0 ,1,'L', 0);
$pdf->SetY(65);
$pdf->SetX(25);
$pdf->Cell(70, 10, utf8_decode("DEPARTAMENTO DE GESTIÓN TECNOLÓGICA"),0 ,1,'L', 0);
$pdf->SetY(70);
$pdf->SetX(25);
$pdf->Cell(70, 10, utf8_decode("Y VINCULACIÓN"),0 ,1,'L', 0);
$pdf->SetY(75);
$pdf->SetX(25);
$pdf->Cell(70, 10, utf8_decode("P R E S E N T E"),0 ,1,'L', 0);
$pdf->SetFont('Helvetica','',11);
$pdf->SetY(90);
$pdf->SetX(25);
$pdf->MultiCell(170, 5, utf8_decode("Se hace de su conocimiento que el Tecnológico de Estudios Superiores de Ixtapaluca, es un Organismo Público Descentralizado del Gobierno del Estado de México, creado por Decreto del ejecutivo Estatal y publicado en la Gaceta del Gobierno No 51 el 9 de septiembre de 1999, que cuenta con personalidad jurídica y patrimonio propios, actualmente cuenta con la Certificación del Proceso Educativo Bajo la Norma Internacional ISO 9001:2015 y Ambiental Bajo las Normas Internacionales ISO 14001:2015."),0,'L', false);
$pdf->SetY(125);
$pdf->SetX(25);
$pdf->MultiCell(170, 5, utf8_decode('Por medio de la presente, me dirijo a usted para hacer de su conocimiento que C. '.$mentor.', con número de matrícula ' .$_SESSION['ap'].' de la carrera de '.$_SESSION['app'].' es Aceptado para realizar Educación Dual en el Organismo que dignamente representa con el proyecto "'.$proyecto.'".'),0,'L', false);
$pdf->SetY(150);
$pdf->SetX(25);
$pdf->Cell(70, 10, utf8_decode("Sin mas por el momento, reciba un cordial saludo."),0 ,1,'L', 0);
$pdf->SetFont('Helvetica','B',11);
$pdf->SetY(175);
  $pdf->SetX(85);
  $pdf->Cell(80, 10, utf8_decode("A T E N T A M E N T E"),0 ,1,'L', 0);

  $pdf->SetY(183);
  $pdf->SetX(66);
  $pdf->Cell(80, 10, utf8_decode('"Cultura Tecnológica para el Nuevo Milenio"'),0 ,1,'L', 0);
  $pdf->SetFont('Helvetica','B',11);
  $pdf->SetY(210);
  $pdf->SetX(82);
  $pdf->Cell(80, 10, utf8_decode('JEFE DE LA DIVISION DE'),0 ,1,'L', 0);

  $pdf->SetY(217);
  $pdf->SetX(65);
  $pdf->Cell(80, 10, $_SESSION['yo'],0 ,1,'C', 0);
}
$pdf->Ln(2);
$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',10);

    

$pdf->Output();

?>

