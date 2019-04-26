<?php session_start();
	
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	                                                     // always modified
	header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");                
	echo "<font color=white>";
	 $_SESSION["vid_path"]="&path=".$_GET["path"];
	 $_SESSION["vid_url"]=$_GET["path"];
	 include("../connectdb/connect.php");	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	 {
		die('Could not connect to server' . mysql_error());
	 } 
	 
	 $sql="select * from ev_videos where vid_url='".$_GET["path"]."'";
	 $result=mysql_query($sql);
	 $row=mysql_fetch_row($result);
	 $_SESSION["video_id"]=$row[0];
	 $vidid=$row[0];
	  
	 $caption=$row[4];
	 $sql1="select sum(viewed) from ev_vid_status where vid_id=".$vidid." ";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_row($result1);
	 $view=$row1[0];
	 $comments=$row[9];
	 $vidname=substr($row[2],7);
	 //echo "NAME".$vidname;
	 $added=date("d-m-Y",strtotime($row[3]));
	 
	 $sql="UPDATE ev_videos set viewed=viewed+1,recentview='" . date("Y-m-d H:i:s"). "' 
	 where vid_url='".$_GET["path"]."'";
	
	 mysql_query($sql);
	 
	 $sql="select count(*) from ev_vid_status where vid_id=".$vidid." and date(dispdate)='".date("Y-m-d")."'";
	 //echo $sql;
	 $result=mysql_query($sql);
	 $row=mysql_fetch_row($result);
	 //echo $row[0];
	 if($row[0]>0 )
	 {
		$sql="UPDATE ev_vid_status set viewed=viewed+1 where date(dispdate)='".date("Y-m-d")."' and 
		vid_id=".$vidid."";
		//echo $sql;
		mysql_query($sql);
	}
	else
	{
		$sql="INSERT INTO ev_vid_status (vid_id,dispdate,viewed)VALUES(" ;
		$sql=$sql . "".$vidid.",";
		$sql=$sql . "'".date("Y-m-d H:i:s")."',";
		$sql=$sql . "1)";
		
		mysql_query($sql);
	}
	
	//echo "CAPTION".$_SESSION["cap"];
 	//echo "<font color=red>".$_SESSION['vid_url'];
 
?>

<table width=90% cellpadding="0" cellspacing="0" border=0 bgcolor="black">
<tr>
	<td  align="center" valign="top"  colspan=5>
		<embed src='predispvideo.swf' width=950 height=500 bgcolor="#000000" wmode="opaque"><br>
		<!-- <a href=JavaScript:list()><img src="images/back.gif" border="0"></a> -->
		
	</td>
</tr>
<tr>
	<td  align="center" valign="top"  colspan=5 class="txtleftsubhead">
		<img src="images/desc1.gif">
		
	</td>
</tr>
<tr>
	<td  align="left" valign="top"  class="txtleftsubhead" width="4%" background="images/desc2.gif">
		
	</td>
	<td  align="left" valign="top"  class="txtjustify" width="55%">
	
		<?php
		
		echo $caption;
	?>
		
	</td>
	<td  align="left" valign="top"  class="txtleftsubhead" width="1%">
		
	</td>
	<td  align="left" valign="top"  class="txtleftsubhead" width="19%">
	Added on :
	<?php
		echo $added;
	?>
		
	</td>
	<td  align="left" valign="top"  class="txtrighthead" width="21%">
	Views :
	<?php
		echo $view;
	?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	<tr>
	<td  align="right" valign="top"  colspan=5 height=10>
	<?php echo"<a href=download.php?f=".$vidname.">"; ?><img src='images/videodownload.gif' border=0   id='viddownload' onmouseover=swap('images/videodownload1.gif','viddownload') onmouseout=swap1('images/videodownload.gif','viddownload') ></a><input type='image' src='images/sendvideo.gif' border=0   id='sendvideo' onmouseover=swap('images/sendvideo1.gif','sendvideo') onmouseout=swap1('images/sendvideo.gif','sendvideo') onclick="semail()">
