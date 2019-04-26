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
	$finyear=$_GET["finyear"];
	$type=$_GET["type"];
	//$manpower=$_GET["manpower"];	
	try
	{		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($type==1)
			{		
						
				$strsql="INSERT INTO emp_fin_year(fin_year,year)values(".						
			        	"'".str_replace("'","`",$finyear)."',".substr($finyear,5).")";
			
			//echo $strsql;
							if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
						
					
						$r=mysql_query("COMMIT");
						echo "financial year successfully added";
			}
		}
	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}		
?>