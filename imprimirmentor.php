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
     $this->Image('img/header.png',5,2,200);
     // Arial bold 15
    $this->SetFont('Helvetica','',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,30,utf8_decode('RELACIÓN DE TUTORES Y MENTORES'),0,0,'C');
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
$consulta= "SELECT * FROM datostutores";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFillColor(208,206,206);
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(14, 10, 'Id' ,1 ,0,'C', true);
$pdf->Cell(28, 10,'Id_trabajo', 1 ,0,'C', true);
$pdf->Cell(41, 10, 'Nombres' ,1 ,0,'C', true);
$pdf->Cell(48, 10, 'Apellidos', 1 ,0,'C', true);
$pdf->Cell(46, 10,'Carrera ', 1 ,0,'C', true);
$pdf->Cell(13, 10,'Mentor ', 1 ,1,'C', true);

while ($row = $resultado->fetch_assoc()) {




$pdf->Cell(14, 10,utf8_decode($row['id_dtutor']), 1 ,0,'C', 0);
$pdf->Cell(28, 10,utf8_decode($row['id_trabajador']), 1 ,0,'C', 0);
$pdf->Cell(41, 10,utf8_decode($row['nombres']), 1 ,0,'C', 0);
$pdf->Cell(48, 10,utf8_decode($row['apellidos']), 1 ,0,'C', 0);
$pdf->Cell(46, 10,utf8_decode($row['carrera']), 1 ,0,'C', 0);
$pdf->Cell(13, 10,utf8_decode($row['perfil']), 1 ,1,'C', 0);




}


$pdf->Output();
?>