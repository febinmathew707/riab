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
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$rptid=$_GET["id"];
	$status=$_GET["status"];
	$strsql="select * from emp_monthly_report  where Rpt_id=".$rptid."";
	$resultbill=mysql_query($strsql);
	$rowbill=mysql_fetch_assoc($resultbill);
	
	$strsql="update emp_monthly_report set status='".$status."',is_process='N' where Rpt_id=".$rptid."";
	
	if(mysql_query($strsql))
	{	
		
		if($status=="R")
		{
			mysql_query("delete from emp_monthlyreport_tot where rpt_id=".$rptid."");
			mysql_query("delete from emp_profirability_statement where rpt_id=".$rptid."");
			mysql_query("delete from emp_variable_expenses where rpt_id=".$rptid."");
			mysql_query("delete from emp_fixed_expenses where rpt_id=".$rptid."");
			mysql_query("delete from emp_otherincome_depr where rpt_id=".$rptid."");
			mysql_query("delete from emp_financial_indicators where rpt_id=".$rptid."");
			mysql_query("delete from emp_statutory_dues where rpt_id=".$rptid."");
			mysql_query("delete from emp_manpower where rpt_id=".$rptid."");
			mysql_query("delete from emp_monthly_capacity where rpt_id=".$rptid."");
		}
		else if($status=="A")
		{
			$sql="select max(id) from emp_monthlyreport_tot where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_monthlyreport_tot set status='".$status."'  where id =".$rowone[0]." ");	
					
			$sql="select max(auto_no) from emp_profirability_statement where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_profirability_statement set status='".$status."'  where auto_no =".$rowone[0]." ");			
			
			$sql="select max(auto_no) from emp_variable_expenses where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_variable_expenses set status='".$status."'  where auto_no =".$rowone[0]." ");	
					
			$sql="select max(auto_no) from emp_fixed_expenses where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_fixed_expenses set status='".$status."'  where auto_no =".$rowone[0]." ");		
				
			$sql="select max(auto_no) from emp_otherincome_depr where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_otherincome_depr set status='".$status."'  where auto_no =".$rowone[0]." ");
			
			$sql="select max(auto_no) from emp_financial_indicators where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_financial_indicators set status='".$status."'  where auto_no =".$rowone[0]." ");
			
			$sql="select max(auto_no) from emp_statutory_dues where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);
						mysql_query("update emp_statutory_dues set status='".$status."'  where auto_no =".$rowone[0]." ");
			
			$sql="select max(auto_no) from emp_manpower where Rpt_id=".$rptid."";
			$resOne=mysql_query($sql);
			$rowone=mysql_fetch_row($resOne);			
			mysql_query("update emp_manpower set status='".$status."'  where auto_no =".$rowone[0]." ");	
			
			
			
			mysql_query("update emp_monthly_capacity set status='".$status."' where Rpt_id=".$rptid." and status='S'");
		}
		$random_hash = md5(date('r', time()));
		
		$strsql="SELECT * FROM emp_company WHERE company_id=(select company_id from 
				emp_monthly_report where rpt_id=".$rptid.")";
		$resultCom=mysql_query($strsql);
		$rowCom=mysql_fetch_assoc($resultCom);
		$subject="Attn:";
		$headers = "To: The Receiver ".$rowCom["Email"]."\n" .
		    "From: The Sender <info@soemonit_soemonit_pentaclt.com>\n" .
		    "MIME-Version: 1.0\n" .
		    "Content-type: text/html; charset=iso-8859-1";
		
		$message="<HTML><BODY><font color=black size=3 face=verdana>Report Rejected<br></font><font color=black size=2 
		face=verdana> ";
		if($status=='R')
		{
			$mail_sent = @mail( $rowCom["Email"], $subject, $message, $headers );
		}
		echo "Report successfully updated".$status;
		
		$narrat="Update the status of Montly Report of " . $rowCom["company_name"]." to " . $status .
		 		" during the month " .$rowbill["month"] .	" by ".$_SESSION['user_name']." at " . date("Y-m-d");
				$strsql="INSERT INTO emp_monthly_report_log(user_id,edate,narrat,company_id) values(";
				$strsql=$strsql." '".$_SESSION['user_name']."',";
				$strsql=$strsql." '".date("Y-m-d")."',";
				$strsql=$strsql." '".$narrat."',";
				$strsql=$strsql." ".$_SESSION["company_id"].")";
				mysql_query($strsql);
				
				
		
				
		//$strsql="INSERT INTO emp_manpower_prev(Rpt_id,company_id,fin_year,month,effective_month,rpt_date,edate)select
				
				
	}
	else
	{
		echo "Sorry your request couldn't be completed";
	}
?>