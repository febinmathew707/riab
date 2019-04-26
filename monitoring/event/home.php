<?php 
 
	session_start();
	/*header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	                                                     // always modified
	header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");   */             
	//
	//clearstatcache();
	//session_start(); 
		include("../connectdb/connect.php");	
	 	 mysql_select_db("wavesatlive",$con);
		 if(!$con)
		{
			die('Could not connect to server' . mysql_error());
		} 
		//$_SESSION["cap"]="";
		//$searchby=$_GET["stype"]; // name city etc
		/*$_SESSION["sortby"]="postdate";
		$_SESSION["cap"]="";
		$_SESSION["cat"]="";
		
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
					$sql=$sql . " where caption like '%".$_SESSION["cat"]."%'"; 
				}
				else
				{
					$sql=$sql . " and caption like '%".$_SESSION["cat"]."%'"; 
				}
			}
		}
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		
		$totrows=$row[0];
		if(($totrows/12)>(intval(($totrows/12))))
		{
			$tot_record=intval(($totrows/12))+1;
		}
		else
		{
			$tot_record=intval(($totrows/12));
		}
		$orderby=$_GET["orderby"];
		
		$clicktype=$_SESSION["cltype"];
		$currentval=$_SESSION["curval"];
		
		$firstval=$_SESSION["fval"];
		$lastval=$_SESSION["lval"];
		
		if ($currentval>1)
		{
	
			$startno=($currentval*12)-11;
		
		}
		else
		{
			$startno=1;
			$firstval=1;
			$lastval=12;
		}
		$endno=$startno+11;
		$beginno=$startno;*/
		$_SESSION["home"]="home.php";
		//$_SESSION["startno"]=1;
		echo("<font color=white>");
		
		
		
		//$i=$startno+12;
?>

<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<script src="event.js"></script>
<script type="text/javascript" src="myprintln.js"></script>


