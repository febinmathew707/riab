<?php
// this file writes the image into the http response,
// so we cant have any output other than headers and the file data
ob_start();

$filename       = 'pdf_files/img_1.png';
$degrees        = 90;

// open the image file
$im = imagecreatefrompng( $filename );

// create a transparent "color" for the areas which will be new after rotation
// only quadratic images will not change dimensions
// r=0,b=0,g=0 ( black ), 127 = 100% transparency - we choose "invisible black"
$transparency = imagecolorallocatealpha( $im,0,0,0,127 );

// rotate, last parameter preserves alpha when true
$rotated = imagerotate( $im, $degrees, $transparency, 1);

// disable blendmode, we want real transparency
imagealphablending( $rotated, false );
// set the flag to save full alpha channel information
imagesavealpha( $rotated, true );


// now we want to start our output
ob_end_clean();
// we send image/png
header( 'Content-Type: image/png' );
imagepng( $rotated );
// clean up the garbage
imagedestroy( $im );
imagedestroy( $rotated );
?>