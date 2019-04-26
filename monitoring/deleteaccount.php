<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
		$acid=$_GET["acid"];
	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="DELETE FROM emp_user_setting where ID=".$acid."";		
		
		if(!mysql_query($strsql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your request couldn't be completed");
		}
		
		$strsql="DELETE FROM emp_user where ID=".$acid."";			
		if(!mysql_query($strsql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your request couldn't be completed");
		}			
				
		$r=mysql_query("COMMIT");
		echo "account successfully deleted";
	}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>