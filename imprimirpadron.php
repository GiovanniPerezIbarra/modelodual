<?php
session_start();
$mysqli = new mysqli("localhost", "root","","sistemadual" );
$conexion=mysqli_connect('localhost','root','','sistemadual');
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
if (isset($_SESSION['buscar']) && isset($_POST['buscar'])) {
    $carrera = $_POST["carrera"];
    $query = "SELECT * FROM padron WHERE carrera LIKE '%".$carrera."%'";
    $resultado = $mysqli->query($query);
    /* $datos = $sentencia->fetch(PDO::FETCH_OBJ);*/
    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(208,206,206);
    $pdf->Cell(12, 10,'Id', 1 ,0,'C', true);
    $pdf->Cell(80, 10,'NOMBRE DEL PRESELECCIONADO', 1 ,0,'C', true);
    $pdf->Cell(50, 10,'PROGRAMA EDUCATIVO', 1 ,0,'C', true);
    $pdf->Cell(60, 10,'RESULTADO DE EVALUACIONES', 1 ,0,'C', true);
    $pdf->Cell(73, 10,utf8_decode('FECHA DE INCORPORACIÓN AL PADRÓN'), 1 ,1,'C', true);
    while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(12, 10,$row['Id'], 1 ,0, 'C',0);
    $pdf->Cell(80, 10,utf8_decode($row['Nombre_p']), 1 ,0, 'C',0);
    $pdf->Cell(50, 10,$row['programa'], 1 ,0, 'C',0);
    $pdf->Cell(60, 10,$row['resultado'], 1 ,0, 'C',0);
    $pdf->Cell(73, 10,$row['fecha'], 1 ,1,'C',0);
    }
    $pdf->Output();
}else{
    $consulta= "SELECT * FROM padron";
    $resultado = $mysqli->query($consulta);
    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(208,206,206);
    $pdf->Cell(12, 10,'Id', 1 ,0,'C', true);
    $pdf->Cell(80, 10,'NOMBRE DEL PRESELECCIONADO', 1 ,0,'C', true);
    $pdf->Cell(50, 10,'PROGRAMA EDUCATIVO', 1 ,0,'C', true);
    $pdf->Cell(60, 10,'RESULTADO DE EVALUACIONES', 1 ,0,'C', true);
    $pdf->Cell(73, 10,utf8_decode('FECHA DE INCORPORACIÓN AL PADRÓN'), 1 ,1,'C', true);
    while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(12, 10,$row['Id'], 1 ,0, 'C',0);
    $pdf->Cell(80, 10,utf8_decode($row['Nombre_p']), 1 ,0, 'C',0);
    $pdf->Cell(50, 10,$row['programa'], 1 ,0, 'C',0);
    $pdf->Cell(60, 10,$row['resultado'], 1 ,0, 'C',0);
    $pdf->Cell(73, 10,$row['fecha'], 1 ,1,'C',0);
    }
    $pdf->Output();
}
?>