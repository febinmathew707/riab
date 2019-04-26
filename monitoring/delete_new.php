<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$tbl=$_GET["tbl"];
	
	$fld=$_GET["fld"];
	$value=$_GET["value"];
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		$sql="DELETE FROM ".$tbl. " WHERE ".$fld. "=".$value."";		
		if(!mysql_query($sql))
			{
				$r=mysql_query("ROLLBACK");
				die("Sorry,Your Record couldn't be updated");
			}
		else
		{
			mysql_query("COMMIT");
			echo "Entry successfully removed ";
		}
		
					
	}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>