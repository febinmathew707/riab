<?php session_start(); 
include("../connectdb/connect.php");	
	 	 mysql_select_db("wavesatlive",$con);
		 if(!$con)
		{
			die('Could not connect to server' . mysql_error());
		} 
$sql="SELECT * FROM ev_video_comments where video_id=".$_SESSION["video_id"].""; 
$result=mysql_query($sql); 
echo "<table width=90% cellpadding=0 cellspacing=0 border=0 >";
while($row=mysql_fetch_array($result)){?>
<tr><td  align=center valign=top  class=txtcommenthead width=70% colspan=2> &nbsp;&nbsp;&nbsp; Added By: <?php echo $row["name"]; ?>	</td></tr>
<tr><td  align=center valign=top  class=txtleft width=100% colspan=2 height=50>	<?php echo $row["comment"]; ?></td></tr><?php }	?>
</table>