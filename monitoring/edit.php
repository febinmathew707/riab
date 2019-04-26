<?php
	session_start();
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD' && $_SESSION['LogType']!='CO')
	{
		Header("Location: home.php");
		die();
	}
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="companymaster";
	switch($_GET["type"])
	{
		case "company":
						$_SESSION["ed_company_id"]=$_GET["val"];
						break;
		case "turnover":
						$_SESSION["ed_turnover_id"]=$_GET["val"];
						break;
		case "product":
						$_SESSION["ed_item_id"]=$_GET["val"];
						break;
		case "actbudget":
						$_SESSION["ed_bud_id"]=$_GET["val"];
						break;
		case "revbudget":
						$_SESSION["ed_revbud_id"]=$_GET["val"];
						break;
						
	}
	//echo $_SESSION["ed_company_id"];
?>