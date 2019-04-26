<?php
	//$arr=array();
	//$arr[]=$_GET["arr"];
	include("../connectdb/connect.php");
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$arr=$_GET["arr"];
	$sql="SELECT * FROM ev_videos where video_id in (".$_GET["arr"].")";
	//echo $sql;
	$result=mysql_query($sql);	
	while($row=mysql_fetch_array($result))
	{
		if(file_exists($row[0]))
		{
			unlink($row[0]);			
		}
		$sql2="DELETE FROM ev_videos where video_id=".$row[0]."";
		//echo $sql2;
		mysql_query($sql2);
	}
	echo "FINISHED";	
?>