<?php
session_start();
$bg=imagecreatefrompng('pdf_files/box.png');
imagealphablending($bg, true);
imagesavealpha($bg, true);

for($i=0;$i<$_SESSION["count"];$i++)
   {
	  // echo $_SESSION["src".$i];
	   $img=imagecreatefrompng($_SESSION["src".$i]);
	   imagecopy($bg, $img, $_SESSION["left".$i]+36, $_SESSION["top".$i]+36, 0, 0, $_SESSION["width".$i], $_SESSION["height".$i]);
	   
	   $width=imagesx($bg);
	   $height = imagesy($bg);
	   
	   $desired_width=$width*2;
	   $desired_height = floor($height * ($desired_width / $width));
	
	   $doubled_image = imagecreatetruecolor($desired_width, $desired_height);
	
		imagealphablending($doubled_image, false);
		imagesavealpha($doubled_image, true); 
	
	
		imagecopyresampled($doubled_image, $bg, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	   
   //$this->Image(str_replace("png","jpg",$_SESSION["src".$i]),$_SESSION["left".$i],$_SESSION["top".$i]);
   //$pdf->Image($_SESSION["src".$i],$_SESSION["left".$i]+20,$_SESSION["top".$i]+20,'','','','', false, $maskImg);
   }
   //header('Content-Type: image/gif');
if($_SESSION["type"]=="pdf")
{
	imagejpeg($doubled_image,"rotated/out.jpg");
	Header("Location:pdfout_gif.php");
}
else
{
	header('Content-Type: image/jpg');
	imagejpeg($doubled_image);
}
/*
$image_1 = imagecreatefrompng('pdf_files/box.png');
$image_2 = imagecreatefrompng('pdf_files/img_1.png');
$image_3 = imagecreatefrompng('pdf_files/img_2.png');
imagealphablending($image_1, true);
imagesavealpha($image_1, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 95, 84);
imagecopy($image_1, $image_3, 50, 20, 0, 0, 99, 84);
header('Content-Type: image/jpg');
imagejpeg($image_1);
*/


?>
