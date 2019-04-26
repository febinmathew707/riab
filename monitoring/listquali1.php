<?php 
 //session_start(); 
?>
<?php
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
function listquali()
{
	if(isset($_SESSION["fil"]))
	{
		if($_SESSION["fil"]!="")
		{
			$strsql="select max(Qualification) from employee where Qualification like '%".$_SESSION["fil"]."%'
			 group by Qualification";
		}
		else
		{
			$strsql="select max(Qualification) from employee group by Qualification";
		}
	}
	else
	{
		$strsql="select max(Qualification) from employee group by Qualification";
	}
	$result=mysql_query($strsql);
	?>
	
	<table border=0 cellpadding=0 cellspacing=0 width="100%">
	<?php
	while($row=mysql_fetch_row($result) )
	{
		?>
		<tr onMouseOver="this.bgColor = '#711403'"
    onMouseOut ="this.bgColor = '#991C04'" 
     bgcolor="#991C04">
     
		<td class=txtleftwhitenor onmousedown="dispValue(<?php echo "'".$row[0]."','cmbQualification','quali'"; ?>)">
		<?php echo"
		<label id='".$row[0]."' >".$row[0]."</label>";
	?>
	</td></tr>
	<?php
	}
?>
</table>
<?php	
}
	listquali();
?>