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
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$companyid=$_GET["company"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	
	$sql="select * from emp_company where company_id=".$companyid."";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>MONTHLY REPORT ON OPERATIONS OF PUBLIC SECTOR UNITS</title>
<script src="search.js"></script>
<script src="profile.js"></script>
<script src="login.js">	

</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
</head>

<body topmargin=0 leftmargin=0>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" height="241">     
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
		<?php echo "<input type=text name=txtActual class=txtbox size=25 value=".$row["actual_manpower"].">"; ?>
		</td>
      </tr>
      <tr>
        <td width="1000" height="30" class="txtleft" colspan="2">&nbsp;&nbsp;&nbsp; ii) 
        Effective for the month :&nbsp;
        <input type=text name=txtActual class=txtbox size="25"></td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2"><b>2. Turnover &amp; Profit (in Rs.Lakhs)</b></td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        <?php
        	 $sql="SELECT * FROM emp_turnover where company_id=".$companyid." order by turn_id desc LIMIT 5";
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
          <tr>
            <td width="31%" rowspan="2" class="txtcenter1">
            <b>Particulars</b></td>
            <td width="69%" colspan="5" class="txtcenter1" bgcolor="#D7D7D7"><b>Details for past 5 
            years</b></td>
          </tr>
          <tr>
            <td width="14%" class="txtcenter1"><?php echo $rowTurn["fin_year"];?></td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["fin_year"];?></td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["fin_year"];?></td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["fin_year"];?></td>
            <td width="13%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["fin_year"];?></td>
          </tr>
           <?php
        	 $sql="SELECT * FROM emp_turnover where company_id=".$companyid." order by turn_id desc LIMIT 5";
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
          <tr>
            <td width="31%" class="txtleft">Turnover</td>
            <td width="14%" class="txtcenter1"><?php echo $rowTurn["turn_over"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["turn_over"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["turn_over"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["turn_over"];?>
            </td>
            <td width="13%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["turn_over"];?>
            </td>
          </tr>
          <?php
        	 $sql="SELECT * FROM emp_turnover where company_id=".$companyid." order by turn_id desc LIMIT 5";
        	 $resultTurn=mysql_query($sql);
        	 $rowTurn=mysql_fetch_assoc($resultTurn);
        	 //echo $sql;
        ?>
          <tr>
            <td width="31%" class="txtleft">Profit/loss(PBT)</td>
            <td width="14%" class="txtcenter1"><?php echo $rowTurn["profit_loss"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["profit_loss"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["profit_loss"];?>
            </td>
            <td width="14%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["profit_loss"];?>
            </td>
            <td width="13%" class="txtcenter1"><?php $rowTurn=mysql_fetch_assoc($resultTurn);
			echo $rowTurn["profit_loss"];?>
            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        &nbsp;</td>
      </tr>
      <tr>
        <td width="310" height="31" class="txtleft">
        <b>3. Capacity/Production <br>
        details of current year</b></td>
        <td width="690" height="31" class="txtleft">
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="64">
          <tr>
            <td width="20%" height="40" class="txtcenter1" valign="top" bgcolor="#D7D7D7">
            Installed capacity per annum <br>
            (Give unit)</td>
            <td width="20%" height="40" class="txtcenter1" valign="top" bgcolor="#D7D7D7">
            Achievable capacity&nbsp; per annum&nbsp;&nbsp; <br>
            (Give unit)</td>
            <td width="21%" height="40" class="txtcenter1" valign="top" bgcolor="#D7D7D7">Capacity 
            being <br>
            used now<br>
            (Give unit)</td>
            <td width="20%" height="40" class="txtcenter1" bgcolor="#D7D7D7">Machine <br>
            Efficiency (%)</td>
            <td width="19%" height="40" class="txtcenter1" valign="top" bgcolor="#D7D7D7">Capacity<br>
            Utilisation (%)</td>
          </tr>
          <tr>
            <td width="20%" height="23" class="txtcenter1">
				<?php echo $row["inst_capacity"]; ?>
			</td>
			<?php
				$sql="select * from emp_capacity where company_id=".$companyid." and fin_year='".$year."'";
				$resultcapacity=mysql_query($sql);
				$rowcapacity=mysql_fetch_assoc($resultcapacity);
				//echo $sql;
			?>
			
            <td width="20%" height="23" class="txtcenter1">
            	<?php echo $rowcapacity["achievable_capacity"]; ?>
            </td>
            <td width="21%" height="23" class="txtcenter1">
            	<?php echo $rowcapacity["capacity_being_used"]; ?>
            </td>
            <td width="20%" height="23" class="txtcenter1">
            	<?php echo $rowcapacity["machine_efficiency"]; ?>
            </td>
            <td width="19%" height="23" class="txtcenter1">
            	<?php echo $rowcapacity["capacity_utilisation"]; ?>
            </td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2" valign="bottom">
        <b>4. Profitability Statement (in Rs. Lakhs)</b></td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2">
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="73%">
          <?php
		  	$sql="select * from emp_profirability_statement where company_id=".$companyid." and fin_year='".$year."'";
			$resultPro=mysql_query($sql);
			$rowPro=mysql_fetch_assoc($resultPro);  
          ?>
		  <tr>
            <td width="43%">&nbsp;</td>
            <td width="18%" class="txtcenter1" bgcolor="#D7D7D7"><b>Budget for<br>
            current year</b></td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actuals for the <br>
            month</b></td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7"><b>Actual Cumulative<br>
            for the year</b></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">a) Sales (without Taxes and Duty)</td>
            <td width="18%" class="txtright">
            <?php echo"
            <input type=text name=txtCurrentSale id=txtCurrentSale class=txtboxwhite size=25 
			value=".$rowPro['current_sale'].">";
			?></td>
            <td width="19%" class="txtright">
            <?php echo"
            <input type=text name=txtActualSale id=txtActualSale class=txtboxwhite size=25 
			value=".$rowPro['actual_sale'].">";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeSale id=txtCumulativeSale class=txtboxwhite size=25 
			value=".$rowPro['cumulative_sale'].">";
			?>
			</td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">b) Increase/(Decrease) in Stock</td>
            <td width="18%" class="txtright">
            <?php echo"
            <input type=text name=txtCurrentStock id=txtCurrentStock class=txtboxwhite size=25 
			value=".$rowPro['current_stock'].">";
			?></td>
            <td width="19%" class="txtright">
            <?php echo"
            <input type=text name=txtActualStock id=txtActualStock class=txtboxwhite size=25 
			value=".$rowPro['actual_stock'].">";
			?>
			</td>
            <td width="20%" class="txtcenter1">
            <?php echo"
            <input type=text name=txtCumulativeStock id=txtCumulativeStock class=txtboxwhite size=25 
			value=".$rowPro['cumulative_stock'].">";
			?></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">c) Value of Production (a+b)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtright">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7"><b>d) Variable Expenses</b></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Raw-material 
            cost</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Power &amp; fuel</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; iii) All Other 
            Variable cost</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">e) <b>Fixed Expenses</b></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Employee Cost</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) All Other 
            fixed Expenses</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">f) Total Cost (d+b)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">g) Profit Before INT .DEPR.&amp; Taxes 
            (a-f)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4" bgcolor="#D7D7D7">h)<b> Financial Charges on</b></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; i) Long term Loans</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;&nbsp;&nbsp; ii) Working 
            Capital Loan</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">i) Profit Before DEPR. &amp; Taxes (l-m)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">j) Other Income</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">k) Cash Profit/Loss (i+j)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">l) Depreciation</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">m)Net Profit/Loss (k-l) (PBT)</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">&nbsp;</td>
            <td width="18%" class="txtcenter1">&nbsp;</td>
            <td width="19%" class="txtcenter1">&nbsp;</td>
            <td width="20%" class="txtcenter1">&nbsp;</td>
          </tr>
          <tr>
            <td width="100%" class="txtleft" colspan="4">5.Other Financial 
            Indicators at the end of the month</td>
          </tr>
          <tr>
            <td width="43%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="18%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
            <td width="19%" class="txtcenter1" bgcolor="#D7D7D7">Particulars</td>
            <td width="20%" class="txtcenter1" bgcolor="#D7D7D7">Amount in Rs.<br>
            Lakhs</td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">a. Sales realisation during the 
            month</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
          <tr>
            <td width="43%" class="txtleft">b. Value of orders in hand</td>
            <td width="18%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="19%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
            <td width="20%" class="txtcenter1">
            <input type=text name=txtActual class=txtboxwhite size="25"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="1000" height="31" class="txtleft" colspan="2" valign="top">
        <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="423">
          <tr>
            <td width="266" class="txtleft">c. Sundry Creditors</td>
            <td width="154">
            <input type=text name=txtActual class=txtboxwhite size="23"></td>
          </tr>
          <tr>
            <td width="266" class="txtleft">d. Sundry Debtors</td>
            <td width="154">
            <input type=text name=txtActual class=txtboxwhite size="23"></td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>

</body>

</html>