<?php session_start(); 	
?>
<html>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties="fixed"   > 

<?php
 	include("../connectdb/connect.php");
	$searchby=$_GET["stype"];
	//session_start();
	$_SESSION["cltype"]=$_GET["cltype"];
	$_SESSION["fval"]=$_GET["fval"];
	$_SESSION["lval"]=$_GET["lval"];
	$_SESSION["curval"]=$_GET["curval"];
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	}
    ////////////// FOLLOWING BLOCK DISPLAY THE SUBSEARCH CATEGORY
	switch($searchby)
	{
		case "name":
					
					$_SESSION["keyword"]=$_GET["keyword"];
					if(isset($_GET["city"]))
					{
						$_SESSION["s_city"]=$_GET["city"];
					}
					$_SESSION["quali"]=$_GET["quali"];
					$_SESSION["desig"]=$_GET["desig"];
					if(isset($_GET["company"]))
					{
						$_SESSION["company"]=$_GET["company"];
					}
					
					include("listmembers.php");
					break;
	
	}
	
?>	
		

	
 

 </body>
</html>