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
	
	
	<?php

	while($row=mysql_fetch_row($result) )
	{
		?>
		<div style='background-color: #991C04' class=txtleftwhitenor 
		onmouseover="JavaScript:this.style.backgroundColor='#711403'"
		onmouseout="JavaScript:this.style.backgroundColor='#991C04'"
		onmousedown="dispValue(<?php echo "'".$row[0]."','cmbQualification','quali'"; ?>)">
		<?php echo" 
		<label id='".$row[0]."' >".$row[0]."</label></div>";
	}
	
?>


<?php	

?>