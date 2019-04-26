<?php 
 session_start();
	echo "<font color=white>";
 	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 

		$sql="SELECT * FROM ev_videos where category='Albums' 
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
			
			
			$strvideoid=$strvideoid.$row[0]."*";
			$strimg=$strimg.$row[5]."*";
			$strvid=$strvid.$row[2]."*";
			$strviewed=$strviewed.$row[8]."*";
			$strlv=$strlv.date("d-m-Y",strtotime($row[3]))."*";
			$strcap=$strcap.$row[1]."*";
			//.$row1[5]."<br>";
			
		}
		echo $strimg;
		echo $strvid;
		echo $strvideoid;
		echo $strviewed;
		echo $strlv;
		echo $strcap;
		
		
?>
