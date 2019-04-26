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
	
	$email=$_GET["email"];
	$cellphone=$_GET["cellphone"];
	$homephone=$_GET["homephone"];
	$add1=$_GET["add1"];
	
	$add2=$_GET["add2"];
	$add3=$_GET["add3"];
	$city=$_GET["city"];
	$country=$_GET["country"];
	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		$strsql="UPDATE employee SET Email='".str_replace("'","`",$email)."',";
		$strsql=$strsql."Cell_Phone='".str_replace("'","`",$cellphone)."',";
		$strsql=$strsql."Home_Phone='".str_replace("'","`",$homephone)."',";
		$strsql=$strsql."Office_Add1='".str_replace("'","`",$add1)."',";
		$strsql=$strsql."Office_Add2='".str_replace("'","`",$add2)."',";
		$strsql=$strsql."Office_Add3='".str_replace("'","`",$add3)."',";
		$strsql=$strsql."City='".str_replace("'","`",$city)."', ";
		$strsql=$strsql."Country='".str_replace("'","`",$country)."' ";
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