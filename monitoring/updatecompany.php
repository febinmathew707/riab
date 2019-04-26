<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$type=$_GET["type"];
	$name=$_GET["name"];
	$add1=$_GET["add1"];
	$add2=$_GET["add2"];
	$activity=$_GET["activity"];
	$manpower=$_GET["manpower"];
	$email=$_GET["email"];
	$phone=$_GET["phone"];
	$unit=$_GET["unit"];
	//if($_GET["instcapacity"])
	$instcapacity=$_GET["instcapcity"];	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($type==0)
			{	
				$strsql="SELECT MAX(company_id) FROM emp_company";
				$result=mysql_query($strsql);
				$row=mysql_fetch_row($result);	
				$id=$row[0]+1;
						
				$strsql="INSERT INTO emp_company(company_id,company_name,company_add1,company_add2,activity,
						actual_manpower,inst_capacity,Email,unit,Phone)values(".
						"".$id.",".
			        	"'".str_replace("'","`",$name)."',".
						"'".str_replace("'","`",$add1)."',".
						"'".str_replace("'","`",$add2)."',".
						"'".str_replace("'","`",$activity)."',".
						"".$manpower.",".
						"".$instcapacity.",".						
						"'".str_replace("'","`",$email)."',".
						"'".str_replace("'","`",$unit)."',".
						"'".str_replace("'","`",$phone)."')";			
			//echo $strsql;
							if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
						
					
						$r=mysql_query("COMMIT");
						echo "company details successfully updated";
			}
			else
			{
				if(isset($_SESSION["ed_company_id"]))
				{
					$strsql="UPDATE emp_company set company_name='".str_replace("'","`",$name)."' ,".
					        " company_add1='".str_replace("'","`",$add1)."',".
							" company_add2='".str_replace("'","`",$add2)."',".
							" activity='".str_replace("'","`",$activity)."',".
							" Phone='".str_replace("'","`",$phone)."',".
							" Email='".str_replace("'","`",$email)."',".
							" unit='".str_replace("'","`",$unit)."',".
							" actual_manpower=".$manpower.",".
							" inst_capacity=".$instcapacity." where company_id=".$_SESSION["ed_company_id"]."";
				}
				else
				{
					$strsql="UPDATE emp_company set company_name='".str_replace("'","`",$name)."' ,".
					        " company_add1='".str_replace("'","`",$add1)."',".
							" company_add2='".str_replace("'","`",$add2)."',".
							" activity='".str_replace("'","`",$activity)."',".
							" Phone='".str_replace("'","`",$phone)."',".
							" Email='".str_replace("'","`",$email)."',".
							" unit='".str_replace("'","`",$unit)."',".
							" actual_manpower=".$manpower.",".
							" inst_capacity=".$instcapacity." where company_id=".$_SESSION["company_id"]."";
				}
						//echo $strsql;
						if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}   
						
					
						$r=mysql_query("COMMIT");
						echo "company details successfully updated";
						
						
				
			}
			if (isset($_SESSION["ed_company_id"]))
			{
				$_SESSION["ed_company_id"]=0;
			}
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>