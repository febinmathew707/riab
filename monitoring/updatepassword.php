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
	$newpwd=$_GET["newpwd"];
	$currentpwd=$_GET["currentpwd"];
	if($trans->convert($currentpwd)!=$_SESSION['pwd'])
	{
		echo("Current password you have entered is wrong!");
		die();
	}
	else
	{
	if($_SESSION["LogType"]=="EM")
	{
			if(mysql_query("UPDATE employee SET Pwd='".$trans->convert($newpwd)."' 
			WHERE Auto_No=".$_SESSION['emp_id'].""))
				{
					//$_SESSION['pwd']=$trans->convert($newpwd);
					echo "Your password successfully updated";					
				}
			else
				{
					echo "Sorry,Your request couldn't be completed";
				}
	}
	else
	{
		//$sql="UPDATE emp_user_setting SET udesc='".$trans->convert($newpwd)."' 
		//	WHERE ID=(select Id from emp_user where UNAME='".$_SESSION['user_name']."')";
			//echo $sql;
		if(mysql_query("UPDATE emp_user_setting SET udesc='".$trans->convert($newpwd)."' 
			WHERE ID=(select Id from emp_user where UNAME='".$_SESSION['user_name']."')"))
				{
					//$_SESSION['pwd']=$trans->convert($newpwd);
					echo "Your password successfully updated";
					
				}
			else
				{
					echo "Sorry,Your request couldn't be completed";
				}
	}
	}
?>