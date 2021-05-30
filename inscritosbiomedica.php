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
    $this->Cell(150,30,utf8_decode('RELACIÓN DE ESTUDIANTES INTERESADOS EN EDUCACIÓN DUAL'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}
// Pie de página
function Footer()
{
    $this->Image('img/imagen2.png',0,173,297);
}
}
require 'con_db.php';
$consulta= "SELECT * FROM datosalumnos where carrera='Ing. Biomedica'";
$resultado = $mysqli->query($consulta);
$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',9);
$pdf->setx('7');
$pdf->Cell(30, 10,utf8_decode('Matrícula'), 1 ,0,'C', true);
$pdf->Cell(55, 10, 'Nombre completo' ,1 ,0,'C', true);
$pdf->Cell(75, 10,'Correo ', 1 ,0,'C', true);
$pdf->Cell(50, 10,'Carrera ', 1 ,0,'C', true);
$pdf->Cell(30, 10,'Semestre ', 1 ,0,'C', true);
$pdf->Cell(20, 10,'Grupo ', 1 ,0,'C', true);
$pdf->Cell(20, 10,'Estatus ', 1 ,1,'C', true);
while ($row = $resultado->fetch_assoc()) {
$pdf->setx('7');
$pdf->Cell(30, 10,utf8_decode($row['matricula']), 1 ,0,'C', 0);
$pdf->Cell(55, 10,utf8_decode($row['nombre_completo']), 1 ,0,'C', 0);
$pdf->Cell(75,10,utf8_decode($row['correo']), 1 ,0,'C', 0);
$pdf->Cell(50, 10,utf8_decode($row['carrera']), 1 ,0,'C', 0);
$pdf->Cell(30, 10,utf8_decode($row['semestre']), 1 ,0,'C', 0);
$pdf->Cell(20, 10,utf8_decode($row['grupo']), 1 ,0,'C', 0);
$pdf->Cell(20, 10,utf8_decode($row['estatus']), 1 ,1,'C', 0);
}
$pdf->Output();
?>