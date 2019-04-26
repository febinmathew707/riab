<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$trans=new transform();
	$strsql="UPDATE employee set userid=concat('member',employee.Auto_No) where userid is null";
	mysql_query($strsql);
	$strsql="SELECT * FROM employee where Pwd is null";
	$result=mysql_query($strsql);
	 //$arr=array("a","S","c","Q","Y","3","7","K","b","8");
	while($row=mysql_fetch_array($result))
	{
		$no=$row["Auto_No"]*2;
		$no=$no*9;
		
		$len=strlen($no);
		$j=0;
		$op="";
		
		while($j<$len)
		{
			$no1=substr($no,$j,1);
		
			$op=$op.($no1*7);
			$j+=1;
		}
		
		//echo $op."<br>";
		$pwd=$trans->convert($trans->createPwd($op));
		$strsql="UPDATE Employee SET pwd=".$pwd."";
		mysql_query($strsql);
	}
	echo "Password Successfully Created";