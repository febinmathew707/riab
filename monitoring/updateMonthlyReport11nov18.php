<?php session_start(); ?>
<?php
 	include("../connectdb/connect.php");
 	include("month.php");
	/// GET ALL PASSED VALUES IN VARIABLES
 	 mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$company=$_POST["company"];
	$finyear=$_POST["finyear"];
	//echo "company=".$company." fin".$finyear;
	$month=$_POST["month"];
	if(isset($_POST["status"]))
	{
		$status=$_POST["status"];
	}
	else
	{
		$status="S";
	}
	if($_POST["effectivemanpower"]!="")
	{
		$effectivemanpower=$_POST["effectivemanpower"];
	}
	else
	{
		$effectivemanpower=0;
	}
	if($_POST["actualmanpower"]!="")
	{
		$actualmanpower=$_POST["actualmanpower"];
	}
	else
	{
		$actualmanpower=0;
	}
	if($_POST["currentsale"]!="")
	{
		$currentsale=$_POST["currentsale"];
	}
	else
	{
		$currentsale=0;
	}
	if($_POST["actualsale"]!="")
	{
		$actualsale=$_POST["actualsale"];
	}
	else
	{
		$actualsale=0;
	}
	if($_POST["cumulativesale"]!="")
	{
		$cumulativesale=$_POST["cumulativesale"];
	}
	else
	{
		$cumulativesale=0;
	}
	if($_POST["currentstock"]!="")
	{
		$currentstock=$_POST["currentstock"];
	}
	else
	{
		$currentstock=0;
	}
	if($_POST["actualstock"]!="")
	{
		$actualstock=$_POST["actualstock"];
	}
	else
	{
		$actualstock=0;
	}
	if($_POST["cumulativestock"]!="")
	{
		$cumulativestock=$_POST["cumulativestock"];
	}
	else
	{
		$cumulativestock=0;
	}
	if($_POST["currentrawmaterial"]!="")
	{
		$currentrawmaterial=$_POST["currentrawmaterial"];
	}
	else
	{
		$currentrawmaterial=0;
	}
	if($_POST["actualrawmaterial"]!="")
	{
		$actualrawmaterial=$_POST["actualrawmaterial"];
	}
	else
	{
		$actualrawmaterial=0;
	}
	if($_POST["cumulativerawmaterial"]!="")
	{
		$cumulativerawmaterial=$_POST["cumulativerawmaterial"];
	}
	else
	{
		$cumulativerawmaterial=0;
	}
	if($_POST["currentpowerfuel"]!="")
	{
		$currentpowerfuel=$_POST["currentpowerfuel"];
	}
	else
	{
		$currentpowerfuel=0;
	}
	if($_POST["actualpowerfuel"]!="")
	{
		$actualpowerfuel=$_POST["actualpowerfuel"];
	}
	else
	{
		$actualpowerfuel=0;
	}
	if($_POST["cumulativepowerfuel"]!="")
	{
		$cumulativepowerfuel=$_POST["cumulativepowerfuel"];
	}
	else
	{
		$cumulativepowerfuel=0;
	}
	if($_POST["currentothervariablecost"]!="")
	{
		$currentothervariablecost=$_POST["currentothervariablecost"];
	}
	else
	{
		$currentothervariablecost=0;
	}
	if($_POST["actualothervariablecost"]!="")
	{
		$actualothervariablecost=$_POST["actualothervariablecost"];
	}
	else
	{
		$actualothervariablecost=0;
	}
	if($_POST["cumulativeothervariablecost"]!="")
	{
		$cumulativeothervariablecost=$_POST["cumulativeothervariablecost"];
	}
	else
	{
		$cumulativeothervariablecost=0;
	}
	if($_POST["currentemployeecost"]!="")
	{
		$currentemployeecost=$_POST["currentemployeecost"];
	}
	else
	{
		$currentemployeecost=0;
	}
	if($_POST["actualemployeecost"]!="")
	{
		$actualemployeecost=$_POST["actualemployeecost"];
	}
	else
	{
		$actualemployeecost=0;
	}
	if($_POST["cumulativeemployeecost"]!="")
	{
		$cumulativeemployeecost=$_POST["cumulativeemployeecost"];
	}
	else
	{
		$cumulativeemployeecost=0;
	}
	if($_POST["currentotherexpense"]!="")
	{
		$currentotherexpense=$_POST["currentotherexpense"];
	}
	else
	{
		$currentotherexpense=0;
	}
	if($_POST["actualotherexpense"]!="")
	{
		$actualotherexpense=$_POST["actualotherexpense"];
	}
	else
	{
		$actualotherexpense=0;
	}
	if($_POST["cumulativeotherexpense"]!="")
	{
		$cumulativeotherexpense=$_POST["cumulativeotherexpense"];
	}
	else
	{
		$cumulativeotherexpense=0;
	}
	if($_POST["currentlongtermloan"]!="")
	{
		$currentlongtermloan=$_POST["currentlongtermloan"];
	}
	else
	{
		$currentlongtermloan=0;
	}
	if($_POST["actuallongtermloan"]!="")
	{
		$actuallongtermloan=$_POST["actuallongtermloan"];
	}
	else
	{
		$actuallongtermloan=0;
	}
	if($_POST["cumulativelongtermloan"]!="")
	{
		$cumulativelongtermloan=$_POST["cumulativelongtermloan"];
	}
	else
	{
		$cumulativelongtermloan=0;
	}
	if($_POST["currentworkingtermloan"]!="")
	{
		$currentworkingtermloan=$_POST["currentworkingtermloan"];
	}
	else
	{
		$currentworkingtermloan=0;
	}
	if($_POST["actualworkingtermloan"]!="")
	{
		$actualworkingtermloan=$_POST["actualworkingtermloan"];
	}
	else
	{
		$actualworkingtermloan=0;
	}
	if($_POST["cumulativeworkingtermloan"]!="")
	{
		$cumulativeworkingtermloan=$_POST["cumulativeworkingtermloan"];
	}
	else
	{
		$cumulativeworkingtermloan=0;
	}
	if($_POST["currentotherincome"]!="")
	{
		$currentotherincome=$_POST["currentotherincome"];
	}
	else
	{
		$currentotherincome=0;
	}
	if($_POST["actualotherincome"]!="")
	{
		$actualotherincome=$_POST["actualotherincome"];
	}
	else
	{
		$actualotherincome=0;
	}
	if($_POST["cumulativeotherincome"]!="")
	{
		$cumulativeotherincome=$_POST["cumulativeotherincome"];
	}
	else
	{
		$cumulativeotherincome=0;
	}
	if($_POST["currentdepr"]!="")
	{
		$currentdepr=$_POST["currentdepr"];
	}
	else
	{
		$currentdepr=0;
	}
	if($_POST["actualdepr"]!="")
	{
		$actualdepr=$_POST["actualdepr"];
	}
	else
	{
		$actualdepr=0;
	}
	if($_POST["cumulativedepr"]!="")
	{
		$cumulativedepr=$_POST["cumulativedepr"];
	}
	else
	{
		$cumulativedepr=0;
	}
	if($_POST["salesrealisation"]!="")
	{
		$salesrealisation=$_POST["salesrealisation"];
	}
	else
	{
		$salesrealisation=0;
	}
	if($_POST["valueoforders"]!="")
	{
		$valueoforders=$_POST["valueoforders"];
	}
	else
	{
		$valueoforders=0;
	}
	if($_POST["pf"]!="")
	{
		$pf=$_POST["pf"];
	}
	else
	{
		$pf=0;
	}
	if($_POST["esi"]!="")
	{
		$esi=$_POST["esi"];
	}
	else
	{
		$esi=0;
	}
	if($_POST["sundrycreditors"]!="")
	{
		$sundrycreditors=$_POST["sundrycreditors"];
	}
	else
	{
		$sundrycreditors=0;
	}
	if($_POST["sundrydebtors"]!="")
	{
		$sundrydebtors=$_POST["sundrydebtors"];
	}
	else
	{
		$sundrydebtors=0;
	}
	if($_POST["currentproduction"]!="")
	{
		$currentproduction=$_POST["currentproduction"];
	}
	else
	{
		$currentproduction=0;
	}
	if($_POST["actualproduction"]!="")
	{
		$actualproduction=$_POST["actualproduction"];
	}
	else
	{
		$actualproduction=0;
	}
	if($_POST["cumulativeproduction"]!="")
	{
		$cumulativeproduction=$_POST["cumulativeproduction"];
	}
	else
	{
		$cumulativeproduction=0;
	}
	if($_POST["currentcost"]!="")
	{
		$currentcost=$_POST["currentcost"];
	}
	else
	{
		$currentcost=0;
	}
	if($_POST["actualcost"]!="")
	{
		$actualcost=$_POST["actualcost"];
	}
	else
	{
		$actualcost=0;
	}
	if($_POST["cumulativecost"]!="")
	{
		$cumulativecost=$_POST["cumulativecost"];
	}
	else
	{
		$cumulativecost=0;
	}
	if($_POST["currentprofit1"]!="")
	{
		$currentprofit1=$_POST["currentprofit1"];
	}
	else
	{
		$currentprofit1=0;
	}
	if($_POST["actualprofit1"]!="")
	{
		$actualprofit1=$_POST["actualprofit1"];
	}
	else
	{
		$actualprofit1=0;
	}
	if($_POST["cumulativeprofit1"]!="")
	{
		$cumulativeprofit1=$_POST["cumulativeprofit1"];
	}
	else
	{
		$cumulativeprofit1=0;
	}
	if($_POST["currentprofit2"]!="")
	{
		$currentprofit2=$_POST["currentprofit2"];
	}
	else
	{
		$currentprofit2=0;
	}
	if($_POST["actualprofit2"]!="")
	{
		$actualprofit2=$_POST["actualprofit2"];
	}
	else
	{
		$actualprofit2=0;
	}
	if($_POST["cumulativeprofit2"]!="")
	{
		$cumulativeprofit2=$_POST["cumulativeprofit2"];
	}
	else
	{
		$cumulativeprofit2=0;
	}
	if($_POST["cumulativeprofit2"]!="")
	{
		$cumulativeprofit2=$_POST["cumulativeprofit2"];
	}
	else
	{
		$cumulativeprofit2=0;
	}
	if($_POST["currentcashprofit"]!="")
	{
		$currentcashprofit=$_POST["currentcashprofit"];
	}
	else
	{
		$currentcashprofit=0;
	}
	if($_POST["actualcashprofit"]!="")
	{
		$actualcashprofit=$_POST["actualcashprofit"];
	}
	else
	{
		$actualcashprofit=0;
	}
	if($_POST["cumulativecashprofit"]!="")
	{
		$cumulativecashprofit=$_POST["cumulativecashprofit"];
	}
	else
	{
		$cumulativecashprofit=0;
	}
	if($_POST["currentnetprofit"]!="")
	{
		$currentnetprofit=$_POST["currentnetprofit"];
	}
	else
	{
		$currentnetprofit=0;
	}
	if($_POST["actualnetprofit"]!="")
	{
		$actualnetprofit=$_POST["actualnetprofit"];
	}
	else
	{
		$actualnetprofit=0;
	}
	if($_POST["cumulativenetprofit"]!="")
	{
		$cumulativenetprofit=$_POST["cumulativenetprofit"];
	}
	else
	{
		$cumulativenetprofit=0;
	}
	$totusedcapacity=$_POST["totusedcapacity"];
	for($i=1;$i<=$totusedcapacity;$i++)
	{
		$str="usedcapacity".$i;
		//echo $str;
		$usedcapacity[$i]=$_POST[$str];
	
	}
	
	$totmachineefficiency=$_POST["totmachineefficiency"];
	for($i=1;$i<=$totmachineefficiency;$i++)
	{
		$str="machineefficiency".$i;
		//echo $str;
		$machineefficiency[$i]=$_POST[$str];
	
	}
	
	$totcapacityutilization=$_POST["totcapacityutilization"];
	for($i=1;$i<=$totcapacityutilization;$i++)
	{
		$str="capacityutilization".$i;
		//echo $str;
		$capacityutilization[$i]=$_POST[$str];
	
	}
	
	$totitcode=$_POST["totitcode"];
	for($i=1;$i<=$totitcode;$i++)
	{
		$str="itcode".$i;
		//echo $str;
		$itcode[$i]=$_POST[$str];
	
	}
	$id=$_POST["rptid"];
	try
	{		
		$r=mysql_query("SET AUTOCOMMIT=0");
		$r=mysql_query("START TRANSACTION");
		if($id>0)
		{
		
		$strsql="SELECT * FROM emp_monthly_report where company_id=".$company." and fin_year=".$finyear." 
		and month=".$month."";
		//echo $strsql;
		$result=mysql_query($strsql);		
		$row=mysql_fetch_assoc($result);
			if($_SESSION["LogType"]=="CO")	
			{	
				if($row["status"]=='A')
				{
					die("Since this report has already accepted,You can't make any further modifications");
				}	
				elseif($row["status"]=='M' && $row["is_process"]=='Y')
				{
					die("Report is in processing state you can't make any changes this time");
				}
				elseif(($row["status"]=='S' || $row["status"]=='M' || $row["status"]=='D') && $row["is_process"]=='N')
				{
					deleteRecords($company,$finyear,$month);
				}
				elseif($row["status"]=='R' )
				{
					deleteRecords($company,$finyear,$month);
				}
			}
			elseif($_SESSION["LogType"]=="MS")
			{
				if($row["status"]=='A' || $row["status"]=='M')
				{
					die("Since this report has already accepted,You can't make any further modifications");
				}
				elseif($row["status"]=='M' && $row["is_process"]=='Y')
				{
					die("Report is in processing state you can't make any changes at this time");
				}
				elseif($row["status"]=='S' && $row["is_process"]=='N')
				{
					deleteRecords($company,$finyear,$month);
				}
				elseif($row["status"]=='R' || $row["status"]=='D')
				{
					deleteRecords($company,$finyear,$month);
				}
			}
		}
			$m=new Month();	
			
			
			$strsql="SELECT fin_year FROM emp_fin_year WHERE year=".$finyear."";
			//echo $strsql;
			$result=mysql_query($strsql);
			$row=mysql_fetch_row($result);		
			$dt=mktime(0,0,0,$month,1,$m->getYear($month,$row[0]));
			
			if($id==0)
			{
				$strsql="SELECT MAX(Rpt_id) from emp_monthly_report";
				$result=mysql_query($strsql);
				$row=mysql_fetch_row($result);
				$rptid=$row[0]+1;
				///////////// INSERT INTO MONTHLY REPORT ///////////////////////////////
				$strsql="INSERT INTO emp_monthly_report(Rpt_id,company_id,fin_year,status,is_process,month,
				rpt_date,officer_id,edate)values(";
				$strsql=$strsql." ".$rptid.",";
				$strsql=$strsql." ".$company.",";
				$strsql=$strsql." ".$finyear.",";
				$strsql=$strsql." '".$status."',";
				$strsql=$strsql." 'N',";
				$strsql=$strsql." ".$month.",";	
				$strsql=$strsql." '".date("Y-m-d",$dt)."',";
				$strsql=$strsql." '".$_SESSION['user_name']."',";
				$strsql=$strsql." '".date("Y-m-d")."')";	
				
				//echo $strsql;		
				mysql_query($strsql);
				
				$narrat="Submitt Montly Report of " . $_SESSION["company"]." during the month " .$month .
						" by ".$_SESSION['user_name']." at " . date("Y-m-d");
				$strsql="INSERT INTO emp_monthly_report_log(user_id,edate,narrat,company_id) values(";
				$strsql=$strsql." '".$_SESSION['user_name']."',";
				$strsql=$strsql." '".date("Y-m-d",$dt)."',";
				$strsql=$strsql." '".$narrat."',";
				$strsql=$strsql." ".$company.")";
				mysql_query($strsql);
			}
			else
			{
				$rptid=$id;
				$strsql="UPDATE emp_monthly_report set status='".$status."',md_id='".$_SESSION['user_name']."'
				 where Rpt_id=".$id."";
				//echo $strsql;
				mysql_query($strsql);
				
				$narrat="Update Montly Report of " . $_SESSION["company"]." during the month " .$month .
						" by ".$_SESSION['user_name']." at " . date("Y-m-d");
				$strsql="INSERT INTO emp_monthly_report_log(user_id,edate,narrat,company_id) values(";
				$strsql=$strsql." '".$_SESSION['user_name']."',";
				$strsql=$strsql." '".date("Y-m-d",$dt)."',";
				$strsql=$strsql." '".$narrat."',";
				$strsql=$strsql." ".$company.")";
				mysql_query($strsql);
			}
			
			//////////////////// INSERT CAPACITY //////////////////////////
			for($i=1;$i<=$totcapacityutilization;$i++)
			{
				$strsql="INSERT INTO emp_monthly_capacity(Rpt_id,company_id,fin_year,month,it_code,used_capacity,
				machine_efficiency,capacity_utilization,rpt_date,status,edate)values(";
				$strsql=$strsql." ".$rptid.",";
				$strsql=$strsql." ".$company.",";
				$strsql=$strsql." ".$finyear.",";
				$strsql=$strsql." ".$month.",";
				$strsql=$strsql." ".$itcode[$i].",";
				if($usedcapacity[$i]!="")
				{
					$strsql=$strsql." ".$usedcapacity[$i].",";
				}
				else
				{
					$strsql=$strsql."0,";
				}
				if($machineefficiency[$i]!="")
				{
					$strsql=$strsql." ".$machineefficiency[$i].",";
				}
				else
				{
					$strsql=$strsql."0,";
				}
				if($capacityutilization[$i]!="")
				{
					$strsql=$strsql." ".$capacityutilization[$i].",";
				}
				else
				{
					$strsql=$strsql."0,";
				}
				$strsql=$strsql." '".date("Y-m-d",$dt)."',";
				$strsql=$strsql." '".$status."',";
				$strsql=$strsql." '".date("Y-m-d")."')";
				
				mysql_query($strsql);
				
				//echo $strsql;
			}
			//////////////////// INSERT MANPOWER //////////////////////////
			$strsql="INSERT INTO emp_manpower(Rpt_id,company_id,fin_year,month,effective_month,actual_manpower,
			rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$effectivemanpower.",";
			$strsql=$strsql." ".$actualmanpower.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";
			//echo $strsql;	
			//echo "sdfsdf";		
			mysql_query($strsql);	
			//////////////////// INSERT PROFIRABILITY STATEMENT ////////////////////
			$strsql="INSERT INTO emp_profirability_statement(Rpt_id,company_id,fin_year,month,current_sale,actual_sale,
			cumulative_sale,current_stock,actual_stock,cumulative_stock,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentsale.",";
			$strsql=$strsql." ".$actualsale.",";
			$strsql=$strsql." ".$cumulativesale.",";
			$strsql=$strsql." ".$currentstock.",";
			$strsql=$strsql." ".$actualstock.",";
			$strsql=$strsql." ".$cumulativestock.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			//echo $strsql;
			mysql_query($strsql);			
					
			
			//////////////// INSERT VARIABLE EXPENSE //////////////////////////////////
			$strsql="INSERT INTO emp_variable_expenses(Rpt_id,company_id,fin_year,month,current_rowmaterial,
			actual_rowmaterial,cumulative_rowmaterial,current_power_fuel,actual_power_fuel,cumulative_power_fuel,
			current_other_variablecost,actual_other_variablecost,cumulative_other_variablecost,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentrawmaterial.",";
			$strsql=$strsql." ".$actualrawmaterial.",";
			$strsql=$strsql." ".$cumulativerawmaterial.",";
			$strsql=$strsql." ".$currentpowerfuel.",";
			$strsql=$strsql." ".$actualpowerfuel.",";
			$strsql=$strsql." ".$cumulativepowerfuel.",";
			$strsql=$strsql." ".$currentothervariablecost.",";
			$strsql=$strsql." ".$actualothervariablecost.",";
			$strsql=$strsql." ".$cumulativeothervariablecost.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			//echo $strsql;
			mysql_query($strsql);
			
			///////////////////////////// INSERT FIXED EXPENSE //////////////////////
			$strsql="INSERT INTO emp_fixed_expenses(Rpt_id,company_id,fin_year,month,current_employee_cost
					,actual_employee_cost,cumulative_employee_cost,current_other_expense,actual_other_expense,
					cumulative_other_expense,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentemployeecost.",";
			$strsql=$strsql." ".$actualemployeecost.",";
			$strsql=$strsql." ".$cumulativeemployeecost.",";
			$strsql=$strsql." ".$currentotherexpense.",";
			$strsql=$strsql." ".$actualotherexpense.",";
			$strsql=$strsql." ".$cumulativeotherexpense.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			//echo $strsql;
			mysql_query($strsql);
			
			///////////////////////////// INSERT FINANCIAL CHARGE //////////////////////
			$strsql="INSERT INTO emp_financial_charges(Rpt_id,company_id,fin_year,month,current_longterm_loan
			,actual_longterm_loan,cumulative_longterm_loan,current_workingterm_loan,actual_workingterm_loan,
			cumulative_workingterm_loan,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentlongtermloan.",";
			$strsql=$strsql." ".$actuallongtermloan.",";
			$strsql=$strsql." ".$cumulativelongtermloan.",";
			$strsql=$strsql." ".$currentworkingtermloan.",";
			$strsql=$strsql." ".$actualworkingtermloan.",";
			$strsql=$strsql." ".$cumulativeworkingtermloan.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			mysql_query($strsql);
			
			///////////////////////////// OTHER INCOME AND DEPR //////////////////////
			$strsql="INSERT INTO emp_otherincome_depr(Rpt_id,company_id,fin_year,month,current_other_income
					,actual_other_income,cumulative_other_income,current_depr,actual_depr,cumulative_depr,rpt_date,status
					,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentotherincome.",";
			$strsql=$strsql." ".$actualotherincome.",";
			$strsql=$strsql." ".$cumulativeotherincome.",";
			$strsql=$strsql." ".$currentdepr.",";
			$strsql=$strsql." ".$actualdepr.",";
			$strsql=$strsql." ".$cumulativedepr.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			//echo $strsql;
			mysql_query($strsql);
			
				///////////////////////////// FINANCIAL INDICATORS //////////////////////
			$strsql="INSERT INTO emp_financial_indicators(Rpt_id,company_id,fin_year,month,sales_realisation,
			value_of_orders,sundry_creditors,sundry_debtors,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$salesrealisation.",";
			$strsql=$strsql." ".$valueoforders.",";
			$strsql=$strsql." ".$sundrycreditors.",";
			$strsql=$strsql." ".$sundrydebtors.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			//echo $strsql;
			mysql_query($strsql);
			
				///////////////////////////// STATUTORY DUES //////////////////////
			$strsql="INSERT INTO emp_statutory_dues(Rpt_id,company_id,fin_year,month,PF,ESI,rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$pf.",";
			$strsql=$strsql." ".$esi.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			mysql_query($strsql);		
			
			////////////// INSERT TOTALS ////////////////////
			$strsql="INSERT INTO emp_monthlyreport_tot(Rpt_id,company_id,fin_year,month,current_production,
			actual_production,cumulative_production,current_cost,actual_cost,cumulative_cost,current_profit1,
			actual_profit1,cumulative_profit1,current_profit2,actual_profit2,cumulative_profit2,current_cash_profit,
			actual_cash_profit,cumulative_cash_profit,current_net_profit,actual_net_profit,cumulative_net_profit,
			rpt_date,status,edate)values(";
			$strsql=$strsql." ".$rptid.",";
			$strsql=$strsql." ".$company.",";
			$strsql=$strsql." ".$finyear.",";
			$strsql=$strsql." ".$month.",";
			$strsql=$strsql." ".$currentproduction.",";
			$strsql=$strsql." ".$actualproduction.",";
			$strsql=$strsql." ".$cumulativeproduction.",";
			$strsql=$strsql." ".$currentcost.",";
			$strsql=$strsql." ".$actualcost.",";
			$strsql=$strsql." ".$cumulativecost.",";
			$strsql=$strsql." ".$currentprofit1.",";
			$strsql=$strsql." ".$actualprofit1.",";
			$strsql=$strsql." ".$cumulativeprofit1.",";
			$strsql=$strsql." ".$currentprofit2.",";
			$strsql=$strsql." ".$actualprofit2.",";
			$strsql=$strsql." ".$cumulativeprofit2.",";
			$strsql=$strsql." ".$currentcashprofit.",";
			$strsql=$strsql." ".$actualcashprofit.",";
			$strsql=$strsql." ".$cumulativecashprofit.",";
			$strsql=$strsql." ".$currentnetprofit.",";
			$strsql=$strsql." ".$actualnetprofit.",";
			$strsql=$strsql." ".$cumulativenetprofit.",";
			$strsql=$strsql." '".date("Y-m-d",$dt)."',";
			$strsql=$strsql." '".$status."',";
			$strsql=$strsql." '".date("Y-m-d")."')";			
			
			mysql_query($strsql);	
			//echo $strsql;	
			$r=mysql_query("COMMIT");
			echo "Report Successfully updated";
			
	
			
	}
	
	catch (Exception $e)
	{
    	$r=mysql_query("ROLLBACK");
		echo 'Caught exception: ',  $e->getMessage(), "/n";
	}
		
	function deleteRecords($comp,$year,$mth)
	{		
	    
	    $strsql1="DELETE FROM emp_statutory_dues where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_financial_indicators where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_otherincome_depr where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_financial_charges where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_fixed_expenses where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_variable_expenses where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_profirability_statement where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_manpower where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_monthlyreport_tot where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
	    
	    $strsql1="DELETE FROM emp_monthly_capacity where company_id=".$comp." and fin_year=".$year." and 
				 month=".$mth."";
	    mysql_query($strsql1);
		
	}
?>