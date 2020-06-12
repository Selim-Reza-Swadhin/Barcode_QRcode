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
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set font
$pdf->SetFont('times', '', 20);

//Add page
$pdf->AddPage();

$txt = <<<HDOC
OOP PHP and BD Programming
Chapter 14-6
Generate PDF Files with TCPDF
HDOC;

$pdf->Write(0, $txt);
$pdf->Ln();

//image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//JPEG QUALITY
$pdf->setJPEGQuality(90);

//a simple image
//$pdf->Image("banner.jpeg");
$pdf->Image("blog-man1.png");
$pdf->Ln(32);

$txt = "HTML example with an  <h2>Embedded Image</h2>
Sample text with <em>italic</em> and <strong>bold</strong>
and the caption is also large bold
";

$pdf->WriteHTML($txt);





//save the PDF
$pdf->Output('sample_pdf_with_html_image.pdf', 'I');

