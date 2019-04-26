<?php session_start(); 
	
	/*if($_SESSION['Logged']!="Yes")
	{
		Header("Location: index.html");
		die();
	}*/
?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$trans=new transform();
	$pwd=$_GET["uspass"];
	$company=$_GET["company"];
	$userid=$_GET["usname"];
	$name=$_GET["name"];
	$desig=$_GET["desig"];	
	$type=$_GET["type"];
	//$id=$_GET["id"];
	$r=mysql_query("SET AUTOCOMMIT=0");
	
		$sql="select max(ID) from emp_user";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if($row[0]=="")
		{
			$uid=1;
		}
		else
		{
			$uid=$row[0]+1;
		}
		$sql="SELECT * FROM emp_user WHERE ID=".$uid."";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if(mysql_num_rows($result)>0)
		{
			$r=mysql_query("ROLLBACK");
			die("User Id Existed!! please select another");
		}
		$sql="SELECT * FROM emp_user_setting WHERE COMPANY_ID=".$company." AND UTYPE='".$type."'";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if(mysql_num_rows($result)>0)
		{
			$r=mysql_query("ROLLBACK");
			die("There is an officer account already created for this company");
		}
		mysql_query("START TRANSACTION");
		$sql="INSERT INTO emp_user(ID,UNAME,EDATE)VALUES(";
		$sql=$sql."".$uid.",";
		$sql=$sql."'".$userid."',";
		$sql=$sql."'".date('Y-m-d')."')";
		//echo$sql;
		if(!mysql_query($sql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your Account information couldn't be saved3");
		}
		
		$sql="INSERT INTO emp_user_setting(ID,UDESC,UTYPE,name,desig,COMPANY_ID)VALUES(";
		$sql=$sql."".$uid.",";
		$sql=$sql."'".$trans->convert($pwd)."',";
		$sql=$sql."'".$type."',";
		$sql=$sql."'".$name."',";
		$sql=$sql."'".$desig."',";
		$sql=$sql."".$company.")";
		if(!mysql_query($sql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your Account information couldn't be saved4");
		}
		mysql_query("COMMIT");
		echo("FINISHED");
	
?>