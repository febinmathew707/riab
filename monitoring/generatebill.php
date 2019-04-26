<?php
	session_start();
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD')
	{
		Header("Location: home.php");
		die();
	}
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	//$_SESSION["mainpage"]="";
	$month=$_GET["month"];
	$year=$_GET["year"];
	$strsql="SELECT * FROM emp_company WHERE company_id NOT IN (SELECT Company_Id from emp_company_bill 
	      	where Bill_Month=".$month." and Bill_Year=".$year.")";
	$result=mysql_query($strsql);
	if(mysql_num_rows($result)<=0)
	{
		die("Bill already sent to all companies");
	}
	while($row=mysql_fetch_array($result))
	{
		$strsql="select max(Bill_No) from emp_company_bill";
		$resultno=mysql_query($strsql);
		$rowno=mysql_fetch_row($resultno);
		
		$billno=$rowno[0]+1;
		$strsql="INSERT INTO emp_company_bill(Bill_No,Bill_Date,Company_Id,Bill_Month,Bill_Year,Amt_To_Pay,
		Edate)values(";
		$strsql=$strsql. " ".$billno.",";
		$strsql=$strsql. " '".date("Y-m-d")."',";
		$strsql=$strsql. " ".$row["company_id"].",";
		$strsql=$strsql. " ".$month.",";
		$strsql=$strsql. " ".$year.",";
		$strsql=$strsql. " 1000,";
		$strsql=$strsql. " '".date("Y-m-d")."')";		
		//echo $strsql;
		mysql_query($strsql);
	}
	echo "Bill successfully sent";
?>