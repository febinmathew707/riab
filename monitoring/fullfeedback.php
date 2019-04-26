<?php 

 session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	
 	 mysql_select_db("soemonit_pentaclt",$con);
	if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	$_SESSION["page"]="forum";
	$fbid=$_GET["id"];
	$type=$_GET["type"];
	$sql="SELECT * FROM emp_feedback where fbid=".$fbid."";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
?>
<table border=0  width=95% cellpadding="0" cellspacing="0">
        			<tr>
        			<td width="100%" valign="top"  height=20 class="leftnormal" >
        			<?php 
        				//echo  substr($row["description"],1,300)  ;
        				if($type=="collapse")
        				{
						$len=strlen($row["description"]);
        					if($len>100)
        					{
								$i=0;
								if($len>100)
								{
									$len=100;
								}
								
								echo substr($row["description"],$i,100)."......<br>";
								
							}
							else
							{
								echo $row["description"];
							} 
						}
        				else
							{
								echo $row["description"];
							} 
        			?>
        			</td></tr>
        			<tr>
        			<td width="100%" valign="top"  height=20 class="rightnormal" ><br>
					<?php
					echo"&nbsp;<a href=javascript:reply(".$row["fbid"].",'comment".$row["fbid"]."')> Reply </a>";
					?>
        			</td>
        			</tr>
        		
        			</table>