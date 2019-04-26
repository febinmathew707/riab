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
	elseif($_SESSION['LogType']!='CO')
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
	$_SESSION["mainpage"]="capacitymaster";
?>
<div id="turnover">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#C0C0C0">     
	    <tr>
         <td width="100%"  valign="middle" background="" align=center>
         <form name="frmCompany">         
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
  	 <tr>
     <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom">     	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Capacity Master</b></font>
     </td>
   </tr>
	 <tr>
     <td width="100%" align="center"    valign="top" background="images/createaccountmiddle.gif">
     	
     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse" bordercolor="#111111" width="70%">
          
          <tr>
            <td width="33%" class="txtleft">Financial Year</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">
				<select name="cmbFinYear" id="cmbFinYear" class=combo1>
				<option value=0>--------------------- Select Financial Year ------------------</option>
				<?php
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";						
					}
				?>
				</select>
			</td>
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Achieveable Capacity</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtAchCapacity" id="txtAchCapacity" class=txtbox
			size=65></td>
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Capacity being Used now</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtUsedCapacity" id="txtUsedCapacity" class=txtbox
			size=65></td>
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Machine Efficiency</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtEfficiency" id="txtEfficiency" class=txtbox
			size=65></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Capacity Utilization</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtUtilization" id="txtUtilization" class=txtbox
			size=65></td>
          </tr>
          <tr>
            <td width="100%" align=right colspan="3"><input type=button value="update" class=button
			onclick="javascript:updateCapacity(1)">&nbsp;
            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
          </tr>
        </table>
        &nbsp;</td>
     </tr>
   <div id="re"></div>
   <div id="w"></div>
 </table>
 </form>
 		 </td>
       </tr>     
     </table>   
	 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 
  <tr>
         <td width="100%"  valign="middle" background="" align=center> 
          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     
		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->
		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
     	<tr>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Financial Year</b>
		 </td>
		 <td width="20%" align="right" height="23" class="txtleft"> <b> Achievable Capacity </b>
		 </td>
		 <td width="15%" align="right" height="23" class="txtleft"> <b> Capacity being Used </b>
		 </td>
		 <td width="20%" align="right" height="23" class="txtleft"> <b> Machine Efficiency </b>
		 </td>
		 <td width="20%" align="right" height="23" class="txtleft"> <b> Capacity Utilization </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		$strsql="SELECT * FROM  emp_capacity order by fin_year desc ";
     		$result=mysql_query($strsql);
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
     <td width="15%" align="right" height="23" class="txtleft">
     
     <?php 
	 		$strsql="SELECT * FROM emp_fin_year where year=".$row["fin_year"]."";
	 		$resultfin=mysql_query($strsql);
	 		$rowfin=mysql_fetch_assoc($resultfin);
	 		echo $rowfin["fin_year"];
     ?>
    </td>
    <td width="20%" align="right" height="23" class="txtleft">
     <?php 
	 	
	 	echo $row["achievable_capacity"];
     ?>
    </td>
    <td width="15%" align="right" height="23" class="txtleft">
    	<?php echo $row["capacity_being_used"];
     ?>
    </td>
    <td width="20%" align="right" height="23" class="txtleft">
    	<?php echo $row["machine_efficiency"];
     ?>
    </td>
    <td width="35%" align="right" height="23" class="txtleft">
    	<?php echo $row["capacity_utilisation"];
     ?>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:del('turnover',".$row["capacity_id"].")>";
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
 <tr>
         <td width="100%" height="58" valign="top" background="imghome/bottom.gif" align=right>
         <span id="w1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       </tr>
</table>	  