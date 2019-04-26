<?php 
 session_start(); 

	//$currentval=$_GET["curval"];
	
	
	//$_SESSION["sortby"]=$_GET["stype"];
	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	if ($_GET["type"]=="cap")
	{
		$_SESSION["cap"]=$_GET["val"];
	}
	else if($_GET["type"]=="cat")
	{
		$_SESSION["cat"]=$_GET["val"];
	}
	if (!isset($_SESSION["cap"]))
	{
		$_SESSION["cap"]="";
	}
	if (!isset($_SESSION["cat"]))
	{
		$_SESSION["cat"]="";
	}
	echo "<font color=white>";
	$sql="SELECT COUNT(*) FROM ev_videos ";
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
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$_SESSION["tot"]=$row[0];
		

?>
<table width=940 cellpadding="1" cellspacing="1" border=0 >
       		<tr>
		       <td  align="center" valign="top"  >
		       		<table  width=92% cellpadding="1" cellspacing="1" border=0 bordercolor="#FFFFFF"  >
						<tr>
						<td width=50% valign=top class="txtlefthead"> 
						 	
						 <?php				 
							if (!isset($_SESSION["cap"]))
							{	
								 if (isset($_SESSION["cat"]))
								 {
								 	if($_SESSION["cat"]=="")
								 	{
									 	echo "Featured Videos - All";
									}
									else
									{
										echo "Featured Videos - ".$_SESSION["cat"];
									}
								}
								else
									{
										echo "Featured Videos - All";
									}
							}
							elseif($_SESSION["cap"]=="")
							{
								if (isset($_SESSION["cat"]))
								 {
								 	if($_SESSION["cat"]=="")
								 	{
									 	echo "Featured Videos - All";
									}
									else
									{
										echo "Featured Videos - ".$_SESSION["cat"];
									}
								}
								else
									{
										echo "Featured Videos - All";
									}
							}
							else
							{
								if (isset($_SESSION["cat"]))
								 {
								 	if($_SESSION["cat"]=="")
								 	{
									 	echo "Search Result of - ".$_SESSION["cap"];
									}
									else
									{
										echo "Search Result of - '".$_SESSION["cap"]."' in " .$_SESSION["cat"] ;
									}
								}
								else
								{
									echo "Search Result of - ".$_SESSION["cap"];
								}
							}
						
						?>
						 
						 </td>
						<td width=50% valign=bottom class="txtright">
							<?php if(isset($_SESSION["tot"]))
							{
								echo "total -- ".$_SESSION["tot"]." -- videos found";
								//echo "qqq=".$sql;
							}
							?>
						</td>
						</tr>
					</table>
		    	</td>
    		</tr>
			<tr>
			
			<td width="600" align="left" valign="top" >
			<div id="list" align="left" width="860">
			</div>
			</td>
			<td width="394" align="left" valign="top">
				<table width=100% cellpadding="1" cellspacing="1" border=0 bordercolor="#FFFFFF"  >
				
				<tr><td width="100%" align="center" valign="top" class=txtleftsubhead>
						<img src="images/what.gif">					
				</td>
				</tr>
				<tr><td width="100%" align="center" valign="top" class=txtjustify>
					In fast moving modern life, events like inaugural ceremony,wedding, naming ceremony, convocation, anniversary, birth day party,-provide both entertainment and relaxation. WaveSat video stream them for enjoyment at a wider circle, worldwide, any time, at the click of a mouse.We also presents the world of cinema/entertainment with novelty and glamour.At a mouse click, millions can watch our video feasts.And they tell us, what they enjoy or not!
We refine to their tastes. Film/Song release, new kids on the block, new voices/faces, multimedia shows, and quiz are some of the favourable items.
 						
				</td>
				</tr>
				
				
				
				<!--
				<tr><td width="100%" align="left" valign="middle" class="normaltextleft"><b>
					<div id="al"><img src='images/mvalbums.gif'><input type="image" src="images/arrow.gif" onclick="expand('albums')"></div>
					<div id="albums"  ></div>
					<div id="ev"><img src='images/mvevents.gif'><input type="image" src="images/arrow.gif" onclick="expand('events')"></div>
					<div id="events" ></div>
					<div id="st"><img src='images/mvstageshow.gif'><input type="image" src="images/arrow.gif" onclick="expand('stage')"></div>
					<div id="stage" ></div>
					<div id="tvp"><img src='images/mvtv.gif'><input type="image" src="images/arrow.gif" onclick="expand('tv')"></div>
					<div id="tv" ></div>
					</b>
				</td>
				</tr> -->
				<tr><td width="100%" align="center" valign="middle"  background="images/top10.gif" height=300>
					
					<iframe src="displist1.php" height=230 width=250 scrolling=auto frameborder=0></iframe>
				</td>
				</tr>
				</table>
			</td>
			</tr>
		</table>