<?php echo"	<a href='".$_SESSION["home"]."'><img src='images/gohome.gif' border=0   id='gohome' onmouseover=swap('images/gohome1.gif','gohome') onmouseout=swap1('images/gohome.gif','gohome') ></a>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
	</td>
	</tr>

	<tr>
	<td  align="left" valign="top"  colspan=5 >
		<div id="send" style="position: absolute; z-index: 100;left: 480px; width:100; top:700px;"></div>
		<table width=100% cellpadding="0" cellspacing="0" border=0 >
		<tr>
			<td  align="left" valign="top"   height=30 >
				<table width=620 cellpadding="0" cellspacing="0" border=0 >
				<tr>
					<td  align="center" valign="middle"  background="images/commentbgtop.gif" height=30 
					class="txtleftsubhead">
					 
					</td>
					
				</tr>
				<tr>
					<td  align="center" valign="middle"  background="images/commentbgmiddle.gif" height=30 
					>
					<table width=90% cellpadding="0" cellspacing="0" border=0 >
					<tr>
					<td  align="center" valign="top"  class="txtleftsubhead"  
					width="28%">			
						 View comments [ <?php echo $comments ?> ]
					</td>
					<td  align="left" valign="middle" 
					width="72%">			
						<input type="image" src="images/arrow.gif" onclick="expand('viewcomment')" id="imgvwcomment" >
					</td>
					</tr>
					<tr>
					<td  align="right" valign="top"  class="txtleftsubhead" colspan=2 width=100%>
					<div id="ViewComment" align=right></div>
					</td>
					</tr>
					<tr>
					<td  align="center" valign="top"  class="txtleftsubhead"  
					width="28%">			
						 Post New Comment 
					</td>
					<td  align="left" valign="middle" 
					width="72%">			
						<input type="image" src="images/arrow.gif" onclick="expand('addcomment')" id="imgcomment" >
					</td>
					</tr>
					<tr>
					<td  align="right" valign="top"  class="txtleftsubhead" colspan=2>
					<div id="AddComment" align=right></div>
					</td>
					</tr>
					</table>
					</td>
					
				</tr>
				<tr>
					<td  align="center" valign="middle"  background="images/commentbgbottom.gif" height=35 class="txtleftsubhead">
					</td>
					
				</tr>
				</table>
		</td>
		<td  align="left" valign="top"   height=30 >
				<table  cellpadding="0" cellspacing="0" border=0 width="326">
				<tr>
					<td  align="center" valign="middle"  background="images/rvbgtop.gif" height=30 
					class="txtleftsubhead">
					 
					</td>
					
				</tr>
				<tr>
					<td  align="center" valign="middle"  background="images/rvbgmiddle.gif" height=30 
					>
					<table width=93% cellpadding="0" cellspacing="0" border=0 >
					<tr>
					<td  align="center" valign="top"  class="txtrightsubhead"  
					width="90%">			
						 Related Videos 
					</td>
					<td  align="left" valign="middle" 
					width="10%">			
						<input type="image" src="images/arrow.gif" onclick="expand('relatedvideo')" 
						id="imgrelatedvideo" >
					</td>
					</tr>
					<tr>
					<td  align="right" valign="top"  class="txtright" colspan=2 width=100%>
					<div id="relatedvideo" align=right ></div>
					</td>
					</tr>
					<tr>
					<td  align="center" valign="top"  class="txtrightsubhead"  
					width="90%">			
						 <?php if ($_SESSION["cat"]!="")
						 	{
								echo "more ".$_SESSION["cat"];
							} 
							else
							{
								echo "more videos";
							}
						?>
					</td>
					<td  align="left" valign="middle" 
					width="10%">			
						<input type="image" src="images/arrow.gif" onclick="expand('morevideo')" id="imgmorevideo" >
					</td>
					</tr>
					<tr>
					<td  align="left" valign="top"  class="txtleftsubhead" colspan=2>
					<div id="morevideo" align=right></div>
					</td>
					</tr>
					</table>
					</td>
					
				</tr>
				<tr>
					<td    background="images/rvbgbottom.gif" height=29>
					</td>
					
				</tr>
				</table>
		</td>
		</tr>
		</table>
	</td>
</tr>

</table>



