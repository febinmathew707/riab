<?php
	include("../connectdb/connect.php");
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
		$id=$_GET["id"];	
		$sql="SELECT vid_url FROM ev_videos WHERE video_id=".$id."";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		//echo $sql;
		if (file_exists($row[0]))
		{
			unlink($row[0]);
		}
		$sql2="DELETE FROM ev_videos WHERE video_id=".$id."";
		if(mysql_query($sql2))
		{
			echo"FINISHED";
		}
		else
		{
			echo "FAILED";
		}
?> 