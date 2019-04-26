<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$behavioral=$_GET["behavioral"];
	$skill=$_GET["skill"];
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="UPDATE employee SET Behavioral_Competence='".str_replace("'","`",$behavioral)."',";
		$strsql=$strsql."Skill='".str_replace("'","`",$skill)."' ";
		$strsql=$strsql."where Auto_No=".$_SESSION["emp_id"]."";
		
		//echo $strsql;
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