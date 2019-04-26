<?php session_start();

	include("../connectdb/connect.php");

 	mysql_select_db("soemonit_pentaclt",$con);

	 if(!$con)

	{

		die('Could not connect to server' . mysql_error());

	} 

	$_SESSION["mainpage"]="budget";

?>



 <?php

	$id=$_GET["id"];

?>

<?php



 		$strsql="select * from emp_reversed_budget where bud_rev_id=".$id.""; 		

 		$resultbud=mysql_query($strsql);

 		$rowbud=mysql_fetch_assoc($resultbud);

 		//echo $strsql;

  ?>

  	<table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 

		 id="AutoNumber1" >

  

	 <tr>

     <td width="100%" align="left"   height="63" valign="top" >

   

    <table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="100%" 

		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4"> 

    <tr>

     <td width="30%" height="27" class="txtleft">Sales (Without taxes and duty)</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type='text'' class='txtbox' size=40 name='txtSales' id='txtSales' value='".$rowbud["sales"]."' 

	 onblur='JavaScript:calcBudget()' readonly>";

	 ?>

	 </td>

   </tr>

   <tr>

     <td width="30%" height="27" class="txtleft">Increase/(Decrease) in Stock</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type='text'' class='txtbox' size=40 name='txtStock' id='txtStock' value='".$rowbud["stock"]."'

	 onblur='JavaScript:calcBudget()' readonly>";

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

	 value='".$rowbud["current_rowmaterial"]."' onblur='JavaScript:calcBudget()' readonly>";

	 ?></td>

   </tr>

    <tr>

     <td width="30%" height="27" class="txtleft">Power and Fuel</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"<input type=text class=txtbox size=40 name=txtCurrent_Power_Fuel 

	 id=txtCurrent_Power_Fuel value='".$rowbud["current_power_fuel"]."' onblur='JavaScript:calcBudget()' readonly>"; ?></td>

   </tr>

    <tr>

     <td width="30%" height="27" class="txtleft">All Other Variable Cost</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type=text class=txtbox size=40 name=txtCurrent_Other_Variablecost id=txtCurrent_Other_Variablecost

	 value='".$rowbud["current_other_variablecost"]."' onblur='JavaScript:calcBudget()' readonly>

	 "; ?></td>

   </tr>

    <tr>

     <td width="30%" height="27" class="txtleft">Employee Cost</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type=text class=txtbox size=40 name=txtCurrentEmployeeCost id=txtCurrentEmployeeCost

	 value='".$rowbud["current_employee_cost"]."' onblur='JavaScript:calcBudget()' readonly>"; ?></td>

   </tr>

    <tr>

     <td width="30%" height="27" class="txtleft">All Other Fixed Expenses</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type=text class=txtbox size=40 name=txtCurrentOtherExpense 

	 id=txtCurrentOtherExpense value='".$rowbud["current_other_expense"]."' onblur='JavaScript:calcBudget()' readonly>"; ?></td>

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

	 id=txtCurrentLongTermLoan value='".$rowbud["current_longterm_loan"]."' onblur='JavaScript:calcBudget()' readonly>";

	 ?></td>

   </tr>

    <tr>

     <td width="30%" height="27" class="txtleft">Working Term Loan</td>

     <td width="2%" height="27"></td>

     <td width="68%" height="27">

	 <?php echo"

	 <input type=text class=txtbox size=40 name=txtCurrentWorkingTermLoan id=txtCurrentWorkingTermLoan

	 value='".$rowbud["current_workingterm_loan"]."' onblur='JavaScript:calcBudget()' readonly>";

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

	 value='".$rowbud["current_other_income"]."' onblur='JavaScript:calcBudget()' readonly>";

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

	 value='".$rowbud["current_depr"]."' onblur='JavaScript:calcBudget()' readonly>";

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

   

   </table>

     </td>

     </tr>

	 <div id="re"></div>

   <div id="w"></div>   

 </table>

  <?php		

	



?>