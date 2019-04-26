<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$cate="video";	
	$name=$_GET["name"];
		$desc=substr($_GET["desc"],0,5000);
	try
	{		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
				
		switch($cate)
		{		
			case "video":
			//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ SAVE CURRENT COURSE &&&&&&&&&&&&&&&&&&&&&&&&
				$strsql="INSERT INTO ev_video_comments(video_id,postdate,name,comment)VALUES(";
				$strsql=$strsql . " " .$_SESSION["video_id"]. " , ";
				$strsql=$strsql . " '" . date("Y-m-d H:i:s"). "' , ";
				$strsql=$strsql . " '" . $name. "' , ";
				$strsql=$strsql . " '" . str_replace("'","`",$desc). "' ) ";
				//echo $strsql;
				if(!mysql_query($strsql))
				{
					$r=mysql_query("ROLLBACK");
					die("Sorry,Your request couldn't be completed");
				}
				
				$strsql="SELECT COMMENTED FROM ev_videos WHERE video_id=".$_SESSION["video_id"]." ";
				 $result=mysql_query($strsql);
				 $row=mysql_fetch_row($result);
				 if($row[0]=="")
				 {
					$comment=1;
					}
					else
					{
						$comment=$row[0]+1;
					}
			
				$strsql="UPDATE ev_videos SET COMMENTED=".$comment." WHERE video_id=".$_SESSION["video_id"]."";
				
				mysql_query($strsql);
				$r=mysql_query("COMMIT");
				echo "YOUR COMMENT SUCCESSFULLY POSTED";
				break;
		}
	}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>