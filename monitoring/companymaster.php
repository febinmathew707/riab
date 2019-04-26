<?php
	session_start();
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD')
	{
		Header("Location: home.php");
		die();
	}
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="companymaster";
	
?>
<div id="company">
<div id="w"></div>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">    
   
	    <tr>
         <td width="100%"  valign="middle"  align=left>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"><br>   	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Company Master </b></font>
     </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">    
	 <form name="frmCompany" method="POST" >  	
	 	<?php
	 		if(isset($_SESSION["ed_company_id"]))
	 		{
				$id=$_SESSION["ed_company_id"];
			}
			else
			{
				$id=0;
			}
	 		if($id==0)
	 		{
	 		?>
     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" width="70%">
          <tr>
            <td width="33%" class="txtleft">Company Name</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtName" 
			id="txtName"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Address 1</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtAdd1"
			id="txtAdd1"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Address 2</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtAdd2"
			id="txtAdd2"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Actual Man Power</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtManPower"
			id="txtManPower"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Nature of Activity</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<textarea name="txtActivity" id="txtActivity" rows=7 cols=33>
			</textarea></td>            
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Installed Capacity</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtInstCapacity"
			id="txtInstCapacity"></td>
          </tr>
           <tr>
            <td width="33%" class="txtleft">Unit</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtUnit"
			id="txtUnit"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Phone</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtPhone"
			id="txtPhone"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Email</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=text class=txtbox size="50" name="txtEmail"
			id="txtEmail"></td>
          </tr>
          <tr>
            <td width="100%" align=right colspan="3"><input type=button value="update" class=button
			onclick="javascript:updateCompany(0)">&nbsp;
            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <div id="w"></div>
          </tr>
        </table>
        <?php
        	}
        	else 
        	{
        		$strsql="select * from emp_company where company_id=".$id."";
        		$result=mysql_query($strsql);
        		$row=mysql_fetch_assoc($result);
        ?>
       			<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" width="70%">
          <tr>
            <td width="33%" class="txtleft">Company Name</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
            <?php
				 echo"<input type=text class=txtbox size=50 name='txtName' id='txtName' 
				 value='" .$row["company_name"]."'></td>";
				?>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Address 1</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtAdd1' id='txtAdd1' 
				 value='" .$row["company_add1"]."'></td>";
			?>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Address 2</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtAdd2' id='txtAdd2' 
				 value='" .$row["company_add2"]."'></td>";
			?>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Actual Man Power</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtManPower' id='txtManPower' 
				 value='" .$row["actual_manpower"]."'></td>";
			?>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Nature of Activity</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
            <textarea name="txtActivity" id="txtActivity" rows=7 cols=33><?php echo $row["activity"];?></textarea>
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Installed Capacity</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtInstCapacity' id='txtInstCapacity' 
				 value='".$row["inst_capacity"]."'></td>";
			?>
          </tr>
           <tr>
            <td width="33%" class="txtleft">Unit</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<?php
				 echo"<input type=text class=txtbox size=50 name='txtUnit' id='txtUnit' 
				 value='".$row["unit"]."'></td>";
			?></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Phone</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtPhone' id='txtPhone' 
				 value='".$row["Phone"]."'></td>";
			?>
          </tr>
           <tr>
            <td width="33%" class="txtleft">Email</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;
			<?php
				 echo"<input type=text class=txtbox size=50 name='txtEmail' id='txtEmail' 
				 value='".$row["Email"]."'></td>";
			?>
          </tr>
          <tr>
            <td width="100%" align=right colspan="3">
			<?php echo"
			<input type=button value='update' class=button
			onclick='javascript:updateCompany(".$_SESSION["ed_company_id"].")'>&nbsp;";
			?>
            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
          </tr>
        </table>
        <?php
        }
        ?>
        </form>
        &nbsp;</td>
     </tr>     
 </table>
		 </td>
       </tr> 
</table>
</div>
<div id="w1"></div>
<div id="listcom">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 
  <tr>
         <td width="100%"  valign="middle"  align=left> 
          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     
		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->
		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
     	<tr>
        <td width="5%" align="right" height="23" class="txtleft"> <b> #Sl</b>
		 </td>
		 <td width="40%" align="right" height="23" class="txtleft"> <b> Company Name</b>
		 </td>
		 <td width="35%" align="right" height="23" class="txtleft"> <b> Address </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Edit </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		$strsql="SELECT * FROM  emp_company order by company_name ";
     		$result=mysql_query($strsql);
			$i=1;
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
     <td width="5%" align="right" height="23" class="txtleft">
     <?php echo $i;
	 $i++;
     ?>
    </td>
     <td width="40%" align="right" height="23" class="txtleft">
     <?php echo $row["company_name"];
     ?>
    </td>
    <td width="35%" align="right" height="23" class="txtleft">
     <?php echo $row["company_add1"];
     ?>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:edit('company',".$row["company_id"].")>";
		?><img src="img_new/edit.gif" alt="editcompany" border="0"></a>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:del('company',".$row["company_id"].")>";
		?><img src="images/delete1.png" alt="deletecompany" border="0"></a>
    </td>
    </tr>
    <?php
    }
    ?>
   </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div id="w1"></div>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">    
	        
     </table> 
    
</center>