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
	achcapacity=$_GET["achcapacity"];	
	$usedcapacity=$_GET["usedcapacity"];
	$efficiency=$_GET["efficiency"];	
	$utilization=$_GET["utilization"];
	$currmonthprdnqty=$_GET["currmonthprdnqty"];	
	$cumprodqty=$_GET["cumprodqty"];	
	$currmonthsaleqty=$_GET["currmonthsaleqty"];	
	$cumsaleqty=$_GET["cumsaleqty"];	
		
	$type=$_GET["type"];	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($type==1)
			{	
				$strsql="SELECT MAX(capacity_id) FROM emp_capacity";
				$result=mysql_query($strsql);
				$row=mysql_fetch_row($result);	
				$id=$row[0]+1;
						
				$strsql="INSERT INTO emp_capacity(capacity_id,company_id,fin_year,achievable_capacity,
						capacity_being_used,machine_efficiency,capacity_utilisation,prod_qty_formonth,prod_qty_cum,sale_qty_formonth,sale_qty_cum)".
						"values(".
						"".$id.",".
						"".$company.",".
			        	"".$finyear.",".
			        	"".$achcapacity.",".
			        	"".$usedcapacity.",".
			        	"".$efficiency.",".
						"".$utilization.",".
						"".$currmonthprdnqty.",".
						"".$cumprodqty.",".
						"".$currmonthsaleqty.",".
			        	"".$cumsaleqty.",)";
			
			 echo $strsql;
			 exit();
							if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
				
					
						$r=mysql_query("COMMIT");
						echo "capacity details successfully updated";
			}
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>