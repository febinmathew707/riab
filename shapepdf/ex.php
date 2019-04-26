<?php

require('fpdf_alpha.php');

$pdf=new PDF_ImageAlpha();

$pdf->AddPage();


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// A) provide image + separate 8-bit mask (best quality!)

//first embed mask image (w, h, x and y will be ignored, the image will be scaled to the target image's size)
$maskImg = $pdf->Image('alpha.png', 0,0,0,0, '', '', true); 

//embed image, masked with previously embedded mask
$pdf->Image('pdf_files/img_1.png',5,10,98,88,'','', false, $maskImg);


$pdf->Output();

?>