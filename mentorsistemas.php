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
     $this->Image('img/horizontal2.png',8,2,285);
     // Arial bold 15
    $this->SetFont('Helvetica','',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(150,30,utf8_decode('RELACIÓN DE MENTORES'),0,0,'C');
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
$consulta= "SELECT * FROM datostutores where carrera='Ing. Sistemas Computacionales'";
$resultado = $mysqli->query($consulta);
$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(208,206,206);
$pdf->Cell(50, 10,'Id_trabajo', 1 ,0,'C', true);
$pdf->Cell(75, 10, 'Nombre completo' ,1 ,0,'C', true);
$pdf->Cell(75, 10,'Correo ', 1 ,0,'C', true);
$pdf->Cell(60, 10,'Carrera ', 1 ,0,'C', true);
$pdf->Cell(15, 10,'Mentor ', 1 ,1,'C', true);
while ($row = $resultado->fetch_assoc()) {
$pdf->Cell(50, 10,utf8_decode($row['id_trabajador']), 1 ,0,'C', 0);
$pdf->Cell(75, 10,utf8_decode($row['nombre_completo']), 1 ,0,'C', 0);
$pdf->Cell(75, 10,utf8_decode($row['correo']), 1 ,0,'C', 0);
$pdf->Cell(60, 10,utf8_decode($row['carrera']), 1 ,0,'C', 0);
$pdf->Cell(15, 10,utf8_decode($row['perfil']), 1 ,1,'C', 0);
}
$pdf->Output();
?>