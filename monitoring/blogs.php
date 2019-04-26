<?php 

 session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
		$region="Asean";
	
	
	$_SESSION["mainpage"]="blogs";
?>
<table border="0" cellpadding="0" cellspacing="0" 
	style="border-collapse: collapse" width="95%" id="AutoNumber3" >
	      <tr>
			<td valign="top"  width="100%" align="left" height="10">
			<?php
			if(isset($_SESSION["Logged"]))
				{
					echo "<embed src='movies/bloglinks.swf' height=25 width=476>";
		        	
				}
			?>	
			</td>
		</tr>
	    <tr>
			<td valign="top"  width="100%" align="right"><img src="images/majorissues.gif">
			</td>
		</tr>
        <tr>
			<td valign="top"  width="100%" align="center">
			<table border="0" cellpadding="0" cellspacing="0" 
	 width="95%" id="AutoNumber3" >
		 <?php 
		 	if (isset($_SESSION['mem_id']))   
		 	{
				$sql="SELECT * FROM blogs where user_id=".$_SESSION['mem_id']."  
				ORDER BY post_date desc" ;
			}
			else
			{
				$sql="SELECT * FROM blogs where tag='".$region."' and publishto='P' ORDER BY post_date desc" ;
			}
				//echo $sql;
				$result=mysql_query($sql);
				if(mysql_num_rows($result)<=0)
				{
					echo "<br><br><br><br><br>
					<font  size=4 color=black face=verdana align=center>
					<center>No Comments Found !!</center></font><br><br>";
				
				}
				else
				{
				while($row=mysql_fetch_array($result))
				{ ?>
					
					<tr>
        			<td width="100%" valign="middle" align="left" height=28 
					background="imgprofile/blue/blogbg.png">
					<table border=0  width=100% cellpadding="0" cellspacing="0">
					<tr>
					<td valign="middle" class="blogtitle" width="60%">
        			<?php 
        				echo "Title: " . $row["title"];
        			?>
        			<?php
        			 echo"<img src='images/add.gif' id=exp.".$row["bl_id"]." 
					 onclick=JavaScript:swap(this.id,'more".$row["bl_id"]."','more.php',".$row["bl_id"].")>";
        			 ?>
					</td>
					<td valign="bottom"  width="40%" class="txtgrey">
						<?php 
        				echo "Posted on : " . $row["post_date"];
        			?>
					</td>
					</tr>
					</table>
					</td>
					</tr>
					<tr>
        			<td width="100%" valign="top" align="left" height=10 class="blogs">
        		
					</td>
					</tr>
					<tr>
					<td height=10 width=100% align="right" background="images/blogtop.gif">
					</td>
					</tr>
					<tr>
        			<td width="100%" valign="top" align="center" 
					height=20 background="images/blogmiddle.gif">
					<?php 
					echo"<span id='more".$row["bl_id"]."' style=' overflow:auto' >";
					?>
        			<table border=0  width=95% cellpadding="0" cellspacing="0">
        			<tr>
        			<td width="100%" valign="top"  height=20 class="leftnormal" >
        			<?php 
        				//echo  substr($row["description"],1,300)  ;
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
        				
        			?>
        			</td></tr>
        			</table>
        			</span>
					</td>
					</tr>
					
					<tr>
					<td height=30 width=100% align="right" background="images/blogmiddle.gif">
						
						<?php
							echo "<span id='comment".$row[0]."'>";
							if(isset($_SESSION["type"])) 
							{
								 echo"
								  &nbsp;<a href=javascript:edit('editblog',".$row[0].")  
												style='text-decoration: none' class=blogs>
								 <font color='#649FA1' face='verdana' size=2>Edit Post | </font> </a>
								 &nbsp<a href=javascript:dispcomment(".$row[0].",'comment".$row[0]."')
									style='text-decoration: none' class=blogs>
									<font color='#649FA1' face='verdana' size=2>View FeedBack | </font> </a>
									<a href=javascript:del('blogs','bl_id',".$row[0].")
									style='text-decoration: none' class=blogs><font color='#649FA1' 
									face='verdana' size=2>Delete Post  </font> </a>
								 &nbsp;&nbsp;";
							}
							else
							{
								echo"&nbsp;<a href=javascript:AddComment(".$row[0].")  
												style='text-decoration: none' class=blogs>
								 <font color='#649FA1' face='verdana' size=2>Add Comment</font> </a>
								 &nbsp;&nbsp;";
							}
						?>
						</span>
					</td>
					</tr>
					<tr>
					<td height=10 width=100% align="right" background="images/blogbottom.gif">
					</td>
					</tr>
					<tr>
        			<td width="100%" valign="top" align="left" height=10 class="blogs">
        				<div id="comment"></div>
					</td>
					</tr>
					
		<?php
				}
				
		?>
				<tr>
        	<td width="100%" valign="top" align="center">
        	
			</td>
		</tr>		
		<?php
			}
				?>
			
			
    </table>
    </td>
    </tr>
    </table>