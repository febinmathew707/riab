<?php session_start(); ?>
<?php

require('fpdf.php');

$pdf=new FPDF('l','pt','double');;

$pdf->AddPage();


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// A) provide image + separate 8-bit mask (best quality!)

//first embed mask image (w, h, x and y will be ignored, the image will be scaled to the target image's size)

$pdf->Image("rotated/out.jpg",50,50);



$pdf->Output();

?>