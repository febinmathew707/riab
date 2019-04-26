<?php 
 session_start(); 
 	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
		
		$sql="SELECT * FROM ev_videos  ";	
		$result=mysql_query($sql);
		echo "&tot=".mysql_num_rows($result);
		$strimg= "&path=";
		$strvid= "&vid=";
		$strcap= "&cap=";
		$strviewed= "&viewed=";
		$strlv= "&lv=";
		
		$record=$_SESSION["startno"]-1;
			  		//echo $record;
  		//mysql_data_seek($result,$record);
  		
  		if((mysql_num_rows($result)-$record)>12)
  		{
			$cnt=12;
		}
		else
		{
			$cnt=(mysql_num_rows($result)-$record);
		}
		 $strimg="";
		 $strvid="";
		 $strviewed="";
		 $strlv="";
		 $strcap="";
  		//for($i=1;$i<=$cnt;$i++)
  		while($row=mysql_fetch_array($result))
  		{ 
		  //$row=mysql_fetch_row($result);
		
			$strimg=$strimg.$row[5]."*";
			$strvid=$strvid.$row[2]."*";
			$strviewed=$strviewed.$row[8]."*";
			$strlv=$strlv.date("d-m-Y",strtotime($row[4]))."*";
			$strcap=$strcap.$row[1]."*";
			//
			//echo $row[5]."<br>";
			//echo $strvid."<br>";
			//echo $strviewed."<br>";
			//echo $strlv."<br>";
		//	echo $strcap."<br>";
		}
		//echo "<font color=white>";
		echo $strimg;
		echo $strvid;
		echo $strviewed;
		echo $strlv;
     	echo $strcap;
		
		
?>
