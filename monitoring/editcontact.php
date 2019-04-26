<?php 

 session_start();
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
    $_SESSION["page"]="contact";
?>
<table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="690" id="AutoNumber5" height="1">
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Email</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtEmail value='".$row['Email']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     CellPhone&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtCellPhone value='".$row['Cell_Phone']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Home Phone&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtHomePhone value='".$row['Home_Phone']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Office Address1&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg3.gif" class="txtleft">&nbsp;
					 <?php echo "<input type=text id=txtAdd1 value='".$row['Office_Add1']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg1.gif" class="txtright">
                     Office Address2</td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtAdd2 value='".$row['Office_Add2']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Office Address3&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtAdd3 value='".$row['Office_Add3']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     City&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCity value='".$row['City']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg1.gif" class="txtright">
                     Country&nbsp;&nbsp;&nbsp; </td>
                     <td width="7" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1" 
					 background="images/rowbg2.gif" align="center">
                     :</td>
                     <td width="398" bgcolor="#FFFFFF" bordercolor="#C0C0C0" height="1"
					  background="images/rowbg3.gif" class="txtleft">&nbsp;
					  <?php echo "<input type=text id=txtCountry value='".$row['Country']."'
					  				class=txtbox size=65>"; ?></td>
                   </tr>
                   <tr>
                     <td width="261"  bordercolor="#C0C0C0" height="1" colspan="3" align=right>
                     	<input type="button" value="  Update  " class=button onclick="updateContact()">
					 </td>
                   </tr>
                   </table>