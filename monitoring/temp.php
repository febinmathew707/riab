<?php
/* UPDATE card_info ci
INNER JOIN 
(
  SELECT card_no, MAX(opening_date) MaxOpeningDate
  FROM card_info
  GROUP BY card_no
) cm ON ci.card_no = cm.card_no AND ci.opening_date = cm.MaxOpeningDate
SET ci.is_blocked='Y' 
WHERE ci.card_no = '6396163270002509' 


update emp_variable_expenses t1
INNER JOIN
(
   SELECT MAX(auto_no) maxid
   FROM emp_variable_expenses 
   group by rpt_id
)t2 on t1.auto_no=t2.maxid
set status='A'
where rpt_id in(select rpt_id from emp_monthly_report where status='A')
*/
include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$sql="select * from emp_monthly_report where rpt_id>=1800 and rpt_id<=2000 order by rpt_id ";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
			if($row["status"]=="A")
			{
			$rptid=$row["Rpt_id"];
			$status="A";
			echo $rptid."<br>";
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
			}
	}
			
?>