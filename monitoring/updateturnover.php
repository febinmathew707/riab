<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$company=$_SESSION["company_id"];
	$finyear=$_GET["finyear"];
	$turnover=$_GET["turnover"];
	$pandl=$_GET["pandl"];
	$type=$_GET["type"];
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($type==1)
			{	
				$strsql="SELECT MAX(turn_id) FROM emp_turnover";
				$result=mysql_query($strsql);
				$row=mysql_fetch_row($result);	
				$id=$row[0]+1;
						
				$strsql="INSERT INTO emp_turnover(turn_id,company_id,fin_year,turn_over,profit_loss)".
						"values(".
						"".$id.",".
						"".$company.",".
			        	"".$finyear.",".
			        	"".$turnover.",".
						"".$pandl.")";
			
			//echo $strsql;
							if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
						
					
						$r=mysql_query("COMMIT");
						echo "company turn over successfully added";
			}
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>