<?php
session_start();
$_SESSION["count"]=$_POST["count"];
$_SESSION["type"]=$_POST["type"];
for($i=0;$i<=$_POST["count"];$i++)
{
	make_thumb($_POST["src".$i],"rotated/img".$i.".png",-$_POST["degree".$i],$_POST["left".$i],$_POST["top".$i],$i);
	$_SESSION["src".$i]="rotated/img".$i.".png";
	//$_SESSION["left".$i]=$_POST["left".$i];
	//$_SESSION["top".$i]=$_POST["top".$i];
}
?>
<?php
function make_thumb($src, $dest,$degree,$left,$top,$i) {

	/* read the source image */
	$source_image = imagecreatefrompng($src);
	imagealphablending($source_image, true);
	/*
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	$desired_width=$width*2;
	$desired_height = floor($height * ($desired_width / $width));
	
	$doubled_image = imagecreatetruecolor($desired_width, $desired_height);
	
	
	imagealphablending($doubled_image, false);
	imagesavealpha($doubled_image, true); 
	
	imagecopyresampled($doubled_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	*/
	//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
	
	$transparency = imagecolorallocatealpha( $source_image,0,0,0,127 );
	
	$rotate = imagerotate($source_image, $degree, $transparency, 1);
	
	$width = imagesx($rotate);
	$height = imagesy($rotate);
	
	$width_src = imagesx($source_image);
	$height_src = imagesy($source_image);
	
	$_SESSION["left".$i]=($left+($width_src-$width)/2);
	$_SESSION["top".$i]=($top+($height_src-$height)/2);
	
	$desired_width=$width;
	//echo $width." ".$height;
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	echo $desired_height;
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	
	imagealphablending($virtual_image, false);
	imagesavealpha($virtual_image, true); 
	
	$_SESSION["width".$i]=$width;
	$_SESSION["height".$i]=$height;
	
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $rotate, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagepng($virtual_image, $dest);
}

?>
