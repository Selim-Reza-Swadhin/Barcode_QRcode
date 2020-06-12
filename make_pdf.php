<?php
error_reporting(E_ALL);

require_once ('TCPDF/tcpdf.php');

//content a new TCPDF object
$pdf = new TCPDF();

//set document meta information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Selim');
$pdf->SetTitle('OOP PHP PDF');
$pdf->SetSubject('Make PDF with HTML');
$pdf->SetKeywords('TCPDF, PDF, PHP');

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//Add page
$pdf->AddPage();

$txt = <<<HDOC
Generate PDF with HTML using TCPDF
HDOC;

$pdf->Write(20, $txt);






//save the PDF
$pdf->Output('sample_pdf.pdf', 'I');

