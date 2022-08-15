<?php

use content\config\conection\database as database;
use content\modelo\vehiculosModel as vehiculosModel;


require_once("../fpdf/fpdf.php");

class PDF extends FPDF
{
// Cabecera de página
    public function __construct(){
            // $this->con = parent::__construct();
            parent::__construct();
        }

function Header()
{
    // Logo
   $this->Image('../../../../assets/img/logo1.png',10,8,33);
    // Arial bold 15
      $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    $this->SetLeftMargin($this->GetPageWidth() / 2 - 80);
    $this->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
    $this->Cell(160, 10,  'SISTEMA UT',2, 0,'C', 0);
    $this->Ln(25);//salto de linea
    // Título
    $this->Cell(160, 10, utf8_decode('REPARACIONES CON DATOS DE LOS TALLERES') ,2, 0,'C', 0);
        $this->Ln(10);

        $this->SetFont('Arial','B',10);//Tipo de letra, negrita, tamaño

        $this->Cell(10, 10,  'Nro',1, 0,'C', 0);
         $this->Cell(30, 10, 'Placa',1, 0,'C', 0);
        $this->Cell(45, 10,  utf8_decode('Reparación'),1, 0,'C', 0);
        $this->Cell(20, 10, 'Costo',1, 0,'C', 0);
        $this->Cell(50, 10,  utf8_decode('Taller'),1, 0,'C', 0);
        $this->Cell(25, 10, 'Fecha',1, 0,'C', 0);

        $this->Ln(10);

        $this->SetFont('Arial','',10);//Tipo de letr

        $this->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
    // Salto de línea
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$mysqli = new mysqli("localhost", "root", "", "ut");
        $resultado = $mysqli->query('SELECT r.id_reparaciones as id_reparaciones, r.id_vehiculo = r.id_vehiculo, taller.nombre AS nombre_t, vehiculos.modelo as modelo, taller.rif AS rif, r.nombre AS nombre, r.fecha as fecha,r.descripcion as descripcion, vehiculos.placa AS placa, r.costo AS costo FROM reparaciones as r INNER JOIN vehiculos ON r.id_vehiculo = vehiculos.id_vehiculo INNER JOIN taller ON r.id_taller= taller.id_taller WHERE id_reparaciones  AND r.id_vehiculo = vehiculos.id_vehiculo');
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',10);
     
        while ($row = $resultado->fetch_assoc()){
            $pdf->Cell(10,10, $row['id_reparaciones'], 1, 0,'C', 0);
            $pdf->Cell(30,10, $row['placa'], 1, 0,'C', 0);
            $pdf->Cell(45,10, $row['nombre'], 1, 0,'C', 0);
            $pdf->Cell(20,10, $row['costo'], 1, 0,'C', 0);
            $pdf->Cell(25,10, $row['nombre_t'], 1, 0,'C', 0);
            $pdf->Cell(25,10, $row['rif'], 1, 0,'C', 0);
            $pdf->Cell(25,10, $row['fecha'], 1, 0,'C', 0);
            $pdf->Ln(10);//salto de linea
            }
            
        
$pdf->Output();
    
?>