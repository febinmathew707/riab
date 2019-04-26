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
	$strsql="INSERT INTO employee (First_Name)values('rrrrrrrrrrr')";
		echo $strsql;
		if(!mysql_query($strsql))
		{
			$r=mysql_query("ROLLBACK");
			die("Sorry,Your request couldn't be completed");
		}
		else
		{
			echo"success";
		}