<?php
 $source_image = imagecreatefrompng("images/red_middle.png");
 $first=imagecreatefrompng("images/red_left.png");
 $red_end=imagecreatefrompng("images/red_end.png");
  $width = imagesx($source_image);
  $height = imagesy($source_image);
  $background=imagecreatefrompng("images/bar.png");
  
	// Find base image size
  $swidth = imagesx($background);
  $sheight = imagesy($background);
   
   // Find left image size
   $lwidth = imagesx($first);
   $lheight = imagesy($first);
   
    // Find red end image size
   $rdwidth = imagesx($red_end);
   $rdheight = imagesy($red_end);
  
  // Turn on alpha blending
  //imagealphablending($background, true);
   
 $w_offset = 0;
	$h_offset = 0;
  
  /* find the "desired height" of this thumbnail, relative to the desired width  */
  for($i=1;$i<=100;$i++)
  {	  
		
  $desired_height = $sheight;
  $desired_width=$i*($swidth/100);
  $dest="progressbar_large/".$i.".png";
  /* create a new, "virtual" image */
  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
  
  
  
  /* copy source image at a resized size */
  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
  
  imagecopymerge($virtual_image, $red_end,$desired_width-$rdwidth, 0, 0, 0, $rdwidth,$rdheight,100);
  
  // Overlay watermark
	imagecopy($background, $virtual_image, 0, $sheight - $desired_height - $h_offset, 0, 0, $desired_width, $desired_height);
	
	imagecopymerge($background, $first,0, 0, 0, 0,$lwidth,$lheight,100);
	if($i<=99)
		$last=imagecreatefrompng("images/bar_behind_last.png");
	else
		$last=imagecreatefrompng("images/red_right.png");
		
	 // Find right image size
   $rwidth = imagesx($last);
   $rheight = imagesy($last);
		
	imagecopymerge($background, $last,$swidth-$rwidth, 0, 0, 0, $rwidth,$rheight,100);
  
  /* create the physical thumbnail image to its destination */
  imagepng($background, $dest);
  }
  echo "completed";
?>
