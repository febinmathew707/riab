<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
 	include("mailsend.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$trans=new transform();
	$mail=new sendmail();
	$strsql="SELECT * FROM employee where send='N'";
	$result=mysql_query($strsql);
	 //$arr=array("a","S","c","Q","Y","3","7","K","b","8");
	while($row=mysql_fetch_array($result))
	{
		if($row["Email"]!="")
		{
			$mail->sendEmail($row["Email"],$trans->retrieve($row["Pwd"]));
			//mysql_query("UPDATE employee SET send='Y' WHERE Auto_No=".$row["Auto_No"]."");
		}
	}
	echo "Password Successfully sent";
	?>