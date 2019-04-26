<?php session_start();
include("../connectdb/connect.php");	
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$sql="SELECT * FROM  employee where Auto_No=".$_SESSION['emp_id']."";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    $_SESSION["page"]="preferance";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="691" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Nature of Work&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Nature_of_work"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Training Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Training_Required"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Field Exposure Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Field_Exposure_Required"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Preferance Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif">&nbsp;<?php echo $row["Preferance_Required"]; ?></td>
                   </tr>
                   <?php
                   		if($_SESSION['LogType']=="CO")
                   		{
                   	?>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Behavioral Competance&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text name=txtBehavioral id=txtBehavioral 
					  value='".$row["Behavioral_Competence"]."' size=55 class=txtbox>";
					   ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Skill&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text name=txtSkill id=txtSkill 
					  value='".$row["Skill"]."' size=55 class=txtbox>";
					   ?></td>
                   </tr>
                   <tr>
                     <td width="261"  height="1" colspan=3 align=right>
                     	<input type=button value=Update class=button onclick="updatePreferenceMD()">
					 </td>
                   </tr>
                   <?php
                   	}
                   	else
                   	{
                   	?>
                   	<tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Behavioral Competance&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Behavioral_Competence"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Skill&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Skill"]; ?></td>
                   </tr>
                   <?php
                   	}
                   	?>
                 </table>