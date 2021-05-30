<?php
$mysqli = new mysqli('localhost','id16929386_modelodual','iU3EUE^6G<IzwOH$','id16929386_sistemadual');
?>
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
    $this->Cell(150,30,utf8_decode('PADRÓN DE PRESELECCIONADOS'),0,0,'C');
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
$consulta= "SELECT * FROM padron where carrera='Ing. Biomedica'";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',9);

$pdf->SetFillColor(208,206,206);
;
$pdf->Cell(82, 12,'NOMBRE DEL PRESELECCIONADO', 1 ,0,'C', true);

$pdf->multicell(44, 6,'            PROGRAMA               EDUCATIVO  ', 1 ,'C', true);
$pdf->sety('30');
$pdf->setx('136');

$pdf->multiCell(114, 4,'RESULTADO DE EVALUACIONES
Posible/Recomendable/
Altamente Recomendable
', 1 ,'C', true);
$pdf->sety('30');
$pdf->setx('250');

$pdf->multiCell(35, 4,utf8_decode('FECHA DE INCORPORACIÓN AL PADRÓN'), 1 ,'C', true);


while ($row = $resultado->fetch_assoc()) {


$pdf->Cell(82, 10,utf8_decode($row['Nombre_p']), 1 ,0, 'C',0);
$pdf->Cell(44, 10,$row['programa'], 1 ,0, 'C',0);
$pdf->Cell(114, 10,$row['resultado'], 1 ,0, 'C',0);
$pdf->Cell(35, 10,$row['fecha'], 1 ,1,'C',0);





}



$pdf->Output();
?>