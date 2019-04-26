<?php session_start();
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="revbudget";
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">    
	    <tr>
         <td width="100%"  valign="middle"  align=center>
         <form name="frmCompany">
         <?php
	 		if(isset($_SESSION["ed_revbud_id"]))
	 		{
				$id=$_SESSION["ed_revbud_id"];
			}
			else
			{
				$id=0;
			}
			//echo $id;
	 		if($id==0)
	 		{
	 		?>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 
		 id="AutoNumber1" >
  <tr>
     <td width="100%" align="left"   height="39" valign=top>	 
	 <font face=verdana color=black size=2><b> Revised Annual Budget </b></font>
	 </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 
		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">      
   	<tr>
     <td width="30%" align="right"  class="txtleft" valign=top>
     <font color="#000000">Company</font></td>
     <td width="2%" valign="top">:</td>
     <td width="68%" >
     <select name="cmbCompany" id="cmbCompany"  onchange="dispbudget('rev')" class=combo1>   
	 <option value=0 selected> ------------------- select company ---------------- </option>  
    <?php 
    	$strsql="select * from emp_company group by Company_Name";
    	$result=mysql_query($strsql);
    	while($row=mysql_fetch_array($result))
    	{
			echo"<option value='".$row["company_id"]."'>".$row["company_name"]."</option>";
		}
    ?>
    </select>
&nbsp;</td>
   </tr>
   <tr>
            <td width="30%" class="txtleft">Financial Year</td>
            <td width="2%" class="txtleft">:</td>
            <td width="68%" class="txtleft">
				<select name="cmbFinYear" id="cmbFinYear" class=combo1  
				onchange="dispbudget('rev')"	>
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
          </table>
    <table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 
		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4"> 
   <tr>
     <td width="30%" height="27" class="txtleft">Sales (Without taxes and duty)</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtSales" id="txtSales"
	 onblur='JavaScript:calcBudget()'></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Increase/(Decrease) in Stock</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtStock" id="txtStock" 
	 onblur='JavaScript:calcBudget()'></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Value of Production</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtValueOfProduction" id="txtValueOfProduction" readonly></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Raw- Material</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentRawMaterial" id="txtCurrentRawMaterial" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Power and Fuel</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrent_Power_Fuel" 
	 id="txtCurrent_Power_Fuel" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">All Other Variable Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrent_Other_Variablecost" id="txtCurrent_Other_Variablecost" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Employee Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentEmployeeCost" id="txtCurrentEmployeeCost" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">All Other Fixed Expenses</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentOtherExpense" 
	 id="txtCurrentOtherExpense" onblur='JavaScript:calcBudget()'></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Total Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtTotalCost" id="txtTotalCost" readonly></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Profit Before INT. DEPR. & Taxes</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtProfitBeforeINT" 
	 id="txtProfitBeforeINT" readonly></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Long Term Loans</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentLongTermLoan" 
	 id="txtCurrentLongTermLoan" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Working Term Loan</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentWorkingTermLoan" id="txtCurrentWorkingTermLoan" onblur='JavaScript:calcBudget()'></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Profit Before  DEPR. & Taxes</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtProfitBeforeDepr" 
	 id="txtProfitBeforeDepr" readonly></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Other Income</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentOtherIncome" id="txtCurrentOtherIncome" onblur='JavaScript:calcBudget()'></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Cash Profit/Loss</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCashProfit" 
	 id="txtCashProfit" readonly></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Depreciation</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtCurrentDepreciation" id="txtCurrentDepreciation" onblur='JavaScript:calcBudget()'></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Net Profit</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="text" class="txtbox" size=40 name="txtNetProfit" id="txtNetProfit"
	  readonly></td>
   </tr>
   
   <tr>
     <td width="30%" height="27" class="txtright">&nbsp;</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27"><input type="button" value="update" onclick="updateBudget('rev',0)"></td>
   </tr>
   </table>
     </td>
     </tr>     
      
   <div id="re"></div>
   <div id="w"></div>
 </table>
 <?php
 	}
 	else
 	{
 		$strsql="select * from emp_reversed_budget where bud_rev_id=".$id.""; 		
 		$resultbud=mysql_query($strsql);
 		$rowbud=mysql_fetch_assoc($resultbud);
 		//echo $strsql;
  ?>
  	<table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 
		 id="AutoNumber1" >
  <tr>
     <td width="100%" align="left"   height="39" valign=bottom>	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Reversed Actual Budget</b></font>
	 </td>
   </tr>
	 <tr>
     <td width="100%" align="left"   height="63" valign="top" >
     	<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 
		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">      
   	<tr>
     <td width="30%" align="right" height="23" class="txtleft">
     <font color="#000000">Company</font></td>
     <td width="2%" height="23">:</td>
     <td width="68%" height="23">
     <select name="cmbCompany" id="cmbCompany"  onchange="dispbudget('rev')">   
	 <option value=0 > ------------------- select company ---------------- </option>  
    <?php 
    	$strsql="select * from emp_company group by Company_Name";
    	$result=mysql_query($strsql);
    	while($row=mysql_fetch_array($result))
    	{
			if($rowbud["company_id"]==$row["company_id"])
			{
				echo"<option value='".$row["company_id"]."' selected>".$row["company_name"]."</option>";
			}
			else
			{
				echo"<option value='".$row["company_id"]."'>".$row["company_name"]."</option>";
			}
		}
    ?>
    </select>
&nbsp;</td>
   </tr>
   <tr>
            <td width="30%" class="txtleft">Financial Year</td>
            <td width="2%" class="txtleft">:</td>
            <td width="68%" class="txtleft">
				<select name="cmbFinYear" id="cmbFinYear" class=combo1  
				onchange="dispbudget('rev')"
				>
				<option value=0>--------------------- Select Financial Year ------------------</option>
				<?php
					$sql="select * from emp_fin_year order by year" ;
					$result=mysql_query($sql);
					while($row=mysql_fetch_array($result))
					{
						if($rowbud["fin_year"]==$row["year"])
						{
							echo "<option value=".$row["year"]." selected>".$row["fin_year"]."</option>";			
						}
						else
						{
							echo "<option value=".$row["year"].">".$row["fin_year"]."</option>";					
						}	
					}
				?>
				</select>
			</td>
          </tr>
    </table>
    <table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 
		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4"> 
    <tr>
     <td width="30%" height="27" class="txtleft">Sales (Without taxes and duty)</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type='text'' class='txtbox' size=40 name='txtSales' id='txtSales' value='".$rowbud["sales"]."' 
	 onblur='JavaScript:calcBudget()'>";
	 ?>
	 </td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Increase/(Decrease) in Stock</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type='text'' class='txtbox' size=40 name='txtStock' id='txtStock' value='".$rowbud["stock"]."'
	 onblur='JavaScript:calcBudget()'>";
	 ?></td>
   </tr>
   	<tr>
     <td width="30%" height="27" class="txtleft">Value of production</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtValueOfProduction id=txtValueOfProduction
	 value='".$rowbud["value_of_production"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
    
   <tr>
     <td width="30%" height="27" class="txtleft">Raw- Material</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtCurrentRawMaterial id=txtCurrentRawMaterial
	 value='".$rowbud["current_rowmaterial"]."' onblur='JavaScript:calcBudget()'>";
	 ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Power and Fuel</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtCurrent_Power_Fuel 
	 id=txtCurrent_Power_Fuel value='".$rowbud["current_power_fuel"]."' onblur='JavaScript:calcBudget()'>"; ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">All Other Variable Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrent_Other_Variablecost id=txtCurrent_Other_Variablecost
	 value='".$rowbud["current_other_variablecost"]."' onblur='JavaScript:calcBudget()'>
	 "; ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Employee Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrentEmployeeCost id=txtCurrentEmployeeCost
	 value='".$rowbud["current_employee_cost"]."' onblur='JavaScript:calcBudget()'>"; ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">All Other Fixed Expenses</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrentOtherExpense 
	 id=txtCurrentOtherExpense value='".$rowbud["current_other_expense"]."' onblur='JavaScript:calcBudget()'>"; ?></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Total Cost</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtTotalCost id=txtTotalCost
	 value='".$rowbud["total_cost"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Profit Before INT .DEPR.& Taxes</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtProfitBeforeINT id=txtProfitBeforeINT
	 value='".$rowbud["profit_before_int"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Long Term Loans</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtCurrentLongTermLoan 
	 id=txtCurrentLongTermLoan value='".$rowbud["current_longterm_loan"]."' onblur='JavaScript:calcBudget()'>";
	 ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Working Term Loan</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrentWorkingTermLoan id=txtCurrentWorkingTermLoan
	 value='".$rowbud["current_workingterm_loan"]."' onblur='JavaScript:calcBudget()'>";
	 ?>
	 </td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Profit Before DEPR. & Taxes</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtProfitBeforeDepr id=txtProfitBeforeDepr
	 value='".$rowbud["profit_before_depr"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Other Income</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrentOtherIncome id=txtCurrentOtherIncome
	 value='".$rowbud["current_other_income"]."' onblur='JavaScript:calcBudget()'>";
	 ?></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtleft">Cash Profit/Loss</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtCashProfit id=txtCashProfit
	 value='".$rowbud["cash_profit"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Depreciation</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 <input type=text class=txtbox size=40 name=txtCurrentDepreciation id=txtCurrentDepreciation 
	 value='".$rowbud["current_depr"]."' onblur='JavaScript:calcBudget()'>";
	 ?>
	 </td>
   </tr>
    <tr>
     <td width="30%" height="27" class="txtleft">Net Profit/Loss</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"<input type=text class=txtbox size=40 name=txtNetProfit id=txtNetProfit
	 value='".$rowbud["net_profit"]."' onblur='JavaScript:calcBudget()' readonly>";
	 ?></td>
   </tr>
   <tr>
     <td width="30%" height="27" class="txtright">&nbsp;</td>
     <td width="2%" height="27"></td>
     <td width="68%" height="27">
	 <?php echo"
	 			<input type='button' value='update' onclick=updateBudget('rev',".$rowbud["bud_rev_id"].")>";
	?>
				 
	</td>
   </tr>
   </table>
     </td>
     </tr>
	 <div id="re"></div>
   <div id="w"></div>   
 </table>
  <?php		
	}
   ?>
 </form>
		 </td>
       </tr>       
</table>
<span id="budget"></span>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2"  bgcolor="#FFFFFF">        
      
     </table>