<link rel="shortcut icon" href="images/small.gif">
<title>:: WAIVE SAT  Global Video Telecasting Portal:: </title>
<style type="text/css">
<!--
A:link { COLOR: #9C9898; TEXT-DECORATION: none; font-weight: bold }
A:visited { COLOR: white; TEXT-DECORATION: none; font-weight: bold }
A:active { COLOR:  white; TEXT-DECORATION:none; font-weight: bold }
A:hover { COLOR:  white; TEXT-DECORATION: none; font-weight: bold }
-->
</style>

<link href="../styleSheet/controls.css" type=text/css rel=stylesheet>
<link href="../styleSheet/event.css" type=text/css rel=stylesheet>
</head>

 <?php
 		if (isset($_GET["path"]))
		{
			//echo "yes";
			//echo "<script> mes() </script>";
			echo "<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#000000  
>";
			
			$id=$_GET["path"]/14522;
			$sql="SELECT * FROM ev_videos where video_id=".$id."";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			echo "<script> showvideo('".$row[2]."','video')</script>";
		}
		else
		{
			//echo "no";
			echo "<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#000000  
onload=getState('postdate','',1,1,1)>"; 
		}
	?>
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#000000" style="border-collapse: collapse"  width="100%"  bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center height="100%">
 
 
   <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="961" id="AutoNumber1" bgcolor="#000000">
     <tr>
       <td width="961" height="104" align="right" valign="bottom" background="images/head.gif" >
       <font face="Verdana" size="1" color="#9C9898"> <b><a href="http://www.wavesatlive.com" >Wavesat Home</a> |<a href="Javascript:filt('','')"> Featured Videos </a> |<a href="aboutevents.php">About Wavesat Events </a> |  
	   <a href="../contact.php">Contact Us</a></b></font><br><br><br>
	   	<table width=80% cellpadding="1" cellspacing="1" border=0 bordercolor="#FFFFFF"  >
	   		<tr><td valign="bottom" align=right class="txtright" width=5%>
		   </td> 
		<td valign="bottom" align=right class="txtleft" width=90%>	
		Search Videos
		<?php if (isset($_SESSION["cap"]))
										 {
		 	if($_SESSION["cap"]!="")
		 	{
			 	echo "<input type=text id=txtSearch name=txtSearch class=txtboxblack size=70 
				 value=".$_SESSION["cap"]." onkeydown=press(event,'search')>";
			}
			else
			{
				echo "<input type=text id=txtSearch name=txtSearch class=txtboxblack size=70 
				  onkeydown=press(event,'search')>";
			}
		}
		else
		{
			echo "<input type=text id=txtSearch name=txtSearch class=txtboxblack size=70 
				  onkeydown=press(event,'search')>";
		}
		?>		
         &nbsp;
		<select name="cmbCategory" id="cmbCategory" class=comboblack 
							onchange="filt('cat',this.value)">
									<?php 
										if (isset($_SESSION["cat"]))
										 {
										 	if($_SESSION["cat"]!="")
										 	{
											 	echo "<option value='".$_SESSION["cat"]."' selected> 
												 ".$_SESSION["cat"]." </option>";
											}
										}
									?>
		        					<option value=''> All Categories  </option>
		        					<option value='Albums'> Albums </option>
									<option value='Events'> Events </option>
									<option value='Stage Shows'> Stage Shows  </option>
									<option value='Show Reels'>Show Reels</option>
									<option value='Tv Programs'> Tv Programs </option>
				  			</select>&nbsp;&nbsp;
        </td>
        <td valign="bottom" align=right class="txtleft">
        <input type="image" src="images/search.gif" border=0 id="search" 
		onmouseover="swap('images/search1.gif','search')" onmouseout="swap1('images/search.gif','search')">
        </td>
        </tr>
        </table>
	   </td>
     </tr>
     <tr>
       <td width="961" height="43" align="center" valign="top"><embed src='movies/head.swf' width=961 height=46
	   bgcolor="#000000" wmode="opaque"></td>
     </tr>
     
     <tr>
       <td width="958" height="287" align="left" valign="top" background="images/middle.png" >
       <div id="disp" align="center" >
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

Ceremonies like inaugural functions, wedding, convocation, anniversary, birthday parties and training sections can be organized in the Video Gallery. WaveSat video streams them for enjoyment, entertainment and learning, worldwide, any time. We also present the world of cinema. Millions can watch our video feasts. Film/Song release, new kids on the block, new voices/faces, multimedia shows, and quiz are some of the other favorable items that can be viewed.

 						
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
       	</div>
       	
       </td>
     </tr>
     <!--
     <tr>
              	<td width="100%" valign="top" colspan="4" align="center"  background="images/middle.png"> <br>
              		<table width=780 cellpadding="1" cellspacing="1" border=0 
								bordercolor="#FFFFFF" style="border-collapse: collapse">
								<tr><td class="normaltextcenter" background="images/nosbg.gif" height=25 align=center>
		                  			
              		 
              				echo "tot record".$tot_record;	
              				$searchby=$_SESSION["sortby"];
							if ($tot_record>=1)
              				{
								
									$i=$firstval;
									if(($firstval+11)>12)
									{
										$lastvalpre=$firstval-1;
										$tmpcurrent1=$firstval-1;
										$firstvalpre=$firstval-12;
										echo  "  <a href=javascript:getState('".$searchby."','P','".$firstvalpre."','".$lastvalpre."','".$tmpcurrent1."')style='text-decoration: none'>
										 << <a >Previous </a>
										</label>";
									}
									if($lastval>$tot_record)
									{
										$lastval=$tot_record;
									}
									while($i<=$lastval)
									{
										echo  " &nbsp;&nbsp; " ;
										if($i==$currentval)	
										{
										echo  " 			  
	<a href=javascript:getState('".$searchby."','M','".$firstval."','".$lastval."','".$i."')
	style='text-decoration: none'>
										 <font color=red>" .$i." </font> 
										&nbsp;&nbsp;";
										$i=$i+1;
										}
										else
										{
												echo  " 		  
	<a href=javascript:getState('".$searchby."','M','".$firstval."','".$lastval."','".$i."')
	style='text-decoration: none'>
										 " .$i." </font> 
										</label>";
										$i=$i+1;
										}
									}
									if ($i<$tot_record)
									{
									/*	echo  " <label  onClick=getState(".$searchby.",'P',
										".$firstval.",".$lastval.",".$lastval.")> 	Next >> </label> 
										&nbsp; " ; 
										
										if(($lastval+12)<=$tot_record)
										{
											$firstval=$lastval+1;
											
											$tmpcurrent=$lastval+1;
											$lastval=$lastval+12;
										}
										else
										{
											$firstval=$lastval+1;
											$tmpcurrent=$lastval+1;
											$lastval=$tot_record;
										}
										echo  " <label
										  
	onClick=getState('".$searchby."','N','".$firstval."','".$lastval."','".$tmpcurrent."')>
										 Next >>   
										</label>";
									}
							
								
							}
              		?>
              		</td>
              	</tr>
          		</table>
              		
              	</td>
              	</tr>
              	-->
     <tr> 
     
       <td width="829" height="43" align="center" valign="top" background="images/bottom.png">&nbsp;</td>
     </tr>
     <tr>
       <td width="961"  align="center" valign="bottom"  height=50>
	   	<font face="Verdana" size="1" color="#9C9898"> <b><a href="http://www.wavesatlive.com" >Wavesat Home</a> |<a href="Javascript:filt('','')"> Featured Videos </a> |<a href="aboutevents.php">About Wavesat Events </a> | 
		    <a href="../contact.php">Contact Us</a></b></font>&nbsp;&nbsp;&nbsp;
	   </td>
     </tr>
     <tr>
       <td width="961"  align="center" valign="bottom"  >
	   	<font face="Verdana" size="1" color="#9C9898"> Copyright @2008 wavesatlive.com all rights reserverd</font>&nbsp;&nbsp;&nbsp;
	   </td>
     </tr>
   </table>
   <br>
   <br>
 </td>
 </tr>
 </table>
 
 
</body>
</html>