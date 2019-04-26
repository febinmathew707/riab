<?php 

 session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$worknature=$_GET["worknature"];
	//echo $_GET["training"];
	if($_GET["training"]=="true")
	{
		$training=1;		
	}
	else
	{
		$training=0;
	}
	if($_GET["field"]=="true")
	{
		$field=1;		
	}
	else
	{
		$field=0;
	}
	if($_GET["preference"]=="true")
	{
		$preference=1;		
	}
	else
	{
		$preference=0;
	}
	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="UPDATE employee SET Nature_of_work='".str_replace("'","`",$worknature)."',";
		$strsql=$strsql."Training_Required=".$training.",";
		$strsql=$strsql."Field_Exposure_Required=".$field.",";
		$strsql=$strsql."Preferance_Required=".$preference." ";
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