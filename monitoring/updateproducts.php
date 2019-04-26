<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$name=$_GET["itname"];
	$type=$_GET["type"];
	if($_GET["instcapacity"]!="")
	{
		$instcapacity=$_GET["instcapacity"];
	}
	else
	{
		$instcapacity=0;
	}
	if($_GET["achcapacity"]!="")
	{
		$achcapacity=$_GET["achcapacity"];
	}
	else
	{
		$achcapacity=0;
	}
	$unit=$_GET["unit"];
	$finyear=$_GET["finyear"];
	//$manpower=$_GET["manpower"];	
	try
	{		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($type==0)
			{	
				$strsql="SELECT MAX(item_code) FROM emp_products";
				$result=mysql_query($strsql);
				$row=mysql_fetch_row($result);	
				$id=$row[0]+1;
						
				$strsql="INSERT INTO emp_products(item_code,item_name,inst_capacity,ach_capacity,unit,fin_year,
				company_id)values(".
						"".$id.",".
			        	"'".str_replace("'","`",$name)."',".
			        	"".$instcapacity.",".
			        	"".$achcapacity.",".
			        	"'".str_replace("'","`",$unit)."',".
			        	"".$finyear.",".
						"".$_SESSION["company_id"].")";
			
			//echo $strsql;
							if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
						
					
						
						echo "product successfully added";
						
			}
			else
			{
				$strsql="UPDATE emp_products SET 	".
						"item_name='".str_replace("'","`",$name)."',".
			        	"inst_capacity=".$instcapacity.",".
			        	"ach_capacity=".$achcapacity.",".
			        	"unit='".str_replace("'","`",$unit)."' ".
						"where  item_code=".$type."";						
						//echo $strsql;						
						if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
							echo "product successfully updated";
			}
			$_SESSION["ed_item_id"]=0;
			$r=mysql_query("COMMIT");
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>