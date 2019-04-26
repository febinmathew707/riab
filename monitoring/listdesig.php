<?php //session_start(); 
?>
<?php
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	if(isset($_SESSION["fil"]))
	{
		if($_SESSION["fil"]!="")
		{
			$strsql="select max(Designation) from employee where Designation like '%".$_SESSION["fil"]."%'
			 group by Designation";
		}
		else
		{
			$strsql="select max(Designation) from employee group by Designation";
		}
	}
	else
	{
		$strsql="select max(Designation) from employee group by Designation";
	}
	$result=mysql_query($strsql);
	?>
	
	
	<?php
	while($row=mysql_fetch_row($result) )
	{
		?>
		<div style='background-color: #991C04' class=txtleftwhitenor 
		onmouseover="JavaScript:this.style.backgroundColor='#711403'"
		onmouseout="JavaScript:this.style.backgroundColor='#991C04'"
		onmousedown="dispValue(<?php echo "'".$row[0]."','cmbDesignation','desig'"; ?>)">
		<?php echo" 
		<label id='".$row[0]."' >".$row[0]."</label></div>";
	}
	
?>
