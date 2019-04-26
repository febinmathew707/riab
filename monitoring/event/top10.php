<?php 
 session_start();
	
 	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 

		$sql="SELECT * FROM ev_vid_status where date(dispdate)='".date("Y-m-d")."' 
		order by viewed desc";	
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>10)
		{
			echo "&tot=10";
			$cnt=10;
		}
		else
		{
			echo "&tot=".mysql_num_rows($result);
			$cnt=mysql_num_rows($result);
		}
		//echo $cnt;
		$strimg= "&path=";
		$strvid= "&vid=";
		$strcap= "&cap=";
		$strviewed= "&viewed=";
		$strvideoid="&videoid=";
		$strlv= "&lv=";
		for($i=1;$i<=$cnt;$i++)
		{
			$row=mysql_fetch_row($result);
			
			$sql1="SELECT * FROM ev_videos where video_id=".$row[0]."";
			$result1=mysql_query($sql1);
			$row1=mysql_fetch_row($result1);
			
			$strvideoid=$strvideoid.$row1[0]."*";
			$strimg=$strimg.$row1[5]."*";
			$strvid=$strvid.$row1[2]."*";
			$strviewed=$strviewed.$row1[8]."*";
			$strlv=$strlv.date("d-m-Y",strtotime($row1[3]))."*";
			$strcap=$strcap.$row1[1]."*";
			//echo "<font color=black>".$row1[5]."<br>";
			
		}
		echo $strimg;
		echo $strvideoid;
		echo $strvid;
		echo $strviewed;
		echo $strlv;
		echo $strcap;
		
		
?>
