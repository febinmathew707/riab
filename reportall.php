<?php session_start();
	include("../connectdb/connect.php");
 	
	$_SESSION['Logged']="Yes"; 
	$_SESSION['LogType']="RP";	
	$_SESSION["company_id"]=0;
	$_SESSION['mainpage']="fvariablelist";
	$_SESSION['user_name']="report";
	
		Header("Location: start.php");
	
?>
