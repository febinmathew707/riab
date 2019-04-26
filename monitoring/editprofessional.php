<?php session_start();
if($_SESSION['emp_id']=="")
{
	Header("Location: index.php");
	die();
}
include("../connectdb/connect.php");
	
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
	$sql="SELECT * FROM  employee where Auto_No=".$_SESSION["emp_id"]."";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    $_SESSION["page"]="professional";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="690" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Designation</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtDesignation value='".$row['Designation']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Discipline&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtDiscipline value='".$row['Dicipline']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Company&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCompany value='".$row['Company_Name']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Sector&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtSector value='".$row['Sector']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Over All Experience</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					<?php echo "<input type=text id=txtExperience value='".$row['Over_All_Experience']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Organization&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpOrg value='".$row['Exp_in_Current_Org']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Position&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCurrentExpPos value='".$row['Exp_in_Current_Pos']."'
					 class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261"  bordercolor="#C0C0C0" height="1" colspan="3" align=right>
                     	<input type="button" value="  Update  " class=button onclick="updateProfessional()">
					 </td>
                   </tr>
                   </table>