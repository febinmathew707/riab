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
	elseif($_SESSION['LogType']!='MS' && $_SESSION['LogType']!='CO')
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
	$companyid=$_SESSION["company_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	
	$strsql="SELECT * FROM emp_monthly_report where company_id=".$companyid." and fin_year=".$year." 
		and month=".$month."";
	//echo $strsql;
	$resultmon=mysql_query($strsql);
	$rowmon=mysql_fetch_assoc($resultmon);
	if($rowmon["Rpt_id"]!="")
	{
		$rpid=$rowmon["Rpt_id"];
	}
	else
	{
		$rpid=0;
	}
	
	$sql="select * from emp_company where company_id=".$companyid."";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
?>

<form name=frmMonthlyReport method=POST>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" height="241">  
	  <tr>
        <td width="1000" height="24" class="txtleft" colspan="2">
		<?php 
		echo "<font color=red> <b>";
		if($rowmon["re_entered"]>0)
		{
			echo "RIAB permitted to modify this report";
		}
		elseif($rowmon["status"]=="S")
		{
			echo "Report Status: Submitted and waiting for the approval of MD";
		}
		elseif($rowmon["status"]=="R")
		{
			echo "Report Status: Rejected by RIAB";
		}
		elseif($rowmon["status"]=="A")
		{
			echo "Report Status: Accepted by RIAB ";
		}
		elseif($rowmon["status"]=="M")
		{
			echo "Report Status: Approved by M.D and waiting for the approval of RIAB";
		}
		elseif($rowmon["status"]=="D")
		{
			echo "Report Status: Discarded by M.D </b></font>";
		}
		
		 ?>
		  <?php
         echo "<input type=button value='UpDate' onclick='JavaScript:verifyReport(".$rpid.")'>";
		  
		?> 
		 </td>
      </tr>  
	  <div id="w"></div> 
      <tr>
        <td width="1000" height="24" class="txtleft" colspan="2">Nature of Activity : &nbsp; 
		<?php echo $row["activity"]; ?></td>
      </tr>
      <tr>
        <td width="1000" height="21" class="txtleft" colspan="2">
			
		</td>
      </tr>
      <tr>
        <td width="1000" height="25" class="txtleft" colspan="2"><b>1. Manpower (In nos.)</b></td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">&nbsp;&nbsp;&nbsp; i) 
        Actual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        :&nbsp;
		<?php 
			$sql="select * from emp_manpower where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			  $result123=mysql_query($sql);
			  $row123=mysql_fetch_assoc($result123);
			echo "<input type=text name=txtActual id=txtActual class=txtbox size=25 
			value='".$row123["actual_manpower"]."' >"; ?>
		</td>
      </tr>
      <tr>
        <td width="1000" height="30" class="txtleft" colspan="2">&nbsp;&nbsp;&nbsp; ii) 
        Effective for the month :&nbsp;
        <?php
        
			  echo"<input type=text name=txtEffective id=txtEffective class=txtbox size=25 
			  value='".$row123["effective_month"]."'>";
        ?>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2"><b>2. Turnover &amp; Profit (in Rs.Lakhs)</b></td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        <?php
        	 $sql="SELECT t1.* FROM(SELECT * from  emp_turnover where
			  company_id=".$companyid." and fin_year<".$year." order by fin_year desc limit 5) AS A INNER JOIN emp_turnover t1
			 ON t1.turn_id=A.turn_id where t1.company_id=".$companyid." and t1.fin_year<".$year." order by t1.fin_year ";
			 //echo $sql;
			 
			 /*SELECT t1.* from(SELECT * FROM emp_turnover  where company_id=30 and fin_year<2013
order by fin_year desc limit 5) AS A INNER JOIN emp_turnover t1 
ON t1.turn_id=A.turn_id where t1.company_id=30 and t1.fin_year<2013
order by t1.fin_year*/
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="100%">
          <tr>
            <td width="31%" rowspan="2" class="txtcenter1">
            <b>Particulars</b></td>
            <td width="69%" colspan="5" class="txtcenter1" bgcolor="#D7D7D7"><b>Details for past 5 
            years</b></td>
          </tr>
          <tr>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><b><?php  
            if ($rowTurn["fin_year"]!="")
            {
			$strsql="select * from emp_fin_year where year=".$rowTurn["fin_year"]."";
			$resultF=mysql_query($strsql);
			$rowF=mysql_fetch_assoc($resultF);
			echo
			$rowF["fin_year"];
			}?></b>&nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><b><?php $rowTurn=mysql_fetch_assoc($resultTurn);
            if ($rowTurn["fin_year"]!="")
            {
			$strsql="select * from emp_fin_year where year=".$rowTurn["fin_year"]."";
			$resultF=mysql_query($strsql);
			$rowF=mysql_fetch_assoc($resultF);
			echo
			$rowF["fin_year"];
			}?></b>&nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><b><?php $rowTurn=mysql_fetch_assoc($resultTurn);
            if ($rowTurn["fin_year"]!="")
            {
			$strsql="select * from emp_fin_year where year=".$rowTurn["fin_year"]."";
			$resultF=mysql_query($strsql);
			$rowF=mysql_fetch_assoc($resultF);
			echo
			$rowF["fin_year"];
			}?></b>&nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><b><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			if ($rowTurn["fin_year"]!="")
            {
			$strsql="select * from emp_fin_year where year=".$rowTurn["fin_year"]."";
			$resultF=mysql_query($strsql);
			$rowF=mysql_fetch_assoc($resultF);
			echo
			$rowF["fin_year"];
			}?></b>&nbsp;</td>
            <td width="13%" class="txtcenter1" bgcolor="#E2E0E0"><b><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			if ($rowTurn["fin_year"]!="")
            {
			$strsql="select * from emp_fin_year where year=".$rowTurn["fin_year"]."";
			$resultF=mysql_query($strsql);
			$rowF=mysql_fetch_assoc($resultF);
			echo
			$rowF["fin_year"];
			}?></b>&nbsp;</td>
          </tr>
           <?php
        	$sql="SELECT t1.* FROM(SELECT * from  emp_turnover where
			  company_id=".$companyid." and fin_year<".$year." order by fin_year desc limit 5) AS A INNER JOIN emp_turnover t1
			 ON t1.turn_id=A.turn_id where t1.company_id=".$companyid." and t1.fin_year<".$year." order by t1.fin_year ";
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
          <tr>
            <td width="31%" class="txtleft">Turnover</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php echo $rowTurn["turn_over"];?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["turn_over"],2,'.','');?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["turn_over"],2,'.','');?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["turn_over"],2,'.','');?>
            &nbsp;</td>
            <td width="13%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["turn_over"],2,'.','');?>
            &nbsp;</td>
          </tr>
          <?php
        	 $sql="SELECT t1.* FROM(SELECT * from  emp_turnover where
			  company_id=".$companyid." and fin_year<".$year." order by fin_year desc limit 5) AS A INNER JOIN emp_turnover t1
			 ON t1.turn_id=A.turn_id where t1.company_id=".$companyid." and t1.fin_year<".$year." order by t1.fin_year ";
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
          <tr>
            <td width="31%" class="txtleft">Profit/loss(PBT)</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php echo number_format($rowTurn["profit_loss"],2,'.','');?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["profit_loss"],2,'.','');?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["profit_loss"],2,'.','');?>
            &nbsp;</td>
            <td width="14%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["profit_loss"],2,'.','');?>
            &nbsp;</td>
            <td width="13%" class="txtcenter1" bgcolor="#E2E0E0"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo number_format($rowTurn["profit_loss"],2,'.','');?>
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
		<tr></tr>
	  <tr>
        <td width="1000" height="31" class="txtleft" colspan="2"><b>3. Capacity/Production details of current year</b></td>
      </tr>
      <tr>
        <td width="790" height="31" class="txtleft">
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="64">
        
          <tr>
          	<td width="16%" height="91" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" align="centre"><b>Product</b></td>
            <td width="10%" height="40" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" align="centre"><b>Installed capacity per annum</b><br></td>
            <td width="10%" height="40" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" align="centre"><b>Achievable capacity per annum</b><br>
            </td>
            <td width="10%" height="40" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" align="centre"><b>Capacity being used now</b></td>
            <td width="8%" height="40" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" align = "centre"><b>Machine Efficiency(%)</b></td>
			<td width="20%" height="40" class="txtcenter1" bgcolor="#D7D7D7" colspan="2" align="center">
			<b>Production (Qty)</b></td>
            <td width="19%" height="40" class="txtcenter1" bgcolor="#D7D7D7" colspan="2" align="center">
			<b>Sales (Qty)</b></td>
            <td width="8%" height="40" class="txtcenter1" bgcolor="#D7D7D7" rowspan="2" colspan="2" align="centre"><b>Capacity Utilisation (%)</b></td>
          </tr>
		  <tr>
            <td width="9%" height="40" class="txtcenter1" bgcolor="#D7D7D7" align="center">
			<b>For the Month</b></td>
            
            <td width="11%" height="40" class="txtcenter1" bgcolor="#D7D7D7" align="center">
			<b>Cumulative for the year</b></td>
            
            <td width="8%" height="40" class="txtcenter1" bgcolor="#D7D7D7" align="center">
			<b>For the Month</b></td>
            
            <td width="8%" height="40" class="txtcenter1" bgcolor="#D7D7D7" align="center">
			<b>Cumulative for the year</b></td>
            
          </tr>
          <?php
				$sql="select * from emp_products where company_id=".$companyid." and fin_year=".$year."";
				$resultcapacity=mysql_query($sql);
				$id=0;
				while($rowcapacity=mysql_fetch_array($resultcapacity))
				{
				//echo $sql;
			?>
          <tr>
            
			
			<td width="16%" height="23" class="txtleft" bgcolor="#E2E0E0">
				<?php echo $rowcapacity["item_name"].
				  "<input type=hidden id='txtItCode' name='txtItCode' size=10 value=".$rowcapacity["item_code"].">"
				; ?>
			</td>
			<td width="11%" height="23" class="txtcenter1" bgcolor="#E2E0E0">
				<?php echo number_format($rowcapacity["inst_capacity"])." ".$rowcapacity["unit"]; ?>
			</td>
            <td width="10%" height="23" class="txtcenter1" bgcolor="#E2E0E0">
            	<?php echo $rowcapacity["ach_capacity"]." ".$rowcapacity["unit"]; ?>
            </td>
            <td width="9%" height="23" class="txtcenter1" >
            <?php 
				$sql="select * from emp_monthly_capacity where company_id=".$companyid." 
				and fin_year=".$year."  and month=".$month." and it_code=".$rowcapacity["item_code"]."";
				$resultPro=mysql_query($sql);
				$rowPro=mysql_fetch_assoc($resultPro);  
				echo "<input type=text id='txtUsedCapacity' name='txtUsedCapacity' size=10 class=txtboxwhite
						value=".$rowPro["used_capacity"]." 
						>";
            	?>
            </td>
            <td width="9%" height="23" class="txtcenter1" >
            	<?php echo "<input type=text id='txtMachineEfficiency' name='txtMachineEfficiency' size=10 
				class=txtboxwhite value=".$rowPro["machine_efficiency"]." 
				>";
            	?>
            </td>
			<td width="8%" height="40" class="txtcenter1" align="center">
			    <?php echo "<input type=text id='txtProdqtyFormonth' name='txtProdqtyFormonth' size=10 
								class=txtboxwhite value=".$rowPro["prod_qty_formonth"]." 
							>";
				?>
			</td>
            <td width="11%" height="40" class="txtcenter1" align="center">
				<?php echo "<input type=text id='txtProdqtyCum' name='txtProdqtyCum' size=10 
								class=txtboxwhite value=".$rowPro["prod_qty_cum"]." 
							>";
				?>		
			</td>
            
            <td width="8%" height="40" class="txtcenter1" align="center">
			    <?php echo "<input type=text id='txtSaleqtyFormonth' name='txtSaleqtyFormonth' size=10 
								class=txtboxwhite value=".$rowPro["sale_qty_formonth"]." 
							>";
				?>					
			</td>
            
            <td width="11%" height="40" class="txtcenter1" align="center">
				<?php echo "<input type=text id='txtSaleqtyCum' name='txtSaleqtyCum' size=10 
								class=txtboxwhite value=".$rowPro["sale_qty_cum"]." 
							>";
				?>		
			</td>

            <td width="8%" height="23" class="txtcenter1" >
            	<?php echo "<input type=text id='txtCapacityUtilization' name='txtCapacityUtilization' size=10 
								class=txtboxwhite value=".$rowPro["capacity_utilization"]." 
							>";
            	?>
            </td>
          </tr>
          <?php
          	$id+=1;
          	}
          	?>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2" valign="bottom">
        <b>4. Profitability Statement (in Rs. Lakhs)</b></td>
      </tr>
      <?php
      		
		   	if($_SESSION["LogType"]=="MS" || $_SESSION["LogType"]=="CO") 
		   	{
           ?>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="100%">
          <?php
          
          $sql="select * from emp_monthlyreport_tot where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultTot=mysql_query($sql);
			$rowTot=mysql_fetch_assoc($resultTot); 
			
		  	$sql="select * from emp_profirability_statement where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultPro=mysql_query($sql);
			$rowPro=mysql_fetch_assoc($resultPro);  
			//echo $sql;
			$sql="select * from emp_reversed_budget where company_id=".$companyid." and 
			     fin_year=".$year."  order by bud_rev_id desc";
			$resultbud=mysql_query($sql);
			$rowbud=mysql_fetch_assoc($resultbud);
          ?>
		  <tr>
            <td width="400">&nbsp;</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7"><b>Budget for<br>
            current year</b></td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actuals for the <br>
            month</b></td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actual Cumulative<br>
            for the year</b></td>
          </tr>
          <tr>
            <td width="500" class="txtleft">a) Sales (without GST)</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentSale id=txtCurrentSale class=txtboxwhite size=25 
			value='".number_format($rowbud['sales'],2,'.','')."' onblur='JavaScript:calcProfirability()' readonly> ";
			?></td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualSale id=txtActualSale class=txtboxwhite size=25 
			value='".number_format($rowPro['actual_sale'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeSale id=txtCumulativeSale class=txtboxwhite size=25 
			value='".number_format($rowPro['cumulative_sale'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">b) Increase/(Decrease) in Stock</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentStock id=txtCurrentStock class=txtboxwhite size=25 
			value='".number_format($rowbud['stock'],2,'.','')."' onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualStock id=txtActualStock class=txtboxwhite size=25 
			value='".number_format($rowPro['actual_stock'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeStock id=txtCumulativeStock class=txtboxwhite size=25 
			value='".number_format($rowPro['cumulative_stock'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?></td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">c) Value of Production (a+b)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCurrent= $rowbud["sales"]+$rowbud["stock"];
			echo "<input type='text' name='txtTotCurrent' id='txtTotCurrent' value=".number_format($totCurrent,2,'.','')." readonly
			     class='txtbox'>";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
			<?php 
			$totActual=$rowTot["actual_production"];//$rowPro["actual_sale"]+$rowPro["actual_stock"];
			echo "<input type='text' name='txtTotActual' id='txtTotActual' value=".number_format($totActual,2,'.','')." readonly 
			      class='txtbox'>";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
			<?php 
			$totCumulative=$rowTot["cumulative_production"];//$rowPro["cumulative_sale"]+$rowPro["cumulative_stock"];
			echo "<input type='text' name='txtTotCumulative' id='txtTotCumulative' value=".number_format($totCumulative,2,'.','')." readonly
			      class='txtbox'>";
			
			?>
			</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7"><b>d) Variable Expenses</b></td>
          </tr>
          <?php
		  	$sql="select * from emp_variable_expenses where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultVar=mysql_query($sql);
			$rowVar=mysql_fetch_assoc($resultVar);  
          ?>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Raw-material 
            cost</td>
            <td width="20%" class="txtcenter1">
			 <?php echo"
            <input type=text name=txtCurrentRawMaterial id=txtCurrentRawMaterial class=txtboxwhite size=25 
			value='".number_format($rowbud["current_rowmaterial"],2,'.','')."' onblur='JavaScript:calcProfirability()'
			readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActualRawmaterial id=txtActualRawmaterial class=txtboxwhite size=25 
			value='".number_format($rowVar['actual_rowmaterial'],2,'.','')."' onblur='JavaScript:calcProfirability()'
			>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtCumulativeRawmaterial id=txtCumulativeRawmaterial class=txtboxwhite size=25 
			value='".number_format($rowVar['cumulative_rowmaterial'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Power &amp; fuel</td>
            <td width="20%" class="txtcenter1">
            	<?php echo"
            <input type=text name=txtCurrent_Power_Fuel id=txtCurrent_Power_Fuel class=txtboxwhite size=25 
			value='".number_format($rowbud['current_power_fuel'],2,'.','')."' onblur='JavaScript:calcProfirability()'
			readonly>";
			?>
            </td>
            <td width="19%" class="txtcenter1">
            	<?php echo"
            <input type=text name=txtActual_Power_Fuel id=txtActual_Power_Fuel class=txtboxwhite size=25 
			value='".number_format($rowVar['actual_power_fuel'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulative_Power_Fuel id=txtCumulative_Power_Fuel class=txtboxwhite size=25 
			value='".number_format($rowVar['cumulative_power_fuel'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; iii) All Other 
            Variable cost</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrent_Other_Variablecost id=txtCurrent_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_other_variablecost'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActual_Other_Variablecost id=txtActual_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".number_format($rowVar['actual_other_variablecost'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' >";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulative_Other_Variablecost id=txtCumulative_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".number_format($rowVar['cumulative_other_variablecost'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()'>";
			?></td>
          </tr>
          
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">e) <b>Fixed Expenses</b></td>
          </tr>
          <?php
		  	$sql="select * from emp_fixed_expenses where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultFix=mysql_query($sql);
			$rowFix=mysql_fetch_assoc($resultFix);  
			
			$sql="select * from emp_financial_charges where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultFin=mysql_query($sql);
			$rowFin=mysql_fetch_assoc($resultFin);  
          ?>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Employee Cost</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentEmployeeCost id=txtCurrentEmployeeCost
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_employee_cost'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualEmployeeCost id=txtActualEmployeeCost
			 class=txtboxwhite size=25 
			value='".number_format($rowFix['actual_employee_cost'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCumulativeEmployeeCost id=txtCumulativeEmployeeCost
			 class=txtboxwhite size=25 
			value='".number_format($rowFix['cumulative_employee_cost'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) All Other 
            fixed Expenses</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentOtherExpense id=txtCurrentOtherExpense
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_other_expense'],2,'.','')."'
			 onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualOtherExpense id=txtActualOtherExpense
			 class=txtboxwhite size=25  
			value='".number_format($rowFix['actual_other_expense'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCumulativeOtherExpense id=txtCumulativeOtherExpense
			 class=txtboxwhite size=25 
			value='".number_format($rowFix['cumulative_other_expense'],2,'.','')."'
			 onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">f) Total Cost (d+e)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCurrentCost=$rowbud["current_rowmaterial"]+$rowbud["current_power_fuel"]
			+ $rowbud["current_other_variablecost"]+$rowbud["current_employee_cost"]+
			$rowbud["current_other_expense"];
			echo "<input type='text' name='txtTotCurrentCost' id='txtTotCurrentCost' 
			value=".number_format($totCurrentCost,2,'.','')." readonly  >";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totActualCost= $rowTot["actual_cost"];//$rowVar["actual_rowmaterial"]+$rowVar["actual_power_fuel"]
			//+ $rowVar["actual_other_variablecost"]+$rowFix["actual_employee_cost"]+$rowFix["actual_other_expense"];
			echo "<input type='text' name='txtTotActualCost' id='txtTotActualCost' 
			value=".number_format($totActualCost,2,'.','')." readonly   >";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCumulativeCost=$rowTot["cumulative_cost"];
			//$rowVar["cumulative_rowmaterial"]+$rowVar["cumulative_power_fuel"]+ 
			//$rowVar["cumulative_other_variablecost"]+$rowFix["cumulative_employee_cost"]+
			//$rowFix["cumulative_other_expense"];;
			echo "<input type='text' name='txtTotCumulativeCost' id='txtTotCumulativeCost' 
			value=".number_format($totCumulativeCost,2,'.','')." readonly   >";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">g) Profit Before INT .DEPR.&amp; Taxes 
            (c-f)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentProfit=$totCurrent-$totCurrentCost;
			echo "<input type='text' name='txtCurrentProfit' id='txtCurrentProfit' 
			value=".number_format($currentProfit,2,'.','')." readonly  >";
			
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualProfit=$rowTot["actual_profit1"];//$totActual-$totActualCost;
			echo "<input type='text' name='txtActualProfit' id='txtActualProfit' 
			value=".number_format($actualProfit,2,'.','')." readonly   >";
			?></td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativeProfit=$rowTot["cumulative_profit1"];//$totCumulative-$totCumulativeCost;
			echo "<input type='text' name='txtCumulativeProfit' id='txtCumulativeProfit' 
			value=".number_format($cumulativeProfit,2,'.','')." readonly  >";			
			?>
			</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">h)<b> Financial Charges on</b></td>
          </tr>
          
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Long term Loans</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCurrentLongTermLoan id=txtCurrentLongTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_longterm_loan'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualLongTermLoan id=txtActualLongTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowFin['actual_longterm_loan'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeLongTermLoan id=txtCumulativeLongTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowFin['cumulative_longterm_loan'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Working Capital Loan</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCurrentWorkingTermLoan id=txtCurrentWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_workingterm_loan'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualWorkingTermLoan id=txtActualWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowFin['actual_workingterm_loan'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeWorkingTermLoan id=txtCumulativeWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".number_format($rowFin['cumulative_workingterm_loan'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <?php
          	$sql="select * from emp_otherincome_depr where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultOth=mysql_query($sql);
			$rowOth=mysql_fetch_assoc($resultOth);  
          ?>
          <tr>
            <td width="44%" class="txtleft">i) Profit Before DEPR. &amp; Taxes (g-h)</td>
            <td width="20%" class="txtcenter1">
            <?php 
			$currentdepr=$currentProfit-($rowbud["current_longterm_loan"]+$rowbud["current_workingterm_loan"]);
			echo "<input type='text' name='txtCurrentDepr' id='txtCurrentDepr' 
			value=".number_format($currentdepr,2,'.','')." readonly   >";
			
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php 
			$actualdepr=$rowTot["actual_profit2"];
			//$actualProfit-($rowFin["actual_longterm_loan"]+$rowFin["actual_workingterm_loan"]);
			echo "<input type='text' name='txtActualDepr' id='txtActualDepr' 
			value=".number_format($actualdepr,2,'.','')." readonly  >";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php 
			$cumulativedepr=$rowTot["cumulative_profit2"];
			//$cumulativeProfit-($rowFin["cumulative_longterm_loan"]+
			//$rowFin["cumulative_workingterm_loan"]);
			echo "<input type='text' name='txtCumulativeDepr' id='txtCumulativeDepr' 
			value=".number_format($cumulativedepr,2,'.','')." readonly  >";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">j) Other Income</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentOtherIncome id=txtCurrentOtherIncome
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_other_income'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualOtherIncome id=txtActualOtherIncome
			 class=txtboxwhite size=25 
			value='".number_format($rowOth['actual_other_income'],2,'.','')."' 
			onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeOtherIncome id=txtCumulativeOtherIncome
			 class=txtboxwhite size=25 
			value='".number_format($rowOth['cumulative_other_income'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?></td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">k) Cash Profit/Loss (i+j)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentcashprofit=$currentdepr+$rowbud["current_other_income"];
			echo "<input type='text' name='txtcurrentCashProfit' id='txtcurrentCashProfit' 
			value=".number_format($currentcashprofit,2,'.','')." readonly       >";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualcashprofit=$rowTot["actual_cash_profit"];//$actualdepr+$rowOth["actual_other_income"];
			echo "<input type='text' name='txtActualCashProfit' id='txtActualCashProfit' 
			value=".number_format($actualcashprofit,2,'.','')." readonly       >";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativecashprofit=$rowTot["cumulative_cash_profit"];
			//$cumulativedepr+$rowOth["cumulative_other_income"];
			echo "<input type='text' name='txtCumulativeCashProfit' id='txtCumulativeCashProfit' 
			value=".number_format($cumulativecashprofit,2,'.','')." readonly       >";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">l) Depreciation</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentDepreciation id=txtCurrentDepreciation
			 class=txtboxwhite size=25 
			value='".number_format($rowbud['current_depr'],2,'.','')."' onblur='JavaScript:calcProfirability()'
			readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActualDepreciation id=txtActualDepreciation
			 class=txtboxwhite size=25 
			value='".number_format($rowOth['actual_depr'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeDepreciation id=txtCumulativeDepreciation
			 class=txtboxwhite size=25 
			value='".number_format($rowOth['cumulative_depr'],2,'.','')."' onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">m)Net Profit/Loss (k-l) (PBT)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentNet=$currentcashprofit-$rowbud["current_depr"];
			echo "<input type='text' name='txtCurrentNet' id='txtCurrentNet' 
			value=".number_format($currentNet,2,'.','')." readonly       >";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualNet=$rowTot["actual_net_profit"];//$actualcashprofit-$rowOth["actual_depr"];
			echo "<input type='text' name='txtActualNet' id='txtActualNet' 
			value=".number_format($actualNet,2,'.','')." readonly       >";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativeNet=$rowTot["cumulative_net_profit"];//$cumulativecashprofit-$rowOth["cumulative_depr"];
			echo "<input type='text' name='txtCumulativeNet' id='txtCumulativeNet' 
			value=".number_format($cumulativeNet,2,'.','')." readonly       >";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
            <td width="19%" class="txtcenter1">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4">5.Other Financial 
            Indicators at the end of the month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			6.Statutory dues at the end of the month </td>
          </tr>
          <tr>
            <td width="44%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
          </tr>
          <?php
		  	$sql="select * from emp_financial_indicators where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultInd=mysql_query($sql);
			$rowInd=mysql_fetch_assoc($resultInd);  
			
			$sql="select * from emp_statutory_dues where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultSt=mysql_query($sql);
			$rowSt=mysql_fetch_assoc($resultSt);
          ?>
          <tr>
            <td width="44%" class="txtleft">a. Sales realisation during the 
            month</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtSalesRealisation id=txtSalesRealisation
			 class=txtboxwhite size=25 
			value=".number_format($rowInd['sales_realisation'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="19%" class="txtleft">
            PF</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtPF id=txtPF
			 class=txtboxwhite size=25 
			value=".number_format($rowSt['PF'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">b. Value of orders in hand</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtValueOfOrders id=txtValueOfOrders
			 class=txtboxwhite size=25 
			value=".number_format($rowInd['value_of_orders'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
            <td width="19%" class="txtleft">
            ESI</td>
            <td width="20%" class="txtcenter1">			
			<?php echo"
            <input type=text name=txtESI id=txtESI
			 class=txtboxwhite size=25 
			value=".number_format($rowSt['ESI'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			
			</td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2" valign="top">
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="600">
          <tr>
            <td width="360" class="txtleft">c. Sundry Creditors</td>
            <td width="154">
            <?php echo"
            <input type=text name=txtSundryCreditors id=txtSundryCreditors
			 class=txtboxwhite size=25 
			value=".number_format($rowInd['sundry_creditors'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="266" class="txtleft">d. Sundry Debtors</td>
            <td width="154">
            <?php echo"
            <input type=text name=txtSundryDebtors id=txtSundryDebtors
			 class=txtboxwhite size=25 
			value=".number_format($rowInd['sundry_debtors'],2,'.','')." onblur='JavaScript:calcProfirability()'>";
			?>
			</td>
          </tr>
          
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="60" class="txtcenter1" colspan="2" valign="middle">
        <?php
        	if ($_SESSION["LogType"]=="MS")
        	{
         		echo "<input type=button value='UpDate' onclick='JavaScript:updateReport(".$rpid.")'>"; 
         	}
         	elseif($_SESSION["LogType"]=="CO")
         	{
				echo "
				<select name=cmbStatus id=cmbStatus >
        		<option value='M' selected> Approved </option>
        		<option value='D'> DisApproved </option>
        		</select> &nbsp;&nbsp;&nbsp;&nbsp;";
        	
         		echo "<input type=button value='UpDate' onclick='JavaScript:updateReportMD(".$rpid.")'>"; 
		
		
			}
		?> &nbsp; <input type="reset" value="Clear"> <div id="w2"></div>
        </td>
      </tr>
      <!--=========================================== FOR ADMINISTRATOR =================================== 
      ===============================================                    =================================== -->
      <?php
      	}
      	elseif($_SESSION["LogType"]=="AD")
      	{
      	
      }
      ?>
      <span id="w1"></span>
      
    </table>
    </td>
  </tr>
