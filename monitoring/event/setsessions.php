<?php session_start(); 

	$currentval=$_GET["curval"];
	
	if ($currentval>1)
	{
		$startno=($currentval*12)-11;	
	}
	else
	{
		$startno=1;
		$firstval=1;
		$lastval=12;
	}
	$_SESSION["startno"]=$startno;
	$_SESSION["sortby"]=$_GET["stype"];
	if (isset($_GET["cltype"]))
	{
		$_SESSION["cltype"]=$_GET["cltype"];
	}
	if (isset($_GET["curval"]))
	{
		$_SESSION["curval"]=$_GET["curval"];
	}
	if (isset($_GET["fval"]))
	{	
		$_SESSION["fval"]=$_GET["fval"];
	}
	if (isset($_GET["lval"]))
	{
		$_SESSION["lval"]=$_GET["lval"];
	}
	//$_SESSION["cap"]="";
	
	if ($_GET["type"]=="cap")
	{
		$_SESSION["cap"]=$_GET["val"];
	}
	else if($_GET["type"]=="cat")
	{
		$_SESSION["cat"]=$_GET["val"];
	}
	if (!isset($_SESSION["cap"]))
	{
		$_SESSION["cap"]="";
	}
	if (!isset($_SESSION["cat"]))
	{
		$_SESSION["cat"]="";
	}
	

?>