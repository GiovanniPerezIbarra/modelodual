<?php
$mysqli = new mysqli("localhost", "root","","sistemadual" );
?>
<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
     $this->Image('img/horizontal.png',5,2,290);
     // Arial bold 15
    $this->SetFont('Helvetica','',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(150,30,utf8_decode('RELACIÓN DE CONVENIOS VIGENTES'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Helvetica','I',8);
    // Número de página
    $this->Cell(0,25,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
     $this->Image('img/footer.png',5,250,200);
}
}

require 'con_db.php';
$consulta= "SELECT * FROM convenios";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFillColor(208,206,206);
$pdf->Cell(33, 10,'asociacion', 1 ,0,'C', true);
$pdf->Cell(20, 10,'prestacion', 1 ,0,'C', true);
$pdf->Cell(30, 10,'vigencia', 1 ,0,'C', true);
$pdf->Cell(80, 10,'ubicacion', 1 ,0,'C', true);
$pdf->Cell(30, 10,'suscriptor', 1 ,0,'C', true);
$pdf->Cell(20, 10,'cargo', 1 ,0,'C', true);
$pdf->Cell(50, 10,'carrera', 1 ,1,'C', true);

while ($row = $resultado->fetch_assoc()) {

$pdf->MultiCell(33, 10,$row['asociacion'], 1 ,'C');
$pdf->MultiCell(20, 10,$row['prestacion'], 1 ,'C');
$pdf->MultiCell(30, 10,$row['vigencia'], 1 ,'C');
$pdf->MultiCell(80, 10,$row['ubicacion'], 1 ,'C');
$pdf->MultiCell(30, 10,$row['suscriptor'], 1 ,'C');
$pdf->MultiCell(20, 10,$row['cargo'], 1 ,'C' );
$pdf->MultiCell(50, 10,$row['carrera'], 1 ,'C');





}


$pdf->Output();
?>