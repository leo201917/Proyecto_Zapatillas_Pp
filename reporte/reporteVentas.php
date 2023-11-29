<?php
require('../fpdf/fpdf.php');

foreach ($result as $k => $v) {
$Id_Correlativo_Fact = $result[$k]["codigoVentaZapatilla"];
$igv_Fact = $result[$k]["igv_Fact"];
$subTotal_Fact = $result[$k]["subTotal_Fact"];
$importeTotal_Fact = $result[$k]["importeTotal_Fact"];
}

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
// $this->Image('img/waves.png',-10,-1,110);
// $this->Image('img/shinheky.png',150,15,25);
global $Id_Correlativo_Fact;
$this->SetY(40);
$this->SetX(143);

$this->SetFont('Arial','B',12);
$this->Cell(89, 8, 'BOLETA DE VENTAS '.substr("0000000".$Id_Correlativo_Fact, -7),0,1); 
$this->SetY(45);
$this->SetX(144);
$this->SetFont('Arial','',8);

$this->Cell(40, 8, utf8_decode('CASA ZAPATILLAS'));


$this->Ln(20);

}

// Pie de página
function Footer()
{
    global $igv_Fact, $subTotal_Fact, $importeTotal_Fact;
    $this->SetY(-80);
    $this->Cell(170,10,'DATOS FINALES','B',0,'C',1);
    $this->Cell(25,10,'','B',0,'C',1);
    $this->SetY(-70);
    $this->Cell(170,10,' SUB TOTAL','B',0,'l',1);
    $this->Cell(25,10,$subTotal_Fact,'B',0,'C',1);
    $this->SetY(-60);
    $this->Cell(170,10,' IGV ','B',0,'l',1);
    $this->Cell(25,10,$igv_Fact,'B',0,'C',1); 
    $this->SetY(-50);
    $this->Cell(170,10,' IMPORTE TOTAL ','B',0,'l',1);
    $this->Cell(25,10,$importeTotal_Fact,'B',1,'C',1);


    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página
    $this->Cell(170,10,'Todos los derechos reservados',0,0,'C',0);
    
    $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(15);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->SetX(15);
$pdf->SetFillColor(25,154,151);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,12,utf8_decode('N°'),0,0,'C',1);
$pdf->Cell(60,12,utf8_decode('Producto'),0,0,'C',1);
$pdf->Cell(30,12,utf8_decode('Costo Unitario'),0,0,'C',1);
$pdf->Cell(35,12,utf8_decode('Cantidad'),0,0,'C',1);
$pdf->Cell(50,12,utf8_decode('Total'),0,1,'C',1);

$pdf->SetFont('Arial','',12);

foreach ($result as $k => $v) {

    $pdf->SetX(15);//posicionamos en x

    if($k%2==0){
        $pdf->SetFillColor(232, 232, 232 );
        $pdf->SetDrawColor(65, 61, 61);
        }else{
        $pdf->SetFillColor(255, 255, 255 );
        $pdf->SetDrawColor(65, 61, 61);
        }
        $pdf->Cell(12,12,$k+1,'B',0,'C',1);
        $pdf->Cell(60,12,$result[$k]["modelo"],'B',0,'C',1);
        $pdf->Cell(30,12,$result[$k]["precioUnitario"],'B',0,'C',1);
        $pdf->Cell(35,12,$result[$k]["cantidad"],'B',0,'C',1);
        $pdf->Cell(50,12,$result[$k]["importeTotal"],'B',1,'C',1);
        $pdf->Ln(0.5);
   


    // $pdf->Multicell(35,10, utf8_decode("Modelo Zapatilla \n"),3 ,9,'C',0);
    // $pdf->MultiCell(50,1, $result[$k]["modelo"],0, 'l', false);
    // $pdf->Multicell(30,10, utf8_decode("Precio Unitario \n"));
    // $pdf->MultiCell(15,1, $result[$k]["precioUnitario"],0,'l',false); 

    // $pdf->Cell(15,10, $row['codigoVentaZapatilla'], 1, 0, 'C', 0);
    // $pdf->Cell(15,10, $row['codigoZapatilla'], 1, 0, 'C', 0);
    // $pdf->Cell(15,10, $row['cantidad'], 1, 0, 'C', 0);
    // $pdf->Cell(25,10, $row['precioUnitario'], 1, 0, 'C', 0);
    // $pdf->Cell(25,10, $row['subTotalVenta'], 1, 0, 'C', 0);
    // $pdf->Cell(25,10, $row['igv'], 1, 0, 'C', 0);
    // $pdf->Cell(25,10, $row['importeTotal'], 1, 1, 'C', 0);
}




$pdf->Output();
?>