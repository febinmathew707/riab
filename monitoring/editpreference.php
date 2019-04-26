<?php session_start();
include("../connectdb/connect.php");
	
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$sql="SELECT * FROM  employee where Auto_No=".$_SESSION["emp_id"]."";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    $_SESSION["page"]="preferance";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="691" id="AutoNumber5" height="1">

                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Nature of Work&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text value='".$row["Nature_of_work"]."' name='txtWorkNature' 
					 id='txtWorkNature' size=50 class=txtbox>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Training Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php  if($row["Training_Required"]==1)
					 	{
							echo"<input type=checkbox name='chkTraining' id='chkTraining' checked>";
						}
						else
						{
							echo"<input type=checkbox name='chkTraining' id='chkTraining' >";
						}
					  ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Field Exposure Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php  if($row["Field_Exposure_Required"]==1)
					 	{
							echo"<input type=checkbox name='chkField' id='chkField' checked>";
						}
						else
						{
							echo"<input type=checkbox name='chkField' id='chkField' unchecked>";
						}
					  ?>
					  </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Preference Required&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif">&nbsp;
					 <?php  if($row["Preferance_Required"]==1)
					 	{
							echo"<input type=checkbox name='chkPreferance' id='chkPreference' checked>";
						}
						else
						{
							echo"<input type=checkbox name='chkPreferance' id='chkPreference' unchecked>";
						}
					  ?>
					 </td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Behavioral Competance&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Behavioral_Competence"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Skill&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Skill"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261"  height="1" colspan=3 align=right>
                     	<input type=button value=Update class=button onclick="updatePreferanceUser()">
					 </td>
                   </tr>
                   
                 </table>