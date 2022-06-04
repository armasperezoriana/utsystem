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
    $this->Image('../../img/logo1.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    $this->SetLeftMargin($this->GetPageWidth() / 2 - 63);
	$this->SetFont('Helvetica','B',15);//Tipo de letra, negrita, tamaño
	$this->Ln(10);//salto de linea
    // Título
    $this->Cell(130, 10,  'TALLER',2, 0,'C', 0);;


		 $this->Ln(10);
 	$this->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

	//MODELOS
		//$this->Cell(200, 10,  'TALLERES',2, 0,'C', 0);
		$this->Ln(10);

		$this->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

		$this->Cell(10, 10,  'No',1, 0,'C', 0);
		$this->Cell(30, 10, 'RIF',1, 0,'C', 0);
		$this->Cell(30, 10, 'Nombre',1, 0,'C', 0);
		$this->Cell(35, 10, 'Contactos',1, 0,'C', 0);
		$this->Cell(50, 10, 'Direccion',1, 0,'C', 0);
		$this->Ln(10);

		$this->SetFont('Arial','',10);
		$this->Ln(10);

		$this->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
    // Salto de línea
    $this->Ln(20);
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

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
	
	//$pdf = $pdf->reportesVehiculos();
//require_once("../../../content/modelo/vehiculosModel.php");
//require_once("../../../content/controllers/vehiculosController.php");

				//$query = 'SELECT * FROM vehiculos';
			//	$row = $query;
		
		//$pdf->Cell(10,10, $row->setId(), 1, 0,'C', 0);
		//	$pdf->Cell(25,10, $row->getPlaca(), 1, 0,'C', 0);
		//	$pdf->Cell(40,10, $row->getModelo(), 1, 0,'C', 0);
		//	$pdf->Cell(50,10, $row->getFuncionamiento(), 1, 0,'C', 0);
		 //   $pdf->Ln(10);//salto de linea
		
$pdf->Output();

?>