</table>
<?php
/*
/*	
      	?>
      		<tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="100%">
          <?php
		  	$sql="select * from emp_profirability_statement where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultPro=mysql_query($sql);
			$rowPro=mysql_fetch_assoc($resultPro);  
          ?>
		  <tr>
            <td width="400">&nbsp;</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7"><b>Budget for<br>
            current year</b></td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actuals for the <br>
            month</b></td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actual Cumulative<br>
            for the year</b></td>
          </tr>
          <tr>
            <td width="500" class="txtleft">a) Sales (without Taxes and Duty)</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentSale id=txtCurrentSale class=txtboxwhite size=25 
			value='".$rowPro['current_sale']."' onblur='JavaScript:calcProfirability()' readonly> ";
			?></td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualSale id=txtActualSale class=txtboxwhite size=25 
			value='".$rowPro['actual_sale']."' onblur='JavaScript:calcProfirability()' readonly> ";
			?>
			
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeSale id=txtCumulativeSale class=txtboxwhite size=25 
			value='".$rowPro['cumulative_sale']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">b) Increase/(Decrease) in Stock</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentStock id=txtCurrentStock class=txtboxwhite size=25 
			value='".$rowPro['current_stock']."' onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualStock id=txtActualStock class=txtboxwhite size=25 
			value='".$rowPro['actual_stock']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeStock id=txtCumulativeStock class=txtboxwhite size=25 
			value='".$rowPro['cumulative_stock']."' onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">c) Value of Production (a+b)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCurrent=$rowPro["current_sale"]+$rowPro["current_stock"];
			echo "<input type='text' name='txtTotCurrent' id='txtTotCurrent' value=".$totCurrent." readonly
			     class='txtbox' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
			<?php 
			$totActual=$rowPro["actual_sale"]+$rowPro["actual_stock"];
			echo "<input type='text' name='txtTotActual' id='txtTotActual' value=".$totActual." readonly 
			      class='txtbox' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
			<?php 
			$totCumulative=$rowPro["cumulative_sale"]+$rowPro["cumulative_stock"];
			echo "<input type='text' name='txtTotCumulative' id='txtTotCumulative' value=".$totCumulative." readonly
			      class='txtbox' readonly>";
			
			?>
			</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7"><b>d) Variable Expenses</b></td>
          </tr>
          <?php
		  	$sql="select * from emp_variable_expenses where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultVar=mysql_query($sql);
			$rowVar=mysql_fetch_assoc($resultVar);  
          ?>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Raw-material 
            cost</td>
            <td width="20%" class="txtcenter1">
			 <?php echo"
            <input type=text name=txtCurrentRawMaterial id=txtCurrentRawMaterial class=txtboxwhite size=25 
			value='".$rowVar["current_rowmaterial"]."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActualRawmaterial id=txtActualRawmaterial class=txtboxwhite size=25 
			value='".$rowVar['actual_rowmaterial']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtCumulativeRawmaterial id=txtCumulativeRawmaterial class=txtboxwhite size=25 
			value='".$rowVar['cumulative_rowmaterial']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Power &amp; fuel</td>
            <td width="20%" class="txtcenter1">
            	<?php echo"
            <input type=text name=txtCurrent_Power_Fuel id=txtCurrent_Power_Fuel class=txtboxwhite size=25 
			value='".$rowVar['current_power_fuel']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
            </td>
            <td width="19%" class="txtcenter1">
            	<?php echo"
            <input type=text name=txtActual_Power_Fuel id=txtActual_Power_Fuel class=txtboxwhite size=25 
			value='".$rowVar['actual_power_fuel']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulative_Power_Fuel id=txtCumulative_Power_Fuel class=txtboxwhite size=25 
			value='".$rowVar['cumulative_power_fuel']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; iii) All Other 
            Variable cost</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrent_Other_Variablecost id=txtCurrent_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".$rowVar['current_other_variablecost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActual_Other_Variablecost id=txtActual_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".$rowVar['actual_other_variablecost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulative_Other_Variablecost id=txtCumulative_Other_Variablecost
			 class=txtboxwhite size=25 
			value='".$rowVar['cumulative_other_variablecost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?></td>
          </tr>
          
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">e) <b>Fixed Expenses</b></td>
          </tr>
          <?php
		  	$sql="select * from emp_fixed_expenses where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultFix=mysql_query($sql);
			$rowFix=mysql_fetch_assoc($resultFix);  
			
			$sql="select * from emp_financial_charges where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultFin=mysql_query($sql);
			$rowFin=mysql_fetch_assoc($resultFin);  
          ?>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Employee Cost</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentEmployeeCost id=txtCurrentEmployeeCost
			 class=txtboxwhite size=25 
			value='".$rowFix['current_employee_cost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualEmployeeCost id=txtActualEmployeeCost
			 class=txtboxwhite size=25 
			value='".$rowFix['actual_employee_cost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCumulativeEmployeeCost id=txtCumulativeEmployeeCost
			 class=txtboxwhite size=25 
			value='".$rowFix['cumulative_employee_cost']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) All Other 
            fixed Expenses</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentOtherExpense id=txtCurrentOtherExpense
			 class=txtboxwhite size=25 
			value='".$rowFix['current_other_expense']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtActualOtherExpense id=txtActualOtherExpense
			 class=txtboxwhite size=25  
			value='".$rowFix['actual_other_expense']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCumulativeOtherExpense id=txtCumulativeOtherExpense
			 class=txtboxwhite size=25 
			value='".$rowFix['cumulative_other_expense']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">f) Total Cost (d+e)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCurrentCost=$rowVar["current_rowmaterial"]+$rowVar["current_power_fuel"]
			+ $rowVar["current_other_variablecost"]+$rowFix["current_employee_cost"]+
			$rowFix["current_other_expense"];
			echo "<input type='text' name='txtTotCurrentCost' id='txtTotCurrentCost' value='".$totCurrentCost."' readonly
			      class='txtbox'>";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totActualCost=$rowVar["actual_rowmaterial"]+$rowVar["actual_power_fuel"]
			+ $rowVar["actual_other_variablecost"]+$rowFix["actual_employee_cost"]+$rowFix["actual_other_expense"];
			echo "<input type='text' name='txtTotActualCost' id='txtTotActualCost' value='".$totActualCost."' readonly
			      class='txtbox'>";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$totCumulativeCost=$rowVar["cumulative_rowmaterial"]+$rowVar["cumulative_power_fuel"]+ 
			$rowVar["cumulative_other_variablecost"]+$rowFix["cumulative_employee_cost"]+
			$rowFix["cumulative_other_expense"];;
			echo "<input type='text' name='txtTotCumulativeCost' id='txtTotCumulativeCost' 
			value='".$totCumulativeCost."' readonly       class='txtbox' >";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">g) Profit Before INT .DEPR.&amp; Taxes 
            (a-f)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentProfit=$rowPro["current_sale"]-$totCurrentCost;
			echo "<input type='text' name='txtCurrentProfit' id='txtCurrentProfit' 
			value='".$currentProfit."' readonly       class='txtbox'>";
			
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualProfit=$rowPro["actual_sale"]-$totActualCost;
			echo "<input type='text' name='txtActualProfit' id='txtActualProfit' 
			value='".$actualProfit."' readonly       class='txtbox'>";
			?></td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativeProfit=$rowPro["cumulative_sale"]-$totCumulativeCost;
			echo "<input type='text' name='txtCumulativeProfit' id='txtCumulativeProfit' 
			value=".$cumulativeProfit." readonly       class='txtbox'>";			
			?>
			</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">h)<b> Financial Charges on</b></td>
          </tr>
          
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Long term Loans</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCurrentLongTermLoan id=txtCurrentLongTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['current_longterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualLongTermLoan id=txtActualLongTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['actual_longterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeLongTermLoan id=txtCumulativeLongTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['cumulative_longterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Working Capital Loan</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtCurrentWorkingTermLoan id=txtCurrentWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['current_workingterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualWorkingTermLoan id=txtActualWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['actual_workingterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeWorkingTermLoan id=txtCumulativeWorkingTermLoan
			 class=txtboxwhite size=25 
			value='".$rowFin['cumulative_workingterm_loan']."' onblur='JavaScript:calcProfirability()' readonly>";
			?>
			</td>
          </tr>
          <?php
          	$sql="select * from emp_otherincome_depr where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultOth=mysql_query($sql);
			$rowOth=mysql_fetch_assoc($resultOth);  
          ?>
          <tr>
            <td width="44%" class="txtleft">i) Profit Before DEPR. &amp; Taxes (g-h)</td>
            <td width="20%" class="txtcenter1">
            <?php 
			$currentdepr=$currentProfit-($rowFin["current_longterm_loan"]+$rowFin["current_workingterm_loan"]);
			echo "<input type='text' name='txtCurrentDepr' id='txtCurrentDepr' 
			value='".$currentdepr."' readonly       class='txtbox'>";
			
			?>
			</td>
            <td width="19%" class="txtcenter1">
            <?php 
			$actualdepr=$actualProfit-($rowFin["actual_longterm_loan"]+$rowFin["actual_workingterm_loan"]);
			echo "<input type='text' name='txtActualDepr' id='txtActualDepr' 
			value='".$actualdepr."' readonly       class='txtbox'>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php 
			$cumulativedepr=$cumulativeProfit-($rowFin["cumulative_longterm_loan"]+	
			$rowFin["cumulative_workingterm_loan"]);
			echo "<input type='text' name='txtCumulativeDepr' id='txtCumulativeDepr' 
			value='".$cumulativedepr."' readonly       class='txtbox'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">j) Other Income</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentOtherIncome id=txtCurrentOtherIncome
			 class=txtboxwhite size=25 
			value='".$rowOth['current_other_income']."' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtActualOtherIncome id=txtActualOtherIncome
			 class=txtboxwhite size=25 
			value='".$rowOth['actual_other_income']."' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeOtherIncome id=txtCumulativeOtherIncome
			 class=txtboxwhite size=25 
			value='".$rowOth['cumulative_other_income']."' readonly>";
			?></td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">k) Cash Profit/Loss (i+j)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentcashprofit=$currentdepr+$rowOth["current_other_income"];
			echo "<input type='text' name='txtcurrentCashProfit' id='txtcurrentCashProfit' 
			value='".$currentcashprofit."' readonly       class='txtbox' >";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualcashprofit=$actualdepr+$rowOth["actual_other_income"];
			echo "<input type='text' name='txtActualCashProfit' id='txtActualCashProfit' 
			value='".$actualcashprofit."' readonly       class='txtbox'>";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativecashprofit=$actualdepr+$rowOth["actual_other_income"];
			echo "<input type='text' name='txtCumulativeCashProfit' id='txtCumulativeCashProfit' 
			value='".$cumulativecashprofit."' readonly       class='txtbox'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">l) Depreciation</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCurrentDepreciation id=txtCurrentDepreciation
			 class=txtboxwhite size=25 
			value='".$rowOth['current_depr']."' readonly>";
			?>
			</td>
            <td width="19%" class="txtcenter1">
             <?php echo"
            <input type=text name=txtActualDepreciation id=txtActualDepreciation
			 class=txtboxwhite size=25 
			value='".$rowOth['actual_depr']."' readonly>";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeDepreciation id=txtCumulativeDepreciation
			 class=txtboxwhite size=25 
			value='".$rowOth['cumulative_depr']."' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">m)Net Profit/Loss (k-l) (PBT)</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$currentNet=$currentcashprofit+$rowOth["current_depr"];
			echo "<input type='text' name='txtCurrentNet' id='txtCurrentNet' 
			value='".$currentNet."' readonly       class='txtbox'>";
			?>
			</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$actualNet=$actualcashprofit+$rowOth["actual_depr"];
			echo "<input type='text' name='txtActualNet' id='txtActualNet' 
			value='".$actualNet."' readonly       class='txtbox'>";
			?>
			</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">
            <?php 
			$cumulativeNet=$cumulativecashprofit+$rowOth["cumulative_depr"];
			echo "<input type='text' name='txtCumulativeNet' id='txtCumulativeNet' 
			value='".$cumulativeNet."' readonly       class='txtbox'>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
            <td width="19%" class="txtcenter1">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4">5.Other Financial 
            Indicators at the end of the month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			6.Statutory dues at the end of the month </td>
          </tr>
          <tr>
            <td width="44%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
          </tr>
          <?php
		  	$sql="select * from emp_financial_indicators where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultInd=mysql_query($sql);
			$rowInd=mysql_fetch_assoc($resultInd);  
			
			$sql="select * from emp_statutory_dues where company_id=".$companyid." and fin_year=".$year."
			  and month=".$month."";
			$resultSt=mysql_query($sql);
			$rowSt=mysql_fetch_assoc($resultSt);
          ?>
          <tr>
            <td width="44%" class="txtleft">a. Sales realisation during the 
            month</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtSalesRealisation id=txtSalesRealisation
			 class=txtboxwhite size=25 
			value='".$rowInd['sales_realisation']."' readonly>";
			?>
			</td>
            <td width="19%" class="txtleft">
            ESI</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtPF id=txtPF
			 class=txtboxwhite size=25 
			value='".$rowSt['PF']."' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="44%" class="txtleft">b. Value of orders in hand</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtValueOfOrders id=txtValueOfOrders
			 class=txtboxwhite size=25 
			value='".$rowInd['value_of_orders']."' readonly>";
			?>
			</td>
            <td width="19%" class="txtleft">
            PF</td>
            <td width="20%" class="txtcenter1">
			<?php echo"
            <input type=text name=txtESI id=txtESI
			 class=txtboxwhite size=25 
			value='".$rowSt['ESI']."' readonly>";
			?>
			</td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2" valign="top">
        <table border="1" cellpadding="3" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111" width="600">
          <tr>
            <td width="360" class="txtleft">c. Sundry Creditors</td>
            <td width="154">
            <?php echo"
            <input type=text name=txtSundryCreditors id=txtSundryCreditors
			 class=txtboxwhite size=25 
			value='".$rowInd['sundry_creditors']."' readonly>";
			?>
			</td>
          </tr>
          <tr>
            <td width="266" class="txtleft">d. Sundry Debtors</td>
            <td width="154">
            <?php echo"
            <input type=text name=txtSundryDebtors id=txtSundryDebtors
			 class=txtboxwhite size=25 
			value='".$rowInd['sundry_debtors']."' readonly>";
			?>
			</td>
          </tr>
          
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="60" class="txtcenter1" colspan="2" valign="middle">
        
        <select name=cmbType id=cmbType >
        <option value="A" selected> Accepted </option>
        <option value="R"> Rejected </option>
        </select> &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
         echo "<input type=button value='UpDate' onclick='JavaScript:verifyReport(".$rpid.")'>";
		  
		?> 
		<div id="w2"></div>
        </td>
      </tr>
      
      <?php
      */
?>
