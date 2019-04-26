<?php
session_start();
$_SESSION["count"]=$_REQUEST["count"];
for($i=0;$i<=$_REQUEST["count"]-1;$i++)
{
	make_gif($_REQUEST["src".$i],"rotated/img".$i.".gif",-$_REQUEST["degree".$i],$_REQUEST["left".$i],$_REQUEST["top".$i],$i);
	$_SESSION["src".$i]="rotated/img".$i.".gif";
	//$_SESSION["left".$i]=$_POST["left".$i];
	//$_SESSION["top".$i]=$_POST["top".$i];
}
?>
<?php
function make_thumb($src, $dest,$degree,$left,$top,$i) {

	/* read the source image */
	
	$source_image = imagecreatefromgif($src);
	imagealphablending($source_image, true);
	
	$transparency = imagecolorallocatealpha( $source_image,0,0,0,127 );
	
	$rotate = imagerotate($source_image, $degree,$transparency,1);
	
	$width = imagesx($rotate);
	$height = imagesy($rotate);
	
	$width_src = imagesx($source_image);
	$height_src = imagesy($source_image);
	
	$_SESSION["left".$i]=$left+($width_src-$width)/2;
	$_SESSION["top".$i]=$top+($height_src-$height)/2;
	
	$desired_width=$width;
	//echo $width." ".$height;
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));
	echo $desired_height;
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	
	imagealphablending($virtual_image, true);
	imagesavealpha($virtual_image, true); 
	
	
	
	
	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $rotate, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	/* create the physical thumbnail image to its destination */
	imagegif($virtual_image, $dest);
}
function make_gif($src,$dest,$degree,$left,$top,$i)
{
	// load/create images

// set background transparent if GIF or PNG
$source_image=imagecreatefromgif($src);
if($degree!=0)
{
	$source_image=imagecreatefromgif($src);
imagealphablending($source_image, false);
imagesavealpha( $source_image, true );
    
$bgcolor = imagecolortransparent($source_image);
echo $bgcolor;



$img_src = imagerotate($source_image, $degree,$bgcolor,1);
}
else
{
	$img_src=imagecreatefromgif($src);
imagealphablending($img_src, false);
imagesavealpha( $img_src, true );
}


///$img_src=imagecreatefromgif($src);

$width = imagesx($img_src);
$height = imagesy($img_src);

$width_src = imagesx($source_image);
	$height_src = imagesy($source_image);
	
	$_SESSION["left".$i]=$left+($width_src-$width)/2;
	$_SESSION["top".$i]=$top+($height_src-$height)/2;

$img_dst=imagecreatetruecolor($width,$height);
imagealphablending($img_dst, false);

// get and reallocate transparency-color
$transindex = imagecolorallocatealpha( $img_src,0,0,0,127 );
echo $transindex."<br>";
if($transindex >= 0) {
  $transcol = imagecolorsforindex($img_src, $transindex);
  echo $transcol['red']."<br>";
  $transindex = imagecolorallocatealpha($img_dst, $transcol['red'], $transcol['green'], $transcol['blue'], 127);
  echo $transindex;
  //imagefill($img_dst, 0, 0, 227);
}

// resample
imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $width, $height, $width, $height);

// restore transparency
if($transindex >= 0) {
  imagecolortransparent($img_dst, $transindex);
  for($y=0; $y<$height; ++$y)
    for($x=0; $x<$width; ++$x)
      if(((imagecolorat($img_dst, $x, $y)>>24) & 0x7F) >= 100) imagesetpixel($img_dst, $x, $y, $transindex);
}

// save GIF
//imagetruecolortopalette($img_dst, true, 255);

	imagesavealpha($img_dst, true); 
imagegif($img_dst, $dest);
imagedestroy($img_dst); 
}
?>
