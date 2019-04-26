<?php session_start(); 
	include("../connectdb/connect.php");	
 	mysql_select_db("soemonit_pentaclt",$con);
	if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$to=$_GET["to"];
	$subject="SOE Monitor Feeback Reply";
	$message=$_GET["message"];	
	$from = "soemonitor.org";
	$headers = "From: $from";
	mail($to,$subject,$message,$headers);	
	echo("REPLY SUCCESSFULLY SENT");
	
?>
