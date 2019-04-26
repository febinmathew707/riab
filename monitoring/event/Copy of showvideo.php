<?php session_start();
	echo "<font color=white>";
	 $_SESSION["vid_url"]="&path=".$_GET["path"];
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
	 $cap=$row[1];
	 $view=$row[8];
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
	echo "caption".$_SESSION["cap"];
 	//echo "<font color=red>".$_SESSION['vid_url'];
?>

<table width=98% cellpadding="0" cellspacing="0" border=0 bgcolor="black">
<tr>
	<td  align="center" valign="top"  colspan=3>
		<embed src='eventvideo.swf' width=950 height=500 bgcolor="#000000" wmode="opaque"><br>
		<!-- <a href=JavaScript:list()><img src="images/back.gif" border="0"></a> -->
	</td>
</tr>
<tr>
	<td  align="left" valign="top"  class="txtlefthead" width="60%">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
		echo $cap;
	?>
		
	</td>
	<td  align="left" valign="middle"  class="txtleftsubhead" width="19%">
	Added on :
	<?php
		echo $added;
	?>
		
	</td>
	<td  align="left" valign="bottom"  class="txtrighthead" width="21%">
	Views :
	<?php
		echo $view;
	?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	<tr>
	<td  align="right" valign="top"  colspan=3 height=10>
	<?php echo"<a href=download.php?f=".$vidname.">"; ?><input type='image' src='images/videodownload.gif' border=0   id='viddownload' onmouseover=swap('images/videodownload1.gif','viddownload') onmouseout=swap1('images/videodownload.gif','viddownload') ></a><input type='image' src='images/sendvideo.gif' border=0   id='sendvideo' onmouseover=swap('images/sendvideo1.gif','sendvideo') onmouseout=swap1('images/sendvideo.gif','sendvideo') onclick="send()">
<?php echo"	<a href='home.php'><input type='image' src='images/gohome.gif' border=0   id='gohome' onmouseover=swap('images/gohome1.gif','gohome') onmouseout=swap1('images/gohome.gif','gohome') ></a>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
	</td>
	</tr>
<div id="send" style="border: 0px ridge rgb(0, 0, 128);position: absolute; z-index: 100;left: 480px; width:100; top:700px;"></div>
	<tr>
	<td  align="left" valign="top"  colspan=3 >
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
</tr>
</table>



