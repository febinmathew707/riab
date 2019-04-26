<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	echo "state=".$_GET["stat"];
	echo "id=".$_GET["empid"];
	if($_GET["stat"]=="v")
	{
		$_SESSION['emp_id'] =$_GET["empid"];
	
		//$_SESSION['photo']=$_GET["photo"];
		
		$_SESSION['page']=$_GET["page"];
		$_SESSION['errordesc']="";
		$_SESSION['type']="view";
		$sql="SELECT * FROM employee WHERE Auto_No=".$_SESSION['emp_id']."";
		$result=mysql_query($sql);
		while($row= mysql_fetch_array($result))
		{ 
			$_SESSION['photo']=$row['Photo'];
			//$_SESSION['layout_id'] =$row['LAYOUT_ID'];
			$_SESSION['fname'] =ucfirst(strtolower($row['First_Name']));
			
			/*
			if($row["VIEWED"]!="")
			{
				$_SESSION['viewed']=$row["VIEWED"]+1;
			}
			else
			{
				$_SESSION['viewed']=1;
			}
			if($row["COMMENTED"]!="")
			{
				$_SESSION['commented']=$row["COMMENTED"]+1;
			}
			else
			{
				$_SESSION['commented']=0;
			}
			*/
		}
		echo $_SESSION['emp_id'];
		//$_SESSION['page']="general";
	}
	else if($_GET["stat"]=="e")
	{
		$_SESSION['type']="edit";
		$_SESSION['Logged']="Yes";
					
					$sql2="SELECT * FROM employe  WHERE Auto_No=".$_SESSION['profileid']."";
					//echo $sql2;
					
  					$result2=mysql_query($sql2);
  					while($row2= mysql_fetch_array($result2))
  					{
						$_SESSION['emp_id']=$row2['Auto_No'];
						$_SESSION['photo']=$row2['Photo'];
						$_SESSION['type']="edit";
						//$_SESSION['layout_id']=$row2['LAYOUT_ID'];
					}
					$_SESSION['page']="general";
					$_SESSION['errordesc']="";
					session_cache_expire(360);
	}
	else
	{
		$_SESSION['type']="new";
		//$_SESSION['layout_id']=2;
		$_SESSION['emp_id']="n";
		$_SESSION['photo']="";
		$_SESSION['album_id']="";
		
		$_SESSION['page']="general";
	}
	
	
	
	
?>