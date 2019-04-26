<?php session_start();
	
 	include("../connectdb/connect.php");
	
 	 mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
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
		if(strpos($sql,"where")===false)
				{
					$sql=$sql . " where category='Show Reels' "; 
				}
				else
				{
					$sql=$sql . " and category='Show Reels' "; 
				}
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$_SESSION["tot"]=$row[0];
		$totrows=$row[0];
		if(($totrows/12)>(intval(($totrows/12))))
		{
			$tot_record=intval(($totrows/12))+1;
		}
		else
		{
			$tot_record=intval(($totrows/12));
		}
		//$orderby=$_GET["orderby"];
		
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
		$beginno=$startno;
		echo "<font color=white>";
		$_SESSION["cat"]="Show Reels";
?>
<html >
<body bgcolor="#000000" topmargin=0 leftmargin=0 marginwidth=0 marginheight=0>
<center>
<table border=0 width=90% >
<tr><td valign="top" align=left>
<embed src="preeventRb.swf" width=650 height=630 bgcolor="#000000" wmode="opaque">
</td>
</tr>
<tr>
              	<td width="100%" valign="top" colspan="4" align="center"  >
              		<table width=95% cellpadding="1" cellspacing="1" border=0 
								bordercolor="#FFFFFF" style="border-collapse: collapse">
								<tr><td class="normaltextcenter" background="images/nosbg.gif" height=25 align=center>
		                  			
              		<?php 
              				//echo "tot record".$tot_record;	
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
										&nbsp; " ; */
										
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
</table>
</center>
</body>
</html>