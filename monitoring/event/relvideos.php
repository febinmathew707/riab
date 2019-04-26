<?php session_start();
	
 	include("../connectdb/connect.php");
	echo "<font color=white>";
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 

		if($_SESSION["cat"]!="")
		{
			$sql="SELECT * FROM ev_videos where category='".$_SESSION["cat"]."' order by postdate desc";
		}
		else
		{
			$sql="SELECT * FROM ev_videos  order by postdate desc";
		}	
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>21)
		{
			echo "&tot=21";
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
			//".$row1[5]."<br>";
			
		}
		echo $strimg;
		echo $strvideoid;
		echo $strvid;
		echo $strviewed;
		echo $strlv;
		echo $strcap;
		
		
?>
