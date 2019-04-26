<?php
	// *** CAPTCHA image generation *** 
	// *** http://frikk.tk *** 4	 
	session_start(); 
	 
	// *** Tell the browser what kind of file is come'n at 'em! *** 
	header("Content-Type: image/jpeg"); 
	 
	// *** Send a generated image to the browser *** 
	create_image(); 
	die(); 
	 
	// *** Function List *** 
	function create_image() 
	{ 
	    // *** Generate a passcode using md5 
	    //  (it will be all lowercase hex letters and numbers *** 
	    $md5 = md5(rand(0,9999)); 
	    $pass = substr($md5, 3, 7); 
	     
	    // *** Set the session cookie so we know what the passcode is *** 
	    $_SESSION["pass"] = $pass; 
	     
	    // *** Create the image resource *** 
	    $image = ImageCreatetruecolor(250, 100);   
	 
	    // *** We are making two colors, white and black *** 
	    $clr_white = ImageColorAllocate($image, 255, 255, 255); 
	    $clr_black = ImageColorAllocate($image, 0, 0, 0); 
	 
	    // *** Make the background black *** 
	    imagefill($image, 0, 0, $clr_black); 
	 
	    // *** Set the image height and width *** 
	    imagefontheight(150); 
	    imagefontwidth(150); 
	 
	    // *** Add the passcode in white to the image *** 
	    
	    imagestring($image, 10, 30, 3, $pass, $clr_white); 
	     
    // *** Throw in some lines to trick those cheeky bots! *** 
	    imageline($image, 5, 1, 50, 20, $clr_white); 
	    imageline($image, 60, 1, 96, 20, $clr_white); 
	 	
	    // *** Output the newly created image in jpeg format *** 
	    imagejpeg($image); 
	     
	    // *** Clear up some memory... *** 
	    imagedestroy($image); 
	} 
	?>