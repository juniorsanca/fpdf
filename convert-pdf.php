<?php
require_once("fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
 
$pdf->SetFont('arial','',12);
$pdf->Cell(0,10,"Formalites juridiques",1,1,'C');
$pdf->Write(5,'Ceci est mon testament Je, soussigné(e) né(e) le … à … étant en pleine possession de mes facultés mentales, déclare établir mes dispositions de dernières volontés ainsi qu’il suit : 
 ');

foreach ($_POST as $key => $value) {
  if (is_array($_POST[$key])) {
    $value = implode(",", $value);
  } 
  if (strpos($key, 'label') !== false) {
    $pdf->Cell(100, 10, $value, 0, 0);
  } else {
    $pdf->Cell(10, 10, $value, 0, 1);
    $pdf->Ln();
  }
}
$file = time().'.pdf';
$pdf->output($file,'D');
?>
