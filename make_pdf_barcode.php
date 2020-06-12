<?php
error_reporting(E_ALL);

require_once ('TCPDF/tcpdf.php');

//content a new TCPDF object
$pdf = new TCPDF();

//set document meta information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Niton');
$pdf->SetTitle('OOP PHP');
$pdf->SetSubject('Make PDF with HTML');
$pdf->SetKeywords('TCPDF, PDF, PHP');

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//Add page
$pdf->AddPage();

$txt = <<<HDOC
Generate PDF with Barcode using TCPDF
HDOC;

$pdf->Write(20, $txt);

$pdf->Ln();;
//new style
$style = array(
    'border' => 2,
    'padding' => 'auto',
    'fgcolor' => array(0, 0, 22),
    'bgcolor' => array(255, 255, 64)
);

$pdf->Ln();
//code 128 c
$pdf->Cell(0, 0, 'CODE 128 C', 0, 1);
$pdf->write1DBarcode('0123456789', 'C128C', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();
//code EAN 8
$pdf->Cell(0, 0, 'EAN 8', 0, 1);
$pdf->write1DBarcode('1234567', 'EAN8', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();
//code EAN 13
$pdf->Cell(0, 0, 'EAN 13', 0, 1);
$pdf->write1DBarcode('1234567', 'EAN13', '', '', '', 18, 0.4, $style, 'N');

$pdf->Ln();
//QRCODE,H : QR-CODE best error correction
$pdf->Cell(0, 0, 'QRCODE, H', 0, 1);
$pdf->write2DBarcode('www.tappware.org', 'QRCODE,H', '', 158, 50, 50, $style, 'N');
$pdf->Text(14, 210, 'TAPPWARE');




//save the PDF
$pdf->Output('sample_pdf_barcode.pdf', 'I');

