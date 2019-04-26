<?php	session_start();
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
	elseif($_SESSION['LogType']!='CO' && $_SESSION['LogType']!='AD' )
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
	$state=1;
	switch($_GET["type"])
	{
		case "company":
						if(mysql_query("DELETE FROM emp_company where company_id=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="companymaster";
						break;
		case "turnover":
						$strsql="DELETE FROM emp_turnover where turn_id=".$_GET["val"]."";
						if(mysql_query("DELETE FROM emp_turnover where turn_id=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="turnovermaster";
						
						break;
		case "product":
						if(mysql_query("DELETE FROM emp_products where item_code=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="productmaster";
						break;
		case "finyear":
						if(mysql_query("DELETE FROM emp_fin_year where year=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="finyear";
						break;
		case "actbudget":
						if(mysql_query("DELETE FROM emp_actual_budget where bud_id=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="actbudget";
						break;
		case "revbudget":
						if(mysql_query("DELETE FROM emp_reversed_budget where bud_rev_id=".$_GET["val"].""))
						{
							$state=2;
						}
						$_SESSION["mainpage"]="revbudget";
						break;
	}
	if($state==2)
	{
		echo "your request successfully completed" ;
	}
	else
	{
		echo "Sorry,Your request couldn't be completed";
	}
	//echo "ss=".$strsql;
	//echo $_SESSION["ed_company_id"];
?>