<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$fname=$_GET["fname"];
	$lname=$_GET["lname"];
	$dofb=$_GET["dofb"];
	$sex=$_GET["gender"];
	
	$religion=$_GET["religion"];
	$maritalstatus=$_GET["maritalstatus"];
	$area=$_GET["area"];
	$quali=$_GET["quali"];
	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="UPDATE employee SET First_Name='".str_replace("'","`",$fname)."',";
		$strsql=$strsql."Last_Name='".str_replace("'","`",$lname)."',";
		$strsql=$strsql."Date_of_Birth='".date('Y-m-d',strtotime($dofb))."',";
		$strsql=$strsql."Sex='".str_replace("'","`",$sex)."',";
		$strsql=$strsql."Religion='".str_replace("'","`",$religion)."',";
		$strsql=$strsql."Marital_Status='".str_replace("'","`",$maritalstatus)."',";
		$strsql=$strsql."Area_Of_Expertise='".str_replace("'","`",$area)."' ,";
		$strsql=$strsql."Qualification='".str_replace("'","`",$quali)."' ";
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