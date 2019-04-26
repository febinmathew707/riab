<?php
function make_thumb($src, $dest) {

	/* read the source image */
	$source_image = imagecreatefrompng($src);
	imagealphablending($source_image, true);
	
	$transparency = imagecolorallocatealpha( $source_image,0,0,0,127 );
	
	$rotate = imagerotate($source_image, 10, $transparency, 1);
	
	$width = imagesx($rotate);
	$height = imagesy($rotate);
	
	$desired_width=$width;
	//echo $width." ".$height;
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	echo $desired_height;
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	
	imagealphablending($virtual_image, false);
	imagesavealpha($virtual_image, true); 
	
	
	
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $rotate, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagepng($virtual_image, $dest);
}
make_thumb("pdf_files/img_1.png","dd.png");
?>
