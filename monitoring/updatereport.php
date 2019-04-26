<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	$tot=$_GET["tot"];
	$rptname=$_GET["rptname"];
	for($i=0;$i<=$tot;$i++)
	{
		$str="fld".$i;
		$strw="fldw".$i;
		$flds[$i]=$_GET[$str];
		$fldsw[$i]=$_GET[$strw];
	}
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		$strsql="SELECT MAX(Temp_Id) FROM emp_rpt_templates";
		$result=mysql_query($strsql);	
		$row=mysql_fetch_row($result);	
		$tmp_id=$row[0]+1;
		$strsql="INSERT INTO emp_rpt_templates(Temp_Id,Temp_Desc)values(";
		$strsql=$strsql." ".$tmp_id." , ";
		$strsql=$strsql." '".$rptname."' ) ";
		//echo $strsql;
						if(!mysql_query($strsql))
						{
							$r=mysql_query("ROLLBACK");
							die("Sorry,Your request couldn't be completed");
						}
		for($i=0;$i<=$tot;$i++)
		{
			if($flds[$i]!="")
			{
				$strsql="INSERT INTO emp_rpt_templates_det(TEMP_ID,FLD_NAME,FLD_WIDTH)VALUES(";
				$strsql=$strsql." ".$tmp_id." ,";
				$strsql=$strsql." '".$flds[$i]."' ,";
				$strsql=$strsql." '".$fldsw[$i]."')";
				if(!mysql_query($strsql))
							{
								$r=mysql_query("ROLLBACK");
								die("Sorry,Your request couldn't be completed");
							}
			}
			
		}			
			$_SESSION["rpt_id"]=$tmp_id;
			$r=mysql_query("COMMIT");
			echo $_SESSION["rpt_id"];					
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>