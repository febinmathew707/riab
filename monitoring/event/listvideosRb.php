<?php session_start();
	
 	include("../connectdb/connect.php");
		echo "<font color=white>";
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
		echo "cap=".$_SESSION["cap"]."<br>";
		echo "cat=".$_SESSION["cat"]."<br>";
		
		$sql="SELECT * FROM ev_videos "	;
		if (isset($_SESSION["cap"]))
		{
			if ($_SESSION["cap"]!="" )
				{
					$flg=1;
					if(strpos($sql,"where")===false)
					{
						$sql=$sql . " where caption like '%".$_SESSION["cap"]."%'"; 
					}
					else
					{
						$sql=$sql . " and caption like '%".$_SESSION["cap"]."%'"; 
					}
				}
		}
		if (isset($_SESSION["cat"]))
		{
		if ($_SESSION["cat"]!="" )
			{
				$flg=1;
				if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where category like '%".$_SESSION["cat"]."%'"; 
				}
				else
				{
					$sql=$sql . " and category like '%".$_SESSION["cat"]."%'"; 
				}
			}
		}
		if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where category='Show Reels' "; 
				}
				else
				{
					$sql=$sql . " and category='Show Reels' "; 
				}
		if ($_SESSION["sortby"]!="")
		{
			$sql= $sql. "order by ".$_SESSION["sortby"]." desc";
		}
		else
		{
			$sql= $sql. "order by  postdate desc";
		}
		
		
		$result=mysql_query($sql);
		
		
		$strimg= "&path=";
		$strvid= "&vid=";
		$strcap= "&cap=";
		$strviewed= "&viewed=";
		$strname="&nm=";
		$strlv= "&lv=";
		$strvideoid="&videoid=";
		$record=$_SESSION["startno"]-1;
	
		echo $sql;
		
		//echo "ddfd=".mysql_num_rows($result);
		$_SESSION["tot"]=mysql_num_rows($result);
		if(mysql_num_rows($result)>0)
		{
			if(mysql_num_rows($result)>$record)
			{
				mysql_data_seek($result,$record);
			}
			if((mysql_num_rows($result)-$record)>12)
	  		{
				$cnt=12;
			}
			else
			{
				$cnt=(mysql_num_rows($result)-$record);
			}
			echo "&tot=".$cnt;
			//while($row=mysql_fetch_array($result))
			for($i=1;$i<=$cnt;$i++)
			{
				
				$row=mysql_fetch_row($result);
				
				$sql1="select sum(viewed) from ev_vid_status where vid_id=".$row[0]." ";
				$result1=mysql_query($sql1);
				$row1=mysql_fetch_row($result1);
				
				$strvideoid=$strvideoid.$row[0]."*";
				$strimg=$strimg.$row[5]."*";
				$strvid=$strvid.$row[2]."*";
				$strname=$strname.$row[12]."*";
				$strviewed=$strviewed.$row1[0]."*";
				$strlv=$strlv.date("d-m-Y",strtotime($row[3]))."*";
				$strcap=$strcap.$row[1]."*";
				//.$row[5]."<br>";
				
			}
			echo $strvideoid;
			echo $strimg;
			echo $strvid;
			echo $strname;
			echo $strviewed;
			echo $strlv;
			echo $strcap;
		}
		else{
			 
			echo "&tot=0";
		
		}
		
		
?>
