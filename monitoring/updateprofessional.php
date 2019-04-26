<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$desig=$_GET["desig"];
	$discipline=$_GET["discipline"];
	$company=$_GET["company"];
	$sector=$_GET["sector"];
	
	$experience=$_GET["experience"];
	$expcurrentorg=$_GET["expcurrentorg"];
	$expcurrentpos=$_GET["expcurrentpos"];
	if($experience=="")
	{
		$experience=0;
	}
	if($expcurrentorg=="")
	{
		$expcurrentorg=0;
	}
	if($expcurrentpos=="")
	{
		$expcurrentpos=0;
	}
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="UPDATE employee SET Designation='".str_replace("'","`",$desig)."',";
		$strsql=$strsql."Dicipline='".str_replace("'","`",$discipline)."',";
		$strsql=$strsql."Company_Name='".str_replace("'","`",$company)."',";
		$strsql=$strsql."Sector='".str_replace("'","`",$sector)."',";
		$strsql=$strsql."Over_All_Experience=".$experience.",";
		$strsql=$strsql."Exp_in_Current_Org=".$expcurrentorg.",";
		$strsql=$strsql."Exp_in_Current_Pos=".$expcurrentpos." ";
		$strsql=$strsql."where Auto_No=".$_SESSION["emp_id"]."";
		
		echo $strsql;
						if(!mysql_query($strsql))
						{
							$r=mysql_query("ROLLBACK");
							die("Sorry,Your request couldn't be completed");
						}
					
				
					$r=mysql_query("COMMIT");
					echo "your profile successfully updated";
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>