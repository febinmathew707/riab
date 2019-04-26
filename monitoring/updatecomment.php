<?php session_start(); ?>
<?php	
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	mysql_select_db("soemonit_pentaclt",$con);
	if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	}
	$blid=$_GET["blid"];
	
	//$name=$_GET["name"];
	//$email=$_GET["email"];
	$desc=$_GET["desc"];
	//$category=$_GET["category"];	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
				//$$$$$$$$$$$$$$$$$$$ IF EDIT DELETE FIRST @@@@@@@@@@@@@@@@@@@@@@@@@@@@
				
			//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SAVE CURRENT COURSE &&&&&&&&&&&&&&&&&&&&&&&&		
						$strsql="SELECT name from emp_user_setting WHERE ID=".$_SESSION['mem_id']."";
						//echo $strsql;
						$resultuser=mysql_query($strsql);
						$rowuser=mysql_fetch_row($resultuser);
						if($rowuser[0]=="")
						{
							$name=$_SESSION['user_name'];
						}
						else
						{
							$name=$rowuser[0];
						}
						$strsql="INSERT INTO blog_comments(name,edate,bl_id,comment)VALUES(";
						$strsql=$strsql . " '" . str_replace("'","`",$name). "' , ";
						$strsql=$strsql . " '" . date("Y-m-d H:i:s"). "' , ";
						$strsql=$strsql . " " .$blid. " , ";
						$strsql=$strsql . " '" . trim(str_replace("'","`",$desc)). "' ) ";
						//echo $strsql;
						if(!mysql_query($strsql))
						{
							$r=mysql_query("ROLLBACK");
							die("Sorry,Your request couldn't be completed");
						}
					
				
					$r=mysql_query("COMMIT");
					echo "COMMENT SUCCESSFULLY POSTED";
		}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>