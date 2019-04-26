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
	$_SESSION["mainpage"]="turnovermaster";
?>
<div id="turnover">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">     
	    <tr>
         <td width="100%"  valign="middle"  align=center>
         <form name="frmCompany">         
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
  	 <tr>
      <td width="100%" align="left"  background="images/createaccounttop.gif" height="30" valign="bottom"> <br>    	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Add TurnOver </b></font>
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
				<option value=0>------------ Select Financial Year ------------</option>
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
            <td width="33%" class="txtleft">Turn Over</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtTurnOver" id="txtTurnOver" class=txtbox
			size=50></td>
          </tr>
		  <tr>
            <td width="33%" class="txtleft">Profit/Loss</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft"><input type="text" name="txtPandL" id="txtPandL" class=txtbox
			size=50></td>
          </tr>
          <tr>
            <td width="100%" align=right colspan="3"><input type=button value="update" class=button
			onclick="javascript:updateTurnOver(1)">&nbsp;
            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp; </td>
          </tr>
        </table>
        </td>
     </tr>
   <span id="re"></span>
   <span id="w"></span>
 </table>
 </form>
 		 </td>
       </tr>     
     </table>   
	 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF"> 
  <tr>
         <td width="100%"  valign="middle"  align=center> 
          <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="center"  background="images/createaccountmiddle.gif" height="30" valign="bottom">     
		<!--<iframe src="listallcompany.php" width="800" height="300" frameborder="0" scrolling="auto"></iframe>-->
		<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
     	<tr>
		 <td width="20%" align="right" height="23" class="txtleft"> <b> Financial Year</b>
		 </td>
		 <td width="35%" align="right" height="23" class="txtleft"> <b> Turn Over </b>
		 </td>
		 <td width="35%" align="right" height="23" class="txtleft"> <b> Profit/Loss </b>
		 </td>
		 <td width="10%" align="right" height="23" class="txtleft"> <b> Delete  </b>
		 </td>
		 </tr>
     	<?php
     		$strsql="SELECT * FROM  emp_turnover where company_id=".$_SESSION["company_id"]." order by fin_year desc ";
     		$result=mysql_query($strsql);
     		while($row=mysql_fetch_array($result))
     		{
     			
     		
     	?>
	 <tr >
     <td width="20%" align="right" height="23" class="txtleft">
     
     <?php 
	 		$strsql="SELECT * FROM emp_fin_year where year=".$row["fin_year"]."";
	 		$resultfin=mysql_query($strsql);
	 		$rowfin=mysql_fetch_assoc($resultfin);
	 		echo $rowfin["fin_year"];
     ?>
    </td>
    <td width="35%" align="right" height="23" class="txtleft">
     <?php 
	 	
	 	echo $row["turn_over"];
     ?>
    </td>
    <td width="35%" align="right" height="23" class="txtleft">
    	<?php echo $row["profit_loss"];
     ?>
    </td>
    <td width="10%" align="right" height="23" class="txtright">
    	<?php 
    		echo "<a href=JavaScript:del('turnover',".$row["turn_id"].")>";
		?><img src="images/delete1.png" alt="deletecompany" border="0"></a>
    </td>
    </tr>
    <?php
    }
    ?>
     
   </table>
</td>
</tr>
<tr>
      <td width="100%" align="left"  background="images/createaccountbottom.gif" height="30" valign="bottom"> 
     </td>
   </tr>
</table>
</td>
</tr>

</table>	  