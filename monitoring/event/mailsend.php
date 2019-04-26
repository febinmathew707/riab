<?php session_start(); 
	
	$to=$_GET["to"];
	$subject=$_GET["subject"];
	$message="Video link from wavesatlive\n";
	$message.=$_GET["message"];	
	$header=$_GET["header"];
	$from = "wavesatlive.com";
	$headers = "From: $from";
	mail($to,$subject,$message,$headers);
	echo("FINISHED");
?>
