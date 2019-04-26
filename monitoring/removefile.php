<?php session_start(); ?>
<?php
	include("../connectdb/connect.php");
	//include("sessions.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$type1=$_GET["type"];
	//$path=$_GET["path"];
	if($type1=="photo")
	{
		if(!unlink($_SESSION["photo"]))
		{
			echo "failed1";
			die();
		}
		if(	mysql_query("UPDATE employee SET 	Photo='' 
							WHERE Auto_No=".$_SESSION['emp_id'].""))
		{
			$_SESSION['photo']="";
			echo "success";
		}
		else
		{
			echo "failed2";
		}
	}
	
	
?>