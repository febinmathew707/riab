<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$type=$_GET["type"];
	$val=$_GET["val"];
	$comapny=$_GET["company"];
	$finyear=$_GET["finyear"];
	$sales=$_GET["sales"];
	$stock=$_GET["stock"];
	$currentrawmaterial=$_GET["currentrawmaterial"];
	$currentothervariablecost=$_GET["currentothervariablecost"];
	$currentpowerfuel=$_GET["currentpowerfuel"];
	$currentemployeecost=$_GET["currentemployeecost"];
	$currentotherexpense=$_GET["currentotherexpense"];
	$currentlongtermloan=$_GET["currentlongtermloan"];
	$currentworkingtermloan=$_GET["currentworkingtermloan"];
	$currentotherincome=$_GET["currentotherincome"];
	$currentdepr=$_GET["currentdepr"];
	$valueofproduction=$_GET["valueofproduction"];
	$totalcost=$_GET["totalcost"];
	$profitbeforeint=$_GET["profitbeforeint"];
	$profitbeforedepr=$_GET["profitbeforedepr"];
	$cashprofit=$_GET["cashprofit"];
	$netprofit=$_GET["netprofit"];
	//if($_GET["instcapacity"])
	//$instcapacity=$_GET["instcapcity"];	
	try
	{
		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		////// ############################# ACTUAL BUDGET ########################
		if($type=="actual")
		{
			if($val==0)
				{	
					$strsql="SELECT * FROM emp_actual_budget where 
						company_id=".$comapny." and fin_year=".$finyear."";
						$result=mysql_query($strsql);
						$cnt=mysql_num_rows($result);
						
						if($cnt>0)
						{
							die("Budget already entered");
						}
						
					
					$strsql="SELECT MAX(bud_id) FROM emp_actual_budget";
					$result=mysql_query($strsql);
					$row=mysql_fetch_row($result);	
					$id=$row[0]+1;
							
					$strsql="INSERT INTO emp_actual_budget(bud_id,company_id,fin_year,sales,stock,
						current_rowmaterial,current_power_fuel,current_other_variablecost,
						current_employee_cost,current_other_expense,current_longterm_loan,
						current_workingterm_loan,current_other_income,current_depr,value_of_production,
						total_cost,profit_before_int,profit_before_depr,cash_profit,net_profit,edate)values(".
							"".$id.",".
							"".$comapny.",".
							"".$finyear.",".
							"".$sales.",".
							"".$stock.",".
							"".$currentrawmaterial.",".
							"".$currentpowerfuel.",".
							"".$currentothervariablecost.",".
							"".$currentemployeecost.",".
							"".$currentotherexpense.",".
							"".$currentlongtermloan.",".
							"".$currentworkingtermloan.",".
							"".$currentotherincome.",".
							"".$currentdepr.",".
							"".$valueofproduction.",".
							"".$totalcost.",".
							"".$profitbeforeint.",".
							"".$profitbeforedepr.",".
							"".$cashprofit.",".
							"".$netprofit.",".							
							"'".date("Y-m-d")."')";
				//echo $strsql;
								if(!mysql_query($strsql))
								{
									$r=mysql_query("ROLLBACK");
									die("Sorry,Your request couldn't be completed1");
								}
							
						$strsql="INSERT INTO emp_reversed_budget(bud_id,company_id,fin_year,sales,stock,
						current_rowmaterial,current_power_fuel,current_other_variablecost,
						current_employee_cost,current_other_expense,current_longterm_loan,
						current_workingterm_loan,current_other_income,current_depr,value_of_production,
						total_cost,profit_before_int,profit_before_depr,cash_profit,net_profit,edate)values(".
							"".$id.",".
							"".$comapny.",".
							"".$finyear.",".
							"".$sales.",".
							"".$stock.",".
							"".$currentrawmaterial.",".
							"".$currentpowerfuel.",".
							"".$currentothervariablecost.",".
							"".$currentemployeecost.",".
							"".$currentotherexpense.",".
							"".$currentlongtermloan.",".
							"".$currentworkingtermloan.",".
							"".$currentotherincome.",".
							"".$currentdepr.",".
							"".$valueofproduction.",".
							"".$totalcost.",".
							"".$profitbeforeint.",".
							"".$profitbeforedepr.",".
							"".$cashprofit.",".
							"".$netprofit.",".							
							"'".date("Y-m-d")."')";
								if(!mysql_query($strsql))
								{
									$r=mysql_query("ROLLBACK");
									die("Sorry,Your request couldn't be completed2");
								}
							
							$r=mysql_query("COMMIT");
							echo "actual budget successfully updated";
				}
				else
				{
					$strsql="UPDATE emp_actual_budget SET ".					
							"sales=".$sales.",".
							"stock=".$stock." ,".
							"current_rowmaterial=".$currentrawmaterial.",".
							"current_power_fuel=".$currentpowerfuel.",".
							"current_other_variablecost=".$currentothervariablecost.",".
							"current_employee_cost=".$currentemployeecost.",".
							"current_other_expense=".$currentotherexpense.",".
							"current_longterm_loan=".$currentlongtermloan.",".
							"current_workingterm_loan=".$currentworkingtermloan.",".
							"current_other_income=".$currentotherincome.",".
							"current_depr=".$currentdepr.",".
							"value_of_production=".$valueofproduction.",".
							"total_cost=".$totalcost.",".
							"profit_before_int=".$profitbeforeint.",".
							"profit_before_depr=".$profitbeforedepr.",".
							"cash_profit=".$cashprofit.",".
							"net_profit=".$netprofit." ".								
							"where company_id=".$comapny." and fin_year=".$finyear."";
							//echo $strsql;
							if(!mysql_query($strsql))
								{
									$r=mysql_query("ROLLBACK");
									die("Sorry,Your request couldn't be completed");
								}   
							$strsql="SELECT min(bud_rev_id) FROM emp_reversed_budget where 
							company_id=".$comapny." and fin_year=".$finyear."";
							$result=mysql_query($strsql);
							$row=mysql_fetch_row($result);
							
							$strsql="DELETE FROM emp_reversed_budget where bud_rev_id=".$row[0]."";
							//echo $strsql;
							mysql_query($strsql);
							
							
				$strsql="SELECT * FROM emp_actual_budget where 
				company_id=".$comapny." and fin_year=".$finyear."";
				$result=mysql_query($strsql);
				$row=mysql_fetch_assoc($result);
				
				$id=$row["bud_id"];
				if($id=="")
				{
					die("You should enter  actual budget before entering the reversed budget");
				}
				$strsql="INSERT INTO emp_reversed_budget(bud_id,company_id,fin_year,sales,stock,
						current_rowmaterial,current_power_fuel,current_other_variablecost,
						current_employee_cost,current_other_expense,current_longterm_loan,
						current_workingterm_loan,current_other_income,current_depr,value_of_production,
						total_cost,profit_before_int,profit_before_depr,cash_profit,net_profit,edate)values(".
							"".$id.",".
							"".$comapny.",".
							"".$finyear.",".
							"".$sales.",".
							"".$stock.",".
							"".$currentrawmaterial.",".
							"".$currentpowerfuel.",".
							"".$currentothervariablecost.",".
							"".$currentemployeecost.",".
							"".$currentotherexpense.",".
							"".$currentlongtermloan.",".
							"".$currentworkingtermloan.",".
							"".$currentotherincome.",".
							"".$currentdepr.",".
							"".$valueofproduction.",".
							"".$totalcost.",".
							"".$profitbeforeint.",".
							"".$profitbeforedepr.",".
							"".$cashprofit.",".
							"".$netprofit.",".							
							"'".date("Y-m-d")."')";
					//echo $strsql;
						mysql_query($strsql);
							$r=mysql_query("COMMIT");
							echo "actual budget successfully updated123";						
							
					
				}
				if (isset($_SESSION["ed_company_id"]))
				{
					$_SESSION["ed_company_id"]=0;
				}
		}
		else
		{
			if($val>1)
			{
				$strsql="DELETE FROM emp_reversed_budget where bud_rev_id=".$val."";
				//echo $strsql;	
					if(!mysql_query($strsql))
						{
							$r=mysql_query("ROLLBACK");
							die("Sorry,Your request couldn't be completed");
						}
						
			}
				$strsql="SELECT * FROM emp_actual_budget where 
				company_id=".$comapny." and fin_year=".$finyear."";
				$result=mysql_query($strsql);
				$row=mysql_fetch_assoc($result);
				
				$id=$row["bud_id"];
				if($id=="")
				{
					die("You should enter  actual budget before entering the reversed budget");
				}
				$strsql="INSERT INTO emp_reversed_budget(bud_id,company_id,fin_year,sales,stock,
						current_rowmaterial,current_power_fuel,current_other_variablecost,
						current_employee_cost,current_other_expense,current_longterm_loan,
						current_workingterm_loan,current_other_income,current_depr,value_of_production,
						total_cost,profit_before_int,profit_before_depr,cash_profit,net_profit,edate)values(".
							"".$id.",".
							"".$comapny.",".
							"".$finyear.",".
							"".$sales.",".
							"".$stock.",".
							"".$currentrawmaterial.",".
							"".$currentpowerfuel.",".
							"".$currentothervariablecost.",".
							"".$currentemployeecost.",".
							"".$currentotherexpense.",".
							"".$currentlongtermloan.",".
							"".$currentworkingtermloan.",".
							"".$currentotherincome.",".
							"".$currentdepr.",".
							"".$valueofproduction.",".
							"".$totalcost.",".
							"".$profitbeforeint.",".
							"".$profitbeforedepr.",".
							"".$cashprofit.",".
							"".$netprofit.",".							
							"'".date("Y-m-d")."')";
					//echo $strsql;
						if(!mysql_query($strsql))
						{
							$r=mysql_query("ROLLBACK");
							die("Sorry,Your request couldn't be completed");
						}
							$r=mysql_query("COMMIT");
							echo "reversed budget successfully updated";
		}
		$_SESSION["ed_bud_id"]=0;
		$_SESSION["ed_revbud_id"]=0;
	}

	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
?>