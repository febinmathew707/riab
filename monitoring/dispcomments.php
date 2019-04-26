<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	
 	 mysql_select_db("soemonit_pentaclt",$con);
	if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	$_SESSION["page"]="forum";
	$blid=$_GET["id"];	
	$sql="SELECT * FROM blog_comments where bl_id=".$blid."";
	//echo $sql;
	$result=mysql_query($sql);
	
?>
<br>
<table border=0  width=95% cellpadding="6" cellspacing="0">
					<tr>
        			<td width="100%" valign="top"   class="leftnormal" >
        			 <b>Added Comments</b>
        			</td></tr>
        			<tr>
					<?php
					 while($row=mysql_fetch_array($result))
					{
					?>	
        			
        			<tr>
        			<td width="100%" valign="top"   class="txtgrey1" >
        			<?php echo $row["comment"]; ?>
        			</td></tr>
        			<tr>
        			<td width="100%" valign="top"   class="txtgrey" >
        			Added By  : <?php echo $row["name"]; ?> &nbsp; on : <?php echo date('d-m-Y',strtotime($row["EDATE"])); ?>
        			</td></tr>
        			<tr>
        			<td width="100%" valign="top"   class="leftnormal" >
        			<font color="#918F8F">
        			------------------------------------------------------------------------------------
        			</font>
        			</td></tr>
        			
        			<?php
        			}
        			
        			?>
        			
        			</table>