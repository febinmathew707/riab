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
    $_SESSION["page"]="professional";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="690" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Designation</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Designation"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Discipline&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Dicipline"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Company&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Company_Name"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Sector&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;<?php echo $row["Sector"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Over All Experience</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Over_All_Experience"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Organization&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Exp_in_Current_Org"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Experience Current Position&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Exp_in_Current_Pos"]; ?></td>
                   </tr>
                   </table>