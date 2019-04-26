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
    $_SESSION["page"]="personal";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="691" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     First Name&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["First_Name"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Last Name&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Last_Name"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Date Of Birth&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo date("d-M-Y",strtotime($row["Date_Of_Birth"])); ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Gender&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif">&nbsp;<?php echo $row["Sex"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Religion&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Religion"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Marital Status&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Marital_Status"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Area of Expertise&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo $row["Area_of_Expertise"]; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Qualification&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="399" bgcolor="#FFFFFF" bordercolor="#FFFFFF" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo $row["Qualification"]; ?></td>
                   </tr>
                 </table>