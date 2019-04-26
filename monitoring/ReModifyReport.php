<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("../transform.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$trans=new transform();	
	$currentpwd=$_GET["pwd"];
	$id=$_GET["rptid"];
	if($trans->convert($currentpwd)!=$_SESSION['pwd'])
	{
		echo("Password you have entered is wrong! ".$id);
		die();
	}
	$strsql="select * from emp_monthly_report where Rpt_id=".$id."";
	$result=mysql_query($strsql);
	$row=mysql_fetch_assoc($result);
	
	$reno=$row["re_entered"]+1;
	// GIVE PERMISSION TO UPDATE MONTHLY REPORT
	$strsql="UPDATE emp_monthly_report SET re_entered=".$reno.", status='S', is_process='N' WHERE Rpt_id=".$id."";
	mysql_query($strsql);
	
	$strsql="SELECT * FROM emp_company WHERE company_id=".$row["company_id"]."";
	$resultCom=mysql_query($strsql);
	$rowCom=mysql_fetch_assoc($resultCom);
	////////  TRACK LOGENTRY
	$narrat="Give Permission to modify Report of " . $rowCom["company_name"].
		 		" during the month " .$row["month"] .	" by ".$_SESSION['user_name']." at " . date("Y-m-d");
		 		
	$strsql="INSERT INTO emp_monthly_report_log(user_id,edate,narrat,company_id) values(";
	$strsql=$strsql." '".$_SESSION['user_name']."',";
	$strsql=$strsql." '".date("Y-m-d")."',";
	$strsql=$strsql." '".$narrat."',";
	$strsql=$strsql." ".$_SESSION["company_id"].")";
	mysql_query($strsql);
	/////// INSERT OLD VALUES TO NEW TABLE
	
	$strsql="INSERT INTO emp_monthly_report_prev(Rpt_id,company_id,fin_year,status,is_process,month,
				rpt_date,officer_id,edate)select Rpt_id,company_id,fin_year,status,is_process,month,
				rpt_date,officer_id,'".date("Y-m-d")."' from emp_monthly_report WHERE Rpt_id=".$id."";
				
				mysql_query($strsql);
				
	$strsql="INSERT INTO emp_manpower_prev(Rpt_id,company_id,fin_year,month,effective_month,actual_manpower,rpt_date
	,edate)select
			Rpt_id,company_id,fin_year,month,effective_month,actual_manpower,rpt_date,'".date("Y-m-d")."' from
			 emp_manpower 	WHERE Rpt_id=".$id."";	
			mysql_query($strsql);
			
	$strsql="INSERT INTO emp_profirability_statement_prev(Rpt_id,company_id,fin_year,month,current_sale,actual_sale,
			cumulative_sale,current_stock,actual_stock,cumulative_stock,rpt_date,edate)	select
			Rpt_id,company_id,fin_year,month,current_sale,actual_sale,
			cumulative_sale,current_stock,actual_stock,cumulative_stock,rpt_date,'".date("Y-m-d")."' from	
			emp_profirability_statement WHERE Rpt_id=".$id."";
			mysql_query($strsql);
			
			
	$strsql="INSERT INTO emp_variable_expenses_prev(Rpt_id,company_id,fin_year,month,current_rowmaterial,
			actual_rowmaterial,cumulative_rowmaterial,current_power_fuel,actual_power_fuel,cumulative_power_fuel,
			current_other_variablecost,actual_other_variablecost,cumulative_other_variablecost,rpt_date,edate)select
			 Rpt_id,company_id,fin_year,month,current_rowmaterial,
			actual_rowmaterial,cumulative_rowmaterial,current_power_fuel,actual_power_fuel,cumulative_power_fuel,
			current_other_variablecost,actual_other_variablecost,cumulative_other_variablecost,rpt_date,
			'".date("Y-m-d")."' from emp_variable_expenses WHERE Rpt_id=".$id."";
			mysql_query($strsql);
			
	$strsql="INSERT INTO emp_fixed_expenses_prev(Rpt_id,company_id,fin_year,month,current_employee_cost
					,actual_employee_cost,cumulative_employee_cost,current_other_expense,actual_other_expense,
					cumulative_other_expense,rpt_date,edate) select Rpt_id,company_id,fin_year,month
					,current_employee_cost,actual_employee_cost,cumulative_employee_cost,current_other_expense
					,actual_other_expense,cumulative_other_expense,rpt_date,'".date("Y-m-d")."' 
					from emp_fixed_expenses WHERE Rpt_id=".$id."";
					mysql_query($strsql);
					
	$strsql="INSERT INTO emp_financial_charges_prev(Rpt_id,company_id,fin_year,month,current_longterm_loan
			,actual_longterm_loan,cumulative_longterm_loan,current_workingterm_loan,actual_workingterm_loan,
			cumulative_workingterm_loan,rpt_date,edate)select Rpt_id,company_id,fin_year,month,current_longterm_loan
			,actual_longterm_loan,cumulative_longterm_loan,current_workingterm_loan,actual_workingterm_loan,
			cumulative_workingterm_loan,rpt_date,'".date("Y-m-d")."' from emp_financial_charges 
			WHERE Rpt_id=".$id."";
			mysql_query($strsql);
			
	$strsql="INSERT INTO emp_otherincome_depr_prev(Rpt_id,company_id,fin_year,month,current_other_income
					,actual_other_income,cumulative_other_income,current_depr,actual_depr,cumulative_depr,rpt_date
					,edate)select Rpt_id,company_id,fin_year,month,current_other_income
					,actual_other_income,cumulative_other_income,current_depr,actual_depr,cumulative_depr,rpt_date
					,'".date("Y-m-d")."' from emp_otherincome_depr WHERE Rpt_id=".$id."";
					mysql_query($strsql);
					
	$strsql="INSERT INTO emp_financial_indicators_prev(Rpt_id,company_id,fin_year,month,sales_realisation,
			value_of_orders,sundry_creditors,sundry_debtors,rpt_date,edate)select Rpt_id,company_id,fin_year,month
			,sales_realisation,value_of_orders,sundry_creditors,sundry_debtors,rpt_date,'".date("Y-m-d")."' from
			 emp_financial_indicators WHERE Rpt_id=".$id."";
			 mysql_query($strsql);
			 
	$strsql="INSERT INTO emp_statutory_dues_prev(Rpt_id,company_id,fin_year,month,PF,ESI,rpt_date,edate) select
			Rpt_id,company_id,fin_year,month,PF,ESI,rpt_date,'".date("Y-m-d")."' from emp_statutory_dues 
			WHERE Rpt_id=".$id."";
			mysql_query($strsql);
			
	$strsql="INSERT INTO emp_monthlyreport_tot_prev(Rpt_id,company_id,fin_year,month,current_production,
			actual_production,cumulative_production,current_cost,actual_cost,cumulative_cost,current_profit1,
			actual_profit1,cumulative_profit1,current_profit2,actual_profit2,cumulative_profit2,current_cash_profit,
			actual_cash_profit,cumulative_cash_profit,current_net_profit,actual_net_profit,cumulative_net_profit,
			rpt_date,edate)select Rpt_id,company_id,fin_year,month,current_production,
			actual_production,cumulative_production,current_cost,actual_cost,cumulative_cost,current_profit1,
			actual_profit1,cumulative_profit1,current_profit2,actual_profit2,cumulative_profit2,current_cash_profit,
			actual_cash_profit,cumulative_cash_profit,current_net_profit,actual_net_profit,cumulative_net_profit,
			rpt_date,'".date("Y-m-d")."' from emp_monthlyreport_tot WHERE Rpt_id=".$id."";
			mysql_query($strsql);
	
	echo "your request completed successfully";
	?>